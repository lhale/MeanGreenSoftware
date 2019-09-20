<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function htmlpages_pntables()
{
    // Initialise table array
    $pntable = array();

    // Get the name for the htmlpages item table.  
    $htmlpages = pnConfigGetVar('prefix') . '_htmlpages';

    // Set the table name
    $pntable['htmlpages'] = $htmlpages;

    // Set the column names. 
    $pntable['htmlpages_column'] = array('pid'       => 'pn_pid',
                                         'timest'    => 'pn_timest',
                                         'uid'       => 'pn_uid',
                                         'title'     => 'pn_title',
                                         'printlink' => 'pn_printlink',
                                         'content'   => 'pn_content');

    // Return the table information
    return $pntable;
}
