<?php /* Smarty version 2.6.14, created on 2007-09-03 08:26:22
         compiled from header_footer_page.htm */

$this->_cache_serials['pnTemp/pnRender_compiled\Header_Footer^ExtraLite^eng^%%F1^F16^F161C1FA%%header_footer_page.htm.inc'] = '1c2c5d9465a2884a707fa957d793852f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'header_footer_page.htm', 2, false),array('function', 'title', 'header_footer_page.htm', 4, false),array('function', 'slogan', 'header_footer_page.htm', 5, false),array('function', 'keywords', 'header_footer_page.htm', 6, false),array('function', 'sitename', 'header_footer_page.htm', 7, false),array('function', 'charset', 'header_footer_page.htm', 9, false),array('function', 'modulestylesheet', 'header_footer_page.htm', 20, false),array('function', 'additional_header', 'header_footer_page.htm', 22, false),array('function', 'pagerendertime', 'header_footer_page.htm', 32, false),array('function', 'typetoolv80', 'header_footer_page.htm', 33, false),array('block', 'nocache', 'header_footer_page.htm', 32, false),)), $this); ?>
<?php
function _smarty_tplfunc_1c2c5d9465a2884a707fa957d793852f_0(&$_smarty)
{
$_smarty->_tag_stack[] = array('nocache', array()); $_block_repeat=true;pnRender_block_nocache($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], null, $_smarty, $_block_repeat);while ($_block_repeat) { ob_start();  echo smarty_function_pagerendertime(array(), $_smarty); $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pnRender_block_nocache($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], $_block_content, $_smarty, $_block_repeat); }  array_pop($_smarty->_tag_stack); 
}



?>
