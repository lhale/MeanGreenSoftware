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
 *  Purpose of file: class utililty class (class loader)
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class Loader
{
    /**
     * Load a file from the specified location in the pn file tree
     *
     * @param fileName    The name of the file to load
     * @param path        The path prefix to use (optional) (default=null)
     * @param exitOnError Wether or not exit upon error (optional) (default=true)
     * @param returnVar   The variable to return from the sourced file (optional) (default=null)
     *
     * @return string The file which was loaded
     */
    function loadFile ($fileName, $path=null, $exitOnError=true, $returnVar=null)
    {
        if (!$fileName)
            v4b_exit ("Invalid file specification [$fileName] ...");

        $file = null;
        if ($path)
            $file = pnVarPrepForOS($path) . '/' . pnVarPrepForOS($fileName);
        else
            $file = pnVarPrepForOS($fileName);

        if (file_exists($file) && is_file($file) && is_readable($file))
            if (include_once ($file))
                if ($returnVar)
                    return $$returnVar;
                else
                    return $file;

        if ($exitOnError)
            v4b_exit ("Unable to load file [$fileName] ...");

        return false;
    }


    /**
     * Load all files from the specified location in the pn file tree
     *
     * @param files        An array of filenames to load
     * @param path         The path prefix to use (optional) (default='null')
     * @param exitOnError  Wether or not exit upon error (optional) (default=true)
     *
     * @return boolean true
     */
    function loadAllFiles ($files, $path=null, $exitOnError=false)
    {
        return Loader::loadFiles ($files, $path, true, $exitOnError);
    }


    /**
     * Return after the first successful file load. This corresponds to the 
     * default behaviour of loadFiles().
     *
     * @param files        An array of filenames to load
     * @param path         The path prefix to use (optional) (default='null')
     * @param exitOnError  Wether or not exit upon error (optional) (default=true)
     *
     * @return boolean true
     */
    function loadOneFile ($files, $path=null, $exitOnError=false)
    {
        return Loader::loadFiles ($files, $path, false, $exitOnError);
    }


    /**
     * Load multiple files from the specified location in the pn file tree
     * Note that in it's default invokation, this method exits after the
     * first successful file load.
     *
     * @param files       Array of filenames to load
     * @param path        The path prefix to use (optional) (default='null')
     * @param all         Wether or not to load all files or exit upon 1st successful load (optional) (default=false)
     * @param exitOnError Wether or not exit upon error (optional) (default=true)
     * @param returnVar   The variable to return if $all==false (optional) (default=null)
     *
     * @return boolean true
     */
    function loadFiles ($files, $path=null, $all=false, $exitOnError=false, $returnVar='')
    {
        if (!is_array($files) || !$files)
            v4b_exit ("Invalid file array specification ...");

        $files = array_unique ($files);

        $loaded = false;
        foreach ($files as $file)
        {
            $rc = Loader::loadFile ($file, $path, $exitOnError, $returnVar);

            if ($rc)
                $loaded = true;

            if ($loaded && !$all)
                break;
        }

        if ($returnVar && !$all)
            return $rc;

        return $loaded;
    }


    /**
     * Load a class file from the PN specified location in the pn file tree
     *
     * @param className    The class-basename to load
     * @param classPath    The path prefix to use (optional) (default='includes/v4blib')
     * @param exitOnError  Wether or not exit upon error (optional) (default=true)
     *
     * @return string The file name which was loaded
     */
    function loadClass ($className, $classPath='includes/v4blib', $exitOnError=true)
    {
        if (!$className)
            v4b_exit ("Invalid class specification [$className] ...");

        if(class_exists($className))
            return $className;

        $classFile = $className . '.class.php';
        return Loader::loadFile ($classFile, $classPath, $exitOnError);
    }


    /**
     * Load a V4BObject extended class from the given module. The given class name is
     * prefixed with 'V4B' and underscores are removed to produce a proper class name.
     *
     * @param module        The module to load from
     * @param base_obj_type The base object type for which to load the class
     * @param array         If true, load the array class instead of the single-object class.
     * @param exitOnError   Wether or not exit upon error (optional) (default=true)
     *
     * @return string The ClassName which was loaded from the file
     */
    function loadClassFromModule ($module, $base_obj_type, $array=false, $exitOnError=false)
    {
        if (!$module)
            v4b_exit ("Invalid module specification [$module] ...");

        if (!$base_obj_type)
            v4b_exit ("Invalid base_obj_type specification [$base_obj_type] ...");

        $prefix = 'V4B';

        if (strpos($base_obj_type,'_') !== false)
        {
            $c = $base_obj_type;
            $class = '';
            while (($p=strpos($c,'_')) !== false)
            {
                $class .= ucwords(substr ($c, 0, $p));
                $c = substr ($c, $p+1);
                }
        $class .= ucwords($c);
        }
        else
          $class = ucwords($base_obj_type);

        $class = $prefix . $class;
        if ($array)
            $class .= 'Array';

        // prevent unncessary reloading
        if (class_exists($class))
            return $class;

        $classFile = 'modules/' . pnVarPrepForOS($module) . '/classes/' . pnVarPrepForOS($class) . '.class.php';

        if (file_exists($classFile) && is_readable($classFile))
        {
            if (include_once($classFile));
                return $class;

            if ($exitOnError)
                v4b_exit ("Unable to load class [$classFile] ...");

            return false;
        }

        return false;
    }
}
?>