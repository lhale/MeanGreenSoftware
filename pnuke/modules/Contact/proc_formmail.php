<?php 

$debug = true ;
$trialEmail = "lhale@meangreensoftware.com";

	if ($debug)
	{
	  $to = "LarryHale@Netzero.net";
//	  $to = "lhale@meangreensoftware.com";
	}
	else
		$to = $trialEmail;
		
$subject = "Mean Green Software has been contacted";
$from = "From: Mean Green Software<info@meangreensoftware.com>\n";

# Create the user's password and send it to them :
# LDH - Password format = mmdd##CoMPaNyNaMe (e.g. 051702PaTHscALe )
function mail_customer_signon ($email,  $industry )
{
	global $from, $htpasswdScript, $htpasswdLocation, $thanks_message;
	
	$time = time() ;
	$unm = $email ;
	# Password  shall be the company name plus the date
	$upwd = substr ( $email, strpos($email, "@") +1 , strpos($email, ".") - strpos($email, "@") -1);
#	$upwd = $unm . $time ;
	$upwd = strtolower($upwd) ;
	for ( $i=0; $i < strlen($upwd); $i++)
	    $upwd[$i] = rand() % 2 ? $upwd[$i] : strtoupper($upwd[$i]);
#	$upwd = date("mdy") . $unm ;
	$upwd .= date("md") ;
# echo "<BR>$htpasswdScript -b -m $htpasswdLocation $unm $upwd<BR>" ;
// LDH - This is the htpwd creation stuff - not supported just yet
//    $result = system ("$htpasswdScript -b -m $htpasswdLocation $unm $upwd") ;

	$curr_date = date("m-d-Y") ;

	if ( strcasecmp ($industry, "other") == 0)
	    $industry = "";
	if ( strlen($industry) == 0 )
	    $industry = "your";
	else
	    $industry = "the " . $industry;
	$industry .= " industry";
	
	require ("Contact_thankU_msg.php") ;
/*
  $body = "\t\t\t\t\t\tDate: ". date("m-d-Y"). "\n";
	$body 	.= "Welcome to the Mean Green 30-day Trial Program!\n" ;
	$body 	.= "\nYour sign-on informations is :\n" ;
	$body 	.= "Login name : $unm\n" ;
	$body 	.= "Password : $upwd\n" ;
	$body 	.= "\nYou can now enter our partner site at $trialsite\n" ;
	$body 	.= "\nIf you have any further questions, please contact sales@meangreensoftware.com .";
*/

	// Send off missive to the prospective client
	# I don't understand why a plain $from from above doesn't work here :
  	mail($email, "Thank you for contacting Mean Green Software", $thanks_message, $from);
//  echo "Thanks msg=\"" . $thanks_message;
}

/*  Removed via req fr Len
  if ( strcmp ($_POST["Decline"], "Decline") == 0)
  {
	$decline = true ;
  }
  else
  {
	$survey_note = " and taking the time to fill out our survey" ;
	$decline = false ;
  } 
*/
  $body = "Date: ". date("Y-m-d"). "\n";
  if($_POST["company"]) {
    $body .= "Company: ".$_POST["company"]."\n"; 
  }
  if($_POST["name"]) {
    $body .= "Name: ".$_POST["name"]."\n";
  }
  if($_POST["lastname"]) {
    $body .= "Last Name: ".$_POST["lastname"]."\n";
  }
  if($_POST["address"]) {
    $body .= "Address: ".$_POST["address"]."\n";
  }
  if($_POST["city"]) {
    $body .= "City: ".$_POST["city"]."\n";
  }
  if($_POST["state"]) {
    $body .= "State: ".$_POST["state"]."\n";
  }
  if($_POST["country"]) {
    $body .= "Country: ".$_POST["country"]."\n";
  }
  if($_POST["zip"]) {
    $body .= "Zip: ".$_POST["zip"]."\n";
  }
  if($_POST["memail"]) {
	$email = $_POST["memail"] ;
    $body .= "Email: ".$_POST["memail"]."\n";
  }
  if($_POST["phone"]) {
    $body .= "Phone: ".$_POST["phone"]."\n";
  }
  if($_POST["fax"]) {
    $body .= "Fax: ".$_POST["fax"]."\n";
  }
  if($_POST["linux"]) {
    $body .= "Linux Version Installed: ".$_POST["linux"]."\n";
  }
  $body .= "Industry: ";
  if($_POST["mgs_Industry"]) {
    $industry = $_POST["mgs_Industry"];
    $body .= $industry . "\n";
  }
  else
    $body .= "None chosen\n";
  
  // Iterate across the (possible) multiple choices (PIA)
  if($_POST["mgs_Solutions"]) {
      $solutionstr = "Solutions: ";
      $solutions = $_POST["mgs_Solutions"];

      if (is_array($solutions) && sizeof($solutions) > 0)
      {
          foreach($solutions as $choice)
          {
              if ( $choice == "0" )   // "Choose one or more" selection
                  $solutionstr .= "No choices made\n";
              else
                  $solutionstr .= $choice . ", ";  
          } 
          
      }
      else
      {
          $solutionstr = "Error: No solution(s)";  // should @ least be "Choose one or more" selection
      }
    $body .= $solutionstr . "\n";
  }
  else
      $body .= "Error: Missing mgs_Solutions[]\n" ;
      
  if($_POST["msubject"]) {
    $body .= "Subject: ".$_POST["msubject"]."\n";
  }
  else
  {
      $body .= "Subject: " . "NO SUBJECT" . "\n";
  }
  if($_POST["mmessage"]) {
    $body .= "Message: ".$_POST["mmessage"]."\n";
  }
  else
  {
      $body .= "Message: " . "NO MESSAGE" . "\n";
  }
# marketing Info :
  $survey_fill = false ;
  if($_POST["supplier"]) {
    $body .= "Opteron System Supplier: ".$_POST["supplier"]."\n";
	$survey_fill = true ;
  }
  if($_POST["developers"]) {
    $body .= "Developers: ".$_POST["developers"]."\n";
	$survey_fill = true ;
  }
  if($_POST["referer"]) {
    $body .= "Referer: ".$_POST["referer"]."\n";
	$survey_fill = true ;
  }
  if($_POST["codes"]) {
    $body .= "Named Codes: ".$_POST["codes"]."\n";
	$survey_fill = true ;
  }
  if($_POST["compilers"]) {
    $body .= "Named Compilers: ".$_POST["compilers"]."\n";
	$survey_fill = true ;
  }
  if($_POST["tools"]) {
    $body .= "Named Tools: ".$_POST["tools"]."\n";
	$survey_fill = true ;
  }
  if($_POST["implementwhen"]) {
    $body .= "Plan on implementing: ".$_POST["implementwhen"]."\n";
	$survey_fill = true ;
  }
  if($_POST["comments"]) {
    $body .= "Comments: ".$_POST["comments"]."\n";
	$survey_fill = true ;
  }
  if($_POST["agreement"]) {
    $body .= "Agreement: ".$_POST["agreement"]."\n";
  }
/* Update : Survey is mandatory ( Len R)
	if ( $decline == true )
	{
		$subject .= " (Survey Declined)" ;
	}
	else
	{
		if ( $survey_fill == true )
			$subject .= " (Survey Submitted)" ;
		else
			$subject .= " (Survey Empty)" ;
	}
*/
  // Send a notification of prospective contact to Mean Green personnel
   mail($to, $subject . " by " . $_POST["memail"], $body, $from);

// echo "BODY: <br /." . $body . "<br />";

# Session stuff
	$sid = session_id() ;
#	echo "PHPSESSID=$sid<BR>" ;
	$co =  $_SESSION['company'] ;
#	echo "Company=$co<BR>" ;
	$savepath =  ini_get('session.save_path') ;
#	echo "Save path=$savepath<BR>" ;
/*
	$session_file = $savepath . "/sess_" . $sid ;
#	echo "Session file=$session_file<BR>" ;

	$fp = fopen($session_file, "r") ;
	if ( $fp == false )
		echo "Can't open session file...<BR>" ;
	else
	{
		$i = 0 ;
		while ( ! feof($fp))
		{
			$line = fgets($fp);
			echo " $i) $line<BR>\n" ;
			$i++ ;
		}
		fclose($fp) ;
	}
*/
	# Find all temp trial session files that might be out of date :
	# 1) All files of "sess_*" format
	# 2) Session files with vintage < session.1440 parameter
	# 3) Session files having appropriate trial registration session cookies
	# (Hopefully ALL sesn files are in its own /temp/PHP subdir)
// LDH - This was put here to pick up prospectives that partially abandoned filling out the form
//    For Mean Green, this does not have to happen yet.
$savepath = "";    // disable the following archive-to-file block for now
if (is_dir($savepath))
{
$curr_time = time() ;
# echo "Curr Time=$curr_time<BR>";
   if ($dh = opendir($savepath))
	{
        while (($file_name = readdir($dh)) !== false)
		{
       	    if (strstr($file_name, "sess_" ) && strstr($file_name, "swp" ) == false &&
			   		strstr($file_name, $sid) == false)
       	    {
				$file_name = $savepath . "/" . $file_name ;
       	    	$stat_array = stat($file_name) ;
# echo ("File:$file_name; Mod'd: $stat_array[mtime]<BR>\n");
				# CAVEAT - making the timeout very short allows parsing of the
				#			current session file
				$file_chg_time =  $stat_array[ctime] ;  # Mod time always shows current time (?)
# echo "File:$file_name, Mod Time=$curr_time, Chg Time=$stat_array[ctime]<BR>";
#				if ( $file_chg_time < $curr_time - 1200 )	# 20 min debug
				if ( $file_chg_time < $curr_time - 7200 )	# two hour session timeout
				{
        			$file_array = file($file_name);
                    $idx = 0 ;
        			for($idx ; $idx < count($file_array); $idx++)
        			{
  						$body_double = "Date: ". date("Y-m-d"). "\n";
  						$sfbase_double = "";
						$sfbase_double = build_post_string($sfbase_double,"oid","00D300000000KZd");
						$sfbase_double = build_post_string($sfbase_double,"retURL","http://www.pathscale.com");
						$sfbase_double = build_post_string($sfbase_double,"lead_source","Web Site - 30 Day Trial Form");

						# line fmt = 'company|s:4:"asdf";firstname|s:4:"asdf";lastname|s:4:"asdf"; ...'
            			$line_array = explode(";", $file_array[$idx]);
            			$company = "" ; $firstname = ""; $lastname = ""; $email_double = "" ;
            			$subject_double != "" ; $body_double != "" ;
        				for($line_idx=0 ; $line_idx < count($line_array); $line_idx++)
        				{
							$sesn_info_array = explode(":", $line_array[$line_idx]);
							switch ($sesn_info_array[0])
							{
								case "company|s" :
									$company = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Company: ". $company . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"company",$company);
# echo "<BR>Company=$company<BR>\n";
								case "firstname|s" :
									$firstname = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "First Name: ". $firstname . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"first_name",$firstname);
									break;
								case "lastname|s" :
									$lastname = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Last Name: ". $lastname . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"last_name",$lastname);
									break;
								case "address|s" :
									$address = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Address: ". $address . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"address",$address);
									break;
								case "city|s" :
									$city = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "City: ". $city . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"city",$city);
									break;
								case "state|s" :
									$state = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "State: ". $state . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"state",$state);
									break;
								case "zip|s" :
									$zip = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Zip: ". $zip . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"zip",$zip);
									break;
								case "email|s" :
									$email_double = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Email: ". $email_double . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"email",$email_double);
									break;
								case "telephone|s" :
									$telephone = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Telephone: ". $telephone . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"phone",$telephone);
									break;
								case "country|s" :
									$country = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Country: ". $country . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"country",$country);
									break;
								case "fax|s" :
									$fax = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Fax: ". $fax . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"fax",$fax);
									break;
								case "linux|s" :
									$linux = str_replace("\"", "", $sesn_info_array[2]) ;
    								$body_double .= "Linux Version Installed: ". $linux . "\n"; 
    								$sfbase_double = build_post_string($sfbase_double,"linux",$linux);
									break;
								default :
# echo "<BR>Key=$sesn_info_array[0],Value=$sesn_info_array[2]<BR>\n";
									break;
							}
					    }
					} 
										#Send out the belated emails to Pscale & customer
						  if ( $company != "" && $email_double != "" &&
									$firstname != "" && $lastname != "" )
						  {
							$subject_double = $subject ;
							$subject_double .= " (Session timeout)";
/* Update : Survey is mandatory ( Len R)
						    if ( $decline == true )
							{
						        $subject_double .= " (Survey Declined)" ;
 						   	}
						    else
						    {
						        if ( $survey_fill == true )
						            $subject_double .= " (Survey Submitted)" ;
						        else
						            $subject_double .= " (Survey Empty)" ;
						    }
*/
							mail($to, $subject_double, $body_double, $from);
							mail_customer_signon($email_double);
# echo ("Sesn File:$file_name<BR>\n");

						  if ($debug == false )
						  {
							# Send out the belated salesforce lead
  							$data=$sfbase_double;
							$fp = fsockopen('www.salesforce.com',80);
							fputs($fp,"POST /servlet/servlet.WebToLead?encoding=UTF-8 HTTP/1.1\r\n");
							fputs($fp,"Host: www.pathscale.com\r\n");
							fputs($fp,"Content-type: application/x-www-form-urlencoded\r\n" );
							fputs( $fp, "Content-length: ".strlen( $data )."\r\n" );
							fputs( $fp, "Connection: close\r\n\r\n" );
							fputs( $fp, $data );
							while ( !feof($fp) )
								$buf .= fgets( $fp, 128 );
							fclose( $fp );
						  }
						  unlink($file_name);    # Clean up this old session
						}	# if valid expired session
				}
# system("chmod 666 $file_name");
       	    }
       }
       closedir($dh);
	}
}  // end is_dir($savepath)

$debug=true;   // LDH - no need for this stuff just yet
  if ( $debug == false )
 {
  if($_POST["newsletter"]=="yes") {
    $to = "newsletter-subscription@meangreen.com, majordomo@meangreen.com";
    $subject = "Meangreen Newsletter Subscription";
    if($_POST["mailpref"] == "html") {
      $body = "subscribe newsletter-html ".$_POST["email"]."\nend\n\n";
    } else {
      $body = "subscribe newsletter ".$_POST["email"]."\nend\n\n";
    }

    if(($_POST["firstname"])||($_POST["lastname"])) { $body .= "Name: ".$_POST["firstname"]." ".$_POST["lastname"]."\n"; }
    $body .= "Title: not available (subscribed via Trial Registration Form)\n";
    if($_POST["company"]) { $body .= "Company/Organization: ".$_POST["company"]."\n"; }
    if($_POST["email"]) { $body .= "E-mail Address: ".$_POST["email"]."\n"; }
    if($_POST["mailpref"]) { $body .= "Style Preference: ".$_POST["mailpref"]."\n"; }


    mail($to, $subject, $body, $from);  // Notify company of user's intention to rcv newsletter
  }

  $data=$sfbase;
  $fp = fsockopen('www.salesforce.com',80);
  fputs($fp,"POST /servlet/servlet.WebToLead?encoding=UTF-8 HTTP/1.1\r\n");
  fputs($fp,"Host: www.meangreen.com\r\n");
  fputs($fp,"Content-type: application/x-www-form-urlencoded\r\n" );
  fputs( $fp, "Content-length: ".strlen( $data )."\r\n" );
  fputs( $fp, "Connection: close\r\n\r\n" );
  fputs( $fp, $data );
  while ( !feof($fp) )
    $buf .= fgets( $fp, 128 );
  fclose( $fp );
 }	# not debug
?>
<?php
if ( $survey_fill == true )
	echo $survey_note ;
	mail_customer_signon($email,  $industry  ) ;
/* LDH - DEBUG	
	if ($debug == true)
	{
	    echo "<br />Trial Msg:<br />";
	    echo "\"<br />";
	    echo $thanks_message;
	    echo "<br />\"";
	}
*/
	header( 'refresh: 0; url=/pnuke/index.php?module=htmlpages&func=display&pid=8' );
// echo "BODY: <br />" . $body . "<br />";
?>