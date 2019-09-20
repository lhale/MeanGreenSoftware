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
 *  Original Author of file: Jim McDonald
 *  Extensive Modifications by: Robert Gasch
 *  Maintainer Contact: RNG@open-star.org
 *  Purpose of file: database utililty class
 *  Copyright: Jim McDonald, Robert Gasch, value4business GmbH
 *  ---------------------------------------------------------------------- 
 */


function pnRender_v4b_pnmenublock_info()
{
    return array(
    'module'         => 'pnRender',
    'text_type'      => 'v4b_pnMenu',
    'text_type_long' => 'v4b pnRender Menublock',
    'allow_multiple' => true,
    'form_content'   => false,
    'form_refresh'   => false,
    'show_preview'   => true
    );

}


function pnRender_v4b_pnmenublock_init()
{
    pnSecAddSchema('v4bMenublock::', 'Block title:LinkID:');
}


function pnRender_v4b_pnmenublock_display ($row)
{
    // Generic check
    if (!pnSecAuthAction(0, 'v4bMenublock::', "$row[title]::", ACCESS_READ))
        return;

    // Break out options from our content field
    $vars = pnBlockVarsFromContent($row['content']);
    $title = $row['title'];
    $lang = pnUserGetLang();
    $defaultlang = pnConfigGetVar('language');
    $allowed_links = array();
    $c = 1;

    // Build Content Array
    if (!empty($vars['content']))
    {
        $all_links = unserialize( $vars['content'] );
        // update hack
        // we can now define language dependend URLs for the link. This means we have to upgrade
        // the old data array (url = string) to a new format (url = array of urls)
        if( !is_array( $all_links[0]['url'] ) )
        {
            // string!
            updateLinklist( $all_links );
        }

	foreach ($all_links as $k => $link)
        {
            if (pnSecAuthAction(0, 'v4bMenublock::', $title.':'.$link['id'].':', ACCESS_READ))
            {
                // get display name, default to default-language name if none exists
                $langName = $link['name'][$lang];

                if (!$langName)
                    $langName = $link['name'][$defaultlang];

                $allowed_link = array();
                $allowed_link['id']    = $link['id'];
                $allowed_link['name']  = $langName;
                $allowed_link['depth'] = (isset($link['depth']) ? (int)$link['depth'] : 0);
                $allowed_link['newwin']= (isset($link['newwin']) ? (boolean)$link['newwin'] : '');
                $allowed_link['url']   = (isset($link['url'][$lang]) ? $link['url'][$lang] : '');
                // Used to allow support for linking to modules with the use of bracket
                
                if(!empty($allowed_link['url'])) 
                {
                    if (strpos ($allowed_link['url'], '[') === 0)
                    {
                        $url = explode(':', substr($allowed_link['url'], 1, -1));
                        $allowed_link['url'] = 'modules.php?op=modload&name='.$url[0].'&file='.((isset($url[1])) ? $url[1]:'index');
                    }
                    else
                    if (strpos ($allowed_link['url'], '{') === 0)
                    {
                        $url = explode(':', substr($allowed_link['url'], 1, -1));
                        $allowed_link['url'] = 'index.php?module='.$url[0].'&func='.((isset($url[1])) ? $url[1]:'main');
                    }
    
                }

                // append cm (current_menu) info to URL
                if (strpos($allowed_link['url'], 'http://') === false && strpos($allowed_link['url'], 'https://') === false)
		{
                    if (strpos($allowed_link['url'], '?') !== false)
                        $allowed_link['url'] .= '&cm=' . $c . '&cb=' . $row['bid'];
                    else
                        $allowed_link['url'] .= '?cm=' . $c . '&cb=' . $row['bid'];
		}

                // now fix up the '&' characters to they're W3C compliant
                $allowed_link = str_replace ('&amp;', '&', $allowed_link);
                $allowed_link = str_replace ('&', '&amp;', $allowed_link);

                $allowed_links[$c++] = $allowed_link;
            }
        }
    }

    $pnr =& new pnRender('pnRender');
    $pnr->caching = false;
    $pnr->assign ('displaywaiting', ($vars['displaywaiting'] == 1 ? true : false));
    $pnr->assign ('displaymodules', ($vars['displaymodules'] == 1 ? true : false));
    $pnr->assign ('blockid', _getBlockID($title));
    $pnr->assign ('linklist', $allowed_links);

    if(!isset($vars['templatefile']))
        $vars['templatefile'] = 'v4b_pnmenu_list.html'; 

    $content = $pnr->fetch ($vars['templatefile']);
    if ($content)
    {
        $row['content'] = $content;
        $row['title']   = $vars['blocktitle'][$lang];
        return themesideblock($row);
    }
}


function pnRender_v4b_pnmenublock_modify ($row)
{
    $linklist = null;

    // if we have a URL request to move a block, do it now
    if (isset($_GET['lid']) && (int)$_GET['lid'] && $_GET['direction'])
      $linklist = &_moveLink ();

    // Break out options from our content field
    $vars = pnBlockVarsFromContent($row['content']);
    
    
    if (empty($vars['templatefile']))
        $vars['templatefile'] = 'v4b_pnmenu_list.html'; 
     
    $row['content'] = '';

    if (!$linklist)
    {
        if (!empty($vars['content']))
            $linklist =& unserialize( $vars['content'] );
            // update hack
        // we can now define language dependend URLs for the link. This means we have to upgrade
        // the old data array (url = string) to a new format (url = array of urls)
        if( !is_array( $linklist[0]['url'] ) )
        {
            // string!
            updateLinklist( $linklist );
        }
    } 
    else
    if (!$_GET['direction']) // only initialize if we didn't move (== empty list)
    {
            $linklist = array();
    }
    
    // we have to check here if a new language has been added or a language that we have
    // used has been removed in the meantime
    // if yes, we have to expand or shrink the language arrays
    require_once ('includes/v4blib/LanguageUtil.class.php');
    $languages = LanguageUtil::getLanguages();
    if (count($languages) > count($vars['blocktitle']))
    {
        $defaultlang = pnConfigGetVar('language');

        // more languages as before - expand the arrays
        $newlangs = array_flip($languages);
        foreach ($vars['blocktitle'] as $key=>$data)
           unset($newlangs[$key]);

        $newlangs = array_flip( $newlangs );
        if (count($newlangs) > 0)
        {
            foreach ($newlangs as $newlang)
            {
                $vars['blocktitle'][$newlang] = '';
                $linklistsize = count($linklist);
                for ($cnt=0; $cnt<$linklistsize; $cnt++)
                {
                    $linklist[$cnt]['name'][$newlang] = $linklist[$cnt]['name'][$defaultlang];
                    $linklist[$cnt]['desc'][$newlang] = $linklist[$cnt]['desc'][$defaultlang];
                    $linklist[$cnt]['url'][$newlang]  = $linklist[$cnt]['url'][$defaultlang];
                }
            }
        }
    }
    else
    {
        // less languages as before - shrink the arrays
        $newlangs = array_flip($languages);
        $oldlangs = array_flip(array_keys($vars['blocktitle']));
        foreach ($newlangs as $key=>$data)
           unset($oldlangs[$key]);

        $oldlangs = array_flip( $oldlangs );
        if (count($oldlangs) > 0)
        {
            foreach ($oldlangs as $oldlang)
            {
                unset($vars['blocktitle'][$oldlang]);
		$linklistsize = count($linklist);
                for ($cnt=0; $cnt<$linklistsize; $cnt++)
                {
                    unset ($linklist[$cnt]['name'][$oldlang]);
                    unset ($linklist[$cnt]['desc'][$oldlang]);
                    unset($linklist[$cnt]['url'][$oldlang]);
                }
            }
        }
    }

    $pnr =& new pnRender('pnRender');
    $pnr->caching = false;
    $pnr->assign ('vars', $vars);
    $pnr->assign ('row', $row);
    $pnr->assign ('blockid', _getBlockID($row['title'] ));
    $pnr->assign ('linklist', $linklist);
    $pnr->assign ('authid', pnSecGenAuthKey('Blocks'));
    $pnr->assign ('languages', $languages);
    $pnr->assign ('rnd', time());
    return $pnr->fetch ('pnmenu_config.html');
}


function pnRender_v4b_pnmenublock_update ($row)
{ 
    // Break out options from our content field
    $vars = pnBlockVarsFromContent($row['content']);
    list ($vars['displaymodules'], $vars['displaywaiting'], $vars['highLinkID'], $vars['templatefile']) = 
          pnVarCleanFromInput('displaymodules', 'displaywaiting', 'highLinkID', 'templatefile' );

    // Defaults
    if (empty($vars['displaymodules']))
        $vars['displaymodules'] = 0;

    if (empty($vars['displaywaiting']))
        $vars['displaywaiting'] = 0;

    if (empty($vars['templatefile']))
        $vars['templatefile'] = 'v4b_pnmenu_list.html'; 

    require_once ('includes/v4blib/LanguageUtil.class.php');
    $languages = LanguageUtil::getLanguages();
    $blocktitle = array();
    foreach ($languages as $language)
        $blocktitle[$language] = pnVarCleanFromInput( $language."_blocktitle" );

    $vars['blocktitle'] = $blocktitle;

    // first we take care about the link (changes), then we see the sequence change    
    // User links
    list ($linkid, $linkdepth, $linkdelete, $linkinsert, $linknewwin) = 
          pnVarCleanFromInput ('linkid', 'linkdepth', 'linkdelete', 'linkinsert', 'linknewwin');

    foreach( $languages as $language)
    {
        $linkname[$language] = pnVarCleanFromInput( $language."_linkname" );
        $linkdesc[$language] = pnVarCleanFromInput( $language."_linkdesc" );
        $linkurl[$language]  = pnVarCleanFromInput( $language."_linkurl" );
        
        $newlinkname[$language] = pnVarCleanFromInput( $language."_new_linkname" );
        $newlinkdesc[$language] = pnVarCleanFromInput( $language."_new_linkdesc" );
        $newlinkurl[$language]  = pnVarCleanFromInput( $language."_new_linkurl" );
        // check if at least one url is given, if not, then we do not add anything
        if($newlinkurlset==false)
        {
            $newlinkurlset = ( !empty($newlinkurl[$language]) ) ? true : false;
        }
    }

    $c = 0;
    $content = array();
    foreach ($linkid as $id)
    {
        if (isset($id))
        {
            if (!isset($linkdelete[$c]))
            {
                $linkline['id']    =  $id;
                
                $linkline['depth'] = $linkdepth[$c];
                $linkline['newwin'] = ($linknewwin[$c] ? 1 : 0);
                foreach( $languages as $language )
                {
                    $linkline['url'][$language]  = $linkurl[$language][$c];
                    $linkline['name'][$language] = $linkname[$language][$c];
                    $linkline['desc'][$language] = $linkdesc[$language][$c];
                }
                array_push ($content, $linkline);
            }

            if (isset($linkinsert[$c])) 
            {
                $vars['highLinkID']++;
                $linkline['id']    = $vars['highLinkID'];
                $linkline['depth'] = '';
                $linkline['newwin'] = 0;
                foreach( $languages as $language )
                {
                    $linkline['url'][$language]  = '';
                    $linkline['name'][$language] = '';
                    $linkline['desc'][$language] = '';
                }
                array_push ($content, $linkline);
            }
            $c++;
        }
    }

    $new_linkdepth = pnVarCleanFromInput( 'new_linkdepth' );
    $new_linknewwin = pnVarCleanFromInput( 'new_linknewwin' );
    if( $newlinkurlset == true )
    {
        $vars['highLinkID']++;
        $newline['id']    = $vars['highLinkID'];
        $newline['depth'] = $new_linkdepth;
        $linkline['newwin'] = $new_linknewwin;
        foreach( $languages as $language)
        {
            $newline['name'][$language] = $newlinkname[$language];
            $newline['desc'][$language] = $newlinkdesc[$language];
            $newline['url'][$language]  = $newlinkurl[$language];
        }
        array_push( $content, $newline);
    }

    // now the sequence change, if requested
    $linkmove = pnVarCleanFromInput( 'linkmove' );

    if( isset($linkmove)  )
    {
        // change the sequence
        foreach( $linkmove as $lid=>$ldir )
        {
            $newcontent = array();
            switch( strtolower($ldir) )
            {
                case 'up':
                    end ($content);
                    for ($j=0; $j<count($content); $j++)
                    {
                        $temp = current($content);
                        if ($temp['id'] == $lid)
                        {
                            prev ($content);
                            array_push ($newcontent, current($content));
                            array_push ($newcontent, $temp );
                        }
                        else
                        {
                            array_push ($newcontent, current($content));
                        }
                        prev ($content);
                    }
                    array_pop ($newcontent);
                    $newcontent = array_reverse ($newcontent);
                    break;

                case 'down':
                    for($j=0; $j<count($content); $j++)
                    {
                        $temp = current ($content);
                        if( $temp['id'] == $lid )
                        {
                            next ($content);
                            array_push ($newcontent, current($content));
                            array_push ($newcontent, $temp);
                        }
                        else
                        {
                            array_push ($newcontent, current($content));
                        }
                        next ($content);
                    }
                    array_pop ($newcontent);
                    break;

                default:
                    $newcontent = $content;
            }
            $content = $newcontent;
        }
    }

    $vars['content'] = serialize($content);
    $row['content']=pnBlockVarsToContent($vars);
    return($row);
}


function &_moveLink ()
{
    $bid = (int)pnVarCleanFromInput ('bid');
    $lid = (int)pnVarCleanFromInput ('lid');
    $direction = pnVarCleanFromInput ('direction');

    $blockinfo = pnBlockGetInfo($bid);
    $content1 =& unserialize ($blockinfo['content']);
    $content2 =& unserialize ($content1['content']);

    // since we don't have an associative array, 
    // we need to find the block offset/position here 
    $lidOffset = -1;
    $size = count($content2);
    for ($i=0; $i<$size && $lidOffset==-1; $i++)
        if ($content2[$i]['id'] == $lid)
	    $lidOffset = $i;

    //require_once ('includes/v4blib/debug.php');
    //prayer ($content2[$lidOffset]);
    //print ("$bid, $lid, $direction, $lidOffset<br>");
    //prayer ($content1);
    //prayer ($content2);
    //exit();

    if ($lidOffset == -1)
        v4b_exit ("Unable to determine link offset [$lid] in moveLink ...");

    if ($direction == 'down')
    {
        $t = $content2[$lidOffset+1];
        $content2[$lidOffset+1] = $content2[$lidOffset];
        $content2[$lidOffset] = $t;
    }
    else
    if ($direction == 'up')
    {
        $t = $content2[$lidOffset-1];
        $content2[$lidOffset-1] = $content2[$lidOffset];
        $content2[$lidOffset] = $t;
    }
    else
        v4b_exit ("Invalid direction [$direction] in moveLink ...");

    // now write the changed block info back to the DB 
    $content1['content'] = serialize ($content2);
    $content = serialize ($content1);

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    $blockstable = $pntable['blocks'];
    $blockscolumn = &$pntable['blocks_column'];

    $sql = "UPDATE $blockstable
            SET $blockscolumn[content]='" . pnVarPrepForStore($content) . "'
            WHERE $blockscolumn[bid]='" . (int)pnVarPrepForStore($bid)."'";
    $dbconn->Execute($sql);
    return $content2;
}


function _getBlockID ($bname)
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $blockstable  = $pntable['blocks'];
    $blockscolumn = &$pntable['blocks_column'];

    $sql = "SELECT $blockscolumn[bid]
            FROM $blockstable
            WHERE $blockscolumn[title] = '$bname' AND $blockscolumn[bkey] ='v4b_pnmenu'";
    $result = $dbconn->Execute($sql);

    if ($result)
        return $result->fields[0];

    return false;
}

function updateLinklist( &$linklist )
{
    for( $cnt = 0; $cnt < count( $linklist ); $cnt++ )
    {
        $originalurl = $linklist[$cnt]['url'];
        unset( $linklist[$cnt]['url'] );
        $linklist[$cnt]['url'] = array();
        foreach( $linklist[$cnt]['desc'] as $lang=>$desctext )
        {
            $linklist[$cnt]['url'][$lang] = $originalurl;
        }
    }
    return;
}

?>