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
 *  Purpose of file: file utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class FileUtil
{
    /**
     * Given a filename (complete with path) get the file basename
     *
     * @param filename     The filename to process
     * @param keepDot    Wether or not to return the dot with the basename
     *
     * @return string     The file's filename
     */
    function getFilePath ($filename, $keepSlash=false)
    {
        if (!$filename)
            v4b_exit ("FileUtil::getFilepath: filename is empty");

        $p = strrpos($filename, '/');
        if ($p !== false)
            if ($keepSlash)
                return substr($base, 0, $p+1);
            else
                return substr($base, 0, $p);

        return $filename;
    }


    /**
     * Given a filename (complete with path) get the file basename
     *
     * @param filename     The filename to process
     * @param keepDot    Wether or not to return the dot with the basename
     *
     * @return string     The file's filename
     */
    function getFilebase ($filename, $keepDot=false)
    {
        if (!$filename)
            v4b_exit ("FileUtil::getFilename: filename is empty");

        $base = basename ($filename);
        $p = strrpos ($base, '.');
        if ($p !== false)
            if ($keepDot)
                return substr($base, 0, $p);
            else
                return substr($base, 0, $p-1);

        return $filename;
    }


    /**
     * Get the basename of a filename
     *
     * @param filename     The filename to process
     *
     * @return string     The file's basename
     */
    function getBasename ($filename)
    {
      if (!$filename)
          v4b_exit ("FileUtil::getBasename: filename is empty");

      return basename ($filename);
    }


    /**
     * Get the file's extension
     *
     * @param filename     The filename to process
     * @param keepDot      Wether or not to return the '.' with the extension
     *
     * @return string     The file's extension
     */
    function getExtension ($filename, $keepDot=false)
    {
        if (!$filename)
            v4b_exit ("FileUtil::getExtension: filename is empty");

        $p = strrchr ($filename, '.');
        if ($p !== false)
            if ($keepDot)
                return substr($p, 0);
            else
                return substr($p, 1);

        return '';
    }


    /**
     * Generate a random filename
     *
     * @param min         Minimum number of characters
     * @param max         Maximum number of characters
     * @param useupper     Wether to use uppercase characters
     * @param usenumbers    Wether to use numeric characters
     * @param usespecial    Wether to use special characters
     *
     * @return string The generated filename extension
     */
    function generateRandomFilename ($min, $max, $useupper=false, $usenumbers=true, $usespecial=false)
    {
        $rnd   = "";
        $chars = "abcdefghijklmnopqrstuvwxyz";

        if ($useupper)   $chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($usenumbers) $chars .= "0123456789";
        if ($usespecial) $chars .= "~@#$%^*()_+-={}|][";
        $charlen = strlen($chars)-1;

        $len = mt_rand ($min, $max);
        for ($i=0; $i<$len; $i++)
            $rnd .= $chars[mt_rand(0,$charlen)];

        return $rnd;
    }


    /**
     * Recursiveley generate a file listing
     *
     * @param rootPath    The root-path we wish to start at
     * @param recurse    Wether or not to recurse directories (optional) (default=true)
     * @param relativePath    Wether or not to list relative (vs abolute) paths (optional) (default=true)
     * @param extension     The file extension to scan for (optional) (default=null)
     *
     * @return boolean The return code from mkdir()
     */
    function getFiles ($rootPath, $recurse=true, $relativePath=true, $extension=null)
    {
        $files = array();

        if (!file_exists($rootPath) || !is_dir($rootPath) || !is_readable($rootPath))
            return $files;

        $el = ($extension ? strlen($extensions) : 0);
        $dh = opendir($rootPath);
        while($file = readdir($dh))
        {
            if($file != "." and $file!="..")
            {
                $path = "$rootPath/$file";

                if (!$extension || substr($f, -$el) == $extension)
                {
                    if ($relativePath)
                        $files[] = $file;
                    else
                        $files[] = $path;
                }

                if($recurse && is_dir($path))
                    $files = array_merge ((array)$files,
                                          (array)FileUtil::getFiles($path, $recurse, $relativePath, $extension));
            }
        }

        closedir($dh);
        return $files;
    }


    /**
     * Recursiveley create a directory path
     *
     * @param path        The path we wish to generate
     * @param mode        The (UNIX) mode we wish to create the files with
     *
     * @return boolean The return code from mkdir()
     */
    function mkdirs ($path, $mode)
    {
        if (is_dir($path))
          return true;

        $pPath = dirname($path);
        if (FileUtil::mkdirs($pPath, $mode) === false)
            return false;

        return mkdir($path);
    }


    /**
     * Recursiveley delete given directory path
     *
     * @param path        The path/folder we wish to delete
     *
     * @return boolean The return code from rmdir()
     */
    function deldir ($path)
    {
        $dh = opendir($path);

        while($file = readdir($dh))
        {
            if(is_dir("$path/$file") && ($file != "." and $file!=".."))
                FileUtil::deldir("${dir}/${file}");
            elseif ($file != "." and $file!="..")
                unlink("${dir}/${file}");
        }

        closedir($dh);
        return rmdir($path);
    }


    /**
     * Read a file's contents and return them as a string. This method also
     * opens and closes the file.
     *
     * @param filename     The file to read
     *
     * @return string     The file's contents or false upon failure
     */
    function readFile ($filename)
    {
        if (!strlen($filename))
            v4b_exit ("FileUtil::readFile: filename is empty");

        return file_get_contents($filename);
    }


    /**
     * Read a file's contents and return them as an array of lines.
     * This method also opens and closes the file.
     *
     * @param filename     The file to read
     *
     * @return string     The file's contents or false upon failure
     */
    function readFileLines ($filename)
    {
        $data = FileUtil::readFile ($filename);
        $lines = explode ("\n", $data);
        return $lines;
    }


    /**
     * Read a serialized's file's contents and return them as a string
     * This method also opens and closes the file.
     *
     * @param filename     The file to read
     *
     * @return string     The file's contents or false upon failure
     */
    function readSerializedFile ($filename)
    {
        if (!$filename)
            v4b_exit ("FileUtil::readSerializedFile: filename is empty");

        return unserialize(file_get_contents($filename));
    }


    /**
     * Take an existing filename and 'randomize' it
     *
     * @param filename     The filename to randomize
     * @param dir        The directory the file should be in
     *
     * @return string     The 'randomized' filename
     */
    function randomizeFilename ($filename, $dir)
    {
        $ext  = '';
        $time = time ();

        if (!$filename)
            $filename = FileUtil::generateRandomFilename (10, 15, true, true);
        else
        if (strrchr ($filename, '.') !== false) // do we have an extension?
        {
            $ext = FileUtil::getExtension ($filename);
            $filename = FileUtil::stripExtension ($filename);
        }

        if ($dir)
            $dir .= '/';

        if ($ext)
            $rnd = $dir . $filename . '_' . $time . '.' . $ext;
        else
            $rnd = $dir . $filename . '_' . $time;

        return $rnd;
    }


    /**
     * Write a string to a file
     * This method also opens and closes the file.
     *
     * @param filename     The file to write
     * @param data        The data to write to the file
     *
     * @return mixed     The return code from the fclose() call
     */
    function writeFile ($filename, $data)
    {
        if (!$filename)
            v4b_exit ("FileUtil::writeFile: filename is empty");

        return file_put_contents ($filename, $data);
    }


    /**
     * Write a serialized string to a file
     * This method also opens and closes the file.
     *
     * @param filename     The file to write
     * @param data        The data to write to the file
     *
     * @return mixed     The return code from the fclose() call
     */
    function writeSerializedFile ($filename, $data)
    {
        if (!$filename)
            v4b_exit ("FileUtil::writeSerializedFile: filename is empty");

        return file_put_contents ($filename, serialize($data));
    }


    /**
     * Upload a file
     *
     * @param key           The filename key to use in accessing the file data
     * @param destination    The destination where the file should end up
     * @param newName    The new name to give the file (optional) (default='')
     *
     * @return mixed     The return code from the fclose() call
     */
    function uploadFile ($key, $destination, $newName='')
    {
        if (!$key)
            v4b_exit ('FileUtil::uploadFile called with invalid field key ...');

        if (!$destination)
            v4b_exit ('FileUtil::uploadFile called with invalid destination ...');

        $msg = '';
        if ($_FILES[$key]['name'])
        {
            $uploadfile = $_FILES[$key]['tmp_name'];
            $origfile   = $_FILES[$key]['name'];
            $uploaddest = "$destination/$origfile";

            if ($newName)
                $uploaddest = "$destination/$newName";

            $rc = move_uploaded_file($uploadfile, $uploaddest);
            if (!$rc)
            {
                switch ($_FILES[$key]['error'])
                {
                    case 1:
                        $msg = "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                        break;
                    case 2:
                        $msg = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form.";
                        break;
                    case 3:
                        $msg = "The uploaded file was only partially uploaded.";
                        break;
                    case 4:
                        $msg = "No file was uploaded.";
                        break;
                    case 5:
                        $msg = "Uploaded file size 0 bytes";
                        break;
                }
            }
        }
        //else
        //{
        //print "Unable to determine file to upload:";
        //prayer ($_REQUEST);
        //}

        return $msg;
    }
}
?>