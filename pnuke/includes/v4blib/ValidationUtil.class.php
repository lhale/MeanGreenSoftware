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
 *  Purpose of file: validation utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ValidationUtil
{
    /**
     * Validate a specific field using the supplied control parameters
     *
     * @param objectKey     The object name under which we register validation errors
     * @param field        The field to validate
     * @param required    Wether or not the field is required
     * @param cmp_op    The compare operation to perform
     * @param cmp_value    The value to compare the supplied field value to. If the value starts with a ':', the argument is used as an object access key.
     * @param err_msg     The error message to use if the validation fails
     *
     * @return A true/false value indicating wether the field validation passed or failed
     */
    function validateField ($objectKey, $field, $required, $cmp_op, $cmp_value, $err_msg)
    {
        if ($objectKey)
            $object = $_POST[$objectKey];

        if (!is_array($object))
            v4b_exit ('ValidationUtil::validateField: object is not an array ... ');

        if (!$field)
            v4b_exit ('ValidationUtil::validateField: empty field supplied ... ');

        if (!$err_msg)
            v4b_exit ('ValidationUtil::validateField: empty error message supplied ... ');

        $rc = true;

        if ($required)
            if (!$object[$field])
                $rc = false;

        if ($rc)
        {
            $postval = $object[$field];
            $testval = $cmp_value;
            if (substr($testval, 0, 1) == ':') // denotes an object access key
            {
                $v2   = substr($testval, 1);
                $testval = $object[$v2];
            }

        //print "$postval $cmp_op $testval";

            if ($cmp_op == 'eq')
                $rc = ($postval == $testval);
            else
            if ($cmp_op == 'neq')
                $rc = ($postval != $testval);
            else
            if ($cmp_op == 'gt')
                $rc = ($postval > $testval);
            else
            if ($cmp_op == 'gte')
                $rc = ($postval >= $testval);
            else
            if ($cmp_op == 'lt')
                $rc = ($postval < $testval);
            else
            if ($cmp_op == 'lte')
                $rc = ($postval <= $testval);
            else
            if ($cmp_op == 'noop')
            {
                if (!$required)
                  v4b_exit ("ValidationUtil::validateField: invalid cmp_op [$cmp_op] supplied for non-required field [$field] ... ");
                $rc = true;
            }
            else
                v4b_exit ("ValidationUtil::validateField: invalid cmp_op [$cmp_op] supplied for field [$field] ... ");
        }

        if ($rc === false)
        {
            //$fkey = "$objectKey|$field";
            $fkey = $field;
            $_POST['validationErrors'][$fkey] = $err_msg;
        }

        return $rc;
    }


    /**
     * Validate a specific field using the supplied control parameters
     *
     * @param objectKey    The object name under which we register validation errors
     * @param validationControl The structured validation control array
     *
     * The expected structure for the validation array is as follows:
     * $validationControl[] = array ('field'         =>  $fieldname,
     *                               'required'      =>  true/false,
     *                               'cmp_op'        =>  eq/neq/lt/lte/gt/gte/noop,
     *                               'cmp_value'     =>  $value
     *                               'err_msg'       =>  $errorMessage);
     *
     * The noop value for the cmp_op field is only valid if the field is not required
     *
     * @return A true/false value indicating wether the field validation passed or failed
     */
    function validateFieldByArray ($objectKey, $validationControl)
    {
        $field   = $validationControl['field'];
        $req     = $validationControl['required'];
        $cmp_op  = $validationControl['cmp_op'];
        $cmp_val = $validationControl['cmp_value'];
        $err_msg = $validationControl['err_msg'];

        return ValidationUtil::validateField ($objectKey, $field, $req, $cmp_op, $cmp_val, $err_msg);
    }


    /**
     * Validate a specific field using the supplied control parameters
     *
     * @param objectKey    The object name under which we register validation errors
     * @param validationControls The array of structured validation control arrays
     *
     * The expected structure for the validation array is as follows:
     * $validationControls[] = array ('field'         =>  $fieldname,
     *                                'required'      =>  true/false,
     *                                'cmp_op'        =>  eq/neq/lt/lte/gt/gte/noop,
     *                                'cmp_value'     =>  $value
     *                                'err_msg'       =>  $errorMessage), ...);
     *
     * The noop value for the cmp_op field is only valid if the field is not required
     *
     * @return A true/false value indicating wether the object validation passed or resulted in errors.
     */
    function validateObject ($objectKey, $validationControls)
    {
        $rc = true;

        foreach ($validationControls as $vc)
        {
            $t = ValidationUtil::validateFieldByArray ($objectKey, $vc);
            if ($t === false)
                $rc = false;
        }

        return $rc;
    }


    /**
     * Validate a specific field using the supplied plain validation array. This function transfors
     * the plain validation array into a structured validation array and then calls ValidationUtil::validateObject().
     *
     * @param objectKey        The object name under which we register validation errors
     * @param validationArray     The plain (numerically indexed) validation array
     *
     * The expected structure for the validation array is as follows:
     * $validationArray[] = array ($fieldname, true/false, eq/neq/lt/lte/gt/gte/noop, $value, $errorMessage);
     *
     * The noop value for the cmp_op field is only valid if the field is not required
     *
     * @return A true/false value indicating wether the object validation passed or failed
     */
    function validateObjectPlain ($objectKey, $validationArray)
    {
        $validationControls = array ();

        $vc = array ();
        foreach ($validationArray as $va)
        {
            $size = count($va);
            if ($size < 5)
                v4b_exit ("ValidationUtil::validateObjectPlain : invalid validationArray supplied: expected 5 fields but found $size ... ");

            $vc['field']      = $va[0];
            $vc['required']   = $va[1];
            $vc['cmp_op']     = $va[2];
            $vc['cmp_value']  = $va[3];
            $vc['err_msg']    = $va[4];

            $validationControls[] = $vc;
        }

        return ValidationUtil::validateObject ($objectKey, $validationControls);
    }
}
?>