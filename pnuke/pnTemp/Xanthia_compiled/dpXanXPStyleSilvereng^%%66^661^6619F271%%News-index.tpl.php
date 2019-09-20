<?php /* Smarty version 2.6.14, created on 2007-12-06 16:24:54
         compiled from News-index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'News-index.tpl', 18, false),)), $this); ?>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
" width="100%">
<tr>
	<td>
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
">
        <tr>
        	<td align="left" valign="top" width="25" height="30"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_1.gif" alt=""></td>
        	<td align="left" valign="middle" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_2.gif)" width="100%" height="30" class="pn-storytitle">&nbsp;&nbsp;<?php echo $this->_tpl_vars['preformat']['catandtitle']; ?>
</td>
        	<td align="left" valign="top" width="78" height="30"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_3.gif" alt=""></td>
        </tr>
        </table>

        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
">
        <tr>
        	<td>
        		<table border="0" cellpadding="0" cellspacing="0" width="100%">
        		<tr>
        			<td align="left" valign="top" width="10" height="30"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_4.gif" alt=""></td>
        			<td align="left" valign="middle" style="background-image:url<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_5.gif)" width="100%" height="30" class="pn-sub"><i><?php echo smarty_function_pnml(array('name' => '_POSTEDBY'), $this);?>
&nbsp;<?php echo $this->_tpl_vars['info']['informant']; ?>
&nbsp;<?php echo smarty_function_pnml(array('name' => '_ON'), $this);?>
&nbsp;<?php echo $this->_tpl_vars['info']['longdate']; ?>
&nbsp;--&nbsp;(<?php echo $this->_tpl_vars['info']['counter']; ?>
&nbsp;<?php echo smarty_function_pnml(array('name' => '_READS'), $this);?>
)</i></td>
    				<td width="10" align="left" valign="top"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_8.gif" alt=""></td>
        		</tr>
        		</table>
        		<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
">
        		<tr>
        			<td width="10" align="left" valign="top" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_9.gif)"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/sidebox-bar-px.gif" alt=""></td>
        			<td>
        				<table border="0" cellpadding="3" cellspacing="0" width="100%">
        				<tr valign="top">
        					<td width="100%"style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_10.gif)" align="left" valign="top" class="pn-normal"><?php echo $this->_tpl_vars['preformat']['searchtopic']; ?>
&nbsp;<?php echo $this->_tpl_vars['preformat']['hometext']; ?>
</td>
    					</tr>
						<tr valign="top">
        					<td width="100%" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_10.gif)" align="left" valign="top" class="pn-normal"><?php echo $this->_tpl_vars['preformat']['notes']; ?>
</td>
    					</tr>
    					</table>
    				</td>
    				<td width="10" align="right" valign="top" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_13.gif)"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/storybox-content-right-px.gif" alt=""></td>
    			</tr>
				</table>

     			<table border="0" cellpadding="0" cellspacing="0" width="100%">
        		<tr>
        			<td width="24" height="19" align="left" valign="top" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_14.gif)"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/sidebox-bar-px.gif" alt=""></td>
        			<td>
        				<table border="0" cellpadding="0" cellspacing="0" width="100%">
        				<tr valign="bottom">
        					<td width="100%" height="19" align="right"style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_16.gif)" class="pn-normal"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/storybox-content-right-px.gif" alt="">
    							<?php echo $this->_tpl_vars['preformat']['readmore']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['preformat']['send']; ?>
&nbsp;<?php echo $this->_tpl_vars['preformat']['print']; ?>
&nbsp;&nbsp;
    						</td>
    					</tr>
    					</table>
    				</td>
    				<td width="28" align="left" valign="top" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_17.gif)"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/storybox-content-right-px.gif" alt=""></td>
    			</tr>
				</table>
        		<table border="0" cellpadding="0" cellspacing="0" width="100%">
        		<tr valign="top">
        			<td width="24" height="28" align="left" valign="top"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_18.gif" alt=""></td>
        			<td width="100%" height="28" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_19.gif)"></td>
        			<td width="78" height="28" align="left" valign="top"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/story/printer_20.gif" alt=""></td>
				</tr>
    			</table>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<br />