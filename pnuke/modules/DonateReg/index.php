<?PHP  // File: $Id: index.php,v 1.5 2004/12/28 21:03:29 nuclearw Exp $ $Name:  $
// ----------------------------------------------------------------------
// Original Author of file: Erik Bartels
// Purpose of file: Load Eventreg if using [] instead of with new module spec
// {}
// ----------------------------------------------------------------------
/*	This file just re-directs to the user.php giving the ability to use
 *  [DonateReg]  in the menu to direct to this module. 
 */
    pnRedirect(pnModURL('eventreg', 'user', 'main'));

?>
