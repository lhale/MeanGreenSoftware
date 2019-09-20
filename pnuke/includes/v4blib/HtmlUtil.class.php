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
 *  Purpose of file: html utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class HtmlUtil
{
    /**
     * Return the HTML code for the specified date selector input box
     *
     * @param objectname    The name of the object the field will be placed in
     * @param htmlname    The html fieldname under which the date value will be submitted
     * @param dateFormat    The dateformat to use for displaying the chosen date
     * @param defaultString The String to display before a value has been selected
     * @param defaultDate   The Date the calendar should to default to
     *
     * @return The resulting HTML string
     */
    function buildCalendarInputBox ($objectname, $htmlname, $dateFormat,
                                    $defaultString='', $defaultDate='')
    {
        $html = '';

        if (!$htmlname)
          v4b_exit ('HtmlUtil::buildCalendarInputBox: Missing htmlname ...');
        if (!$dateFormat)
          v4b_exit ('HtmlUtil::buildCalendarInputBox: Missing dateFormat...');

        $fieldKey    = $htmlname;
        if ($objectname)
          $fieldKey  = $objectname.'['.$htmlname.']';

        $triggerName = 'trigger_'.$htmlname;
        $displayName = 'display_'.$htmlname;
        //$daFormat    = preg_replace ('/([a-z|A-Z])/', '%$1', $dateFormat); // replace 'x' -> '%x'

        $html .= '<span id="'.$displayName.'">'.$defaultString.'</span>';
        $html .= '&nbsp;';
        $html .= '<input type="hidden" name="'.$fieldKey.'" id="'.$htmlname.'" value="'.$defaultDate.'" />';
        $html .= '<img src="javascript/jscalendar/img.gif" id="'.$triggerName.'" style="cursor: pointer; border: 0px solid blue;" title="Date selector" alt="Date selector" onmouseover="this.style.background=\'blue\';" onmouseout="this.style.background=\'\'" />';

        $html .= '<script type="text/javascript"> Calendar.setup({';
        $html .= 'ifFormat    : "%Y-%m-%d %H:%M:00",'; // universal format, don't change this!
        $html .= 'inputField  : "'.$htmlname.'",';
        $html .= 'displayArea : "'.$displayName.'",';
        $html .= 'daFormat    : "'.$dateFormat.'",';
        $html .= 'button      : "'.$triggerName.'",';
        $html .= 'align       : "Tl",';

        if ($defaultDate)
          {
          $d = strtotime ($defaultDate);
          $d = date ('Y/m/d', $d);
          $html .= 'date : "'.$d.'",';
          }

        $html .= 'singleClick : true }); </script>';

        return $html;
    }


    function getSelector_ObjectArray ($modname, $objectType, $name, $field='id', $displayField='name',
                                      $where='', $sort='', $selected='', $defaultValue=0, $defaultText='',
                                      $displayField2=null, $submit=true, $disabled=false, $fieldSeparator=', ', $onchange='')
    {
        if (!$modname)
            v4b_exit ('Invalid modname passed to HtmlUtil::getSelector_ObjectArray ...');

        if (!$objectType)
            v4b_exit ('Invalid object name passed to HtmlUtil::getSelector_ObjectArray ...');

        if (!pnModDBInfoLoad($modname))
            return "Unavailable/Invalid modulename [$modname] passed to HtmlUtil::getSelector_ObjectArray";

        if (!SecurityUtil::checkPermission("$modname::$objectType", '::', ACCESS_OVERVIEW)) 
            return "Security Check failed for modulename [$modname] passed to HtmlUtil::getSelector_ObjectArray";

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText)
          $html .= "<option value=\"$defaultValue\">$defaultText</option>";

        $classname = Loader::loadClassFromModule ($modname, $objectType, true);
        if (!$classname)
            return "Unable to load class [$objectType] for module [$modname]";

        $class = new $classname ();
        $dataarray = $class->get ($where, $sort);

        foreach ($dataarray as $object)
        {
          $val   = $object[$field];
          $sel   = ($val==$selected ? 'selected="selected"' : '');
          $disp  = $object[$displayField];

          $disp2 = '';
          if ($displayField2)
             $disp2 = $fieldSeparator . $object[$displayField2];

          $html .= "<option value=\"$val\" $sel>$disp $disp2</option>";
        }

        $html .= '</select>';
        return $html;
    }


    function getSelector_FieldArray ($modname, $tablekey, $name, $field='id', $where='', $sort='', $selected='', 
                                     $defaultValue=0, $defaultText='', $assocKey='', $distinct=false, $submit=true, $disabled=false, $onchange='')
    {
        if (!$tablekey)
          v4b_exit ("Invalid tablekey [$tablekey] passed to HtmlUtil::getSelector_FieldArray ...");

        if (!$name)
          v4b_exit ("Invalid name [$name] passed to HtmlUtil::getSelector_FieldArray ...");

        Loader::loadClass ('DBUtil');

	if ($modname)
            pnModDBInfoLoad($modname, '', true);

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText)
          $html .= "<option value=\"$defaultValue\">$defaultText</option>";

        $fa = DBUtil::selectFieldArray ($tablekey, $field, $where, $sort, $distinct, $assocKey);

	foreach ($fa as $k=>$v)
            if ($v)
	    {
                $sel   = ($k==$selected ? 'selected="selected"' : '');
                $html .= "<option value=\"$k\" $sel>$v</option>";
	    }

        $html .= '</select>';
        return $html;
    }


    function getSelector_FieldArrayDistinct ($modname, $tablekey, $name, $field='id', $where='', $sort='',
                                             $selected='', $defaultValue=0, $defaultText='', $assocKey='', 
                                             $submit=true, $disabled=false, $onchange='')
    {
        return HtmlUtil::getSelector_FieldArray ($modname, $tablekey, $name, $field, $where, $sort, $selected, 
                                                 $defaultValue, $defaultText, $assocKey, true, $submit, $disabled, $onchange='');
    }


    /**
     * Return the HTML code for the values in a given category
     *
     * @param categoryPath  The identifying category path
     * @param name         The selector name
     * @param field        The categoru field to get for the value (optional) (default='value')
     * @param selected    The selected value (optional) (default='')
     * @param defaultValue     The default value of the selector (default=0) (optional)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param lang        The language for which to retrieve the domain values (optional, default='')
     * @param submit    Wether or not to auto-submit the form (optional) (default=false)
     * @param excludeList    A (string) list of IDs to exclude (optional) (default=null)
     * @param force        Wether or not to force DB getting (currently not used) (optional) (default=false)
     * @param disabled    Wether or not to disable selector (optional) (default=false)
     *
     * @return The resulting dropdown data
     */
    function getSelector_CategoryField ($categoryPath, $name, $field='value', $selected='',
                                        $defaultValue=0, $defaultText='', $lang='',
                                        $submit=false, $excludeList=null, $force=false, $disabled=false, $onchange='')
    {
        Loader::loadClass ('CategoryUtil');

        if (!$categoryPath)
          v4b_exit ('Invalid category name passed to HtmlUtil::getSelector_Category ...');

        if (!$name)
          v4b_exit ('Invalid selector name passed to HtmlUtil::getSelector_Category ...');

        if(!$lang)
          $lang = pnSessionGetVar('lang');

        //if ($_SESSION['pnCache']['categoryselectorbypath'][$categoryPath] && !$force)
        //return $_SESSION['pnCache']['categoryselectorbypath'][$categoryPath];

        $cats = CategoryUtil::getSubCategoriesByPath ($categoryPath, 'path', false);

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText)
          $html .= "<option value=\"$defaultValue\">$defaultText</option>";

        foreach ($cats as $cat)
        {
          $val   = $cat[$field];
          $sel   = ($val===$selected ? 'selected="selected"' : '');

          if (strpos($excludeList, ','.$cat[$field].',') === false)
          {
              $disp  = $cat['display_name'][$lang];
          if (!$disp)
              $disp = $cat['name'];

              $html .= "<option value=\"$val\" $sel>$disp</option>";
          }
        }
        $html .= '</select>';

        $_SESSION['pnCache']['categoryselectorbypath'][$categoryPath] = $html;
        return $html;
    }

    /**
     * Return the HTML code for the values in a given category
     *
     * @param categoryPath  The identifying category path
     * @param name         The selector name
     * @param selected    The selected value (optional) (default='')
     * @param defaultValue     The default value of the selector (default=0) (optional)
     * @param defaultText    The text of the default value (optional)
     * @param lang        The language for which to retrieve the domain values (optional, default = current language)
     *
     * @return The resulting dropdown data
     */
    function getSelector_Category ($categoryPath, $name, $selected='',
                                   $defaultValue=0, $defaultText='', $lang='', $onchange='')
    {
         return HtmlUtil::getSelector_CategoryField ($categoryPath, $name, $field='value', $selected='',
                                                     $defaultValue=0, $defaultText='', $lang='',$onchange='');
    }


    /**
     * Return the HTML code for the values in a given category
     *
     * @param categoryPath  The identifying category path
     * @param values        The values used to populate the defautl states (optional) (default=array())
     * @param namePrefix    The path/object prefix to apply to the field name (optional) (default='')
     * @param excludeList    A (string) list of IDs to exclude (optional) (default=null)
     * @param disabled    Wether or not the checkboxes are to be disabled (optional) (default=false)
     *
     * @return The resulting dropdown data
     */
    function getCheckboxes_CategoryField ($categoryPath, $values=array(), $namePrefix='',
                                          $excludeList=null, $disabled=false)
    {
        Loader::loadClass ('CategoryUtil');

        if (!$categoryPath)
          v4b_exit ('Invalid category name passed to HtmlUtil::getSelector_Category ...');

        if(!$lang)
          $lang = pnSessionGetVar('lang');

            //if ($_SESSION['pnCache']['categoryselectorbypath'][$categoryPath] && !$force)
                //return $_SESSION['pnCache']['categoryselectorbypath'][$categoryPath];

        $cats = CategoryUtil::getSubCategoriesByPath ($categoryPath, 'path', false, true, false, true, false, '', 'value');

        foreach ($cats as $k => $v)
        {
          $val   = $k;
          $fname = $val;
          if ($namePrefix)
              $fname = $namePrefix . '[' . $k . ']' ;

          if (strpos($excludeList, ','.$k.',') === false)
          {
              $disp  = $v['display_name'][$lang];
          if (!$disp)
              $disp = $v['name'];

              $html .= "<input type=\"checkbox\" name=\"$fname\" " . ( $values[$k] ? ' checked="checked" ' : '') . ( $disabled ? ' disabled="disabled" ' : '') . " />&nbsp;&nbsp;&nbsp;&nbsp;$disp<br />";
          }
        }

        return $html;
    }


    function getSelector_ModuleTables ($modname, $name, $selected='', $defaultValue=0, $defaultText='',
                                       $submit=false, $remove='', $disabled=false, $nStripChars=0, $onchange='')
    {
        if (!$modname)
          v4b_exit ('Invalid modname passed to HtmlUtil::getSelector_ModuleTables ...');

        if (!$name)
          v4b_exit ('Invalid name passed to HtmlUtil::getSelector_ModuleTables ...');

        $m = strtolower (str_replace ('pn', '', $modname));

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText)
          $html .= "<option value=\"$defaultValue\">$defaultText</option>";

        $tables = pnModDBInfoLoad($modname, '', true);

        foreach ($tables as $k => $v)
        {
            if (strpos($k, '_column') === false)
            {
                if (strpos($k, 'pn_') === 0)
                    $k = substr ($k, 4);

                if ($remove)
                    $k2= str_replace ($remove, '', $k);
                else
                    $k2 = $k;

                if ($nStripChars)
                    $k2 = ucfirst(substr($k2, $nStripChars));

                $sel   = ($k2==$selected ? 'selected="selected"' : '');
                $html .= "<option value=\"$k2\" $sel>$v</option>";
            }
        }

        $html .= '</select>';
        return $html;
    }


    function getSelector_TableFields ($modname, $tablename, $name, $selected='',
                                      $defaultValue=0, $defaultText='', $submit=false,
                                      $showSystemColumns=false, $disabled=false, $onchange='')
    {
        if (!$modname)
          v4b_exit ('Invalid modname passed to HtmlUtil::getSelector_TableFields ...');

        if (!$tablename)
          v4b_exit ('Invalid tablename passed to HtmlUtil::getSelector_TableFields ...');

        if (!$name)
          v4b_exit ('Invalid name passed to HtmlUtil::getSelector_TableFields ...');

        $m = strtolower (str_replace ('pn', '', $modname));

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText)
          $html .= "<option value=\"$defaultValue\">$defaultText</option>";

        $tables = pnModDBInfoLoad($modname, '', true);
        $colkey = $tablename . '_column';
        $cols   = $tables[$colkey];

        if (!$cols)
          v4b_exit ("Invalid column key [$colkey] in HtmlUtil::getSelector_ObjectArray ...");

        if (!$showSystemColumns)
        {
            $filtercols = array();
            ObjectUtil::addStandardFieldsToTableDefinition ($filtercols, '');
        }

        foreach ($cols as $k => $v)
        {
            if ($showSystemColumns)
        {
                $sel   = ($v==$selected ? 'selected="selected"' : '');
                $html .= "<option value=\"$v\" $sel>$k</option>";
        }
        else
        {
            if (!$filtercols[$k])
            {
                    $sel   = ($v==$selected ? 'selected="selected"' : '');
                    $html .= "<option value=\"$v\" $sel>$k</option>";
            }
        }
        }

        $html .= '</select>';
        return $html;
    }


    /**
     * Return the HTML code for the Yes/No dropdown
     *
     * @param selected    The value which should be selected (default=1) (optional)
     * @param name        The name of the generated selector (optional)
     *
     * @return The resulting HTML string
     */
    function getSelector_YesNo ($selected='1', $name='')
    {
      if (!$name)
        $name='permission';

      $vals = array ();
      $vals[0] = _V4B_TEXT_NO;
      $vals[1] = _V4B_TEXT_YES;

      $html = '<select name="'.$name.'">';
      for ($i=0; $i<sizeof($vals); $i++)
        {
        $sel = ($i==$selected ? 'selected="selected"' : '');
        $html = $html . "<option value=\"$i\" $sel>$vals[$i]</option>";
        }
      $html = $html . '</select>';

      return $html;
    }


    /**
     * Return the localized string for the specified yes/no value
     *
     * @param val        The value for which we wish to obtain the string representation
     *
     * @return The string representation for the selected value
     */
    function getSelectorValue_YesNo ($val)
    {
      $vals = array ();
      $vals[0] = _V4B_TEXT_NO;
      $vals[1] = _V4B_TEXT_YES;

      return $vals[$val];
    }


    /**
     * Return the dropdown data for the language selector
     *
     * @param includeAll     Wether or not to include the 'All' choice
     *
     * @return The string representation for the selected value
     */
    function getSelectorData_Language ($includeAll=true)
    {
        $lang = languagelist();
        $langlist = array ();
        $dropdown = array ();

        if ($includeAll)
          $dropdown[] = array ('id'=>'', 'name'=>_V4B_TEXT_ALL);

        $handle = opendir('language');
        while ($f = readdir($handle))
             if (is_dir("language/$f") && @$lang[$f])
                $langlist[$f] = $lang[$f];

        asort($langlist);

        foreach ($langlist as $k=>$v)
          $dropdown[] = array ('id'=>$k, 'name'=>$v);

        return $dropdown;
    }


    /**
     * Return the localized string for the given value
     *
     * @param value        The currently active/selected value
     *
     * @return The resulting HTML string
     */
    function getSelectorValue_Permission ($value)
    {
        $perms = array ();
        $perms[_V4B_PERMISSION_BASIC_PRIVATE] = _V4B_TEXT_PERMISSION_BASIC_PRIVATE;
        $perms[_V4B_PERMISSION_BASIC_GROUP] = _V4B_TEXT_PERMISSION_BASIC_GROUP;
        $perms[_V4B_PERMISSION_BASIC_USER] = _V4B_TEXT_PERMISSION_BASIC_USER;
        $perms[_V4B_PERMISSION_BASIC_PUBLIC] = _V4B_TEXT_PERMISSION_BASIC_PUBLIC;

        return $perms[$value];
    }


    /**
     * Return the HTML code for the Permission dropdown
     *
     * @param name        The name of the generated selector (optional) (default='permission')
     * @param selected    The value which should be selected (optional) (default=2)
     *
     * @return The resulting HTML string
     */
    function getSelector_Permission ($name='permission', $selected='U')
    {
        if (!$name)
          $name='permission';

        $perms = array ();
        $perms[_V4B_PERMISSION_BASIC_PRIVATE] = _V4B_TEXT_PERMISSION_BASIC_PRIVATE;
        $perms[_V4B_PERMISSION_BASIC_GROUP] = _V4B_TEXT_PERMISSION_BASIC_GROUP;
        $perms[_V4B_PERMISSION_BASIC_USER] = _V4B_TEXT_PERMISSION_BASIC_USER;
        $perms[_V4B_PERMISSION_BASIC_PUBLIC] = _V4B_TEXT_PERMISSION_BASIC_PUBLIC;
      //$perms[0] = _V4B_TEXT_PERMISSION_BASIC_PRIVATE;
      //$perms[1] = _V4B_TEXT_PERMISSION_BASIC_GROUP;
      //$perms[2] = _V4B_TEXT_PERMISSION_BASIC_PUBLIC;

        $html = '<select name="'.$name.'">';
        foreach ($perms as $k => $v)
        {
          $sel = ($k==$selected ? 'selected="selected"' : '');
          $html = $html . "<option value=\"$k\" $sel>$v</option>";
        }
        $html = $html . '</select>';

        return $html;
    }


    /**
     * Return the HTML code for the Permission Level dropdown
     *
     * @param name        The name of the generated selector (optional) (default='permission')
     * @param selected    The value which should be selected (optional) (default=2)
     *
     * @return The resulting HTML string
     */
    function getSelector_PermissionLevel ($name='permission', $selected='0')
    {
        $perms = array ();
        $perms[_V4B_PERMISSION_LEVEL_NONE] = _V4B_TEXT_PERMISSION_LEVEL_NONE;
        $perms[_V4B_PERMISSION_LEVEL_READ] = _V4B_TEXT_PERMISSION_LEVEL_READ;
        $perms[_V4B_PERMISSION_LEVEL_WRITE] = _V4B_TEXT_PERMISSION_LEVEL_WRITE;

        $html = '<select name="'.$name.'">';
        foreach ($perms as $k => $v)
        {
          $sel = ($k==$selected ? 'selected="selected"' : '');
          $html = $html . "<option value=\"$k\" $sel>$v</option>";
        }
        $html = $html . '</select>';

        return $html;
    }


    /**
     * Return the html for the PN user group selector
     *
     * @param name        The selector name
     * @param selectedValue    The currently selected value of the selector (optional) (default=0)
     * @param defaultValue     The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param allValue      The value to assign for the "All" choice (optional) (default=0)
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param excludeList    A (string) list of IDs to exclude (optional) (default=null)
     * @param submit    Wether or not to auto-submit the selector (optional) (default=false)
     * @param disabled    Wether or not to disable selector (optional) (default=false)
     *
     * @return The html for the user group selector
     */
    function getSelector_PNGroup ($name='groupid', $selectedValue=0,
                                  $defaultValue=0, $defaultText='',
                                  $allValue=0, $allText='', $excludeList='', $submit=false, $disabled=false, $onchange='')
    {
        Loader::loadClass ('UserUtil');

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        if ($allText)
          $html .= "<option value=\"$allValue\">$allText</option>";

        $where = '';
        $grouplist = UserUtil::getPNGroups ('', 'ORDER BY pn_name');
        foreach ($grouplist as $k => $v)
        {
            $id   = $v['gid'];
            $disp = $v['name'];
            if (strpos($excludeList, ",$id,") === false)
            {
                $sel = ($selectedValue==$id ? 'selected="selected"' : '');
                $html .= "<option value=\"$id\" $sel>$disp</option>";
            }
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * Return a PN array strcuture for the PN user dropdown box
     *
     * @param name        The selector name
     * @param selectedValue    The currently selected value of the selector (optional) (default=0)
     * @param defaultValue    The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param allValue    The value to assign for the "All" choice (optional) (default='')
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param excludeList    A (string) list of IDs to exclude (optional) (default=null)
     * @param submit    Wether or not to auto-submit the selector (optional) (default=false)
     * @param disabled    Wether or not to disable selector (optional) (default=false)
     *
     * @return The string for the user group selector
     */
    function getSelector_PNUser ($name='userid', $selectedValue=0,
                                 $defaultValue=0, $defaultText='',
                                 $allValue=0, $allText='', $excludeList='', $submit=false, $disabled=false, $onchange='')
    {
        Loader::loadClass ('UserUtil');

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        if ($allText)
          $html .= "<option value=\"$allValue\">$allText</option>";

        $where = '';
        if ($exclude)
          $where = "WHERE pn_uid NOT IN ($exclude)";

        $userlist = UserUtil::getPNUsers($where, 'ORDER BY pn_uname');
        foreach ($userlist as $k => $v)
        {
          $sel = ($selectedValue==$k ? 'selected="selected"' : '');
          $html .= "<option value=\"$k\" $sel>$v[uname]</option>";
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * Return the html for the PNModule selector
     *
     * @param name        The selector name
     * @param selectedValue    The currently selected value of the selector (optional) (default=0)
     * @param defaultValue    The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param allValue      The value to assign the "All" choice (optional) (default=0)
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param submit    Wether or not to auto-submit the selector
     * @param disabled    Wether or not to disable selector (optional) (default=false)
     *
     * @return The string for the user group selector
     */
    function getSelector_PNModule ($name='moduleName', $selectedValue=0,
                                   $defaultValue=0, $defaultText='',
                                   $allValue=0, $allText='', $submit=false, $disabled=false, $onchange='')
    {
        Loader::loadClass ('ModuleUtil');

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($onchange ? ' onchange="'.$onchange.'"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        if ($allValue)
          $html .= "<option value=\"$allValue\">$allText</option>";

        $where = '';
        $modlist = ModuleUtil::getModulesByState (3, 'name');
        foreach ($modlist as $v)
        {
          $name = $v['name'];
          $sel  = ($selectedValue==$name ? 'selected="selected"' : '');
          $html .= "<option value=\"$name\" $sel>$name</option>";
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * Return the html for the Addressbook companies
     *
     * @param name        The selector name
     * @param selectedValue    The currently selected value of the selector (optional) (default=0)
     * @param defaultValue    The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param allValue    The value to assign for the "All" choice (optional) (default=0)
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param submit    Wether or not to auto-submit the form (optional) (default=true)
     * @param disabled    Wether or not the selector is disabled (optional) (default=false)
     *
     * @return The string for the company selector
     */
    function getSelector_contactCompanies ($name='company', $selectedValue=0,
                                           $defaultValue=0, $defaultText='',
                                           $allValue=0, $allText='', $submit=true, $disabled=false)
    {
        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($submit)
          $html = '<select name="'.$name.'" onchange="this.form.submit();">';
        else
          $html = '<select name="'.$name.'">';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        if ($allValue)
          $html .= "<option value=\"$allValue\">$allText</option>";

        $where = '';
        $companies = ContactUtil::getCompanies ();
        foreach ($companies as $comp)
        {
          $name = $comp['name'];
          $val  = $comp['id'];
          $sel  = ($selectedValue==$val ? 'selected="selected"' : '');
          $html .= "<option value=\"$val\" $sel>$name</option>";
        }

        $html .= '</select>';

        return $html;
    }

    /**
     * Return the html for the Addressbook companies
     *
     * @param cid        The company-id whose branches we wish to get
     * @param name        The selector name
     * @param selectedValue    The currently selected value of the selector (optional) (default=0)
     * @param defaultValue    The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param allValue    The value to assign for the "All" choice (optional) (default=0)
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param submit    Wether or not to auto-submit the form
     * @param disabled    Wether or not the selector is disabled (optional) (default=false)
     *
     * @return The string for the company selector
     */
    function getSelector_contactCompanyBranches ($cid, $name='company_branch', $selectedValue=0,
                                                 $defaultValue=0, $defaultText='',
                                                 $allValue=0, $allText='', $submit=true, $disabled=false)
    {
        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        if ($allValue)
          $html .= "<option value=\"$allValue\">$allText</option>";

        $where = '';
        $branches = ContactUtil::getCompanyBranches ($cid);
        foreach ($branches as $v)
        {
          $name = $v['name'];
          $val  = $v['id'];
          $sel  = ($selectedValue==$val ? 'selected="selected"' : '');
          $html .= "<option value=\"$val\" $sel>$name</option>";
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * Return the html for the Addressbook companies
     *
     * @param cid        The company-id whose branches we wish to get
     * @param bid        The company-branch-id whose branches we wish to get
     * @param name        The selector name
     * @param selectedValue    The currently selected value of the selector (optional) (default=0)
     * @param defaultValue    The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param allValue    The value to assign for the "All" choice (optional) (default=0)
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param disabled    Wether or not the selector is disabled (optional) (default=false)
     *
     * @return The string for the company selector
     */
    function getSelector_contactContacts ($cid, $bid, $name='contacts', $selectedValue=0,
                                          $defaultValue=0, $defaultText='',
                                          $allValue=0, $allText='', $disabled=false)
    {
        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        if ($allValue)
          $html .= "<option value=\"$allValue\">$allText</option>";

        $where = '';
        $contacts = ContactUtil::getContacts ($cid, $bid);
        foreach ($contacts as $v)
        {
          $val  = $v['nr'];
          $sel  = ($selectedValue==$val ? 'selected="selected"' : '');
          $html .= "<option value=\"$val\" $sel>$v[lname], $v[fname]</option>";
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * Return the HTML for the date day selector
     *
     * @param selected     The value which should be selected (default=0) (optional)
     * @param name         The name of the generated selector (default='day') (optional)
     *
     * @return The generated HTML for the selector
     */
    function getSelector_DatetimeDay ($selected=0, $name='day')
    {
      if (!$name)
        $name='day';

      $html = '<select name="'.$name.'">';
      for ($i=1; $i<32; $i++)
        {
        $val = sprintf ("%02d", $i);
        $sel = ($i==$selected ? 'selected="selected"' : '');
        $html = $html . "<option value=\"$val\" $sel>$val</option>";
        }
      $html = $html . '</select>';

      return $html;
    }


    /**
     * Return the HTML for the date hour selector
     *
     * @param selected    The value which should be selected (default=0) (optional)
     * @param name        The name of the generated selector (default='hour') (optional)
     *
     * @return The generated HTML for the selector
     */
    function getSelector_DatetimeHour($selected=0, $name='hour')
    {
      if (!$name)
        $name='hour';

      $html = '<select name="'.$name.'">';
      for ($i=0; $i<24; $i++)
        {
        $val = sprintf ("%02d", $i);
        $sel = ($i==$selected ? 'selected="selected"' : '');
        $html = $html . "<option value=\"$val\" $sel>$val</option>";
        }
      $html = $html . '</select>';

      return $html;
    }


    /**
     * Return the HTML for the date minute selector
     *
     * @param selected    The value which should be selected (default=0) (optional)
     * @param name         The name of the generated selector (default='minute') (optional)
     *
     * @return The generated HTML for the selector
     */
    function getSelector_DatetimeMinute($selected=0, $name='minute')
    {
      if (!$name)
        $name='minute';

      $html = '<select name="'.$name.'">';
      for ($i=0; $i<60; $i+=5)
        {
        $val = sprintf ("%02d", $i);
        $sel = ($i==$selected ? 'selected="selected"' : '');
        $html = $html . "<option value=\"$val\" $sel>$val</option>";
        }
      $html = $html . '</select>';

      return $html;
    }


    /**
     * Return the HTML for the date month selector
     *
     * @param selected     The value which should be selected (default=0) (optional)
     * @param name         The name of the generated selector (default='month') (optional)
     *
     * @return The generated HTML for the selector
     */
    function getSelector_DatetimeMonth ($selected=0, $name='month')
    {
      if (!$name)
        $name='month';

      $html = '<select name="'.$name.'">';
      for ($i=1; $i<13; $i++)
        {
        $val = sprintf ("%02d", $i);
        $sel = ($i==$selected ? 'selected="selected"' : '');
        $html = $html . "<option value=\"$val\" $sel>$val</option>";
        }
      $html = $html . '</select>';

      return $html;
    }


    /**
     * Return the HTML for the date year selector
     *
     * @param selected     The value which should be selected (default=2003) (optional)
     * @param name         The name of the generated selector (default='year') (optional)
     * @param first        The start year for the selector (default=2003) (optional)
     * @param last        The name of the generated selector (default=2007) (optional)
     *
     * @return The generated HTML for the selector
     */
    function getSelector_DatetimeYear ($selected=2003, $name='year', $first=2003, $last=2007)
    {
      if (!$name)
        $name='year';

      $html = '<select name="'.$name.'">';
      for ($i=$first; $i<$last; $i++)
        {
        $sel = ($i==$selected ? 'selected="selected"' : '');
        $html = $html . "<option value=\"$i\" $sel>$i</option>";
        }
      $html = $html . '</select>';

      return $html;
    }


    function getSelector_Countries ($name='countries', $selectedValue='', $defaultValue=0, $defaultText='')
    {
        $countries = array();

        $countries['AD'] = "Andorra";
        $countries['AE'] = "United Arab Emirates";
        $countries['AF'] = "Afghanistan";
        $countries['AG'] = "Antigua & Barbuda";
        $countries['AI'] = "Anguilla";
        $countries['AL'] = "Albania";
        $countries['AM'] = "Armenia";
        $countries['AN'] = "Netherlands Antilles";
        $countries['AO'] = "Angola";
        $countries['AQ'] = "Antarctica";
        $countries['AR'] = "Argentina";
        $countries['AS'] = "American Samoa";
        $countries['AT'] = "Austria";
        $countries['AU'] = "Australia";
        $countries['AW'] = "Aruba";
        $countries['AZ'] = "Azerbaijan";
        $countries['BA'] = "Bosnia and Herzegovina";
        $countries['BB'] = "Barbados";
        $countries['BD'] = "Bangladesh";
        $countries['BE'] = "Belgium";
        $countries['BF'] = "Burkina Faso";
        $countries['BG'] = "Bulgaria";
        $countries['BH'] = "Bahrain";
        $countries['BI'] = "Burundi";
        $countries['BJ'] = "Benin";
        $countries['BM'] = "Bermuda";
        $countries['BN'] = "Brunei Darussalam";
        $countries['BO'] = "Bolivia";
        $countries['BR'] = "Brazil";
        $countries['BS'] = "Bahama";
        $countries['BT'] = "Bhutan";
    //$countries['BU'] = "Burma (no longer exists)";
        $countries['BV'] = "Bouvet Island";
        $countries['BW'] = "Botswana";
        $countries['BY'] = "Belarus";
        $countries['BZ'] = "Belize";
        $countries['CA'] = "Canada";
        $countries['CC'] = "Cocos (Keeling) Islands";
        $countries['CF'] = "Central African Republic";
        $countries['CG'] = "Congo";
        $countries['CH'] = "Switzerland";
        $countries['CI'] = "Côte D'ivoire (Ivory Coast)";
        $countries['CK'] = "Cook Iislands";
        $countries['CL'] = "Chile";
        $countries['CM'] = "Cameroon";
        $countries['CN'] = "China";
        $countries['CO'] = "Colombia";
        $countries['CR'] = "Costa Rica";
    //$countries['CS'] = "Czechoslovakia (no longer exists)";
        $countries['CU'] = "Cuba";
        $countries['CV'] = "Cape Verde";
        $countries['CX'] = "Christmas Island";
        $countries['CY'] = "Cyprus";
        $countries['CZ'] = "Czech Republic";
    //$countries['DD'] = "German Democratic Republic (no longer exists)";
        $countries['DE'] = "Germany";
        $countries['DJ'] = "Djibouti";
        $countries['DK'] = "Denmark";
        $countries['DM'] = "Dominica";
        $countries['DO'] = "Dominican Republic";
        $countries['DZ'] = "Algeria";
        $countries['EC'] = "Ecuador";
        $countries['EE'] = "Estonia";
        $countries['EG'] = "Egypt";
        $countries['EH'] = "Western Sahara";
        $countries['ER'] = "Eritrea";
        $countries['ES'] = "Spain";
        $countries['ET'] = "Ethiopia";
        $countries['FI'] = "Finland";
        $countries['FJ'] = "Fiji";
        $countries['FK'] = "Falkland Islands (Malvinas)";
        $countries['FM'] = "Micronesia";
        $countries['FO'] = "Faroe Islands";
        $countries['FR'] = "France";
        $countries['FX'] = "France, Metropolitan";
        $countries['GA'] = "Gabon";
        $countries['GB'] = "United Kingdom (Great Britain)";
        $countries['GD'] = "Grenada";
        $countries['GE'] = "Georgia";
        $countries['GF'] = "French Guiana";
        $countries['GH'] = "Ghana";
        $countries['GI'] = "Gibraltar";
        $countries['GL'] = "Greenland";
        $countries['GM'] = "Gambia";
        $countries['GN'] = "Guinea";
        $countries['GP'] = "Guadeloupe";
        $countries['GQ'] = "Equatorial Guinea";
        $countries['GR'] = "Greece";
        $countries['GS'] = "South Georgia and the South Sandwich Islands";
        $countries['GT'] = "Guatemala";
        $countries['GU'] = "Guam";
        $countries['GW'] = "Guinea-Bissau";
        $countries['GY'] = "Guyana";
        $countries['HK'] = "Hong Kong";
        $countries['HM'] = "Heard & McDonald Islands";
        $countries['HN'] = "Honduras";
        $countries['HR'] = "Croatia";
        $countries['HT'] = "Haiti";
        $countries['HU'] = "Hungary";
        $countries['ID'] = "Indonesia";
        $countries['IE'] = "Ireland";
        $countries['IL'] = "Israel";
        $countries['IN'] = "India";
        $countries['IO'] = "British Indian Ocean Territory";
        $countries['IQ'] = "Iraq";
        $countries['IR'] = "Islamic Republic of Iran";
        $countries['IS'] = "Iceland";
        $countries['IT'] = "Italy";
        $countries['JM'] = "Jamaica";
        $countries['JO'] = "Jordan";
        $countries['JP'] = "Japan";
        $countries['KE'] = "Kenya";
        $countries['KG'] = "Kyrgyzstan";
        $countries['KH'] = "Cambodia";
        $countries['KI'] = "Kiribati";
        $countries['KM'] = "Comoros";
        $countries['KN'] = "St. Kitts and Nevis";
        $countries['KP'] = "Korea, Democratic People's Republic of";
        $countries['KR'] = "Korea, Republic of";
        $countries['KW'] = "Kuwait";
        $countries['KY'] = "Cayman Islands";
        $countries['KZ'] = "Kazakhstan";
        $countries['LA'] = "Lao People's Democratic Republic";
        $countries['LB'] = "Lebanon";
        $countries['LC'] = "Saint Lucia";
        $countries['LI'] = "Liechtenstein";
        $countries['LK'] = "Sri Lanka";
        $countries['LR'] = "Liberia";
        $countries['LS'] = "Lesotho";
        $countries['LT'] = "Lithuania";
        $countries['LU'] = "Luxembourg";
        $countries['LV'] = "Latvia";
        $countries['LY'] = "Libyan Arab Jamahiriya";
        $countries['MA'] = "Morocco";
        $countries['MC'] = "Monaco";
        $countries['MD'] = "Moldova, Republic of";
        $countries['MG'] = "Madagascar";
        $countries['MH'] = "Marshall Islands";
        $countries['ML'] = "Mali";
        $countries['MN'] = "Mongolia";
        $countries['MM'] = "Myanmar";
        $countries['MO'] = "Macau";
        $countries['MP'] = "Northern Mariana Islands";
        $countries['MQ'] = "Martinique";
        $countries['MR'] = "Mauritania";
        $countries['MS'] = "Monserrat";
        $countries['MT'] = "Malta";
        $countries['MU'] = "Mauritius";
        $countries['MV'] = "Maldives";
        $countries['MW'] = "Malawi";
        $countries['MX'] = "Mexico";
        $countries['MY'] = "Malaysia";
        $countries['MZ'] = "Mozambique";
        $countries['NA'] = "Namibia";
        $countries['NC'] = "New Caledonia";
        $countries['NE'] = "Niger";
        $countries['NF'] = "Norfolk Island";
        $countries['NG'] = "Nigeria";
        $countries['NI'] = "Nicaragua";
        $countries['NL'] = "Netherlands";
        $countries['NO'] = "Norway";
        $countries['NP'] = "Nepal";
        $countries['NR'] = "Nauru";
    //$countries['NT'] = "Neutral Zone (no longer exists)";
        $countries['NU'] = "Niue";
        $countries['NZ'] = "New Zealand";
        $countries['OM'] = "Oman";
        $countries['PA'] = "Panama";
        $countries['PE'] = "Peru";
        $countries['PF'] = "French Polynesia";
        $countries['PG'] = "Papua New Guinea";
        $countries['PH'] = "Philippines";
        $countries['PK'] = "Pakistan";
        $countries['PL'] = "Poland";
        $countries['PM'] = "St. Pierre & Miquelon";
        $countries['PN'] = "Pitcairn";
        $countries['PR'] = "Puerto Rico";
        $countries['PT'] = "Portugal";
        $countries['PW'] = "Palau";
        $countries['PY'] = "Paraguay";
        $countries['QA'] = "Qatar";
        $countries['RE'] = "Réunion";
        $countries['RO'] = "Romania";
        $countries['RU'] = "Russian Federation";
        $countries['RW'] = "Rwanda";
        $countries['SA'] = "Saudi Arabia";
        $countries['SB'] = "Solomon Islands";
        $countries['SC'] = "Seychelles";
        $countries['SD'] = "Sudan";
        $countries['SE'] = "Sweden";
        $countries['SG'] = "Singapore";
        $countries['SH'] = "St. Helena";
        $countries['SI'] = "Slovenia";
        $countries['SJ'] = "Svalbard & Jan Mayen Islands";
        $countries['SK'] = "Slovakia";
        $countries['SL'] = "Sierra Leone";
        $countries['SM'] = "San Marino";
        $countries['SN'] = "Senegal";
        $countries['SO'] = "Somalia";
        $countries['SR'] = "Suriname";
        $countries['ST'] = "Sao Tome & Principe";
    //$countries['SU'] = "Union of Soviet Socialist Republics (no longer exists)";
        $countries['SV'] = "El Salvador";
        $countries['SY'] = "Syrian Arab Republic";
        $countries['SZ'] = "Swaziland";
        $countries['TC'] = "Turks & Caicos Islands";
        $countries['TD'] = "Chad";
        $countries['TF'] = "French Southern Territories";
        $countries['TG'] = "Togo";
        $countries['TH'] = "Thailand";
        $countries['TJ'] = "Tajikistan";
        $countries['TK'] = "Tokelau";
        $countries['TM'] = "Turkmenistan";
        $countries['TN'] = "Tunisia";
        $countries['TO'] = "Tonga";
        $countries['TP'] = "East Timor";
        $countries['TR'] = "Turkey";
        $countries['TT'] = "Trinidad & Tobago";
        $countries['TV'] = "Tuvalu";
        $countries['TW'] = "Taiwan, Province of China";
        $countries['TZ'] = "Tanzania, United Republic of";
        $countries['UA'] = "Ukraine";
        $countries['UG'] = "Uganda";
        $countries['UM'] = "United States Minor Outlying Islands";
        $countries['US'] = "United States of America";
        $countries['UY'] = "Uruguay";
        $countries['UZ'] = "Uzbekistan";
        $countries['VA'] = "Vatican City State (Holy See)";
        $countries['VC'] = "St. Vincent & the Grenadines";
        $countries['VE'] = "Venezuela";
        $countries['VG'] = "British Virgin Islands";
        $countries['VI'] = "United States Virgin Islands";
        $countries['VN'] = "Viet Nam";
        $countries['VU'] = "Vanuatu";
        $countries['WF'] = "Wallis & Futuna Islands";
        $countries['WS'] = "Samoa";
    //$countries['YD'] = "Democratic Yemen (no longer exists)";
        $countries['YE'] = "Yemen";
        $countries['YT'] = "Mayotte";
        $countries['YU'] = "Yugoslavia";
        $countries['ZA'] = "South Africa";
        $countries['ZM'] = "Zambia";
        $countries['ZR'] = "Zaire";
        $countries['ZW'] = "Zimbabwe";
        $countries['ZZ'] = "Unknown or unspecified country";

        $html = '<select name="'.$name.'"'
                .' id="'.pnVarPrepForDisplay($name).'"'
                //.($submit ? ' onchange="this.form.submit();"' : '')
                //.($disabled ? ' disabled="disabled" ' : '')
                .'>';

        if ($defaultText && !$selectedValue)
          $html .= "<option value=\"$defaultValue\" selected=\"selected\">$defaultText</option>";

        $ak = array_keys($countries);
        foreach ($ak as $k)
        {
            $sel = ($selectedValue==$k ? 'selected="selected"' : '');
            $html .= "<option value=\"$k\" $sel>$countries[$k]</option>";
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * Same as PN HTMLApi function but adds javascript form submit code to selector
     */
    function FormSelectMultipleSubmit($fieldname, $data, $multiple=0, $size=1, $selected = '', $accesskey='', $submit=1)
    {
            if (empty ($fieldname))
            {
                return;
            }
            //$this->tabindex++;

            // Set up selected if required
            if (!empty($selected)) {
                for ($i=0; !empty($data[$i]); $i++) {
                    if ($data[$i]['id'] == $selected) {
                        $data[$i]['selected'] = 1;
                    }
                }
            }

            $c = count($data);
            if ($c < $size)
            {
                $size = $c;
            }
            $output = '<select'
                .' name="'.pnVarPrepForDisplay($fieldname).'"'
                .' id="'.pnVarPrepForDisplay($fieldname).'"'
                .' size="'.pnVarPrepForDisplay($size).'"'
                .(($multiple == 1) ? ' multiple="multiple"' : '')
                .((empty ($accesskey)) ? '' : ' accesskey="'.pnVarPrepForDisplay($accesskey).'"')
                //.' tabindex="'.$this->tabindex.'"'
                .($submit ? ' onchange="this.form.submit();"' : '')
                .'>'
            ;
            foreach ($data as $datum)
            {
                $output .= '<option'
                    .' value="'.pnVarPrepForDisplay($datum['id']).'"'
                    .((empty ($datum['selected'])) ? '' : " selected='$datum[selected]'")
                    .'>'
                    .pnVarPrepForDisplay($datum['name'])
                    .'</option>'
                ;
            }
            return $output;
    }


    function readonly($name, $value, $type='text', $size='40', $color='aaaaaa')
    {
        if (empty ($name))
           return;

        $output = '<input'
                 .' type="'.(($password) ? 'password' : "$type").'"'
                 .' name="'.pnVarPrepForDisplay($name).'"'
                 .' id="'.pnVarPrepForDisplay($name).'"'
                 .' value="'.pnVarPrepForDisplay($value).'"'
                 .' size="'.pnVarPrepForDisplay($size).'"'
                 //.' tabindex="'.$this->tabindex.'"'
                 .' readonly="readonly"'
                 .' style="background-color: #'.$color.'; border-bottom-color: #000000; border-right-color: #000000;"'
                 .' />';
        return $output;
    }
}
?>