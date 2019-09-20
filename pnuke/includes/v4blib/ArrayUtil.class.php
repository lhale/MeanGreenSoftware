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
 *  Purpose of file: array utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ArrayUtil
{
    /**
     * Recursiveley count array sizes
     *
     * Given a set of (recrusive) arrays, this method will return the total
     * number of elemens in all arrays including any subarrays.
     *
     * @param array The array to count
     */
    function count_r ($array)
    {
        if (!is_array($array))
             return 0;

        $count = count($array);
        foreach ($array as $key => $val)
          if (is_array($val))
            $count += ArrayUtil::count_r ($val);

        return $count;
    }


    /**
     * Insert an item into an array at the specified position
     *
     * @param array     The array in which we wish to insert
     * @param value     The value to insert
     * @param pos       The position at which to insert
     */
    function insert($array, $value, $pos)
    {
        if (!is_array($array))
             return false;

        $last = array_splice($array, $pos);
        array_push($array, $value);
        $array = array_merge((array)$array, (array)$last);
    }
}
?>