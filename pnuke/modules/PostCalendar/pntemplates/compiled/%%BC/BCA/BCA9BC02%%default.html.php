<?php /* Smarty version 2.6.14, created on 2007-10-09 10:29:20
         compiled from default/views/year/default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/views/year/default.html', 2, false),array('function', 'fetch', 'default/views/year/default.html', 6, false),array('function', 'eval', 'default/views/year/default.html', 7, false),array('function', 'pc_view_select', 'default/views/year/default.html', 20, false),array('function', 'pc_url', 'default/views/year/default.html', 45, false),array('modifier', 'date_format', 'default/views/year/default.html', 16, false),array('modifier', 'string_format', 'default/views/year/default.html', 40, false),array('modifier', 'count', 'default/views/year/default.html', 69, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "default.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>

<?php echo smarty_function_fetch(array('file' => ($this->_tpl_vars['TPL_STYLE_PATH'])."/year.css",'assign' => 'css'), $this);?>

<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['css']), $this);?>

<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/global/navigation.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="yearheader">
    <tr align="center">
        <td class="yearheader" width="100%" align="center" valign="middle">
        	<a href="<?php echo $this->_tpl_vars['PREV_YEAR_URL']; ?>
">&lt;&lt;</a>
        	<?php echo ((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_config[0]['vars']['_PC_DATE_FORMAT_Y']) : smarty_modifier_date_format($_tmp, $this->_config[0]['vars']['_PC_DATE_FORMAT_Y'])); ?>

        	<a href="<?php echo $this->_tpl_vars['NEXT_YEAR_URL']; ?>
">&gt;&gt;</a>
		<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
		<td nowrap align="right" valign="top" class="yearheader">
			<?php echo smarty_function_pc_view_select(array('label' => $this->_config[0]['vars']['_PC_TPL_VIEW_LABEL'],'class' => ""), $this);?>

		</td>
		<?php endif; ?>
    </tr>
</table>
<?php echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="calcontainer"><tr><td><table width="100%" border="0" cellpadding="5" cellspacing="0">';  echo '';  $_from = $this->_tpl_vars['CAL_FORMAT']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['months'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['months']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['monthnum'] => $this->_tpl_vars['month']):
        $this->_foreach['months']['iteration']++;
 echo '';  echo '';  if ($this->_foreach['months']['iteration'] % 4 == 1):  echo '<tr>';  endif;  echo '<td width="25%" valign="top" align="center">';  echo '';  $this->assign('y', ((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")));  echo '';  echo '';  $this->assign('m', $this->_tpl_vars['monthnum']+1);  echo '';  echo '';  $this->assign('m', ((is_array($_tmp=$this->_tpl_vars['m'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")));  echo '';  echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="calcontainer"><tr><td width="100%" class="monthheader" colspan="8" valign="top" align="center"><a href="';  echo smarty_function_pc_url(array('action' => 'month','date' => ($this->_tpl_vars['y'])."-".($this->_tpl_vars['m'])."-01"), $this); echo '">';  echo $this->_tpl_vars['A_MONTH_NAMES'][$this->_tpl_vars['monthnum']];  echo '</a></td></tr><tr><td class="weeklink">&nbsp;</td>';  $_from = $this->_tpl_vars['S_SHORT_DAY_NAMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['daynames'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['daynames']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['day']):
        $this->_foreach['daynames']['iteration']++;
 echo '<td width="14%" class="daynames" align="center">';  echo $this->_tpl_vars['day'];  echo '</td>';  endforeach; endif; unset($_from);  echo '</tr>';  $_from = $this->_tpl_vars['month']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['weeks'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['weeks']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['days']):
        $this->_foreach['weeks']['iteration']++;
 echo '<tr><td align="center" valign="middle" class="weeklink"><a href="';  echo smarty_function_pc_url(array('action' => 'week','date' => $this->_tpl_vars['days'][0]), $this); echo '" class="weeklink">&gt;</a></td>';  $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['day'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['day']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['date']):
        $this->_foreach['day']['iteration']++;
 echo '';  $this->assign('themonth', ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")));  echo '';  if ($this->_tpl_vars['date'] == $this->_tpl_vars['TODAY_DATE'] && $this->_tpl_vars['themonth'] == $this->_foreach['months']['iteration']):  echo '';  $this->assign('stylesheet', 'monthtoday');  echo '';  elseif ($this->_tpl_vars['themonth'] == $this->_foreach['months']['iteration']):  echo '';  $this->assign('stylesheet', 'monthon');  echo '';  else:  echo '';  $this->assign('stylesheet', 'monthoff');  echo '';  endif;  echo '<td width="14%" align="center" class="';  echo $this->_tpl_vars['stylesheet'];  echo '">';  if (count($this->_tpl_vars['A_EVENTS'][$this->_tpl_vars['date']]) > 2):  echo '';  $this->assign('classname', "event-three");  echo '';  elseif (count($this->_tpl_vars['A_EVENTS'][$this->_tpl_vars['date']]) > 1):  echo '';  $this->assign('classname', "event-two");  echo '';  elseif (count($this->_tpl_vars['A_EVENTS'][$this->_tpl_vars['date']]) > 0):  echo '';  $this->assign('classname', "event-one");  echo '';  else:  echo '';  $this->assign('classname', "event-none");  echo '';  endif;  echo '<a class="';  echo $this->_tpl_vars['classname'];  echo '" href="';  echo smarty_function_pc_url(array('action' => 'day','date' => $this->_tpl_vars['date']), $this); echo '">';  echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d"));  echo '</a></td>';  endforeach; endif; unset($_from);  echo '</tr>';  endforeach; endif; unset($_from);  echo '</table>';  endforeach; endif; unset($_from);  echo '</td>';  if ($this->_foreach['months']['iteration'] % 3 == 1):  echo '</tr>';  endif;  echo '</table></td></tr></table>'; ?>

<?php if ($this->_tpl_vars['PRINT_VIEW'] != 1): ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="right">
            <a href="<?php echo smarty_function_pc_url(array('action' => 'year','print' => 'true'), $this);?>
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