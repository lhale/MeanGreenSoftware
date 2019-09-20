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
 *  Purpose of file: session utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class SessionUtil
{
    /**
     * Return the current URL
     *
     * @return The current URL
     */
    function getCurrentURL ($key, $default=false)
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($_SERVER['HTTPS'])
          $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        return $url;
    }


    /**
     * Print the headers sent info
     */
    function printHeadersSent()
    {
        $line='';
        $file='';
        headers_sent ($file, $line);
        print "header sent from $file on $line";
    }
}
?>