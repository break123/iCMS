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
class AdminCP extends iCMS {
	public $modules	= array();
    function __construct() {
    	parent::__construct();
    	$this->modules	= array('desktop');
    	$this->ACP_Path	= iCMS_MODULE.'/admincp';
//		member::$isAdmin = true;
//		member::checklogin();
//		member::MP("ADMINCP","ADMINCP_Permission_Denied");
    }
    function run() {
        $mo	= $_GET['mo']?$_GET['mo']:'desktop';
		if (!in_array($mo, $this->modules)){
			$this->throwException('应用程序运行出错.找不到应用程序:' . $mo, 1001);
		}
    	$this->module_name	= $mo;
    	$this->module_file	= $this->ACP_Path.'/'.$mo.'.class.php';
    	
		if(FE($this->module_file)){
			require_once($this->module_file);
		}else{
			$this->throwException('应用程序运行出错.找不到文件:' . $this->module_name.'.class.php', 1002);
		}
		$this->module = new $this->module_name;
		$this->moduleRun();
    }
    function moduleRun(){
		$do	= $_GET['do']?$_GET['do']:$_POST['do'];
		empty($do) && $do	= 'iCMS';
		$this->method		= 'do'.$do;
		if (method_exists($this->module,$this->method)) {
			$method	= $this->method;
			$args	= func_get_args();
			if($args){
				$this->module->$method();
			}else{
				$this->module->$method($args);
			}
		}else{
			$this->throwException('应用程序运行出错.类 ' .$this->module_name. ' 中找不到方法定义:do' . $do, 1003);
		}
    }
    function tpl($p=NULL) {
    	if($p===NULL && $this->module_name){
    		$p=$this->module_name;
	     	$this->method && $p.='.'.$this->action;
   		}
        return $this->ACP_Path.'/template/'.$p.'.php';
    }
}
