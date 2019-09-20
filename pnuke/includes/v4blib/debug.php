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
*  Purpose of file: debug util functions
*  Copyright: value4business GmbH
*  ----------------------------------------------------------------------
*/


/**
 * log a string to the designated output destination
 *
 * @param file             The file (passed from assertion handler)
 * @param line             The line (passed from assertion handler)
 * @param assert_trigger     The assert trigger (passed from assertion handler)
 */
if (!function_exists('v4b_assert_callback_function'))
{
    function v4b_assert_callback_function ($file, $line, $assert_trigger)
    {
        //v4b_exit ('assertion failed', $file, $line, $assert_trigger);
        v4b_exit ('assertion failed');
    }
}

/**
 * Exit the program after displaying the appropriate messages
 *
 * @param msg         The messgage to show
 * @param html        Wether or not to generate HTML (can be turned off for command line execution)
 */
if (!function_exists('v4b_exit'))
{
    function v4b_exit ($msg, $html=true)
    {
        if(defined('_PNINSTALLVER')) {
            return;
        }

        require_once ('includes/v4blib/LogUtil.class.php');
        LogUtil::log ("Exit-Handler: $msg\n", 'FATAL');
        LogUtil::log ('Backtrace info ...' . _prayer (debug_backtrace()), 'FATAL');
        prayer (debug_backtrace());
        print ("Exit-Handler: $msg");
        exit();
    }
}


/**
 * Serialize the given data in an easily human-readable way for debug purposes
 *
 * Taken from http://dev.nexen.net/scripts/details.php?scripts=707
 *
 * @param data        The object to serialize
 * @param functions   Wether to show function names for objects (default=false) (optional)
 *
 * @return string A string containing serialized data
 */
if (!function_exists('_prayer'))
{
    function &_prayer ($data, $functions=false)
    {
        if(defined('_PNINSTALLVER')) {
            return;
        }

        $text = '';

        if($functions!=0)
        { $sf=1; }
        else
        { $sf=0 ;}

        if (isset ($data))
        {
            if (is_array($data) || is_object($data))
            {
                if (count ($data))
                {
                    $text .= "<OL>\n";

                    while (list ($key, $value) = each ($data))
                    {
                        $type=gettype($value);

                        if ($type=="array" || $type == "object")
                        {
                            $text .= sprintf ("<LI>(%s) <B>%s</B>:\n", $type, $key);
                            $text .= _prayer ($value, $sf);
                        }
                        elseif (eregi ("function", $type))
                        {
                            if ($sf)
                            {
                                $text .= sprintf ("<LI>(%s) <B>%s</B> </LI>\n", $type, $key, $value);
                                /*  There doesn't seem to be anything traversable inside functions. */
                            }
                        }
                        else
                        {
                            if (!isset($value))
                            { $value="(none)"; }

                            if ($datatype == 'array') {
                                $text .= sprintf ("<li>(%s) <strong>%s</strong> = %s</li>\n", $type, $key, dataUtil::formatForDisplay($value));
                            }
                            elseif ($datatype == 'object') {
                                $text .= sprintf ("<li>(%s) <strong>%s</strong> -> %s</li>\n", $type, $key, dataUtil::formatForDisplay($value));
                            }

                            $text .= sprintf ("<LI>(%s) <B>%s</B> = %s</LI>\n", $type, $key, $value);
                        }
                    }

                    $text .= "</OL>\n";
                }
                else
                {
                    $text .= "(empty)";
                }
            }
            else
            $text .= $data;
        }

        return $text;
    }
}


/**
 * Serialize the given data in an easily human-readable way for debug purposes
 *
 * Taken from http://dev.nexen.net/scripts/details.php?scripts=707
 *
 * @param data        The object to serialize
 * @param functions   Wether to show function names for objects (default=false) (optional)
 *
 * @return nothing, the data is directly printed
 */
if (!function_exists('prayer'))
{
    function prayer ($data, $functions=false)
    {
        if(defined('_PNINSTALLVER')) {
            return;
        }

        $text  = '<span align="left">';
        $text .= _prayer ($data, $functions);
        $text .= '</span>';
        print ($text);
    }
}


/**
 * Simple timer class to measure code execution times.
 *
 * You can take multiple snapshots by calling the snap() function.
 * For multiple measurements with 1 Timer, some basic statistics
 * are computed.
 */
if (!class_exists('Timer'))
{
    class Timer
    {
        var $name;
        var $times;


    /**
     * Constructor
     *
     * @param name    The name of the timer
     */
        function Timer ($name='')
        {
            $this->name  = $name;
            $this->times = array();
            $this->start ();
        }


    /**
     * return the current microtime
     */
        function get_microtime()
        {
            $tmp = split(" ",microtime());
            $rt  = $tmp[0]+$tmp[1];
            return $rt;
        }


    /**
     * start the timer
     */
        function start ()
        {
            //debug_log ("V4BTimer Start: $this->name $diff\n");
            $this->times[] = $this->get_microtime();
        }


    /**
     * stop the timer
     */
        function stop ($insertNewRecord=true)
        {
            if ($insertNewRecord)
            $this->times[] = $this->get_microtime();

            if (count($this->times) <= 2)
            $this->stop_single();
            else
            $this->stop_multiple ();
        }


    /**
     * print the timer results for a single measurement
     */
        function stop_single()
        {
            $start = $this->times[0];
            $stop  = $this->times[1];
            $diff  = $stop - $start;

            print ("Timer: $diff $this->name \n");
        }


    /**
     * print the timer results for multiple measurement
     */
        function stop_multiple ()
        {
            $min   = 9999999;
            $max   = -9999999;
            $sum   = 0;
            $size  = count($this->times);
            $start = $this->times[0];

            for ($i=1; $i<$size; $i++)
            {
                $last = $this->times[$i-1];
                $stop = $this->times[$i];
                $diff = $stop - $last;

                if ($diff < $min) $min = $diff;
                if ($diff > $max) $max = $diff;
            }

            $start = $this->times[0];
            $stop  = $this->times[$size-1];
            $diff  = $stop - $start;

            $avg = $diff/$size;
            $stats = sprintf ("(%d runs, min=%f, max=%f, avg=%f)\n", $size, $min, $max, $avg);

            print ("V4BTimer: $diff $stats $this->name\n");
        }


    /**
     * take a snapshot while continuing the timing run
     */
        function snap ()
        {
            $this->times[] = $this->get_microtime();
        }
    }
}

?>