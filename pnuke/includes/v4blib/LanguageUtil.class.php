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
 *  Purpose of file: lanugage utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class LanguageUtil
{
    /**
     * Return the currently available system languages
     *
     * @return An array of system languages
     */
    function getLanguages ()
    {
        // check the language folders in /language
        $dir = opendir ( "language" );
        $langs = array();
        while ($lang = readdir($dir))
            if ((strlen($lang) > 2) && (is_dir("language/$lang")) && $lang!='CVS' && $lang!='.svn')
                $langs[] = $lang;

        return $langs;
    }
}
?>