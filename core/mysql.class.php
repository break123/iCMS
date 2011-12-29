<?php
/**
* iCMS - i Content Management System
* Copyright (c) 2007-2012 idreamsoft.com iiimon Inc. All rights reserved.
*
* @author coolmoo <idreamsoft@qq.com>
* @site http://www.idreamsoft.com
* @licence http://www.idreamsoft.com/license.php
* @version 6.0.0 (2012-02-14)
* @package mysql
*/

define('OBJECT', 'OBJECT', true);
define('ARRAY_A', 'ARRAY_A', false);
define('ARRAY_N', 'ARRAY_N', false);

if (!defined('SAVEQUERIES'))
    define('SAVEQUERIES', true);

class iCMS_DB {
    public static $show_errors = false;
    public static $num_queries = 0;
    public static $last_query;
    public static $col_info;
    public static $queries;
    public static $func_call;
    public static $last_result;
    public static $num_rows;
    public static $insert_id;

    private static $collate;
    private static $time_start;
    private static $last_error ;
    private static $dbh;
    private static $result;

    function __construct() {
        if (!self::$dbh)
            self::connect();
    }
    function connect() {

        if (defined('DB_COLLATE'))
            self::$collate = DB_COLLATE;

        self::$dbh = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

        if (!self::$dbh)
            self::bail("<h1>数据库链接失败</h1><p>请检查 <em><strong>config.php</strong></em> 的配置是否正确!</p><ul><li>请确认主机支持MySQL?</li><li>请确认用户名和密码正确?</li><li>请确认主机名正确?(一般为localhost)</li></ul><p>如果你不确定这些情况,请询问你的主机提供商.如果你还需要帮助你可以随时浏览 <a href='http://www.idreamsoft.com'>iCMS 支持论坛</a>.</p>");

        if (defined('DB_CHARSET') && version_compare(mysql_get_server_info(), '4.1.0', '>='))
            self::query("SET NAMES '".DB_CHARSET."'");

        if (!@mysql_select_db(DB_NAME, self::$dbh))
            self::bail("<h1>链接到<em><strong>$db</strong></em>数据库失败</h1><p>我们能连接到数据库服务器（即数据库用户名和密码正确） ，但是不能链接到<em><strong>$db</strong></em>数据库.</p><ul><li>你确定<em><strong>$db</strong></em>存在?</li></ul><p>如果你不确定这些情况,请询问你的主机提供商.如果你还需要帮助你可以随时浏览 <a href='http://www.idreamsoft.com'>iCMS 支持论坛</a>.</p>");

    }
    // ==================================================================
    //	Print SQL/DB error.

    function print_error($str = '') {
        if (!$str)
            $str = mysql_error(self::$dbh);

        $EZSQL_ERROR[]	= array ('query' => self::$last_query, 'error_str' => $str);

        $str	= htmlspecialchars($str, ENT_QUOTES);
        $query	= htmlspecialchars(self::$last_query, ENT_QUOTES);
        // Is error output turned on or not..
        if ( self::$show_errors ) {
            // If there is an error then take note of it
            die("<div id='error'>
			<p class='iCMSDBerror'><strong>iCMS database error:</strong> [$str]<br />
			<code>$query</code></p>
			</div>");
        } else {
            return false;
        }
    }
    // ==================================================================
    //	Kill cached query results

    function flush() {
        self::$last_result	= array();
        self::$col_info		= null;
        self::$last_query	= null;
    }

    // ==================================================================
    //	Basic Query	- see docs for more detail

    function query($query,$QT=NULL) {
        if (!self::$dbh) {
            self::connect();
        }
        // filter the query, if filters are available
        // NOTE: some queries are made before the plugins have been loaded, and thus cannot be filtered with this method
        $query=str_replace('#iCMS@__',DB_PREFIX, $query);

        // initialise return
        $return_val = 0;
        self::flush();

        // Log how the function was called
        self::$func_call = __CLASS__."::query(\"$query\")";

        // Keep track of the last query for debug..
        self::$last_query = $query;

        // Perform the query via std mysql_query function..
        if (SAVEQUERIES) self::timer_start();

        self::$result = mysql_query($query, self::$dbh);
        self::$num_queries++;

        if (SAVEQUERIES) self::$queries[] = array( $query, self::timer_stop());

        // If there is an error then take note of it..
        if ( self::$last_error = mysql_error(self::$dbh) ) {
            self::print_error();
            return false;
        }
        $QH	= strtoupper(substr($query,0,strpos($query, ' ')));
        if (in_array($QH,array("INSERT","DELETE","UPDATE","REPLACE"))) {
            $rows_affected = mysql_affected_rows(self::$dbh);
            // Take note of the insert_id
            if (in_array($QH,array("INSERT","REPLACE"))) {
                self::$insert_id = mysql_insert_id(self::$dbh);
            }
            // Return number of rows affected
            $return_val = $rows_affected;
        } else {
            if($QT=="field") {
                $i = 0;
                while ($i < @mysql_num_fields(self::$result)) {
                    self::$col_info[$i] = mysql_fetch_field(self::$result);
                    $i++;
                }
            }else {
                $num_rows = 0;
                while ( $row = @mysql_fetch_object(self::$result) ) {
                    self::$last_result[$num_rows] = $row;
                    $num_rows++;
                }
                // Log number of rows the query returned
                self::$num_rows = $num_rows;

                // Return number of rows selected
                $return_val = $num_rows;
            }
            @mysql_free_result(self::$result);
        }

        return $return_val;
    }
    /**
     * Insert an array of data into a table
     * @param string $table WARNING: not sanitized!
     * @param array $data should not already be SQL-escaped
     * @return mixed results of self::query()
     */
    function insert($table, $data) {
//		$data = add_magic_quotes($data);
        $fields = array_keys($data);
        return self::query("INSERT INTO #iCMS@__{$table} (`" . implode('`,`',$fields) . "`) VALUES ('".implode("','",$data)."')");
    }

    /**
     * Update a row in the table with an array of data
     * @param string $table WARNING: not sanitized!
     * @param array $data should not already be SQL-escaped
     * @param array $where a named array of WHERE column => value relationships.  Multiple member pairs will be joined with ANDs.  WARNING: the column names are not currently sanitized!
     * @return mixed results of self::query()
     */
    function update($table, $data, $where) {
//		$data = add_magic_quotes($data);
        $bits = $wheres = array();
        foreach ( array_keys($data) as $k )
            $bits[] = "`$k` = '$data[$k]'";

        if ( is_array( $where ) )
            foreach ( $where as $c => $v )
                $wheres[] = "$c = '" . addslashes( $v ) . "'";
        else
            return false;
        return self::query( "UPDATE #iCMS@__{$table} SET " . implode( ', ', $bits ) . ' WHERE ' . implode( ' AND ', $wheres ) . ' LIMIT 1' );
    }
    /**
     * Get one variable from the database
     * @param string $query (can be null as well, for caching, see codex)
     * @param int $x = 0 row num to return
     * @param int $y = 0 col num to return
     * @return mixed results
     */
    function getValue($query=null, $x = 0, $y = 0) {
        self::$func_call = __CLASS__."::getValue(\"$query\",$x,$y)";
        if ( $query )
            self::query($query);

        // Extract var out of cached results based x,y vals
        if ( !empty( self::$last_result[$y] ) ) {
            $values = array_values(get_object_vars(self::$last_result[$y]));
        }
        // If there is a value return it else return null
        return (isset($values[$x]) && $values[$x]!=='') ? $values[$x] : null;
    }

    /**
     * Get one row from the database
     * @param string $query
     * @param string $output ARRAY_A | ARRAY_N | OBJECT
     * @param int $y row num to return
     * @return mixed results
     */
    function getRow($query = null, $output = OBJECT, $y = 0) {
        self::$func_call = __CLASS__."::getRow(\"$query\",$output,$y)";
        if ( $query )
            self::query($query);

        if ( !isset(self::$last_result[$y]) )
            return null;

        if ( $output == OBJECT ) {
            return self::$last_result[$y] ? self::$last_result[$y] : null;
        } elseif ( $output == ARRAY_A ) {
            return self::$last_result[$y] ? get_object_vars(self::$last_result[$y]) : null;
        } elseif ( $output == ARRAY_N ) {
            return self::$last_result[$y] ? array_values(get_object_vars(self::$last_result[$y])) : null;
        } else {
            self::print_error(__CLASS__."::getRow(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N");
        }
    }

    /**
     * Return an entire result set from the database
     * @param string $query (can also be null to pull from the cache)
     * @param string $output ARRAY_A | ARRAY_N | OBJECT
     * @return mixed results
     */
    function getArray($query = null, $output = ARRAY_A) {
        self::$func_call = __CLASS__."::getArray(\"$query\", $output)";

        if ( $query )
            self::query($query);

        // Send back array of objects. Each row is an object
        if ( $output == OBJECT ) {
            return self::$last_result;
        } elseif ( $output == ARRAY_A || $output == ARRAY_N ) {
            if ( self::$last_result ) {
                $i = 0;
                foreach( (array) self::$last_result as $row ) {
                    if ( $output == ARRAY_N ) {
                        // ...integer-keyed row arrays
                        $new_array[$i] = array_values( get_object_vars( $row ) );
                    } else {
                        // ...column name-keyed row arrays
                        $new_array[$i] = get_object_vars( $row );
                    }
                    ++$i;
                }
                return $new_array;
            } else {
                return null;
            }
        }
    }

    /**
     * Gets one column from the database
     * @param string $query (can be null as well, for caching, see codex)
     * @param int $x col num to return
     * @return array results
     */
    function getCol($query = null , $x = 0) {
        if ( $query )
            self::query($query);

        $new_array = array();
        // Extract the column values
        for ( $i=0; $i < count(self::$last_result); $i++ ) {
            $new_array[$i] = self::getValue(null, $x, $i);
        }
        return $new_array;
    }

    /**
     * Grabs column metadata from the last query
     * @param string $info_type one of name, table, def, max_length, not_null, primary_key, multiple_key, unique_key, numeric, blob, type, unsigned, zerofill
     * @param int $col_offset 0: col name. 1: which table the col's in. 2: col's max length. 3: if the col is numeric. 4: col's type
     * @return mixed results
     */
    function get_col_info($query = null ,$info_type = 'name', $col_offset = -1) {
        if ( $query )
            self::query($query,"field");

        if ( self::$col_info ) {
            if ( $col_offset == -1 ) {
                $i = 0;
                foreach(self::$col_info as $col ) {
                    $new_array[$i] = $col->{$info_type};
                    $i++;
                }
                return $new_array;
            } else {
                return self::$col_info[$col_offset]->{$info_type};
            }
        }
    }
    function version() {
        // Make sure the server has MySQL 4.0
        $mysql_version = preg_replace('|[^0-9\.]|', '', @mysql_get_server_info(self::$dbh));
        if ( version_compare($mysql_version, '4.0.0', '<') )
            self::bail('database_version<strong>ERROR</strong>: iCMS %s requires MySQL 4.0.0 or higher');
        else
            return $mysql_version;
    }

    /**
     * Starts the timer, for debugging purposes
     */
    function timer_start() {
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        self::$time_start = $mtime[1] + $mtime[0];
        return true;
    }

    /**
     * Stops the debugging timer
     * @return int total time spent on the query, in milliseconds
     */
    function timer_stop() {
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        $time_end = $mtime[1] + $mtime[0];
        $time_total = $time_end - self::$time_start;
        return $time_total;
    }

    /**
     * Wraps fatal errors in a nice header and footer and dies.
     * @param string $message
     */
    function bail($message) { // Just wraps errors in a nice header and footer
        if ( !self::$show_errors ) {
            return false;
        }
        header('Content-Type: text/html; charset=utf8');
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>iCMS MySQL Error</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1 id="logo"><img alt="iCMS" src="http://www.idreamsoft.com/doc/iCMS.logo.gif" /></h1>
        <p><?=$message?></p>
    </body>
</html>
        <?php
        exit();
    }
}
?>