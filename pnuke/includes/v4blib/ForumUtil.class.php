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
 *  Purpose of file: forum (pnForum) utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ForumUtil
{
    /**
     * Return a forum category object
     *
     * @param cid         The forum category ID to retrieve
     *
     * @return The resulting forum category object
     */
    function getCategory ($cid)
    {
        $cid      = (int)$cid;
        $where    = "WHERE cat_id=$cid";
        return DBUtil::selectObject ('pnforum_categories', $where);
    }


    /**
     * Return a forum object.
     *
     * @param fid         The forum ID to retrieve
     *
     * @return The resulting forum object
     */
    function getForum ($fid)
    {
        $fid   = (int)$fid;
        $where = "WHERE forum_id=$fid";
        return DBUtil::selectObject ('pnforum_forums', $where);
    }


    /**
     * Return a forum topic object.
     *
     * @param tid         The topic ID to retrieve
     *
     * @return The resulting forum object
     */
    function getForumTopic($tid)
    {
        $tid   = (int)$tid;
        $where = "WHERE topic_id=$tid";
        return DBUtil::selectObject ('pnforum_topics', $where);
    }


    /**
     * Return a topics for the given forum ID
     *
     * @param fid         The forum ID for which we want to get the topics
     *
     * @return The resulting forum object
     */
    function getTopicsForForum ($fid)
    {
        $fid    = (int)$fid;
        $where  = "WHERE forum_id=$fid";
        $sort   = "ORDER BY topic_title";
        return DBUtil::selectObjectArray ('pnforum_topics', $where);
    }


    /**
     * Return a path for a given topic
     *
     * @param tid         The topic-ID for which we want to get the topics
     *
     * @return The resulting object path
     */
    function getTopicPath ($tid)
    {
        $topic    = ForumUtil::getTopic($tid);
        $forum    = ForumUtil::getForum($topic['forum_id']);
        $category = ForumUtil::getCategory($forum['cat_id']);

        $path = "$category[cat_title]/$forum[forum_name]/$topic[topic_title]";
        return $path;
    }


    /**
     * Guppy Form Handler
     *
     * @param string $handler
     * @param array $args
     */
    function guppyForm($handler, $args)
    {
        if(!isset($handler)) {
            pn_exit('$handler required');
        }

        if(!isset($args)) {
            pn_exit('$args not present');
        }

        if(!is_array($args)) {
            pn_exit('$args must be an array');
        }

        require_once 'includes/classes/guppy/guppy.php';
        $modinfo = pnModGetInfo(pnModGetIDFromName(pnModGetName()));
        $modname = $modinfo['directory'];
        $path = "$modname/pntemplates/guppy/$handler.php";
        if(is_readable("system/$path")) {
            require_once("system/$path");
        }
        else
        if (is_readable("modules/$path")) {
        	require_once("modules/$path");
        }else{
            pn_exit("handler: $handler not found");
        }

        if(!class_exists($handler)) {
            pn_exit("required class $handler is not defined");
        }

        $handlerClass = new $handler();
        if(!GuppyForm::decode($handlerClass)) {
            $handlerClass->newForm();
            $args = array_merge($args, array('data'    => $handlerClass->getFormData(),
                                             'options' => $handlerClass->getFormOptions()));
            GuppyForm::open($args);
        }

        return GuppyForm::output();

    }
}
?>