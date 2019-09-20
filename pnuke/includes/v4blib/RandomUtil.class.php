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
 *  Purpose of file: random generation utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class RandomUtil
{
    /**
     * Return a seed value for the srand() function
     *
     * @return The resulting seed value
     */
    function getSeed ()
    {
        $factor = 95717; // prime
        list($usec, $sec) = explode(" ", microtime());
        return (double) strrev(($usec)*$factor/M_PI);
    }


    /**
     * Return a random integer between $floor and $ceil (inclusive)
     *
     * @param floor     The lower bound
     * @param ceil      The upper bound
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random integer
     */
    function getInteger ($floor, $ceil, $seed=true)
    {
        if ($seed)
            srand(RandomUtil::getSeed());

        $diff = $ceil - $floor;

        // mr_rand seems to sometimes generate idential
        // series of random numbers. rand seems to do better.
        //$inc  = mt_rand (0, $diff);
        $inc  = rand (0, $diff);

        return $floor + $inc;
    }


    /**
     * Return a random string of specified length. This function uses
     * uses md5() to generate the string.
     *
     * @param length    The length of string to generate
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random integer
     */
    function getRandomString ($length, $seed=true)
    {
        $res = '';

        if ($seed)
            srand(RandomUtil::getSeed());

        while (strlen($res) < $length)
            $res .= md5(RandomUtil::getInteger (0, 100000));

        return substr ($res, 0, $length);
    }


    /**
     * Return a random string
     *
     * @param minLen    The minimum string length
     * @param maxLen    The maximum string length
     * @param leadingCapital Wether or not the string should start with a capital letter (optional) (default=true)
     * @param useUpper      Wether or not to also use uppercase letters (optional) (default=true)
     * @param useLower      Wether or not to also use lowercase letters (optional) (default=true)
     * @param useSpace      Wether or not to also use whitespace letters (optional) (default=true)
     * @param useNumber     Wether or not to also use numeric characters (optional) (default=false)
     * @param useSpecial    Wether or not to also use special characters (optional) (default=false)
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random string
     */
    function getString ($minLen, $maxLen, $leadingCapital=true, $useUpper=true, $useLower=true,
                        $useSpace=false, $useNumber=false, $useSpecial=false, $seed=true)
    {
        $rnd     = '';
        $chars   = '';
        $upper   = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lower   = "abcdefghijklmnopqrstuvwxyz";
        $number  = "0123456789";
        $special = "~@#$%^*()_+-={}|][";

        if ($seed)
            srand(RandomUtil::getSeed());

        if ($useLower) $chars .= $lower;
        if ($useUpper) $chars .= $upper;
        if ($useNumber) $chars .= $number;
        if ($useSpecial) $chars .= $special;
        if ($useSpace)
            for ($i=0; $i<(strlen($chars)%10); $i++)
                $chars .= ' ';

        $len = RandomUtil::getInteger ($minLen, $maxLen);
        $clen = strlen($chars) - 1;
        for ($i=0; $i<$len; $i++)
            $rnd .= $chars[(RandomUtil::getInteger(0,$clen))];

        if ($leadingCapital)
            $rnd = ucfirst($rnd);

        return $rnd;
    }


    /**
     * Return a random sentence of nWords based on the dictionary
     *
     * @param nWords    The number of words to put in the sentence
     * @param dictArray    The array of dictionary words to use
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random date string
     */
    function getSentence ($nWords, $dictArray, $seed=true)
    {
        if (!$nWords)
            v4b_exit ('Invalid nWords passed to RandomUtil::getLanguageSentence ...');

        if (!$dictArray)
            v4b_exit ('Invalid dictArray passed to RandomUtil::getLanguageSentence ...');

        if ($seed)
            srand(RandomUtil::getSeed());

        //$dictArray = explode (' ', $dict);
        $nDictWords = count ($dictArray);
        $txt = '';

        $t = '';
        for ($i=0; $i<$nWords; $i++)
        {
          $rnd = RandomUtil::getInteger (0, $nDictWords);
          $word = $dictArray[$rnd];

          if ($i == 0)
              $word = ucfirst ($word);
          else
              $word = strtolower ($word);

          if (RandomUtil::getInteger(0, 10)==1 && $i<$nWords-1 && !strpos($word,',') && !strpos($word,'.'))
              $word .= ', ';

          if (strpos($word,'.') !== false)
              $word = substr($word, 0, -1);

          $t .= "$word ";
        }

        $txt .= substr($t, 0, -1) . '. ';
        return $txt;
    }


    /**
     * Return a nParas paragraphs of random text based on the dictionary
     *
     * @param nParas    The number of paragraphs to return to put in the sentence
     * @param dict        The dictionary to use (a space separated list of words)
     * @param irndS        The number of sentences in a paragraph (optional) (default=0=randomlyGenerated)
     * @param irndW        The number of words in a sentence (optional) (default=0=randomlyGenerated)
     * @param startCustomary Wether or not to start with the customary phrase (optional) (default=false)
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random date string
     */
    function getParagraphs ($nParas, $dict='', $irndS=0, $irndW=0, $startCustomary=false, $seed=true)
    {
        if (!$nParas)
            v4b_exit ('Invalid nParas passed to RandomUtil::getLanguageParagraphs ...');

        if (!$dict)
            v4b_exit ('Invalid dict passed to RandomUtil::getLanguageParagraphs ...');

        if ($seed)
            srand(RandomUtil::getSeed());

        $dictArray = explode (' ', $dict);
        $txt = '';
        for ($i=0; $i<$nParas; $i++)
        {
            if (!$irndS)
                $rndS = RandomUtil::getInteger (3, 7);
            else
                $rndS = $irndS;

            for ($j=0; $j<$rndS; $j++)
            {
                if (!$irndW)
                    $rndW = RandomUtil::getInteger (8, 25);
                else
                    $rndW = $irndW;

                $txt .= RandomUtil::getSentence ($rndW, $dictArray);
            }
            $txt .= "\n";
        }

        // start with first 5 words
        if ($startCustomary)
        {
            $pre = '';
        for ($i=0; $i<5; $i++)
            $pre .= $dictArray[$i] . ' ';

        $startLetter = substr ($txt, 0, 1);
            $txt = $pre . strtolower($startLetter) . substr($txt, 1);
        }

        return $txt;
    }


    /**
     * Return a random date between $startDate and $endDate
     *
     * @param startDate    The lower date bound
     * @param endDate    The high date bound
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random date string
     */
    function getDate ($startDate, $endDate, $seed=true)
    {
        if ($seed)
            srand(RandomUtil::getSeed());

        $t1 = strtotime($startDate);
        $t2 = strtotime($endDate);

        $diff = $t2 - $t1;
        $inc  = RandomUtil::getInteger(0, $diff);

        $tRand = $t1 + $inc;
        Loader::loadClass ('DateUtil');
        return DateUtil::getDatetime ($tRand);
    }


    /**
     * Return a random user-id
     *
     * @param seed      Wether or not to seed the random number generator (optional) (default=true)
     *
     * @return The resulting random user-id
     */
    function getUserID ($seed=true)
    {
        if ($seed)
            srand(RandomUtil::getSeed());

        $fa  = DBUtil::selectFieldArray ('users', 'uid');
        $pos = RandomUtil::getInteger(0, count($fa));
        return $fa[$pos];
    }


}

?>