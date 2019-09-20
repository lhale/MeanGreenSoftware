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
 *  Purpose of file: cache utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


Loader::loadClass ('ArrayUtil');
Loader::loadClass ('DateUtil');
Loader::loadClass ('FileUtil');


define ('_V4B_CACHE_MAIN',         'Cache');
define ('_V4B_CACHE_LIMITS',         'CacheLimits');
define ('_V4B_CACHE_STATS',         'CacheStats');
define ('_V4B_CACHE_TIMES',         'CacheTimes');
define ('_V4B_CACHE_EXPIRATION',     '__EXPIRATION__');
define ('_V4B_CACHE_MAXSIZE',         '__MAXSIZE__');
define ('_V4B_CACHE_STATS_EXPIRED',     '__STATS_EXPIRED__');
define ('_V4B_CACHE_STATS_INSERT',     '__STATS_INSERT__');
define ('_V4B_CACHE_STATS_HIT',     '__STATS_HIT__');
define ('_V4B_CACHE_STATS_MISS',     '__STATS_MISS__');
define ('_V4B_CACHE_STATS_REMOVE',     '__STATS_REMOVE__');
define ('_V4B_CACHE_TIMESTAMPS',     '__TIMESTAMPS__');



class CacheUtil
{
    /*
     * Return the specified cache
     *
     * @param cacheName     The name of the cache we wish to obtain
     * @param doInitialize  Wether or not to initialize the cache if it doesn't exist
     * @param maxsize       The maximum size of the cache (for initialization)
     * @param expirationTime The time cache entries remain valid (for initialization)
     *
     * @return              The requested cache
     */
    function getCache ($cacheName, $doInitialize, $maxsize=0, $expirationTime=0)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        // see if we have read & unserialized the cache file already
        $cache = $GLOBALS['Cache'][$cacheName];
        if ($cache)
            return $cache;

        // nothing in $GLOBALS -> look for cache file
        $cache  = false;
        global $v4bConfig;
        $tmpdir = $v4bConfig['V4B_FILE_TMP_PATH'];
        $fname  = $tmpdir.'/v4bcache_'.$cacheName;
        $isInitialized = file_exists($fname);

        if ($isInitialized)
            $cache = FileUtil::readSerializedFile ($fname);
        else
        if (!$isInitialized && $doInitialize)
            $cache = CacheUtil::initCache ($cacheName, $maxsize, $expirationTime);

        if ($cache)
            $GLOBALS['V4BCache'][$cacheName] = &$cache;

        return $cache;
    }


    /*
     * Initialize the specified cache
     *
     * @param cacheName     The name of the cache we wish to obtain
     * @param maxsize       The maximum size of the cache (for initialization)
     * @param expirationTime The time cache entries remain valid (for initialization)
     *
     * @return              The newly initialized cache
     */
    function initCache ($cacheName, $maxsize=0, $expirationTime=0)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
          return false;

        if (!$cacheName)
            v4b_exit ("Invalid cache name [" + $cacheName + "]");

        // ensure we have a valid maxsize param
        if ($maxsize < 0)
            v4b_exit ("Unable to determine max size for LRU cache [" + $cacheName + "]");

        // ensure we have a valid expirationSize param
        //if (!$expirationTime)
           //$expirationTime = $GLOBALS[_V4B_CACHE_LIMITS][$cacheName][_V4B_CACHE_EXPIRATION];
        if ($expirationTime < 0)
            $expirationTime = 0;

        // initialize cache
        $cache = array();
        $cache[_V4B_CACHE_MAIN]  = array ();
        $cache[_V4B_CACHE_STATS] = array ();
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_MAXSIZE]       = $maxsize;
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_EXPIRATION]    = $expirationTime;
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_STATS_EXPIRED] = 0;
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_STATS_INSERT]  = 0;
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_STATS_HIT]     = 0;
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_STATS_MISS]    = 0;
        $cache[_V4B_CACHE_STATS][_V4B_CACHE_STATS_REMOVE]  = 0;

        // if we have a valid expirationTime, we create a
        // sub-array which is used to store timestamps
        if ($expirationTime)
            $cache[_V4B_CACHE_TIMES] = array();

        global $v4bConfig;
        $tmpdir = $v4bConfig['V4B_FILE_TMP_PATH'];
        $fname  = $tmpdir.'/v4bcache_'.$cacheName;
        FileUtil::writeSerializedFile ($fname, $cache);

        return $cache;
    }


    /*
     * Delete the specified cache
     *
     * @param cacheName     The name of the cache we wish to obtain
     *
     * @return              A Boolean indicating success or failure
     */
    function deleteCache ($cacheName)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        $tmpdir = $v4bConfig['V4B_FILE_TMP_PATH'];
        $fname  = $tmpdir.'/v4bcache_'.$cacheName;

        return @unlink($fname);
    }


    /*
     * Check if an particular cache uses expiration
     *
     * @param cache         The cache object we wish to examine
     *
     * @return              A Boolean indicating the expiration mode of the cache
     */
    function isExpiring (&$cache)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        if ($cache[_V4B_CACHE_STATS][_V4B_CACHE_EXPIRATION])
            return true;

        return false;
    }


    /*
     * Check if an particular entry exists in the specified cache
     *
     * @param cacheName     The name of the cache we wish to check in
     * @param key           The key for whose existance in the cache we're checking
     *
     * @return              A Boolean indicating wether or not the specified key exists in the cache
     */
    function haveKey ($cacheName, $key)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        if (!$cacheName) v4b_exit ("CacheUtil::haveKey: Invalid cache name [" + $cacheName + "]");
        if (!$key)       v4b_exit ("CacheUtil::haveKey: Invalid cache key [" + $key + "]");

        if (CacheUtil::get($cacheName, $key))
            return true;

        return false;
    }


    /*
     * Get a value from the specified cache
     *
     * @param cacheName     The name of the cache we wish to check in
     * @param key           The key whose value we wish to obtain
     *
     * @return              The key value or the Boolean false if the key doesn't exist in the cache
     */
    function get ($cacheName, $key)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        if (!$cacheName) v4b_exit ("CacheUtil::get: Invalid cache name [" + $cacheName + "]");
        if (!$key)       v4b_exit ("CacheUtil::get: Invalid cache key [" + $key + "]");

        global $v4bConfig;
        $tmpdir = $v4bConfig['V4B_FILE_TMP_PATH'];
        $fname  = $tmpdir.'/v4bcache_'.$cacheName;

        $cache = &CacheUtil::getCache ($cacheName, true);
        $data  = &$cache[_V4B_CACHE_MAIN];
        $stats = &$cache[_V4B_CACHE_STATS];
        $times = &$cache[_V4B_CACHE_TIMES];

        $getFromCache = false;

        // check if the specified cache key is set -> if not return false
        if (!isset($data[$key]))
        {
            $stats[_V4B_CACHE_STATS_MISS] += 1;
            FileUtil::writeSerializedFile ($fname, $cache);
            return false;
        }

        $val = $data[$key];

        // check if we're dealing with an expiring cache
        if (CacheUtil::isExpiring($cache))
        {
            $timestamp = $times[$key];
            $now = DateUtil::getDatetime ();
            $diff = DateUtil::getDatetimeDiff_AsField ($timestamp, $now, 6);

            // if the entry is too old, expire it
            if ($diff > $stats[_V4B_CACHE_STATS_EXPIRATION])
            {
                unset($data[$key]);
                unset($times[$key]);
                $stats[_V4B_CACHE_STATS_EXPIRED] += 1;
                FileUtil::writeSerializedFile ($fname, $cache);
                return false;
            }
            else
                $getFromCache = true;
        }
        else
            $getFromCache = true;

        if ($getFromCache)
        {
            // remove and re-insert into array in order
            // to keep the LRU order intact
            unset($data[$key]);
            $data[$key] = $val;
            if (CacheUtil::isExpiring($cache))
            {
                unset($times[$key]);
                $times[$key] = strtotime(DateUtil::getDatetime()) + $stats[_V4B_CACHE_STATS_EXPIRATION];
            }
            $stats[_V4B_CACHE_STATS_HIT] += 1;
            FileUtil::writeSerializedFile ($fname, $cache);
            return $val;
        }

        return false;
    }


    /*
     * Put a value into the specified cache
     *
     * @param cacheName     The name of the cache we wish to check in
     * @param key           The key under which the value should be stored
     * @param value         The value we wish to store
     */
    function put ($cacheName, $key, $value)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        if (!$cacheName) v4b_exit ("CacheUtil::put: Invalid cache name [" + $cacheName + "]");
        if (!$key)       v4b_exit ("CacheUtil::put: Invalid cache key [" + $key + "]");

        global $v4bConfig;
        $tmpdir = $v4bConfig['V4B_FILE_TMP_PATH'];
        $fname  = $tmpdir.'/v4bcache_'.$cacheName;

        $cache = &CacheUtil::getCache ($cacheName, true);

        $data  = &$cache[_V4B_CACHE_MAIN];
        $stats = &$cache[_V4B_CACHE_STATS];
        $times = &$cache[_V4B_CACHE_TIMES];

        // if this key doesn't exist we're inserting a new
        // value and have to check for cache sizing
        if (!isset($data[$key]))
        {
            // if cache is too big, remove the oldest(first) item
            if ($stats[_V4B_CACHE_MAXSIZE] > 0 && count($data) >= $stats[_V4B_CACHE_MAXSIZE])
            {
                array_shift ($data);

                // check if we're dealing with an expiring cache
                if (CacheUtil::isExpiring ($cache))
                    array_shift ($times);

                $stats[_V4B_CACHE_STATS_REMOVE] += 1 ;
            }
        }

        // insert value into cache
        $data[$key] = $value;
        $stats[_V4B_CACHE_STATS_INSERT] += 1;

        // if we're dealing with an expiring cache set the entry's timestamp
        if (CacheUtil::isExpiring ($cache))
            $times[$key] = strtotime(DateUtil::getDatetime()) + $stats[_V4B_CACHE_STATS_EXPIRATION];

        FileUtil::writeSerializedFile ($fname, $cache);
    }


    /*
     * Remove a value from the specified cache
     *
     * @param cacheName     The name of the cache we wish to delete from
     * @param key           The key whose value we wish to remove from the cache
     *
     * @return              The removed value or the boolean false
     */
    function remove ($cacheName, $key)
    {
        global $v4bConfig;
        if ($v4bConfig['V4B_USE_CACHING'] === false)
            return false;

        if (!$cacheName) v4b_exit ("CacheUtil::remove: Invalid cache name [" + $cacheName + "]");
        if (!$key)       v4b_exit ("CacheUtil::remove: Invalid cache key [" + $key + "]");

        $cache = &CacheUtil::getCache ($cacheName, true);

        $data  = &$cache[_V4B_CACHE_MAIN];
        $stats = &$cache[_V4B_CACHE_STATS];
        $times = &$cache[_V4B_CACHE_TIMES];

        if (!isset($data[$key]))
            return false;

        $val = $data[$key];
        unset($cache[$key]);
        if (CacheUtil::isExpiring($cache))
            unset($times[$key]);

        $stats[_V4B_CACHE_STATS_REMOVE] += 1 ;

        global $v4bConfig;
        $tmpdir = $v4bConfig['V4B_FILE_TMP_PATH'];
        $fname  = $tmpdir.'/v4bcache_'.$cacheName;
        FileUtil::writeSerializedFile ($fname, $cache);

        return $val;
    }
}
?>