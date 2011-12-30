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
define('iCMS_BUG', true);
require (dirname(__file__) . '/global.php');
require_once iCMS_CORE.'/member.class.php';
require_once iCMS_MODULE.'/admincp/admincp.class.php';

define('__ADMINCP__',__SELF__.'?mo');

$ACP = new AdminCP();
$ACP->run();
