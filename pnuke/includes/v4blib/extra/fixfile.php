<?php

// Quick script to strip the extra newline from incorrectly saved PHP files ...
// Takes a filepath as an argument

class FileUtil
{ 
	/**
	 * Read a file's contents and return them as a string 
	 *
	 * @param filename 	The file to read
	 *
	 * @return string 	The file's contents
	 */
	function &readFile ($filename)
	{
	  if (!strlen($filename))
	    v4b_exit ("FileUtil::readFile: filename is empty");
	
	  $fd = fopen ($filename, "r");
	
	  if ($fd === false)
	    return false;

	  $data =& fread($fd, filesize($filename));
	  fclose ($fd);
	  return $data;
	}


	/**
	 * Write a string to a file 
	 *
	 * @param filename 	The file to write
	 * @param data		The data to write to the file
	 *
	 * @return mixed 	The return code from the fclose() call
	 */
	function writeFile ($filename, $data)
	{
	  if (!$filename)
	    v4b_exit ("FileUtil::writeFile: filename is empty");
	
	  $fd = fopen ($filename, "w");
	
	  if ($fd === false)
	    return false;
	
	  fwrite ($fd, $data);
	  return fclose ($fd);
	}
}
	
if ($argc != 2)
    exit ("Usage: $argv[0] <php file>\n");

clearstatcache();
$inputfile = $argv[1];
print "Processing [$inputfile] ... ";
$data =& FileUtil::readFile ($inputfile);
$newdata = trim($data);
if ($newdata != $data)
{
  FileUtil::writeFile($inputfile, $newdata);
  print "altered";
}

?>