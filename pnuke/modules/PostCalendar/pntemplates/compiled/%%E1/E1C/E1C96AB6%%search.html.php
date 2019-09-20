<?php /* Smarty version 2.6.14, created on 2007-10-10 08:45:06
         compiled from default/user/search.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fetch', 'default/user/search.html', 3, false),array('function', 'eval', 'default/user/search.html', 4, false),array('function', 'config_load', 'default/user/search.html', 7, false),array('function', 'counter', 'default/user/search.html', 36, false),array('function', 'pc_sort_events', 'default/user/search.html', 37, false),array('function', 'pc_url', 'default/user/search.html', 48, false),array('function', 'pc_date_format', 'default/user/search.html', 50, false),array('function', 'pc_popup', 'default/user/search.html', 82, false),array('modifier', 'count', 'default/user/search.html', 39, false),array('modifier', 'date_format', 'default/user/search.html', 40, false),array('modifier', 'string_format', 'default/user/search.html', 41, false),array('modifier', 'strip_tags', 'default/user/search.html', 86, false),)), $this); ?>
<?php echo smarty_function_fetch(array('file' => ($this->_tpl_vars['TPL_STYLE_PATH'])."/search.css",'assign' => 'css'), $this);?>

<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['css']), $this);?>

<!-- main navigation -->
<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/global/small_navigation.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid black;"><tr><td>
<form name="search" action="<?php echo $this->_tpl_vars['FORM_ACTION']; ?>
" method="POST">
<br />
<?php echo $this->_config[0]['vars']['_PC_SEARCH_KEYWORDS']; ?>
: <input type="text" name="pc_keywords" value="" />
<select name="pc_keywords_andor">
	<option value="AND"><?php echo $this->_config[0]['vars']['_PC_SEARCH_AND']; ?>
</option>
	<option value="OR"><?php echo $this->_config[0]['vars']['_PC_SEARCH_OR']; ?>
</option>
</select>
<?php echo $this->_config[0]['vars']['_PC_SEARCH_IN']; ?>
:
<select name="pc_category">
	<option value=""><?php echo $this->_config[0]['vars']['_PC_SEARCH_ANY_CATEGORY']; ?>
</option>
	<?php echo $this->_tpl_vars['CATEGORY_OPTIONS']; ?>

</select>
<?php if ($this->_tpl_vars['USE_TOPICS']): ?>
<select name="pc_topic">
	<option value=""><?php echo $this->_config[0]['vars']['_PC_SEARCH_ANY_TOPIC']; ?>
</option>
	<?php echo $this->_tpl_vars['TOPIC_OPTIONS']; ?>

</select>
<?php endif; ?>
<input type="submit" name="submit" value="<?php echo $this->_config[0]['vars']['_PC_SUBMIT']; ?>
" />
</form>
</td></tr></table>

<?php if ($this->_tpl_vars['SEARCH_PERFORMED']): ?>
<br />
<?php echo smarty_function_counter(array('start' => 0,'print' => false,'assign' => 'eventCount'), $this);?>

<?php echo smarty_function_pc_sort_events(array('var' => 'S_EVENTS','sort' => 'category','order' => 'asc','value' => $this->_tpl_vars['A_EVENTS']), $this);?>

<?php $_from = $this->_tpl_vars['S_EVENTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dates'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dates']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cdate'] => $this->_tpl_vars['date']):
        $this->_foreach['dates']['iteration']++;
?>
	<?php if (count($this->_tpl_vars['date']) > 0): ?>
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
				<?php echo smarty_function_pc_date_format(array('date' => $this->_tpl_vars['cdate'],'format' => "%A, %d %B %Y"), $this);?>

			<?php else: ?>	
				<?php echo smarty_function_pc_date_format(array('date' => $this->_tpl_vars['cdate'],'format' => "%A, %B %d %Y"), $this);?>

			<?php endif; ?></a>
    		</td>
		</tr>
	</table>
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="calcontainer">
		<tr>
			<td width="100%" class="eventslist">
    			<?php $this->assign('oldCat', ""); ?>
				<?php $_from = $this->_tpl_vars['date']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['events'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['events']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['event']):
        $this->_foreach['events']['iteration']++;
?>
					<?php echo smarty_function_counter(array(), $this);?>

					<?php $this->assign('cCat', $this->_tpl_vars['event']['catname']); ?>
					<?php if ($this->_tpl_vars['oldCat'] != $this->_tpl_vars['cCat']): ?>
					<?php if (($this->_foreach['events']['iteration'] <= 1) != true): ?>
						</div>
					<?php endif; ?>
					<div width="100%" style="padding: 2px; background-color: <?php echo $this->_tpl_vars['event']['catcolor']; ?>
;">
						<?php echo $this->_tpl_vars['event']['catname']; ?>

					</div>
					<div width="100%" style="padding: 2px; border:solid 1px <?php echo $this->_tpl_vars['event']['catcolor']; ?>
;">
					<?php endif; ?>
					<?php if ($this->_tpl_vars['24HOUR_TIME']): ?>
						<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['event']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M"))); ?>
					<?php else: ?>
						<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['event']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%I:%M %p") : smarty_modifier_date_format($_tmp, "%I:%M %p"))); ?>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['event']['alldayevent'] != true): ?>
						<?php echo $this->_tpl_vars['timestamp']; ?>
  
					<?php endif; ?>
					<a href="<?php echo smarty_function_pc_url(array('action' => 'detail','eid' => $this->_tpl_vars['event']['eid'],'date' => $this->_tpl_vars['cdate']), $this);?>
" 
					<?php echo smarty_function_pc_popup(array('delay' => '500','bgcolor' => $this->_tpl_vars['event']['catcolor'],'caption' => $this->_tpl_vars['event']['title'],'text' => $this->_tpl_vars['event']['hometext']), $this);?>
>
    				<?php echo ((is_array($_tmp=$this->_tpl_vars['event']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a> 
					<?php if ($this->_tpl_vars['event']['alldayevent'] != true): ?>
						(<?php echo $this->_tpl_vars['event']['duration_hours']; ?>
:<?php echo $this->_tpl_vars['event']['duration_minutes']; ?>
)
					<?php endif; ?>
					<br />
					<?php $this->assign('oldCat', $this->_tpl_vars['event']['catname']); ?>
					<?php if (($this->_foreach['events']['iteration'] == $this->_foreach['events']['total'])): ?>
												</div>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
    		</td>
		</tr>
	</table>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['eventCount'] == 0): ?>
<?php echo $this->_config[0]['vars']['_PC_SEARCH_NO_RESULTS']; ?>

<?php endif; ?>
<?php endif; ?>