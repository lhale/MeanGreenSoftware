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
 *  Purpose of file: form utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


require_once ('includes/v4blib/v4b_globals.inc');


class FormUtil
{
    /**
     * Return the requested from input in a safe way. If the
     * input is not an empty string, return it. Otherwise
     * return the default
     *
     * @param key        The field to return
     * @param default    The value to return if the requested field is not found (optional) (default=false)
     *
     * @return The requested field or the specified default
     */
    function getPassedValueOld ($key, $default=null)
    {
        if (!$key)
          v4b_exit ('Empty key passed to FormUtil::getPassedValue() ...');

        $val = pnVarCleanFromInput ($key);

        if (isset($val))
          return $val;

        return $default;
    }


    /**
     * Return the requested key from input in a safe way. This function
     * is safe to use for recursive arrays and either returns a non-empty
     * string or the (optional) default.
     *
     * This method is based on pnVarCleanFromInput but array-safe.
     *
     * @param key        The field to return
     * @param default    The value to return if the requested field is not found (optional) (default=false)
     * @param source    The sourc field to get a parameter from
     *
     * @return The requested input key or the specified default
     */
    function getPassedValue ($key, $default=null, $source=null)
    {
        if (!$key)
            v4b_exit ('Empty key passed to FormUtil::getPassedValueSafe() ...');

        $doClean = true;
        $source = strtoupper($source);
        switch (true)
        {
            case (isset($_REQUEST[$key]) && !isset($_FILES[$key]) && (!$source || $source=='REQUEST')):
                $value = $_REQUEST[$key];
                break;
            case isset($_GET[$key]) && (!$source || $source=='G' || $source=='GET'):
                $value = $_GET[$key];
                break;
            case isset($_POST[$key]) && (!$source || $source=='P' || $source=='POST'):
                $value = $_POST[$key];
            break;
                case isset($_COOKIE[$key]) && (!$source || $source=='C' || $source=='COOKIE'):
                $value = $_COOKIE[$key];
                break;
            case isset($_FILES[$key]) && (!$source || $source=='F' || $source=='FILES'):
                $value = $_FILES[$key];
                break;
        }

        if (isset($value))
        {
            if (is_array($value))
                FormUtil::cleanArray ($value);
            else
            {
                $alwaysclean = array('name', 'module', 'type', 'file', 'authid');
                if (in_array($key, $alwaysclean))
                    $doClean = true;

                if ($doClean)
                    FormUtil::cleanValue ($value);
            }

            return $value;
        }

        return $default;
    }


    /**
     * Clean an array acquired from input. This method is safe to use for recursive arrays
     * and cleans the array in place.
     *
     * @param array     The array to clean up
     *
     * @return A reference to the original (altered/cleaned) data array
     */
    function cleanArray (&$array)
    {
        if (!is_array($array))
            v4b_exit ('Non-array passed to FormUtil::cleanArray () ...');

        $ak = array_keys ($array);
        $kc = count($ak);

        for ($i=0; $i<$kc; $i++)
        {
            $key = $ak[$i];
            if (is_array($array[$key]))
                FormUtil::cleanArray($array[$key]);
            else
                FormUtil::cleanValue($array[$key]);
        }
    }


    /**
     * Clean an individual data element in place.
     * and cleans the array in place.
     *
     * @param value     The value to clean
     *
     * @return A reference to the original (altered/cleaned) data array
     */
    function cleanValue (&$value)
    {
        if (!$value)
            return $value;

        if (get_magic_quotes_gpc())
            pnStripslashes($value);

        $replace = array();
        $search  = array(    '|</?\s*SCRIPT.*?>|si',
                '|</?\s*FRAME.*?>|si',
                '|</?\s*OBJECT.*?>|si',
                '|</?\s*META.*?>|si',
                '|</?\s*APPLET.*?>|si',
                '|</?\s*LINK.*?>|si',
                '|</?\s*IFRAME.*?>|si',
                '|STYLE\s*=\s*"[^"]*"|si');

        $value = preg_replace($search, $replace, $value);
        $value = trim($value);
    }


    /**
     * Return a boolean indicating wether the specified field is required
     *
     * @param validationInfo     The plain (non-structured) validation array
     * @param field            The fieldname
     *
     * @return A boolean indicating wether or not the specified field is required
     */
    function isRequiredField ($validationInfo, $field)
    {
        if (!$field)
          v4b_exit ('Empty fieldname passed to FormUtil::isRequiredField() ...');

        $rec = $validationInfo[$field];

        if (!$rec)
          return false;

        return $rec[1];
    }


    /**
     * Get the required field marker (or nothing) for the specified field
     *
     * @param validationInfo     The plain (non-structured) validation array
     * @param field            The fieldname
     *
     * @return The required field marker or an empty string
     */
    function getRequiredFieldMarker ($validationInfo, $field)
    {
        if (FormUtil::isRequiredField($validationInfo, $field))
          return _REQUIRED_MARKER;

        return _MARKER_NONE;
    }


    /**
     * Get the required field marker (or nothing) for the specified field
     *
     * @return The validation error marker or an empty string
     */
    function getValidationErrors ()
    {
        return isset($_GET['validationErrors']) ? $_GET['validationErrors'] : null;
    }


    /**
     * Return a boolean indicating wether or not the specified field failed validation
     *
     * @param field            The fieldname
     *
     * @return A boolean indicating wether or not the specified field failed validation
     */
    function hasValidationErrors ($field)
    {
        $ve = FormUtil::getValidationErrors ();
        return (boolean)($ve[$field]);
    }


    /**
     * Get the required field marker (or nothing) for the specified field
     *
     * @param field            The fieldname
     *
     * @return The validation error marker or an empty string
     */
    function getValidationFieldMarker ($field)
    {
        if (FormUtil::hasValidationErrors($field))
          return _VALIDATION_MARKER;

        return _MARKER_NONE;
    }


    /**
     * Get the validation error for the specified field
     *
     * @param field        The fieldname to get the error for
     * @param indent    Wether or not to indent the error message (so it better fits under a form field)
     *
     * @return The validation error or an empty string
     */
    function getValidationError ($field, $indent=true)
    {
        if (!FormUtil::hasValidationErrors($field))
          return '';

        $ve = FormUtil::getValidationErrors ();
        $error = $ve[$field];
        if ($error)
          if ($indent)
            $error = '<br />&nbsp;&nbsp;&nbsp;' . $error;
          else
            $error = '<br />' . $error;

        return $error;
    }


    /**
     * Get the appropriate field marker
     *
     * @param validationInfo     The plain (non-structured) validation array
     * @param field            The fieldname
     *
     * @return The a marker string or an 'nbsp';
     */
    function getFieldMarker ($validationInfo, $field)
    {
        if (FormUtil::hasValidationErrors($field))
          return _VALIDATION_MARKER;
        else
        if (FormUtil::isRequiredField($validationInfo, $field))
          return _REQUIRED_MARKER;

        return _MARKER_NONE;
    }
}
?>