<?php

class FileUtil
{ 
	/**
	 * Read a file's contents and return them as an array of lines
	 *
	 * @param filename 	The file to read
	 *
	 * @return string 	The file's contents
	 */
	function &readFileLines ($filename)
	{
	    $data =& FileUtil::readFile ($filename);
	    $lines =& explode ("\n", $data);
	    return $lines;
	}


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
    exit ("Usage: $argv[0] <SQL Dump File>\n");

$inputfile = $argv[1];
print "Reading SQL Dump file [$inputfile] ... ";
$lines =& FileUtil::readFileLines ("$inputfile");
print count($lines) . " lines\n";

$c = 0;
$dumpLines = array();
$demoLines = array();
$lastLine = '';
$currentTable = '';
foreach ($lines as $line)
{
   if (strpos ($line, "CREATE TABLE") !== false)
   {
       $fields = explode (' ', $line);
       $currentTable = $fields[2];
   }

   // ensure that category autoindex is bumped up to reserve space for system entries
   if (strpos ($lastLine, "INSERT INTO os_core_v4b_categories_category VALUES")===0 && !$line)
   {
       $dumpLines[] = "ALTER TABLE os_core_v4b_categories_category AUTO_INCREMENT=10000;";
   }

   // fix ID 
   if (strpos ($line, "INSERT INTO os_docmgmt_groups VALUES (0,'Administrators'")===0)
   {
       $dumpLines[] = $line;
       $dumpLines[] = "UPDATE os_docmgmt_groups SET id = 0;";
       $c++;
   }
   else
   // fix table type 
   if (strpos ($line, "TYPE=MyISAM"))
   {
       $dumpLines[] = str_replace ('TYPE=MyISAM', 'TYPE=InnoDB', $line);
       $c++;
   }
   else
   // remove comment lines
   if (strpos ($line, "/*!") === 0)
   {
       $c++;
   }
   else
   // force table type 
   if (strpos ($line, ");") === 0)
   {
       if ($currentTable == 'os_core_pnforum_posts_text' || $currentTable == 'os_core_pnforum_topics')
           $dumpLines[] = str_replace (');', ') TYPE=MyISAM;', $line);
       else
           $dumpLines[] = str_replace (');', ') TYPE=InnoDB;', $line);
       $c++;
   }
   else
   // remove session data
   if (strpos ($line, 'INSERT INTO os_core_pagesetter_session')===0 ||
       strpos ($line, 'INSERT INTO os_core_session_info')===0 ||
       strpos ($line, 'INSERT INTO os_core_referer')===0 ||
       strpos ($line, 'INSERT INTO os_core_stats_details ')===0 ||
       strpos ($line, 'INSERT INTO os_docmgmt_active_sessions')===0 )
   {
       $c++;
   }
   else
   // stuff which can be considered 'demo' data
   if (strpos ($line, 'INSERT INTO os_core_cmods')!==false ||
       strpos ($line, 'INSERT INTO os_core_eventia')!==false ||
       strpos ($line, 'INSERT INTO os_core_faq')!==false || 
       strpos ($line, 'INSERT INTO os_core_nl_')!==false || 
       strpos ($line, 'INSERT INTO os_core_pagesetter')!==false || 
       strpos ($line, 'INSERT INTO os_core_photoshare')!==false || 
       strpos ($line, 'INSERT INTO os_core_pnaddressbook')!==false || 
       strpos ($line, 'INSERT INTO os_core_pnforum')!==false || 
       strpos ($line, 'INSERT INTO os_core_stories')!==false || 
       strpos ($line, 'INSERT INTO os_core_updownload')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_accounting')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_addressbook')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_journal')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_kb')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_newcontent_userprefs')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_pgpages_pubpages')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_projects')!==false || 
       strpos ($line, 'INSERT INTO os_core_v4b_rbs')!==false ||
       strpos ($line, 'INSERT INTO os_service_bug')!==false ||
       strpos ($line, 'INSERT INTO os_service_project')!==false)
          $demoLines[] = $line;
   else
      $dumpLines[] = $line;

   $lastLine = $line;
}

$dc = count($demoLines);

$fname  = 'base.sql';
print "Writing $fname ($c lines changed) ...\n";
FileUtil::writeFile($fname, implode("\n",$dumpLines));

$fname  = 'demo.sql';
print "Writing $fname ($dc lines) ...\n";
FileUtil::writeFile($fname, implode("\n",$demoLines));

$fname  = 'both.sql';
$lc = count($dumpLines) + count($demoLines);
print "Writing $fname ($lc lines) ...\n";
$all = array_merge ($dumpLines, $demoLines);
FileUtil::writeFile($fname, implode("\n", $all));

?>