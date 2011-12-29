<?php
/**
* iCMS - i Content Management System
* Copyright (c) 2007-2012 idreamsoft.com iiimon Inc. All rights reserved.
*
* @author coolmoo <idreamsoft@qq.com>
* @site http://www.idreamsoft.com
* @licence http://www.idreamsoft.com/license.php
* @version 6.0.0 (2012-02-14)
* @package FileSystem
*/
class FS {
	public static $isvalidext=true;
	public static $isRedirect=false;
	
	function ex($f) {
		return @stat($f)===false?false:true;
	}

	function is_file($file) {
		return @is_file($file);
	}

	function is_dir($path) {
		return @is_dir($path);
	}

	function is_readable($file) {
		return @is_readable($file);
	}

	function is_writable($file) {
		return @is_writable($file);
	}

	function atime($file) {
		return @fileatime($file);
	}

	function mtime($file) {
		return @filemtime($file);
	}
	function unzip($fn,$to,$suffix=false){
		@set_time_limit(0);
		// Unzip uses a lot of memory
		@ini_set('memory_limit', '256M');
		require_once(iCMS_CORE.'/pclzip.class.php');
		$files =array();
		$zip = new PclZip($fn);

		// Is the archive valid?
		if ( false == ($archive_files = $zip->extract(PCLZIP_OPT_EXTRACT_AS_STRING))) exit("ZIP包错误");

		if ( 0 == count($archive_files) ) exit("空的ZIP文件");
		
		$path=self::path($to);
		self::mkdir($path);

		foreach ($archive_files as $file) {
			$files[]= array('filename'=>$file['filename'],'isdir'=>$file['folder']);
			$folder	= $file['folder'] ? $file['filename'] : dirname($file['filename']);
			self::mkdir($path.'/'.$folder);
			if (empty($file['folder'])) {
				$fp=$path .'/'. $file['filename'];
				$suffix && $fp=$fp.'.'.$suffix;
				self::write($fp, $file['content']);
			}
		}
		return $files;
	}
    function check($fn) {
        strpos($fn,'..')!==false && exit('What are you doing?');
    }
    function del($fn,$check=1) {
        $check && self::check($fn);
        @chmod ($fn, 0777);
        return @unlink($fn);
    }
    function read($fn,$check=1,$method="rb") {
        $check && self::check($fn);
        if(function_exists('file_get_contents') && $method!="rb") {
            $filedata = file_get_contents($fn);
        }else {
            if($handle=@fopen($fn,$method)) {
                flock($handle,LOCK_SH);
                $filedata=@fread($handle,filesize($fn));
                fclose($handle);
            }
        }
        return $filedata;
    }
    function write($fn,$data,$check=1,$method="rb+",$iflock=1,$chmod=1) {
        $check && self::check($fn);
        touch($fn);
        $handle=fopen($fn,$method);
        if($iflock) {
            flock($handle,LOCK_EX);
        }
        fwrite($handle,$data);
        if($method=="rb+") ftruncate($handle,strlen($data));
        fclose($handle);
        $chmod && @chmod($fn,0777);
    }
    //创建目录
    function mkdir($d) {
        $d = str_replace( '//', '/', $d );
        if ( file_exists($d) )
            return @is_dir($d);

        // Attempting to create the directory may clutter up our display.
        if ( @mkdir($d) ) {
            $stat = @stat(dirname($d));
            $dir_perms = $stat['mode'] & 0007777;  // Get the permission bits.
            @chmod($d, $dir_perms );
            return true;
        } elseif (is_dir(dirname($d))) {
            return false;
        }

        // If the above failed, attempt to create the parent node, then try again.
        if ( ( $d != '/' ) && ( self::mkdir(dirname($d))))
            return self::mkdir( $d );

        return false;
    }
    //删除目录
    function rmdir($dir,$df=true,$ex=NULL) {
    	$exclude	= array('.','..');
    	$ex && $exclude=array_merge($exclude, (array)$ex);
        if ($dh=@opendir($dir)) {
            while (($file=readdir($dh))!== false) {
                if (!in_array($file, $exclude)) {
                    $path = $dir.'/'.$file;
                    is_dir($path) ? self::rmdir($path,$df) : ($df ? @unlink($path) : null);
                }
            }
            closedir($dh);
        }
        return @rmdir($dir);
    }
    function info($path){
    	return (OBJECT)pathinfo($path);
    }
    function path($p='') {
        $a=explode('/', $p);
        $o=array();
        $c=count($a);
        for ($i=0; $i<$c; $i++) {
            if ($a[$i]=='.'||$a[$i]=='') continue;
            if ($a[$i]=='..' && $i>0 && end($o)!='..') {
                array_pop($o);
            }else {
                $o[]=$a[$i];
            }
        }
        $o['0']=='http:' && $o['0']='http:/';
        return ($p{0}=='/'?'/':'').implode('/', $o);
    }
    function path_is_absolute( $path ) {
        // this is definitive if true but fails if $path does not exist or contains a symbolic link
        if ( realpath($path) == $path )
            return true;

        if ( strlen($path) == 0 || $path{0} == '.' )
            return false;

        // windows allows absolute paths like this
        if ( preg_match('#^[a-zA-Z]:\\\\#', $path) )
            return true;

        // a path starting with / or \ is absolute; anything else is relative
        return (bool) preg_match('#^[/\\\\]#', $path);
    }
    function path_join( $base, $path ) {
        if ( !self::path_is_absolute($path) )
            $path = rtrim($base, '/') . '/' . ltrim($path, '/');

        return self::path($path);
    }
	function http_code($url){
		$uri=parse_url($url);
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl_handle, CURLOPT_FAILONERROR,1);
		curl_setopt($curl_handle, CURLOPT_HEADER, true);
		$file_content = curl_exec($curl_handle);
		return curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
	}

    //获取远程页面的内容
    function remote($url,$_referer=false) {
    		$curlopt_header	= false;
    		if(FS::$isRedirect){
	    		$http_code = self::http_code($url);
	    		if ($http_code == 301 || $http_code == 302) {
	    			$curlopt_header	= true;
	    		}
    		}
			$uri				= parse_url($url);
			$curlopt_referer	= $uri['scheme'].'://'.$uri['host'];
			$curl_handle 		= curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, $url);
			curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,2);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($curl_handle, CURLOPT_FAILONERROR,1);
			curl_setopt($curl_handle, CURLOPT_REFERER,$_referer?$_referer:$curlopt_referer);
	  		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1) ; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)');
			$curlopt_header && curl_setopt($curl_handle, CURLOPT_HEADER, true);
			$file_content = curl_exec($curl_handle);
			if ($http_code == 301 || $http_code == 302) {
			    preg_match('/Location:(.*?)\n/', $file_content, $matches); 
			    $newurl = trim(array_pop($matches));
			    $file_content = self::remote($newurl,false);
			}
			curl_close($curl_handle);
		    return $file_content;
    }

	function fp($f,$m='+http') {
	    global $iCMS;
	    switch($m) {
	        case '+http':
	            $fp = $iCMS->config['uploadURL'].'/'.$f;
	            break;
	        case '-http':
	            $fp = str_replace($iCMS->config['uploadURL'].'/','',$f);
	            break;
	        case 'http2iPATH':
	            $f	= str_replace($iCMS->config['uploadURL'].'/','',$f);
	            $fp = FS::path_join(iPATH,$iCMS->config['uploadfiledir']).'/'.$f;
	            break;
	        case 'iPATH2http':
	            $f = str_replace(FS::path_join(iPATH,$iCMS->config['uploadfiledir']).'/','',$f);
	            $fp = $iCMS->config['uploadURL'].'/'.$f;
	            break;
	        case '+iPATH':
	            $fp = FS::path_join(iPATH,$iCMS->config['uploadfiledir']).'/'.$f;
	            break;
	        case '-iPATH':
	            $fp = str_replace(FS::path_join(iPATH,$iCMS->config['uploadfiledir']).'/','',$f);
	            break;
	    }
	    return $fp;
	}
	function saveFile($http){
		global $iCMS;
        $RootPath		=self::path_join(iPATH,$iCMS->config['uploadfiledir']).'/';//绝对路径
        $FileDir 		= "";
        if($iCMS->config['savedir']) {
            $FileDir = str_replace(array('Y','y','m','n','d','j','H','EXT'),
                    array(get_date('','Y'),get_date('','y'),get_date('','m'),get_date('','n'),get_date('','d'),get_date('','j'),get_date('','H'),$FileExt),
                    $iCMS->config['savedir']);
        }
        $RootPath	= $RootPath.$FileDir."/";
        $milliSecond = 'remote_'.get_date('',"YmdHis").rand(1,99999);
       	self::mkdir($RootPath);
       	
            $FileExt=strtolower(FS::getExt($http));//&#316;&#701;
            (empty($FileExt)||strlen($FileExt)>4) && $FileExt='jpg';
			$FileExt!='jpg' && iUpload::CheckValidExt($http);//判断文件类型
			//过滤文件;
			strstr($FileExt, 'ph') && $FileExt="phpfile";
			in_array($FileExt,array('cer','htr','cdx','asa','asp','jsp','aspx','cgi')) && $FileExt.="file";

            $FileRootPathTmp= $RootPath.$milliSecond.$key.".".$FileExt;
            //$Snoopy->fetch($http);
            //if($Snoopy->results) {
            $fileresults=self::remote($http);
            if($fileresults) {
                self::write($FileRootPathTmp,$fileresults);
                $FileMd5	= md5_file($FileRootPathTmp);
//                list($tmpwidth, $tmpwidth, $tmptype, $tmpattr) = getimagesize($FileRootPathTmp);
//                if($tmpwidth<140 ||$tmpwidth<140){
//                	FS::del($FileRootPathTmp);
//                	continue;
//                }
                $rs			= iCMS_DB::getRow("SELECT * FROM #iCMS@__file WHERE `filename`='$FileMd5' LIMIT 1");
                if(empty($rs)){
	                $FileName 		= $FileMd5.".".$FileExt;
		            $FilePath		= $FileDir."/".$FileName;
		            $FileRootPath	= $RootPath.$FileName;
	                rename($FileRootPathTmp,$FileRootPath);
	                if(in_array($FileExt,array('gif','jpg','jpeg','png'))) {
	                    if($iCMS->config['isthumb'] &&($iCMS->config['thumbwidth']||$iCMS->config['thumbhight'])) {
	                        list($width, $height,$imagetype) = getimagesize($FileRootPath);
	                        if ( $width > $iCMS->config['thumbwidth'] || $height >$iCMS->config['thumbhight'] ) {
	                           self::mkdir($RootPath."thumb");
	                        }
	                        $Thumbnail=iUpload::thumbnail($RootPath, $FileRootPath, $FileMd5);
	                        (!empty($Thumbnail['filepath']) && $iCMS->config['thumbwatermark']) && iUpload::watermark($Thumbnail['filepath']);
	                    }
	                    iUpload::watermark($FileRootPath);
	                }
	                $_FileSize = @filesize($FileRootPath);
	                empty($_FileSize) && $_FileSize=0;
	                iCMS_DB::query("INSERT INTO `#iCMS@__file` (`filename`,`ofilename`,`path`,`intro`,`ext`,`size` ,`time`,`type`) VALUES ('$FileMd5', '$http', '$FileDir','$intro', '$FileExt', '$_FileSize', '".time()."', '1') ");
                }else{
                	$FilePath = $rs->path."/".$rs->filename.".".$rs->ext;
                	self::del($FileRootPathTmp);
                }
                return $FilePath;
            }
	}
    function remotepic(&$content,$intro='',$remote=false,$autopic=false) {
        global $iCMS;
        if(!$remote && !$autopic) return;
        
        $content = stripslashes($content);
        $img = array();
/*        preg_match_all("/<img.*?src\s*=[\"|'|\s]*((http|file):\/\/.*?\.(gif|jpg|jpeg|bmp|png)).*?>/is",$content,$match);*/
preg_match_all("/<img.*?src\s*=[\"|'](.*?)[\"|']/is",$content,$match);

        $_array = (array)array_unique($match[1]);
        $uri 	= parse_url($iCMS->config['uploadURL']);
        foreach($_array AS $_k=> $imgurl) {
            if(strstr(strtolower($imgurl),$uri['host'])) unset($_array[$_k]);
        }
        if(empty($_array)){
        	$content = addslashes($content);
        	return;
        }

        set_time_limit(0);
        $RootPath		=self::path_join(iPATH,$iCMS->config['uploadfiledir']).'/';//绝对路径
        $FileDir 		= "";
        if($iCMS->config['savedir']) {
            $FileDir = str_replace(array('Y','y','m','n','d','j','H','EXT'),
                    array(get_date('','Y'),get_date('','y'),get_date('','m'),get_date('','n'),get_date('','d'),get_date('','j'),get_date('','H'),$FileExt),
                    $iCMS->config['savedir']);
        }
        $RootPath	= $RootPath.$FileDir."/";
        $milliSecond = 'remote_'.get_date('',"YmdHis").rand(1,99999);
       	self::mkdir($RootPath);
        //require_once(iCMS_CORE.'/snoopy.class.php');
        require_once(iCMS_CORE.'/upload.class.php');
        //$Snoopy = new Snoopy;
        //$Snoopy->agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5";
        //$Snoopy->accept = "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
        foreach($_array as $key =>$value) {
        	$frs			= iCMS_DB::getRow("SELECT * FROM #iCMS@__file WHERE `ofilename`='$value' LIMIT 1");
        	if(empty($frs)){
	            $FileExt=strtolower(FS::getExt($value));//&#316;&#701;
	            (empty($FileExt)||strlen($FileExt)>3) && $FileExt='jpg';
	            if(FS::$isvalidext){
					$FileExt!='jpg' && iUpload::CheckValidExt($value);//判断文件类型
				}
				//过滤文件;
				strstr($FileExt, 'ph') && $FileExt="phpfile";
				in_array($FileExt,array('cer','htr','cdx','asa','asp','jsp','aspx','cgi')) && $FileExt.="file";

	            $FileRootPathTmp= $RootPath.$milliSecond.$key.".".$FileExt;

	            $fileresults=self::remote($value);
	            if($fileresults) {
	                self::write($FileRootPathTmp,$fileresults);
	                $FileMd5	= md5_file($FileRootPathTmp);
	//                list($tmpwidth, $tmpwidth, $tmptype, $tmpattr) = getimagesize($FileRootPathTmp);
	//                if($tmpwidth<140 ||$tmpwidth<140){
	//                	FS::del($FileRootPathTmp);
	//                	continue;
	//                }
	                $rs			= iCMS_DB::getRow("SELECT * FROM #iCMS@__file WHERE `filename`='$FileMd5' LIMIT 1");
	                if(empty($rs)){
		                $FileName 		= $FileMd5.".".$FileExt;
			            $FilePath		= $FileDir."/".$FileName;
			            $FileRootPath	= $RootPath.$FileName;
		                rename($FileRootPathTmp,$FileRootPath);
		                if(in_array($FileExt,array('gif','jpg','jpeg','png'))) {
		                    if($iCMS->config['isthumb'] &&($iCMS->config['thumbwidth']||$iCMS->config['thumbhight'])) {
		                        list($width, $height,$imagetype) = getimagesize($FileRootPath);
		                        if ( $width > $iCMS->config['thumbwidth'] || $height >$iCMS->config['thumbhight'] ) {
		                           self::mkdir($RootPath."thumb");
		                        }
		                        $Thumbnail=iUpload::thumbnail($RootPath, $FileRootPath, $FileMd5);
		                        (!empty($Thumbnail['filepath']) && $iCMS->config['thumbwatermark']) && iUpload::watermark($Thumbnail['filepath']);
		                    }
		                    iUpload::watermark($FileRootPath);
		                }
		                $_FileSize = @filesize($FileRootPath);
		                empty($_FileSize) && $_FileSize=0;
		                iCMS_DB::query("INSERT INTO `#iCMS@__file` (`filename`,`ofilename`,`path`,`intro`,`ext`,`size` ,`time`,`type`) VALUES ('$FileMd5', '$value', '$FileDir','$intro', '$FileExt', '$_FileSize', '".time()."', '1') ");
	                }else{
	                	$FilePath = $rs->path."/".$rs->filename.".".$rs->ext;
	                	self::del($FileRootPathTmp);
	                }
	                $content = str_replace($value,self::fp($FilePath,'+http'),$content);
	                if($autopic && $key==0 && !$remote){
	                	$content = addslashes($content);
	                	 break;
	                }
	            }
        }else{
        	$FilePath = $frs->path."/".$frs->filename.".".$frs->ext;
			$content = str_replace($value,self::fp($FilePath,'+http'),$content);
            if($autopic && $key==0 && !$remote){
            	$content = addslashes($content);
            	 break;
            }
        }
     }
        !$remote && $content = addslashes($content);
    }
    //文件名
    function name($fn) {
        $_fn = substr(strrchr($fn, "/"), 1);
        return array('name'=>substr($_fn,0,strrpos($_fn, ".")),
                'path'=>substr($fn,0,strrpos($fn, "."))
        );
    }
    // 获得文件扩展名
    function getExt($fn) {
    	return pathinfo($fn, PATHINFO_EXTENSION);
        //return substr(strrchr($fn, "."), 1);
    }
    // 获取文件大小
    function sizeUnit($filesize) {
        $SU = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $n = 0;
        while ($filesize >= 1024) {
            $filesize /= 1024;
            $n++;
        }
        return round($filesize,2).' '.$SU[$n];
    }
    //获取文件夹列表
    function folder($d,$dir='',$type='') {
        $sDir = trim($d);
        $type = strtolower($type);
        strpos($sDir,'.')!==false && exit('What are you doing?');
        $s_Url = "";
        $FDir = self::path(iPATH.$dir).'/';
        $sCurrDir = $FDir;
        if ($sDir != "") {
            if (is_dir($FDir.$sDir)) {
                $sCurrDir = $FDir.$sDir."/";
            }else {
                $sDir = "";
            }
            $s_Url =(strrpos($sDir, "/") !== false)?substr($sDir, 0, strrpos($sDir, "/")):"";
            $parentfolder=$s_Url;
        }
        if ($handle = opendir($sCurrDir)) {
            while (false !== ($file = readdir($handle))) {
                $sFileType = filetype($sCurrDir."/".$file);
                switch ($sFileType) {
                    case "dir":
                        if ($file!='.'&&$file!='..'&&$file!='admin') {
                            $oDirs[] = $file;
                        }
                        break;
                    case "file":
                        $oFiles[] = $file;
                        break;
                    default:
                }
            }
        }

        if (isset($oDirs))foreach( $oDirs as $oDir) {
                $s_Url = ($sDir == "")?$oDir:$sDir."/".$oDir;
                $folder[]=array('path'=>$s_Url,'dir'=>$oDir);
            }
        $nFileNum=count($oFiles);
        for($i=0;$i<$nFileNum;$i++) {
            $oFile=$oFiles[$i];
            $sFileName = $sCurrDir.$oFile;
            $s_Url = ($sDir == "")?$oFile:$sDir . "/" . $oFile;
            if($type && strstr($type,self::getExt($oFile))!==false) {
                $FileList[]=array('path'=>$s_Url,
                        'name'=>$oFile,
                        'time'=>get_date(filemtime($sFileName),"Y-m-d H:i"),
                        'icon'=>self::icon($oFile),
                        'ext'=>self::getExt($oFile),
                        'size'=>self::sizeUnit(filesize($sFileName))
                );
            }elseif(empty($type)) {
                $FileList[]=array('path'=>$s_Url,
                        'name'=>$oFile,
                        'time'=>get_date(filemtime($sFileName),"Y-m-d H:i"),
                        'icon'=>self::icon($oFile),
                        'ext'=>self::getExt($oFile),
                        'size'=>self::sizeUnit(filesize($sFileName))
                );
            }
        }
        $R['FileList']		=$FileList;
        $R['parentfolder']	=$parentfolder;
        $R['folder']		=$folder;
        return $R;
    }
    function icon($fn) {
        $ext = strtoupper(self::getExt($fn));
        switch ($ext) {
            case "TXT":$icon = "txt.gif";
                break;
            case "CHM":$icon = "hlp.gif";
                break;
            case "HLP":$icon = "hlp.gif";
                break;
            case "DOC":$icon = "doc.gif";
                break;
            case "PDF":$icon = "pdf.gif";
                break;
            case "MDB":$icon = "mdb.gif";
                break;
            case "GIF":$icon = "gif.gif";
                break;
            case "JPG":$icon = "jpg.gif";
                break;
            case "JPEG":$icon = "jpg.gif";
                break;
            case "BMP":$icon = "bmp.gif";
                break;
            case "PNG":$icon = "pic.gif";
                break;
            case "ASP":$icon = "code.gif";
                break;
            case "JSP":$icon = "code.gif";
                break;
            case "JS":$icon = "js.gif";
                break;
            case "PHP":$icon = "php.gif";
                break;
            case "PHP3":$icon = "php.gif";
                break;
            case "ASPX":$icon = "code.gif";
                break;
            case "HTM":$icon = "htm.gif";
                break;
            case "CSS":$icon = "code.gif";
                break;
            case "HTML":$icon = "htm.gif";
                break;
            case "SHTML":$icon = "htm.gif";
                break;
            case "ZIP":$icon = "zip.gif";
                break;
            case "RAR":$icon = "rar.gif";
                break;
            case "EXE":$icon = "exe.gif";
                break;
            case "AVI":$icon = "wmv.gif";
                break;
            case "MPG":$icon = "wmv.gif";
                break;
            case "MPEG":$icon = "wmv.gif";
                break;
            case "ASF":$icon = "mp.gif";
                break;
            case "RA":$icon = "rm.gif";
                break;
            case "RM":$icon = "rm.gif";
                break;
            case "MP3":$icon = "mp3.gif";
                break;
            case "MID":$icon = "wmv.gif";
                break;
            case "MIDI":$icon = "mid.gif";
                break;
            case "WAV":$icon = "audio.gif";
                break;
            case "XLS":$icon = "xls.gif";
                break;
            case "PPT":$icon = "ppt.gif";
                break;
            case "PPS":$icon = "ppt.gif";
                break;
            case "PHPFILE":$icon = "php.gif";
                break;
            case "FILE":$icon = "common.gif";
                break;
            case "SWF":$icon = "swf.gif";
                break;
            default:$icon = "unknow.gif";
                break;
        }
        return '<img border="0" src="admin/images/file/'.$icon.'" align="absmiddle" id="icon">';
    }
}
?>