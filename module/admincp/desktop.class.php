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
class desktop extends AdminCP {
//    function __construct() {
//    	parent::__construct();
//    }
    function doiCMS(){
    //	print_r($this);
    	include parent::tpl("desktop");
    }
}
