<?php
/**
* iCMS - i Content Management System
* Copyright (c) 2007-2012 idreamsoft.com iiimon Inc. All rights reserved.
*
* @author coolmoo <idreamsoft@qq.com>
* @site http://www.idreamsoft.com
* @licence http://www.idreamsoft.com/license.php
* @version 6.0.0 (2012-02-14)
*/
class iCMS extends Template {
    public $config	= array();
    public $firstcount=0;
    public $pageurl	= null;
    public $pagenav	= null;
    public $pagesize=0;
    public $mode	= null;
    public $module	= null;
    public $iCache	= null;

    function __construct() {
    	$this->config			= & $GLOBALS['config'];
    	$this->cookie			= & $GLOBALS['_iCookie'];
        $this->version			= Version;
        $this->template_dir   	= iCMS_TPL;
        $this->compile_dir    	= iCMS_TPL_CACHE;
        $this->debugging    	= false;
        $this->left_delimiter	= '<!--{';
        $this->right_delimiter	= '}-->';
        $this->dir        		= $this->config['dir'];
        $this->register_modifier("date",	"get_date");
        $this->register_modifier("cut",		"csubstr");
        $this->register_modifier("htmlcut", "htmlSubString");
        $this->register_modifier("count",	"cstrlen");
        $this->register_modifier("html2txt","HtmToText");
        $this->register_modifier("pinyin",	"GetPinyin");
        $this->register_modifier("unicode", "getUNICODE");
        $this->register_modifier("small",	"gethumb");
        $this->register_modifier("thumb",	"small");
        $this->SiteInit();
        $this->CacheInit();
        $this->modules	= array('index');
    }
    function SiteInit(){
        $this->assign("version", iCMS_VER);
        $this->assign("poweredby", '<a href="http://www.idreamsoft.com" target="_blank">iCMS</a> '.iCMS_VER);
        $this->assign('site',array("title"=>$this->config['name'],"seotitle"=>$this->config['seotitle'],
                "keywords"    =>$this->config['keywords'],
                "description"=>$this->config['description'],
                "domain"    =>$this->config['domain'],
                "url"        =>$this->config['url'],
                "dir"        =>substr($this->config['dir'],0,-1),
                "publicURL"    =>$this->config['publicURL'],
                "usercpURL"    =>$this->config['usercpURL'].'/index.php',
                "tpl"        =>$this->config['template'],
                "tplpath"    =>$this->config['dir']."template/".$this->config['template'],
                "tplurl"    =>$this->config['url']."/template/".$this->config['template'],
                "email"        =>$this->config['masteremail'],
                "icp"        =>$this->config['icp']));
        $this->assign("cookie", $this->cookie);
    }
    /**
     * 运行应用程序
     * @param string $mo 模块名称
     * @param string $do 动作名称
     * @return iCMS
     */
    function run($do = NULL,$mo = NULL) {
    	if(empty($mo)){
	    	$fi	= FS::name(__SELF__);
    		$mo	= $fi['name'];
    	}
		if (!in_array($mo, $this->modules)){
			$this->throwException('应用程序运行出错.找不到应用程序:' . $mo, 1001);
		}
    	$this->module_name	= $mo;
    	$this->module_path	= iCMS_MODULE.'/'.$mo;
    	$this->module_file	= $this->module_path.'/'.$mo.'.class.php';
    	
		if(FE($this->module_file)){
			require_once($this->module_file);
		}else{
			$this->throwException('应用程序运行出错.找不到文件:' . $this->module_name.'.class.php', 1002);
		}
		$this->module = new $this->module_name;
		if(is_array($this->module->methods)){
			array_push($this->module->methods,$this->module_name);
		}else{
			$this->module->methods=array($this->module_name);
		}
		$this->moduleRun();
    }
    function moduleRun(){
		$do	= $_GET['do'];
		empty($do) && $do=$this->module_name;
		if($do && $this->module->methods){
			if (!in_array($do, $this->module->methods)){
				$this->throwException('应用程序运行出错.类 ' .$this->module_name. ' 中找不到方法定义:do' . $do, 1003);
			}
			$method	= 'do'.$do;
			$args	= func_get_args();
			if($args){
				$this->module->$method();
			}else{
				$this->module->$method($args);
			}
		}else{
			$this->throwException('应用程序运行出错.类 ' .$this->module_name, 1004);
		}
    }
    function load_module($name){
    	 return iCMS_MODULE.'/'.$name.'/'.$name.'.class.php';
    }
    function CacheInit() {
        if(!isset($this->iCache)) {
        	switch($this->config['cacheEngine']){
        		case 'memcached':
	                $_servers = explode("\n",str_replace(array("\r"," "),"",$this->config['cacheServers']));
	                $this->iCache = new memcached(array(
	                                'servers' =>$_servers,
	                                'compress_threshold' => 10240,
	                                'persistant' => false,
	                                'debug' => false,
	                                'compress'    => $this->config['iscachegzip']
	                ));
	                unset($_servers);
        		break;
        		case 'redis':
					$this->iCache = new Redis(array(
					    'host'     => 'unix:///tmp/redis.sock',
					    'port'     => 0,
					    'db'       => 1
					));
        		break;
        		case 'FileCache':
	                $this->iCache = new FileCache(array(
	                                'dirs'    => iPATH.$this->config['cachedir'],
	                                'level'    => $cacheLevel?$cacheLevel:$this->config['cachelevel'],
	                                'compress'=> $this->config['iscachegzip']
	                ));
        		break;
        	}
        }
    }
    public function getCache($cacheName,$ckey=NULL) {
        $_cName=implode('',(array)$cacheName);
        if(!$this->config['iscache']&&strstr($_cName,'system')===false) {
            return NULL;
        }
        if(!isset($GLOBALS['iCMS.cache'][$_cName])) {
            $GLOBALS['iCMS.cache'][$_cName]=is_array($cacheName)?
                    $this->iCache->get_multi($cacheName):
                    $this->iCache->get($cacheName);
        }
        return $ckey?$GLOBALS['iCMS.cache'][$_cName][$ckey]:$GLOBALS['iCMS.cache'][$_cName];
    }
    public function setCache($cacheName,$rs,$cachetime="-1") {
        if(!$this->config['iscache']&&strstr($cacheName,'system')===false) {
            return NULL;
        }
        if($this->config['cacheEngine']=='memcached') {
            $this->iCache->delete($cacheName);
        }
        $this->iCache->add($cacheName,$rs,($cachetime!="-1"?$cachetime:$iCMS->config['cachetime']));
        return $this;
    }
    Function tpl($tpl,$p='index') {
        empty($tpl) && $this->error('error:notpl',$tpl);
        strpos($tpl,'{TPL}')!==false && $tpl = str_replace('{TPL}',$this->config['template'],$tpl);
    	var_dump($this->template_dir."/".$tpl);
        if(FE($this->template_dir."/".$tpl)) {
            return $this->_tpl($tpl);
        }elseif($this->config['template'] && FE($this->template_dir."/".$this->config['template']."/{$p}.htm")) {
            return $this->_tpl($this->config['template']."/{$p}.htm");
        }elseif($tpl=='iTPL') {
            return $this->_tpl("system/{$p}.htm");
        }else{
            $this->error('error:notpl',$tpl);
        }
    }
    function Hook($value,$HookName='metadata'){
		$this->$HookName	= $value;
		//$this->metadata	= array('title'=>$rs->title,'indexId'=>$rs->id,'mId'=>$rs->mid,'sortId'=>$rs->fid);
    }
    Function value($key,$value) {
        $this->assign($key,$value);
    }
    Function clear($key) {
        $this->clear_assign($key);
    }
    //------------------------------------
    Function _tpl($tpl) {
        if($this->mode=='CreateHtml') {
            return $this->fetch($tpl);
        }else {
            $this->display($tpl);
        }
    }
    function gotohtml($fp,$url='',$fmode='0') {
        $fmode==1 && $this->mode!='CreateHtml' && FE($fp) && stristr($fp, '.php?') === FALSE && $this->go($url);
    }
    function language($string) {
        $langFile=$this->template_dir.'/'.$this->config['template'].'/'.$this->config['language'].'.php';
        if(!FE($langFile)) {
            $langFile=$this->template_dir.'/system/'.$this->config['language'].'.php';
        }
        if(!isset($GLOBALS['_iLang'])) $GLOBALS['_iLang']=include($langFile);
        if(strpos($string,':')!==false) {
            list($s,$k)=explode(':',$string);
            return isset($GLOBALS['_iLang'][$s][$k])?$GLOBALS['_iLang'][$s][$k]:$string;
        }else {
            return isset($GLOBALS['_iLang'][$string])?$GLOBALS['_iLang'][$string]:$string;
        }
    }
    Function error($string,$tpl="") {
 //       header('HTTP/1.1 404 Not Found');
//        trigger_error('模板:' . $this->config['dir']."templates/".$tpl. ' 错误信息:' . $this->language($string). '1003');
        $this->assign('TPL_PATH',$this->config['dir']."template/".$tpl);
        $this->assign('error',$this->language($string));
        $this->display('system/error.htm');
        exit;
    }
    //翻页函数
    function multi($array) {
        include_once iCMS_CORE.'/multi.class.php';
        $multi=new multi($array);
        if($multi->totalpage>1) {
            $this->assign($array['pagenav'],$multi->show($pnstyle));
            $this->assign('pageA',array('total'=>$multi->totalpage,'current'=>$multi->nowindex,'nav'=>$multi->show($pnstyle)));
            $this->assign('multi',$multi);
        }
        $offset    =$multi->offset;
        unset($multi);
        return $offset;
    }
    function keywords($a) {
        if($this->config['kwCount']==0) return $a;
        $kw    = $this->getCache('system/keywords');
        if($kw){
        	foreach($kw AS $i=>$val) {
	            if($val['status']) {
	                $s[]=$val['keyword'];
	                $r[]=$val['replace'];
	            }
           }
            return $this->str_replace_limit($s, $r, stripslashes($a),$this->config['kwCount']);
        }
        return $a;
    }
    function str_replace_limit($search, $replace, $subject, $limit=-1) {
        preg_match_all ("/<a[^>]*?>(.*?)<\/a>/si", $subject, $matches);//链接不替换
        $linkArray    = array_unique($matches[0]);
        $linkflip    = array_flip($linkArray);
        foreach($linkflip AS $linkHtml=>$linkkey){
            $linkA[$linkkey]='###iCMS_link'.mt_rand(1,1000).'_'.$linkkey.'###';
        }
        $subject = str_replace($linkArray,$linkA,$subject);

        preg_match_all ("/<[\/\!]*?[^<>]*?>/si", $subject, $matches);
        $htmArray    = array_unique($matches[0]);
        $htmflip    = array_flip($htmArray);
        foreach($htmflip AS $kHtml=>$vkey){
            $htmA[$vkey]="###iCMS_html".mt_rand(1,1000).'_'.$vkey.'###';
        }
        $subject = str_replace($htmArray,$htmA,$subject);

        // constructing mask(s)...
        if (is_array($search)) {
            foreach ($search as $k=>$v) {
                $search[$k] = '`' . preg_quote($search[$k],'`') . '`i';
            }
        }else {
            $search = '`' . preg_quote($search,'`') . '`';
        }
        // replacement
        $subject = preg_replace($search, $replace, $subject, $limit);
        $subject = str_replace($htmA,$htmArray,$subject);
        $subject = str_replace($linkA,$linkArray,$subject);
        return $subject;
    }
    function go($URL='') {
        empty($URL)&&$URL=__REF__;
        if(!headers_sent()) {
            header("Location: $URL");
            exit;
        }else {
            echo '<meta http-equiv=\'refresh\' content=\'0;url='.$URL.'\'><script type="text/JavaScript">window.location.replace(\''.$URL.'\');</script>';
            exit;
        }
    }
	function throwException($msg, $code) {
	    trigger_error($msg . '(' . $code . ')');
	}
}
