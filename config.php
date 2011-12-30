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
// 数据库名
define('DB_NAME', 		'icms');
// 数据库用户
define('DB_USER', 		'root');
//数据库密码
define('DB_PASSWORD', 		'');
// 服务器名或服务器ip,一般为localhost
define('DB_HOST', 		'localhost');
/*MYSQL编码设置.如果您的程序出现乱码现象，需要设置此项来修复.
请不要随意更改此项，否则将可能导致系统出现乱码现象*/
define('DB_CHARSET', 		'utf8');
// 表名前缀, 同一数据库安装多个请修改此处
define('DB_PREFIX', 		'icms_');
//----------------------------------------
define('DB_COLLATE', 	'');
//----------------------------------------
define('iCMSKEY', 		'Jq4UDnkVkcywhv4BgfpcWemBAFKc5khQ');
define('iCMS_CHARSET','utf-8');
//----------------------------------------
//首页 伪静态 模式
define('INDEX_HTML_MODE',false);//true启用 false关闭 

//是否使用验证码
define('iCMS_SECCODE',true);//true使用 false关闭

//账号验证错误次数
//define('iCMS_LOGIN_COUNT',10);
//账号验证IP
define ('iCMS_AUTH_IP',true);