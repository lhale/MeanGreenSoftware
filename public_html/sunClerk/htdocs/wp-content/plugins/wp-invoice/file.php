#!/opt/bitnami/php/bin/php
<?php
// Filename of log to use when none is given to log_btrace
define("DEFAULT_LOG", "/temp/logfile");

# Must be single quotes for literal global
$pathToCode = "/opt/bitnami/apps/wordpress/htdocs/wp-content/plugins/wp-invoice";
$timezone = 'Americe/Los_Angeles';	// Actually, error_log inserts this

function a() {
    $var_a = "variable A";

	b($var_a);
}
function b( $var_a) {
    $var_b = "variable B";

	c( $var_a, $var_b);
}

function c($var_a, $var_b) {

	log_btrace($var_a . ", " . $var_b);
}


echo "HELLO PHP\n";
# print_r(debug_print_backtrace());
// print_r(debug_backtrace());
a();
// phpinfo();

// Pretty print stacktrace
/*
function stackTrace() {
	echo "WTF!!";
}
*/

/**
  * log_btrace($message[, $logfile])
  *
  * Author(s): thanosb, ddonahue
  * Date: May 11, 2008
  * Ref: http://web.stanford.edu/dept/its/communications/webservices/wiki/index.php/How_to_create_logs_with_PHP 
  * Writes the values of certain variables along with a message in a log file.
  *
  * Parameters:
  *  $message:   Message to be logged
  *  $logfile:   Path of log file to write to.  Optional.  Default is DEFAULT_LOG.
  *
  * Returns array:
  *  $result[status]:   True on success, false on failure
  *  $result[message]:  Error message
  */
 
function log_btrace($message='', $logfile='') {

    global $pathToCode;	// Access the global variable & not a missing local one`
    global $timezone;

// echo "PATH:" . $pathToCode . ".";	// works

    if($logfile == '') {
        // checking if the constant for the log file is defined
        if (defined("DEFAULT_LOG") == TRUE) {
            $logfile = DEFAULT_LOG;
        }
        // the constant is not defined and there is no log file given as input
        else {
            error_log('No log file defined!',0);
            return array('status' => false, 'message' => 'No log file defined!');
        }
    }
    $str =  date(DATE_RFC2822) . "\n" . $message . "\n" . 
		str_replace($pathToCode, "", stackTrace()) . "\n\n";

//    error_log(print_r(debug_print_backtrace(), TRUE));    // Works, but is raw
//    error_log(print_r($str,  TRUE));	// works
    $result = file_put_contents ( $logfile, $str , FILE_APPEND  );
    if($result > 0)
      return array('status' => true);  
    else
      return array('status' => false, 'message' => 'Unable to open or write to '.$logfile.'!');
}

function stackTrace() {
    $stack = debug_backtrace();
    $output = '';

    $stackLen = count($stack);
    for ($i = 1; $i < $stackLen; $i++) {
        $entry = $stack[$i];

        $func = $entry['function'] . '(';
        $argsLen = count($entry['args']);
        for ($j = 0; $j < $argsLen; $j++) {
            $my_entry = $entry['args'][$j];
            if (is_string($my_entry)) {
                $func .= $my_entry;
            }
            if ($j < $argsLen - 1) $func .= ', ';
        }
        $func .= ')';

        $entry_file = 'NO_FILE';
        if (array_key_exists('file', $entry)) {
            $entry_file = $entry['file'];               
        }
        $entry_line = 'NO_LINE';
        if (array_key_exists('line', $entry)) {
            $entry_line = $entry['line'];
        }           
        $output .= $entry_file . ':' . $entry_line . ' - ' . $func . PHP_EOL;
    }
    return $output;
}
/**/
   
?>
