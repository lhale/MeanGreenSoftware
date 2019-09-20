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
 *  Purpose of file: logging utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class LogUtil
{
    /**
     * Print a debug message
     *
     * @param msg         The debug message to display
     */
    function debug ($msg)
    {
        if (!pnConfigGetVar('V4B_CONFIG_USE_LOG4_LOGGING'))
            return;

        $logger = LoggerManager::getLogger('debug');
        $logger->debug($msg);
    }


    /**
     * Log a message to the specified level and log stream
     *
     * @param msg         The debug message to display
     * @param level        The log4php log level (optional) (default=INFO)
     * @param log        The log4php log stream to write to
     */
    function log ($msg, $level='INFO', $log='')
    {
        if (!pnConfigGetVar('V4B_CONFIG_USE_LOG4_LOGGING'))
            return;

        if (!$log)
            $logger = LoggerManager::getRootLogger();
        else
            $logger = LoggerManager::getLogger($log);

        if (!$level)
            $level = 'INFO';

        if ($level == 'DEBUG')
            $logger->debug($msg);
        else
        if ($level == 'INFO')
            $logger->info($msg);
        else
        if ($level == 'WARN')
            $logger->warn($msg);
        else
        if ($level == 'ERROR')
            $logger->error($msg);
        else
        if ($level == 'FATAL')
            $logger->fatal($msg);
        else
            v4b_exit ("Invalid level [$level] in LogUtil::log");
    }
}
?>