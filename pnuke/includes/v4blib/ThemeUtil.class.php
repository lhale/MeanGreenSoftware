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
 *  Purpose of file: theme utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


define ('THEMETABLE_OPEN',     'to');
define ('THEMETABLE_CLOSE',     'tc');

define ('THEMEBOX_OPEN',      'bo');
define ('THEMEBOX_CLOSE',     'bc');


class ThemeUtil
{
    /**
     * Return the HTML codes to open or close a themetable
     *
     * @param mode      either THEMETABLE_OPEN or THEMETABLE_CLOSE
     * @param type      The format to use when formatting the date (optional) (default=='YmdHis')
     *
     * @return The (string) htmlcode
     */
    function themetable($mode, $type=1)
    {
        $theme = pnUserGetTheme();
        pnThemeLoad($theme);
        $output = new pnHTML();
        ob_start();

        if ($mode == THEMETABLE_OPEN)
        {
            if ($type == 1)
            {
                OpenTable();
            }
            else
        {
                OpenTable2();
            }
        }
        else
        if ($mode == THEMETABLE_CLOSE)
        {
            if ($type == 1)
            {
                CloseTable();
            }
            else
            {
                CloseTable2();
            }
        }
        else
            v4b_exit ("ThemeUtil::themetable: invalid mode [$mode] parameter passed");

        $table = ob_get_contents();
        ob_end_clean();
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text($table);

        return $output->GetOutput();
    }


    /**
     * Return the HTML codes to create a bounding themebox within a page.
     * This function opens an inner table in order to get rid of the
     * spacing and padding settings imposed by the bounding theme table.
     *
     * @param mode      either THEMEBOX_OPEN or THEMEBOX_CLOSE
     * @param bgcolor    the bgcolor to use (only required when passing $mode==$THEMEBOX_OPEN)
     * @param title      the title to use (optional) (only used when passing $mode==$THEMEBOX_OPEN)
     *
     * @return The (string) htmlcode
     */
    function themebox ($mode, $bgcolor='', $title='')
    {
        $output = new pnHTML();
        $output->SetInputMode(_PNH_VERBATIMINPUT);

        if ($mode == THEMEBOX_OPEN)
        {
            if (!$bgcolor)
                v4b_exit ("ThemeUtil::themebox: required bgcolor parameter missing");

            $output->Text("\n");
            $output->Text(ThemeUtil::themetable(THEMETABLE_OPEN));
            $output->TableStart();

            if ($title)
              {
              $output->TableRowStart();
              $output->TableColStart();
              $output->Text('<center>');
              $output->BoldText($title);
              $output->Text('</center>');
              $output->TableColEnd();
              $output->TableRowEnd();
              }

            $output->TableRowStart();
            $output->TableColStart();
            $output->Text('<table width="100%" align="left" cellpadding="1"
                            cellspacing="1" border="0" bgcolor="'.$bgcolor.'">');
            $output->Text('<tr><td>');
            $output->Text("\n");
        }
        else
        if ($mode == THEMEBOX_CLOSE)
        {
            $output->Text("\n");
            $output->Text('</td></tr>');
            $output->Text('</table>');
            $output->TableColEnd();
            $output->TableRowEnd();
            $output->TableEnd();
            $output->Text(ThemeUtil::themetable(THEMETABLE_CLOSE));
            $output->Text("\n");
        }
        else
            v4b_exit ("ThemeUtil::themebox: invalid mode [$mode] parameter passed");

        return $output->GetOutput();
    }


    /**
     * Return the HTML for a block sidebox
     *
     * @param modname    The module name
     * @param block        The block name
     * @param blockinfo    The blockinfo structure
     *
     * @return The (string) htmlcode
     */
    function themesidebox ($modname, $block, $blockinfo)
    {
        global $blocks_modules, $blocks_side;

        $output = new pnHTML();
        $output->SetInputMode(_PNH_VERBATIMINPUT);

        $ret = pnBlockLoad($modname, $block);
        $displayfunc = "{$modname}_{$block}block_display";
        if (function_exists($displayfunc))
        {
            // New-style blocks
            ob_start();
            echo $displayfunc($blockinfo);
            $block = ob_get_contents();
            ob_end_clean();
        }
        else
        {
            // Old-style blocks
            if (isset($blocks_modules[$block]['func_display']))
            {
                ob_start();
                echo $blocks_modules[$block]['func_display']($blockinfo);
                $block = ob_get_contents();
                ob_end_clean();
            }
            else
            {
                $blockinfo['title'] = "Block Type $block Not Found";
                $blockinfo['content'] = "The block type $block doesn't seem to exist.  Please check corresponding blocks-directory.";
                ob_start();
                echo themesideblock($blockinfo);
                $block = ob_get_contents();
                ob_end_clean();
            }
        }

        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text($block);
        return $output->GetOutput();
    }
}
?>