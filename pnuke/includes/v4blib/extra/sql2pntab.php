<?php
//
// Script to read a SQL definition file and generate pntable style definitions
//


// check for required arg
$argc = $_SERVER['argc'];
$argv = $_SERVER['argv'];
if ($argc != 2)
  {
  print "Usage: sql2pntab.php <sql_script>\n";
  exit (0);
  }


require_once ('../includes/v4blib/v4b_globals.inc');
global $v4bPathPrefix;
require_once ($v4bPathPrefix.'includes/v4blib/fileutil.php');
require_once ($v4bPathPrefix.'includes/v4blib/stringutil.php');

$filedata = fileutil_readFile ($argv[1]);
$lines    = stringutil_tokenize ($filedata, "\n");


// parse SQL file 
$output = '';
$inCreate = false;
foreach ($lines as $line)
  {
  if ($inCreate && (
      preg_match('/\)\s*.*;/', $line) || 
      preg_match('/key\s+.*\(/i', $line)))
    { 
    $inCreate = false; 
    $output  = substr($output, 0, strlen($output)-2);
    $output .= "\n);\n\n";
    }

  if ($inCreate)
    {
    $tokens = preg_split ('/\s+/', $line);
    $colname = $tokens[1];
    $output .= "	'$colname'	=>	'$colname',\n";
    }

  if (preg_match ('/CREATE+\s+TABLE+\s+.+\(/i', $line))
    { 
    $inCreate = true; 
    $tokens = preg_split ('/\s+/', $line);
    $tabname = $tokens[2]; 
    $colname = $tabname . '_column';

    $output .= "    \$pntable['$tabname'] = '$tabname';\n";
    $output .= "    \$pntable['$colname'] = array(\n";
    }
  }

print ($output);

?>