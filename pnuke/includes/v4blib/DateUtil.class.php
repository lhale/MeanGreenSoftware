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
 *  Purpose of file: date utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


define ('DATEFORMAT_DEF',       'Y-m-d H:i:s');
define ('DATEFORMAT_EUR',       'd-m-Y H:i:s');
define ('DATEFORMAT_EUR_SHORT', 'd-m-Y');
define ('DATEFORMAT_GBL',       'Y-m-d H:i:s');
define ('DATEFORMAT_GBL_SHORT', 'Y-m-d');
define ('DATEFORMAT_UNI',       'YmdHis');
define ('DATEFORMAT_UNI_SHORT', 'Ymd');
define ('DATEFORMAT_USA',       'm-d-Y H:i:s');
define ('DATEFORMAT_USA_SHORT', 'm-d-Y');


class DateUtil
{
    /**
     * Return a formatted datetime for the given timestamp (or for now)
     *
     * @param time         The timestamp which we wish to format (default==now)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime The datetime formatted according to the specified format
     */
    function getDatetime ($time='', $format=DATEFORMAT_DEF)
    {
        if ($time)
            return date ($format, $time);
        else
            return date ($format);
    }


    /**
     * Reformat a given datetime according to the specified format
     *
     * @param datetime    The (string) datetime to reformat
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime The datetime formatted according to the specified format
     */
    function formatDatetime ($datetime, $format=DATEFORMAT_DEF)
    {
        if (!$datetime)
            return date ($format);

        $dTime = strtotime($datetime);
        return DateUtil::getDatetime ($dTime, $format);
    }


    /**
     * Build a datetime string from the supplied fields
     *
     * @param year        The year
     * @param month        The month
     * @param day        The day
     * @param hour        The hour (optional) (default==0)
     * @param minute    The minute (optional) (default==0)
     * @param second    The second (optional) (default==0)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime The datetime formatted according to the specified format
     */
    function buildDatetime ($year, $month, $day, $hour=0, $minute=0, $second=0, $format=DATEFORMAT_DEF)
    {
        $dTime = mktime ($hour, $minute, $second, $month, $day, $year);
        return date ($format, $dTime);
    }


    /**
     * Return a formatted datetime at the end of the business day n days from now
     *
     * @param days          The number of days to advance (optional) (detault==1)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime     The datetime formatted according to the specified format
     */
    function getDatetime_NextDay ($days=1, $format=DATEFORMAT_DEF)
    {
        $next = mktime (17,0,0, date("m"), date("d")+$days, date("y"));
        return date ($format, $next);
    }


    /**
     * Return a formatted datetime at the end of the business day n week from now
     *
     * @param num       The number of weeks to advance (optional) (detault==1)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime     The datetime formatted according to the specified format
     */
    function getDatetime_NextWeek ($num=1, $format=DATEFORMAT_DEF)
    {
        $next = mktime (17,0,0, date("m"), date("d")+$num*7, date("y"));
        return date ($format, $next);
    }


    /**
     * Return a formatted datetime at the end of the business day n months from now
     *
     * @param num       The number of months to advance (optional) (default=1)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime     The datetime formatted according to the specified format
     */
    function getDatetime_NextMonth ($num=1, $format=DATEFORMAT_DEF)
    {
        $next = mktime (17,0,0, date("m")+$num, date("d"), date("y"));
        return date ($format, $next);
    }


    /**
     * Return a formatted datetime at the end of the business day n years from now
     *
     * @param num       The number of years to advance (optional) (default=1)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return datetime     The datetime formatted according to the specified format
     */
    function getDatetime_NextYear ($num=1, $format=DATEFORMAT_DEF)
    {
        $next = mktime (17,0,0, date("m"), date("d"), date("y")+$num);
        return date ($format, $next);
    }


    /**
     * Return the date portion of a datetime timestamp
     *
     * @param datetime     The date to parse (optional) (default=='', reverts to now)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')

     * @return string     The Date portion of the specified datetime
     */
    function getDatetime_Date ($datetime='', $format=DATEFORMAT_DEF)
    {
        if (!$datetime)
            $datetime = DateUtil::getDatetime ();

        $dTime = strtotime($datetime);
        $sTime = DateUtil::getDatetime ($dTime, $format);

        if ($format == $DATEFORMAT_DEF)
            return substr ($sTime, 0, 8);

        $spaceOffset = strpos ($datetime, ' ');
        return substr ($sTime, 0, $spaceOffset);
    }


    /**
     * Return the time portion of a datetime timestamp
     *
     * @param datetime     The date to parse (optional) (default=='', reverts to now)
     * @param format    The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return string     The Time portion of the specified datetime
     */
    function getDatetime_Time ($datetime='', $format=DATEFORMAT_DEF)
    {
        if (!$datetime)
            $datetime = DateUtil::getDatetime ();

        $dTime = strtotime($datetime);
        $sTime = DateUtil::getDatetime ($dTime, $format);

        if ($format == $DATEFORMAT_DEF)
            return substr ($sTime, 9);

        $spaceOffset = strpos ($datetime, ' ');
        return substr ($datetime, $spaceOffset+1);
    }


    /**
     * Return the requested field from the supplied date
     *
     * Since the date fields can change depending on the date format,
     * the following convention is used when referring to date fields:<br />
     *   Field 1    ->     Year<br />
     *   Field 2    ->     Month<br />
     *   Field 3    ->     Day<br />
     *   Field 4    ->     Hour<br />
     *   Field 5    ->     Minute<br />
     *   Field 6    ->     Second<br />
     *
     *
     * @param datetime    The field number to return
     * @param field        The date to parse (default=='', reverts to now)
     *
     * @return string     The requested datetime field
     */
    function getDatetime_Field ($datetime, $field)
    {
        if (!$datetime)
            $datetime = DateUtil::getDatetime ();

        $dTime = strtotime($datetime);
        $sTime = DateUtil::getDatetime ($dTime, $DATEFORMAT_GBL);

        $field--;         // adjust for human counting

        if ($field <= 2)  // looking for a date part
        {
            $date = DateUtil::getDatetime_Date ($datetime);
            $fields = explode ('-', $date);
            return $fields[$field];
        }
        else              // looking for a time part
        {
            $field -= 3;
            $time = DateUtil::getDatetime_Time ($datetime);
            $fields = explode (':', $time);
            return $fields[$field];
        }
    }


    /**
     * Return an structured array holding the differences between 2 dates.
     *
     * The returned array will be structured as follows:<br>
     *   Array (<br />
     *          [d] => _numeric_day_value_<br />
     *          [h] => _numeric_hour_value_<br />
     *          [m] => _numeric_minute_value_<br />
     *          [s] => _numeric_second_value_ )<br />
     *
     * @param date1        The first date
     * @param date2        The second date
     *
     * @return array     The structured array containing the datetime difference
     */
    function getDatetimeDiff ($date1, $date2)
    {
        $s = strtotime($date2) - strtotime($date1);

        $d = intval($s/86400);
        $s -= $d*86400;
        $h = intval($s/3600);
        $s -= $h*3600;
        $m = intval($s/60);
        $s -= $m*60;

        return array("d"=>$d,"h"=>$h,"m"=>$m,"s"=>$s);
    }


    /**
     * Return an field holding the differences between 2 dates expressed
     * in units of the field requested
     *
     * Since the date fields can change depending on the date format,
     * the following convention is used when referring to date fields:<br />
     *   Field 1    ->     Year<br />
     *   Field 2    ->     Month<br />
     *   Field 3    ->     Day<br />
     *   Field 4    ->     Hour<br />
     *   Field 5    ->     Minute<br />
     *   Field 6    ->     Second<br />
     *
     * @param date1        The first date
     * @param date2        The second date
     * @param field        The field (unit) in which we want the different
     *
     * @return float The difference in units of the specified field
     */
    function getDatetimeDiff_AsField ($date1, $date2, $field)
    {
        $s    = strtotime($date2) - strtotime($date1);
        $diff = 0;

        if ($field == 1)
          $diff = $s/(60*60*24*31*12);
        else
        if ($field == 2)
          $diff = $s/(60*60*24*31);
        else
        if ($field == 3)
          $diff = $s/(60*60*24);
        else
        if ($field == 4)
          $diff = $s/(60*60);
        else
        if ($field == 5)
          $diff = $s/(60);
        else
          $diff = $s;

        return $diff;
    }


    /**
     * Calculate day-x of KW in a YEAR
     * @param day        0 for monday, 6 for sunday,....
     * @param kw        week of the year
     * @param year      year
     * @param flag      u or s (unixtimestamp or MySQLDate)
     *
     * @return: return = unixtimestamp or sqlDate
     */
    function getDateofKW ($day, $kw, $year, $flag='s')
    {
        $wday = date('w',mktime(0,0,0,1,1,$year)); // 1=Monday,...,7 = Sunday

        if ($wday <= 4)
          $firstday = mktime(0,0,0,1,1-($wday-1)+$day,$year);
        else
          $firstday = mktime(0,0,0,1,1+(7-$wday+1)+$day,$year);

        $month = date('m',$firstday);
        $year  = date('Y',$firstday);
        $day   = date('d',$firstday);

        $adddays = ($kw-1)*7;

        if ($flag != 's')
          $return = mktime(0,0,0,$month,$day+$adddays,$year);
        else
          $return = DateUtil::getDatetime(mktime(0,0,0,$month, $day+$adddays, $year));

        return $return;
    }


    /**
     * Return a the number of days in the given month/year
     *
     * @param month        The (human) month number to check
     * @param year          The year number to check
     *
     * @return integer    The number of days in the given month/year
     */
    function getDaysInMonth ($month, $year)
    {
        if ($month < 1 || $month > 12)
          return 0;

        $days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        $d = $days[$month-1];

        if ($month == 2)
        {
          // Check for leap year, no 4000 rule
          if ($year%4 == 0)
          {
            if ($year%100 == 0)
            {
              if ($year%400 == 0)
                $d = 29;
            }
            else
            {
              $d = 29;
            }
          }
        }

        return $d;
    }


    /**
     * Return an array of weekdays for the given month
     *
     * @param month        The (human) month number to check
     * @param year          The year number to check
     *
     * @return integer    The number of days in the given month/year
     */
    function getWeekdaysInMonth ($month, $year)
    {
        $nDays = DateUtil::getDaysInMonth ($month, $year);

        $weekdays = array();
        for ($i=1; $i<=$nDays; $i++)
        {
          $time = mktime (12, 0, 0, $month, $i, $year);
          $tDate = getdate ($time);
          $weekdays[$i] = $tDate['wday'];
        }

        return $weekdays;
    }


    /**
     * Return an array of dates for the given month
     *
     * @param month        The (human) month number to check
     * @param year          The year number to check
     *
     * @return integer    The number of days in the given month/year
     */
    function getMonthDates ($month, $year)
    {
        $dates = array();
        $days = DateUtil::getDaysInMonth ($month, $year);

        for ($i=1; $i<=$days; $i++)
          $dates[$i] = DateUtil::buildDatetime ($year, $month, $i);

        return $dates;
    }
}
?>