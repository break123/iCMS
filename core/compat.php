<?php
/**
 * @package iCMS
 * @copyright 2007-2010, iDreamSoft
 * @license http://www.idreamsoft.com iDreamSoft
 * @author coolmoo <idreamsoft@qq.com>
 */
 
if (!function_exists('is_a')) {
	function is_a($object, $class) {
		// by Aidan Lister <aidan@php.net>
		if (get_class($object) == strtolower($class)) {
			return true;
		} else {
			return is_subclass_of($object, $class);
		}
	}
}

if (!function_exists('ob_clean')) {
	function ob_clean() {
		// by Aidan Lister <aidan@php.net>
		if (@ob_end_clean()) {
			return ob_start();
		}
		return false;
	}
}

/* compatibility with PHP versions older than 4.3 */
if ( !function_exists('file_get_contents') ) {
	function file_get_contents( $file ) {
		$file = file($file);
		return !$file ? false : implode('', $file);
	}
}

/**
 * Replace array_change_key_case()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.array_change_key_case
 * @author      Stephan Schmidt <schst@php.net>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision: 5187 $
 * @since       PHP 4.2.0
 * @require     PHP 4.0.0 (user_error)
 */
if (!function_exists('array_change_key_case')) {
		function array_change_key_case($input, $case = CASE_LOWER)
		{
				if (!is_array($input)) {
						user_error('array_change_key_case(): The argument should be an array',
								E_USER_WARNING);
						return false;
				}

				$output   = array ();
				$keys     = array_keys($input);
				$casefunc = ($case == CASE_LOWER) ? 'strtolower' : 'strtoupper';

				foreach ($keys as $key) {
						$output[$casefunc($key)] = $input[$key];
				}

				return $output;
		}
}

// From php.net
if(!function_exists('http_build_query')) {
	 function http_build_query( $formdata, $numeric_prefix = null, $key = null ) {
			 $res = array();
			 foreach ((array)$formdata as $k=>$v) {
					 $tmp_key = urlencode(is_int($k) ? $numeric_prefix.$k : $k);
					 if ($key) $tmp_key = $key.'['.$tmp_key.']';
					 $res[] = ( ( is_array($v) || is_object($v) ) ? http_build_query($v, null, $tmp_key) : $tmp_key."=".urlencode($v) );
			 }
			 $separator = ini_get('arg_separator.output');
			 return implode($separator, $res);
	 }
}

// Added in PHP 5.0
if (!function_exists('stripos')) {
	function stripos($haystack, $needle, $offset = 0) {
		return strpos(strtolower($haystack), strtolower($needle), $offset);
	}
}
if (!function_exists('json_decode')||!function_exists('json_encode')) {
	require_once iCMS_CORE.'/json.class.php';
	function json_decode($input) {
		$json = new Moxiecode_JSON();
		return $json->decode($input);
	}
	function json_encode($input) {
		$json = new Moxiecode_JSON();
		return $json->encode($input);
	}
}
/**
* Replace array_diff_key()
*
* @category    PHP
* @package    PHP_Compat
* @license    LGPL - [url]http://www.gnu.org/licenses/lgpl.html[/url]
* @copyright  2004-2007 Aidan Lister <[email]aidan@php.net[/email]>, Arpad Ray <[email]arpad@php.net[/email]>
* @link        [url]http://php.net/function.array_diff_key[/url]
* @author      Tom Buskens <[email]ortega@php.net[/email]>
* @version    $Revision: 1.9 $
* @since      PHP 5.0.2
* @require    PHP 4.0.0 (user_error)
*/
if (!function_exists('array_diff_key')) {
    function php_compat_array_diff_key(){
        $args = func_get_args();
        if (count($args) < 2) {
            user_error('Wrong parameter count for array_diff_key()', E_USER_WARNING);
            return;
        }
        // Check arrays
        $array_count = count($args);
        for ($i = 0; $i !== $array_count; $i++) {
            if (!is_array($args[$i])) {
                user_error('array_diff_key() Argument #' .($i + 1) . ' is not an array', E_USER_WARNING);
                return;
            }
        }
        $result = $args[0];
        if (function_exists('array_key_exists')) {
            // Optimize for >= PHP 4.1.0
            foreach ($args[0] as $key => $value) {
                for ($i = 1; $i !== $array_count; $i++) {
                    if (array_key_exists($key,$args[$i])) {
                        unset($result[$key]);
                        break;
                    }
                }
            }
        } else {
            foreach ($args[0] as $key1 => $value1) {
                for ($i = 1; $i !== $array_count; $i++) {
                    foreach ($args[$i] as $key2 => $value2) {
                        if ((string) $key1 === (string) $key2) {
                            unset($result[$key2]);
                            break 2;
                        }
                    }
                }
            }
        }
        return $result; 
    }
    function array_diff_key(){
        $args = func_get_args();
        return call_user_func_array('php_compat_array_diff_key', $args);
    }
}
function FE($f){
	return @stat($f)===false?false:true;
}
function array_diff_values($N, $O){
 	$diff['+'] = array_diff($N, $O);
 	$diff['-'] = array_diff($O, $N);
    return $diff;
}
function _int($n) {
    return 0-$n;
}

function iCMS_error_handler($errno, $errstr, $errfile, $errline){
    $errno = $errno & error_reporting();
    if($errno == 0) return;
    if(!defined('E_STRICT'))            define('E_STRICT', 2048);
    if(!defined('E_RECOVERABLE_ERROR')) define('E_RECOVERABLE_ERROR', 4096);
    print "<pre>\n<b>";
    switch($errno){
        case E_ERROR:               print "Error";                  break;
        case E_WARNING:             print "Warning";                break;
        case E_PARSE:               print "Parse Error";            break;
        case E_NOTICE:              print "Notice";                 break;
        case E_CORE_ERROR:          print "Core Error";             break;
        case E_CORE_WARNING:        print "Core Warning";           break;
        case E_COMPILE_ERROR:       print "Compile Error";          break;
        case E_COMPILE_WARNING:     print "Compile Warning";        break;
        case E_USER_ERROR:          print "User Error";             break;
        case E_USER_WARNING:        print "User Warning";           break;
        case E_USER_NOTICE:         print "User Notice";            break;
        case E_STRICT:              print "Strict Notice";          break;
        case E_RECOVERABLE_ERROR:   print "Recoverable Error";      break;
        default:                    print "Unknown error ($errno)"; break;
    }
    print ":</b> <i>$errstr</i> in <b>$errfile</b> on line <b>$errline</b>\n";
    if(function_exists('debug_backtrace')){
        //print "backtrace:\n";
        $backtrace = debug_backtrace();
        array_shift($backtrace);
        foreach($backtrace as $i=>$l){
            print "[$i] in function <b>{$l['class']}{$l['type']}{$l['function']}</b>";
            if($l['file']) print " in <b>{$l['file']}</b>";
            if($l['line']) print " on line <b>{$l['line']}</b>";
            print "\n";
        }
    }
    print "\n</pre>";
}
