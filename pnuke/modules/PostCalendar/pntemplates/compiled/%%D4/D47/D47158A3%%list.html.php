<?php /* Smarty version 2.6.14, created on 2007-11-16 09:34:04
         compiled from default/views/month/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/views/month/list.html', 2, false),array('function', 'fetch', 'default/views/month/list.html', 7, false),array('function', 'eval', 'default/views/month/list.html', 8, false),array('function', 'pc_view_select', 'default/views/month/list.html', 24, false),array('function', 'pc_sort_events', 'default/views/month/list.html', 32, false),array('function', 'pc_url', 'default/views/month/list.html', 43, false),array('function', 'pc_date_format', 'default/views/month/list.html', 45, false),array('function', 'pc_popup', 'default/views/month/list.html', 78, false),array('modifier', 'pc_date_format', 'default/views/month/list.html', 19, false),array('modifier', 'count', 'default/views/month/list.html', 34, false),array('modifier', 'date_format', 'default/views/month/list.html', 35, false),array('modifier', 'string_format', 'default/views/month/list.html', 36, false),array('modifier', 'strip_tags', 'default/views/month/list.html', 81, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "default.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<?php echo smarty_function_fetch(array('file' => ($this->_tpl_vars['TPL_STYLE_PATH'])."/week.css",'assign' => 'css'), $this);?>

<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['css']), $this);?>


<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/global/navigation.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<table width="100%" border="0" cellpadding="5" cellspacing="0" class="weekheader">
	<tr align="center">
    	<td width="100%" align="center" valign="middle" class="weekheader">
			<a href="<?php echo $this->_tpl_vars['PREV_MONTH_URL']; ?>
">&lt;&lt;</a>
    		<?php echo ((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('pc_date_format', true, $_tmp, $this->_config[0]['vars']['_PC_DATE_FORMAT_MY']) : smarty_modifier_pc_date_format($_tmp, $this->_config[0]['vars']['_PC_DATE_FORMAT_MY'])); ?>

			<a href="<?php echo $this->_tpl_vars['NEXT_MONTH_URL']; ?>
">&gt;&gt;</a>
		</td>
		<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
		<td nowrap align="right" valign="top" class="monthheader">
			<?php echo smarty_function_pc_view_select(array('label' => $this->_config[0]['vars']['_PC_TPL_VIEW_LABEL'],'class' => ""), $this);?>

		</td>
		<?php endif; ?>
	</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="calcontainer"><tr><td>
		<?php echo smarty_function_pc_sort_events(array('var' => 'S_EVENTS','sort' => 'category','order' => 'asc','value' => $this->_tpl_vars['A_EVENTS']), $this);?>

	<?php $_from = $this->_tpl_vars['S_EVENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dates'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dates']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cdate'] => $this->_tpl_vars['events']):
        $this->_foreach['dates']['iteration']++;
?>
	   	<?php if (count($this->_tpl_vars['events']) && ( $this->_tpl_vars['cdate'] >= $this->_tpl_vars['MONTH_START_DATE'] && $this->_tpl_vars['cdate'] <= $this->_tpl_vars['MONTH_END_DATE'] )): ?>
			<?php $this->assign('dayname', ((is_array($_tmp=$this->_tpl_vars['cdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%w") : smarty_modifier_date_format($_tmp, "%w"))); ?>
    		<?php $this->assign('day', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%1d") : smarty_modifier_string_format($_tmp, "%1d"))); ?>
    		<?php $this->assign('month', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%1d") : smarty_modifier_string_format($_tmp, "%1d"))); ?>
			<?php $this->assign('month', $this->_tpl_vars['month']-1); ?>
    		<?php $this->assign('year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%4d") : smarty_modifier_string_format($_tmp, "%4d"))); ?>
			<table width="100%" border="0" cellpadding="5" cellspacing="0" class="dayheader">
        		<tr>
        			<td width="100%">
            			<a href="<?php echo smarty_function_pc_url(array('action' => 'day','date' => $this->_tpl_vars['cdate']), $this);?>
">
						<?php if ($this->_tpl_vars['USE_INT_DATES'] == true): ?>
							<?php echo smarty_function_pc_date_format(array('date' => $this->_tpl_vars['cdate'],'format' => $this->_config[0]['vars']['_PC_DATE_FORMAT_INT']), $this);?>

						<?php else: ?>	
							<?php echo smarty_function_pc_date_format(array('date' => $this->_tpl_vars['cdate'],'format' => $this->_config[0]['vars']['_PC_DATE_FORMAT_STD']), $this);?>

						<?php endif; ?>
						</a>
            		</td>
        		</tr>
    		</table>
						<?php $this->assign('oldCat', ""); ?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="eventslist">
        		<tr>
         			<td class="eventslist" width="100%">
					<?php $_from = $this->_tpl_vars['S_EVENTS'][$this->_tpl_vars['cdate']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['eventloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['eventloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['event']):
        $this->_foreach['eventloop']['iteration']++;
?>
    					<?php $this->assign('cCat', $this->_tpl_vars['event']['catname']); ?>
							<?php if ($this->_tpl_vars['24HOUR_TIME']): ?>
								<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['event']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_24']) : smarty_modifier_date_format($_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_24']))); ?>
							<?php else: ?>
								<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['event']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_12']) : smarty_modifier_date_format($_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_12']))); ?>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['oldCat'] != $this->_tpl_vars['cCat']): ?>
								<?php if (($this->_foreach['eventloop']['iteration'] <= 1) != true): ?>
									</div>
								<?php endif; ?>
								<div width="100%" style="padding: 2px; background-color: <?php echo $this->_tpl_vars['event']['catcolor']; ?>
;">
									<?php echo $this->_tpl_vars['event']['catname']; ?>

								</div>
								<div width="100%" style="padding: 2px; border:solid 1px <?php echo $this->_tpl_vars['event']['catcolor']; ?>
;">
							<?php endif; ?>
							<?php if ($this->_tpl_vars['event']['alldayevent'] != true): ?>
								<?php echo $this->_tpl_vars['timestamp']; ?>

							<?php endif; ?>
							<a href="<?php echo smarty_function_pc_url(array('action' => 'detail','eid' => $this->_tpl_vars['event']['eid'],'date' => $this->_tpl_vars['date']), $this);?>
" 
									 <?php echo smarty_function_pc_popup(array('delay' => '500','bgcolor' => $this->_tpl_vars['event']['catcolor'],'caption' => $this->_tpl_vars['event']['title'],'text' => $this->_tpl_vars['event']['hometext']), $this);?>
><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
							<?php if ($this->_tpl_vars['event']['alldayevent'] != true): ?>
								(<?php echo $this->_tpl_vars['event']['duration_hours']; ?>
:<?php echo $this->_tpl_vars['event']['duration_minutes']; ?>
)
							<?php endif; ?>
							<br />
							<?php $this->assign('oldCat', $this->_tpl_vars['event']['catname']); ?>
							<?php if (($this->_foreach['eventloop']['iteration'] == $this->_foreach['eventloop']['total'])): ?>
																</div>
							<?php endif; ?>
					<?php endforeach; else: ?>
						&nbsp;
        			<?php endif; unset($_from); ?>
					</td>
        		</tr>
    		</table>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</td></tr></table>
<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="right">
            <a href="<?php echo smarty_function_pc_url(array('action' => 'month','print' => 'true'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_PRINT']; ?>
</a>
        </td>
    </tr>
</table>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/global/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>