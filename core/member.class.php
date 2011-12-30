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
class member{
	public static $uId;
	public static $Rs;
	public static $nickname;
	public static $group;
	public static $cpower;
	public static $power;
	public static $isAdmin=false;
	private static $loginCount=0;
	//检验
    function check($a,$p,$ajax=false) {
    	$sql=self::$isAdmin?"AND `type`='1'":"AND `type`='0'";//0用户 1管理员
        //验证用户 账号/密码
        self::$Rs = iCMS_DB::getRow("SELECT * FROM `#iCMS@__members` WHERE `username`='{$a}' AND `password`='{$p}' {$sql} AND `status`='1'");
        if(empty(self::$Rs)) {
        	set_cookie('iCMS_LOGIN_COUNT',authcode(self::$loginCount+1,'DECODE'),1800);
        	//self::$isAdmin && runlog('login', 'username='.$a.'&password='.$_POST['password']);//记录
        	if($ajax) return false;
        	self::LoginPage();
        }else {
            self::$uId=self::$Rs->uid;
            self::$Rs->info && self::$Rs->info=unserialize(self::$Rs->info);
            self::$group = iCMS_DB::getRow("SELECT * FROM `#iCMS@__group` WHERE `gid`='".self::$Rs->groupid."'");//用户组
            $power		 = self::merge(self::$group->power,self::$Rs->power);
            self::$power = empty($power)?array(0):explode(',',$power);
            $cpower      = self::merge(self::$group->cpower,self::$Rs->cpower);
            self::$cpower= empty($cpower)?array(0):explode(',',$cpower);
			self::$nickname= empty(self::$Rs->nickname)?self::$Rs->username:self::$Rs->nickname;
            self::$Rs->groupid=="1" && self::$cpower=NULL;
			if($ajax) return true;
        }
    }

	function avatar($size="24"){
		$_dir	= ceil(self::$uId/500);
		$avatar	= 'avatar/'.$_dir.'/'.self::$uId.'_'.$size.'.gif';
		if(!file_exists(FS::fp($avatar,'+iPATH'))){
			global $iCMS;
			return $iCMS->config['publicURL'].'/common/avatar_'.$size.'.gif';
		}else{
			return FS::fp($avatar);
		}
	}
    //检查栏目权限
    function CP($p=NULL,$T="F",$url=__REF__) {
        if(self::$Rs->groupid=="1")
            return TRUE;

        if(is_array($p)?array_intersect($p,self::$cpower):in_array($p,self::$cpower)) {
            return TRUE;
        }else {
            if($T=='F') {
                return FALSE;
            }else {
                echo UI::lang($T);
                exit();
            }
        };
    }
    //检查后台权限
    function MP($p=NULL,$T="Permission_Denied",$url=__REF__) {
        if(self::$Rs->groupid=="1")
            return TRUE;

        if(is_array($p)?array_intersect($p,self::$power):in_array($p,self::$power)) {
            return TRUE;
        }else {
            if($T=='F') {
                return FALSE;
            }else {
                echo UI::lang($T);
                exit();
            }
        }
    }
    //登陆验证
    function checklogin($ajax=false) {
//        self::$loginCount = (int)authcode(get_cookie('iCMS_LOGIN_COUNT'),'DECODE');
//        if(self::$loginCount>iCMS_LOGIN_COUNT) exit();

 		$a	= $_POST['username'];
		$p	= $_POST['password'];
       	$ip = getip();
        $cn	= self::$isAdmin?'iCMS_AUTH':'iCMS_USER';
        $sep= iCMS_AUTH_IP?'#=iCMS['.$ip.']=#':'#=iCMS=#';
        if(empty($a) && empty($p)) {
            $auth	= get_cookie($cn);
            list($a,$p)	= explode($sep,authcode($auth,'DECODE'));
            return self::check($a,$p,$ajax);
        }else {
        	$p	= md5($p);
            $crs=self::check($a,$p,$ajax);
            if(!self::$isAdmin && $ajax && !$crs) return false;
            iCMS_DB::query("UPDATE `#iCMS@__members` SET `lastip`='".$ip."',`lastlogintime`='".time()."',`logintimes`=logintimes+1 WHERE `uid`='".self::$uId."'");
            if(self::$isAdmin){
	            set_cookie($cn,authcode($a.$sep.$p,'ENCODE'));
            	!$ajax && javascript::dialog("登陆成功！",'url:'.__SELF__);
	             return $crs;
           }else{
           	   self::set_user_cookie($a,$p,self::$nickname);
           	   if($ajax) return true;
           }
        }
    }
	//登陆页
	function LoginPage(){
		global $iCMS;
		if(self::$isAdmin){
			include AdminCP::tpl('login');
		}else{
			_header($iCMS->config['publicURL'].'/passport.php?do=login');
		}
	}
	//注销
	function logout($url){
		self::cleancookie();
		_header($url);
	}
	function set_user_cookie($a,$p,$info){
		set_cookie('iCMS_USER',authcode($a.(iCMS_AUTH_IP?'#=iCMS['.getip().']=#':'#=iCMS=#').$p,'ENCODE'));
		set_cookie('iCMS_USER_INFO',$info);
	}
	function cleancookie(){
		set_cookie(self::$isAdmin?'iCMS_AUTH':'iCMS_USER', '',-31536000);
		!self::$isAdmin && set_cookie("iCMS_USER_INFO",'',-31536000);
	}
	function merge($G,$A){
		$G && $tmp[]=$G;
		$A && $tmp[]=$A;
		return @implode(',',$tmp);
	}
}
?>