<?php
/**
 * @package iCMS
 * @copyright 2007-2010, iDreamSoft
 * @license http://www.idreamsoft.com iDreamSoft
 * @author coolmoo <idreamsoft@qq.com>
 */
class index extends iCMS {
	public $methods	= array('asd');
    function __construct() {
    	$this->tpl('asd.htm');
    }
    function _asd(){
    	$this->tpl('asd.htm');
    }
}
