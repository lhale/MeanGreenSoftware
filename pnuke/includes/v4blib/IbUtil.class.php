<?php
/*  ---------------------------------------------------------------------- 
 *  LICENSE 
 *  
 *  This program is free software; you can redistribute it and/or 
 *  modify it under the terms of the GNU General Public License (GPL) 
 *  as published by the Free Software Foundation, either version 2
 *  of the License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful, 
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of 
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 *  GNU General Public License for more details. 
 *  
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html 
 *  ---------------------------------------------------------------------- 
 *  Original Author of file: Robert Gasch
 *  Author Contact: RNG@open-star.org
 *  Purpose of file: IBSearchServer utililty class
 *  Copyright: value4business GmbH
 *  ---------------------------------------------------------------------- 
 */


function insertFile ($filename, $origname='', $extraData='')
{
    if (!$filename)
      v4b_exit ('Invalid filename passed to IbUtil::insertFile ...');

    if ($origname)
      $ext = FileUtil::getExtension ($origname);
    else
      $ext = FileUtil::getExtension ($filename);

    $data = '';
    $err = '';
    $cmd = '';
    global $v4bConfig;
    $txtFile = $v4bConfig['V4B_FILE_TMP_PATH'] . '/' . FileUtil::getBasename($filename) . '.txt';
    if ($ext == 'txt')
      $txtFile = $filename;
    else if ($ext == 'doc')
      $cmd = "/usr/local/bin/antiword \"$filename\" > \"$txtFile\"";
    else if ($ext == 'pdf')
      $cmd = "pdftotext \"$filename\" \"$txtFile\"";
    else if ($ext == 'ps')
      $cmd = "ps2ascii \"$filename\" \"$txtFile\"";
    else 
      return -1;

    $rc = system ($cmd, $err);
    if ($err)
      return -1;

    $fp = fopen ($txtFile, "a");
    $swrite = "\nextraData\n";
    @fwrite ($fp, $swrite);
    fclose ($fp);

    $data = FileUtil::readFile ($txtFile);
    @unlink ($txtFile);

    if ($data)
      return IbUtil::insert ($data);

    return -1;
}


function insert ($data)
{
    if (!$data)
      return -1;

    $size = strlen ($data);
    if (!$size)
      return -1;

    $fp = IbUtil::openConnection ();
    if (!$fp)
      return -1;

    $date = DateUtil::getDatetime ('', 'd.m.Y');
    $cmd  = "insert=1&size=$size&docset=$date&mode=0\r\n";

    // get server ready for insert
    $irc  = fwrite ($fp, $cmd);
    //print ("insert rc = $irc<br>");

    // write data
    $wrc  = fwrite ($fp, $data);
    //print ("write data rc = $wrc<br>");

    // confirm size & retrieve docID
    $rc    = fwrite ($fp, "$wrc");
    $docID = fgets($fp);

    // docID is now size concatenated with docID -> split 
    $strlenSize = strlen ($wrc);
    $docID = substr ($docID, $strlenSize);
    //print ("docID = $docID<br>");
    IbUtil::closeConnection ($fp);

    return $docID;
}


function delete ($ib_doc_id)
{
    if (!$ib_doc_id)
      return -1;

    $fp = IbUtil::openConnection ();
    if (!$fp)
      return -1;

    $cmd   = "delete=1&doc=$ib_doc_id\r\n";
    $irc   = fwrite ($fp, $cmd);
    $docID = fgets($fp);

    IbUtil::closeConnection ($fp);

    return 0;
}


function queryDocIDList ($queryString, $percentageArray)
{
    $doPercentages = false; 

    if (is_array($percentageArray))
      $doPercentages = true; 

    $idList  = '';
    $results = IbUtil::query ($queryString);

    if (!$results)
      return '';

    $size = count ($results);
    for ($i=0; $i<$size; $i++)
      {
      if ($i>0)
        $idList .= ',';

      $result  = $results[$i];
      $docNbr  = $result['DocNr'];
      $idList .= $docNbr;

      if ($doPercentages)
        $percentageArray[$docNbr] = $result['SemRange'];
      }

    return $idList;
}


function query ($queryString)
{
    $fp = IbUtil::openConnection ();
    if (!$fp)
      return -1;

    // set query
    $cmd = "query=$queryString\r\n";
    $qrc = fwrite ($fp, $cmd);
    //print ("query qrc = $qrc\n");

    $reply           = array ();
    $buf             = '';
    $c               = 0;
    $fetchInfoLine   = 0;
    $resultDataStart = 0;
    $resultDataEnd   = 0;

    // get the entire result and build some markers
    while (true)
      {
      $buf = fgets($fp);
      $reply[] = $buf;

      if (strcmp($buf, 'EndResult') !== 0)
        {
        $resultDataEnd = $c;
        break;
        }

      if (strcmp($buf, 'FetchColumns') !== 0)
        {
        $fetchInfoLine = $c;
        $resultDataStart = $c+1;
        }

      $c++;
      }

    fclose ($fp);

    // get the fetch columns info
    $fetchInfo = $reply[$fetchInfoLine];
    $fetchColumns = explode (' ', $fetchInfo);

    // first field is number of fetch fields -> remove
    array_shift ($fetchColumns);
    $fetchColumnsCount = count($fetchColumns);

    // now build a structured result set 
    $result = array();
    for ($i=$resultDataStart; $i<$resultDataEnd; $i++)
      {
      $line   = $reply[$i];
      $fields = explode (' ', $line);

      $r = array();
      for ($j=0; $j<$fetchColumnsCount; $j++)
        $r[$fetchColumns[$j]] = $fields[$j];

      $result[] = $r;
      }

    //prayer ($reply);
    //prayer ($result);

    IbUtil::closeConnection ($fp);

    return $result;
}


function openConnection ()
{
    global $v4bConfig;
    $fp = fsockopen ($v4bConfig['V4B_IB_SERVER_HOST'], $v4bConfig['V4B_IB_SERVER_PORT'], 
                     $errno, $errstr, 30);

    if ($fp === false)
      v4b_exit ('Error opening IB socket ['.$v4bConfig['V4B_IB_SERVER_HOST'].':'.$v4bConfig['V4B_IB_SERVER_PORT']."]: $errno, $errstr");

    return $fp;
}


function closeConnection ($fp)
{
    if ($fp)
      @fclose ($fp);

    return 0;
}


?>