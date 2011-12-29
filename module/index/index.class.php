<?php
/**
 * @package iCMS
 * @copyright 2007-2010, iDreamSoft
 * @license http://www.idreamsoft.com iDreamSoft
 * @author coolmoo <idreamsoft@qq.com>
 */
class index extends iCMS {
	public $methods	= array('html');
    function __construct() {}
    public function _html($a = null) {
    	$index_name	= $a[0];
    	$index_tpl	= $a[1];
        empty($index_name)&& $index_name	= $this->config['indexname'];
        empty($index_tpl)&& $index_tpl		= $this->config['indexTPL'];
        $url=$index_name.$this->config['htmlext'];
        $this->gotohtml(iPATH.$url,$this->config['htmlURL'].FS::path($this->dir.$url));
        return $this->tpl($index_tpl);
    }
}
