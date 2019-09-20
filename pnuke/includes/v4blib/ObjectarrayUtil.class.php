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
 *  Purpose of file: object-array utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ObjectarrayUtil
{
    /**
     * Filter an object array using the specified field and value
     *
     * @param objectArray    The array of objects to filter
     * @param field     The field to filter on
     * @param value        The value to filter with
     * @param invert     Wether to invert the result set (default=false) (optional)
     *
     * @return The resulting object array
     */
    function filter ($objectArray, $field, $value, $invert=false)
    {
        $compareArray = array();
        $compareArray[$field] = $value;

        return filter ($objectArray, $compareArray, $invert)
    }


    /**
     * Filter an object array using a compare array
     *
     * @param objectArray    The array of objects to filter
     * @param compareArray    The array to hold the compare values
     * @param invert     Wether to invert the result set (default=false) (optional)
     *
     * @return The resulting object array
     */
    function filterArray ($objectArray, $compareArray, $invert=false)
    {
        if (!is_array ($objectArray))
            v4b_exit ("objectArrayUtil_filter: objectArray is not an array ... ");
        if (!is_array ($compareArray))
            v4b_exit ("objectArrayUtil_filter: compareArray is not an array ... ");

        $objectSize  = count ($objectArray);
        $compareSize = count ($compareArray);

        if ($compareSize < 1)
            return $objectArray;

        $resultArray = array ();
        for ($i=0; $i<$objectSize; $i++)
        {
            $object    = $objectArray[$i];
            $identical = true;

            foreach ( $compareArray as $cKey => $cVal)
                if (!$invert)
            {
                if ($object[$cKey] == $cVal)
                    $resultArray[] = $object;
            }
            else
            {
                    if ($object[$cKey] != $cVal)
                        $resultArray[] = $object;
            }
        }

        return $resultArray;
    }


    /**
     * Grep through an object array using the specified field and regex
     *
     * @param objectArray    The array of objects to filter
     * @param field     The field to filter on
     * @param regex        The regex used to match fields
     * @param invert     Wether to invert the result set (default=false) (optional)
     * @param regex_function The function used to check the regex match (default='ereg') (optional)
     *
     * @return The resulting object array
     */
    function grep ($objectArray, $field, $regex, $invert=false, $regex_function='ereg')
    {
        $compareArray = array();
        $compareArray[$field] = $regex;

        return grep ($objectArray, $compareArray, $invert, $regex_function)
    }


    /**
     * Grep through an object array using a compare array
     *
     * @param objectArray    The array of objects to filter
     * @param compareArray    The array to hold the compare regexps
     * @param invert     Wether to invert the result set (default=false) (optional)
     * @param regex_function The function used to check the regex match (default='ereg') (optional)
     *
     * @return The resulting object array
     */
    function grepArray ($objectArray, $compareArray, $invert=false, $regex_function='ereg')
    {
        if (!is_array ($objectArray))
            v4b_exit ("objectArrayUtil_grep: objectArray is not an array ... ");
        if (!is_array ($compareArray))
            v4b_exit ("objectArrayUtil_grep: compareArray is not an array ... ");

        $objectSize  = count ($objectArray);
        $compareSize = count ($compareArray);

        if ($compareSize < 1)
            return $objectArray;

        $resultArray = array ();
        for ($i=0; $i<$objectSize; $i++)
        {
            $object    = $objectArray[$i];
            $identical = true;

            foreach ($compareArray as $cKey => $cVal)
                if (!$invert)
            {
                    if ($regex_function($cVal, $object[$cKey]))
                        $resultArray[] = $object;
            }
            else
            {
                    if (!$regex_function($cVal, $object[$cKey]))
                        $resultArray[] = $object;
            }
        }

        return $resultArray;
    }
}
?>