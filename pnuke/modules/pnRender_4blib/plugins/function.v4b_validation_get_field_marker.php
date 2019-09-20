<?php
/*  ----------------------------------------------------------------------
 *  LICENSE
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License (GPL)
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WIthOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *  ----------------------------------------------------------------------
 *  Original Author of  Robert Gasch
 *  Author Contact: r.gasch@chello.nl, robert.gasch@value4business.com
 *  Purpose of file: get the validation field marker for a specific field
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */

/**
 * v4b_validation_get_field_marker: get the validation field marker for a specific field
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_validation_get_field_marker.php,v 1.2 2004/12/28 23:08:31 rgasch Exp $
 * @param	validationArray	The validation array to use
 * @param	fieldName	The name of the field for which we wish to retrieve the validation error
 *
 */ 
function smarty_function_v4b_validation_get_field_marker ($params, &$smarty) 
{
    return FormUtil::getFieldMarker ($params['validationArray'], $params['fieldName']);
}

?>