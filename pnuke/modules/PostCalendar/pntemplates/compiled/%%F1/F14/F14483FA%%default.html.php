<?php /* Smarty version 2.6.14, created on 2007-11-30 11:04:48
         compiled from default/views/month/default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/views/month/default.html', 2, false),array('function', 'fetch', 'default/views/month/default.html', 7, false),array('function', 'eval', 'default/views/month/default.html', 8, false),array('function', 'pc_view_select', 'default/views/month/default.html', 22, false),array('function', 'pc_url', 'default/views/month/default.html', 49, false),array('function', 'pc_sort_events', 'default/views/month/default.html', 68, false),array('function', 'pc_popup', 'default/views/month/default.html', 102, false),array('modifier', 'pc_date_format', 'default/views/month/default.html', 17, false),array('modifier', 'date_format', 'default/views/month/default.html', 53, false),array('modifier', 'strip_tags', 'default/views/month/default.html', 92, false),array('modifier', 'truncate', 'default/views/month/default.html', 98, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "default.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<?php echo smarty_function_fetch(array('file' => ($this->_tpl_vars['TPL_STYLE_PATH'])."/month.css",'assign' => 'css'), $this);?>

<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['css']), $this);?>

<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/global/navigation.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="monthheader">
	<tr align="center">
    	<td nowrap width="100%" align="center" valign="top" class="monthheader">
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

<table width="100%" border="0" cellpadding="1" cellspacing="0" class="calcontainer"><tr><td>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <?php $_from = $this->_tpl_vars['S_LONG_DAY_NAMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day']):
?>
        <td width="14%" align="center" valign="middle" class="daynames"><?php echo $this->_tpl_vars['day']; ?>
</td>
        <?php endforeach; endif; unset($_from); ?>
    </tr>
    	<?php $_from = $this->_tpl_vars['CAL_FORMAT']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['weeks'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['weeks']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['days']):
        $this->_foreach['weeks']['iteration']++;
?>
	<tr>
		<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['days'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['days']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['date']):
        $this->_foreach['days']['iteration']++;
?>
		<?php if ($this->_tpl_vars['date'] == $this->_tpl_vars['TODAY_DATE']): ?>
			<?php $this->assign('stylesheet', 'monthtoday'); ?>
		<?php elseif (( $this->_tpl_vars['date'] < $this->_tpl_vars['MONTH_START_DATE'] || $this->_tpl_vars['date'] > $this->_tpl_vars['MONTH_END_DATE'] )): ?>
			<?php $this->assign('stylesheet', 'monthoff'); ?>
		<?php else: ?>
			<?php $this->assign('stylesheet', 'monthon'); ?>
		<?php endif; ?>
		<td height="75" align="left" valign="top" class="<?php echo $this->_tpl_vars['stylesheet']; ?>
"
		    onmouseover="this.style.backgroundColor='<?php echo $this->_config[0]['vars']['CellHighlight']; ?>
'"
			onmouseout="this.style.backgroundColor=''"
			onclick="javascript:location.href='<?php echo smarty_function_pc_url(array('action' => 'day','date' => $this->_tpl_vars['date']), $this);?>
';">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left" valign="top"><a 
						href="<?php echo smarty_function_pc_url(array('action' => 'day','date' => $this->_tpl_vars['date']), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
</a>
					<?php if ($this->_foreach['days']['iteration'] == 1): ?>
					<a href="<?php echo smarty_function_pc_url(array('action' => 'week','date' => $this->_tpl_vars['date']), $this);?>
">[<?php echo $this->_config[0]['vars']['_PC_MV_WEEK']; ?>
]</a>
					<?php endif; ?>
					</td>
					<td align="right" valign="top">
						<?php if ($this->_tpl_vars['ACCESS_ADD'] == true): ?>
						<a href="<?php echo smarty_function_pc_url(array('action' => 'submit','date' => $this->_tpl_vars['date']), $this);?>
"><img 
                 		src="<?php echo $this->_tpl_vars['TPL_IMAGE_PATH']; ?>
/new.gif" width="10" height="10" border="0" alt=""></a>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" valign="top" align="left"><div>
										<?php echo smarty_function_pc_sort_events(array('var' => 'S_EVENTS','sort' => 'time','order' => 'asc','value' => $this->_tpl_vars['A_EVENTS']), $this);?>

					<?php $this->assign('oldCat', ""); ?>
					<?php $_from = $this->_tpl_vars['S_EVENTS'][$this->_tpl_vars['date']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['events'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['events']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['event']):
        $this->_foreach['events']['iteration']++;
?>
						<?php $this->assign('cCat', $this->_tpl_vars['event']['catname']); ?>
						<?php if ($this->_tpl_vars['oldCat'] != $this->_tpl_vars['cCat']): ?>
							<?php if (($this->_foreach['event']['iteration'] <= 1) != true): ?>
								</div>
							<?php endif; ?>
							<div style="padding: 1px; background-color: <?php echo $this->_tpl_vars['event']['catcolor']; ?>
;">
								<?php echo $this->_tpl_vars['event']['catname']; ?>

							</div>
						<?php endif; ?>
							<div style="padding: 2px; border:solid 1px <?php echo $this->_tpl_vars['event']['catcolor']; ?>
;">
						
												<?php if ($this->_tpl_vars['event']['alldayevent'] != true): ?>
							<?php if ($this->_tpl_vars['24HOUR_TIME']): ?>
								<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['event']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_24']) : smarty_modifier_date_format($_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_24']))); ?>
							<?php else: ?>
								<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['event']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_12']) : smarty_modifier_date_format($_tmp, $this->_config[0]['vars']['_PC_TIME_FORMAT_12']))); ?>
							<?php endif; ?>
														<?php $this->assign('title', ((is_array($_tmp=$this->_tpl_vars['event']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp))); ?>
						<?php else: ?>
							<?php $this->assign('timestamp', ""); ?>
														<?php $this->assign('title', ((is_array($_tmp=$this->_tpl_vars['event']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp))); ?>
						<?php endif; ?>
						<?php $this->assign('desc', ((is_array($_tmp=$this->_tpl_vars['event']['hometext'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 255, "...") : smarty_modifier_truncate($_tmp, 255, "..."))); ?>
												<a style="font-size: 7pt; text-decoration: none;" 
						   href="<?php echo smarty_function_pc_url(array('action' => 'detail','eid' => $this->_tpl_vars['event']['eid'],'date' => $this->_tpl_vars['date']), $this);?>
" 
						<?php echo smarty_function_pc_popup(array('delay' => '500','bgcolor' => ($this->_tpl_vars['event'][$this->_sections['catcolor']['index']]),'timeout' => '3600','caption' => ($this->_tpl_vars['timestamp'])." ".($this->_tpl_vars['event'][$this->_sections['title']['index']]),'text' => ($this->_tpl_vars['desc'])), $this);?>
>
                    	<?php echo $this->_tpl_vars['timestamp']; ?>
 <?php echo $this->_tpl_vars['title']; ?>
</a><br />
						<?php $this->assign('oldCat', $this->_tpl_vars['event']['catname']); ?>
												</div>
					<?php endforeach; endif; unset($_from); ?>
					</div></td>
				</tr>
			</table>			
		</td>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
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