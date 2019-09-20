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
 *  Purpose of file: string utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class StringUtil
{
    /**
     * Count the instances of needle in the given string
     *
     * @param haystack    the string to search
     * @param needle    the needle to search for and count
     *
     * @return The numer of instances of needle in string
     */
    function countInstances ($haystack, $needle)
    {
        $count = 0;
        $nlen  = strlen ($needle);

        if (!$nlen)
            return 0;

        while (($haystack = strstr($haystack, $needle)) !== false)
        {
            $haystack = substr ($haystack, $nlen);
            $count++;
        }

        return $count;
    }


    /**
     * Return the HTML codes to open or close a themetable
     *
     * @param string    the string to operate on
     * @param limit     the maximum number of characters displayed (optional) (default=80)
     * @param appendDots     wether or not to append '...' to the maximum number of characters displayed (optional) (default=80)
     *
     * @return The potentially truncated string
     */
    function getTruncatedString ($string, $limit=80, $appendDots=true)
    {
        $len = strlen($string);

        if ($len > $limit)
        {
            $string = substr($string, 0, $limit);

            if ($appendDots)
                $string .= '...';
        }

        return $string;
    }


    /**
     * Translate html input newlines to <br /> sequences.
     * This function is necessary as inputted strings will contain
     * "\n\r" instead of just "\n"
     *
     * @param string    the string to operate on
     *
     * @return The converted string
     */
    function nl2html ($string)
    {
        $str = str_replace("\n", '<br />', $string);
        $str = str_replace("\r", '', $str);

        return $str;
    }


    /**
     * Tokenize a string according to the given parameters.
     * This function just wraps explode to provide a more java-similar syntax
     *
     * @param string    the string to tokenize
     * @param delimeter    the delimeter to use
     * @param max        the maximal number of tokens to generate (optional) (default=999999)
     *
     * @return The token array
     */
    function tokenize ($string, $delimeter, $max=999999)
    {
        return explode($delimeter, $string, $max);
    }


    /**
     * Case-Insensitive version of strpos (standard only available in PHP 5)
     *
     * @param haystack    the string to search
     * @param needle    the string to search for
     * @param offset    the search start offset position (optional) (default=0)
     *
     * @return The token array
     */
    function stripos ($haystack, $needle, $offset=0)
    {
        return strpos (strtoupper($haystack), strtoupper($needle), $offset);
    }
}
?>