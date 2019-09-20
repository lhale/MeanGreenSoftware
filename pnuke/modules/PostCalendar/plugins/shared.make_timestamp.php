<?php
/**
 * Modified for PostCalendar's needs from 
 * Smarty shared plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Function: smarty_make_timestamp<br>
 * Purpose:  used by other smarty functions to make a timestamp
 *           from a string.
 * @param string
 * @return string
 */
function smarty_make_timestamp($string)
{
    if(empty($string)) {
        // use "now":
        $time = time();

    } elseif (preg_match('/^\d{14}$/', $string)) {
        // it is mysql timestamp format of YYYYMMDDHHMMSS?            
        $time = mktime(substr($string, 8, 2),substr($string, 10, 2),substr($string, 12, 2),
                       substr($string, 4, 2),substr($string, 6, 2),substr($string, 0, 4));
        
    } elseif (preg_match('/^\d{8}$/', $string)) {
    	// It might be a yyyymmdd string - try it with strtotime to see
	// By 2005 epoch offsets will be 10 decimal digits so false hits
	// should be rare
	// they will be certain dates in 1970, 71,72 and early 73.
        $time = strtotime($string);
        if ($time == -1 || $time === false ||($string != date('Ymd', $time))) {
	    // was not yyyymmdd after all
            $time = (int)time();
	}
    } elseif (is_numeric($string)) {
        // it is a numeric string, we handle it as timestamp
        $time = (int)$string;
        
    } else {
        // strtotime should handle it
        $time = strtotime($string);
        if ($time == -1 || $time === false) {
            // strtotime() was not able to parse $string, use "now":
            $time = time();
        }
    }
    return $time;

}

/* vim: set expandtab: */

?>
