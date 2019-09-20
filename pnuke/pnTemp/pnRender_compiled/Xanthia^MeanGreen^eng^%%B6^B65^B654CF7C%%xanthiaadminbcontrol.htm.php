<?php /* Smarty version 2.6.14, created on 2008-11-04 11:39:50
         compiled from xanthiaadminbcontrol.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprephtmldisplay', 'xanthiaadminbcontrol.htm', 3, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadminbcontrol.htm', 5, false),array('function', 'pnml', 'xanthiaadminbcontrol.htm', 13, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</div>
<div class="pn-normal" style="width:100%;text-align:center;">
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['formurl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo $this->_tpl_vars['authid']; ?>
" />
	<input type="hidden" name="skin" id="skin" value="<?php echo $this->_tpl_vars['skin']; ?>
" />
	<input type="hidden" name="refresh" id="refresh" value="yes" />  
	<input type="hidden" name="set" value="yes" />			
		Module:
	<select name="bmodule" id="bmodule" size="1" tabindex="1">
	<option value="SetAll"><?php echo smarty_function_pnml(array('name' => '_XA_ALLMODULES'), $this);?>
</option>
		<?php unset($this->_sections['modules']);
$this->_sections['modules']['name'] = 'modules';
$this->_sections['modules']['loop'] = is_array($_loop=$this->_tpl_vars['modules']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modules']['show'] = true;
$this->_sections['modules']['max'] = $this->_sections['modules']['loop'];
$this->_sections['modules']['step'] = 1;
$this->_sections['modules']['start'] = $this->_sections['modules']['step'] > 0 ? 0 : $this->_sections['modules']['loop']-1;
if ($this->_sections['modules']['show']) {
    $this->_sections['modules']['total'] = $this->_sections['modules']['loop'];
    if ($this->_sections['modules']['total'] == 0)
        $this->_sections['modules']['show'] = false;
} else
    $this->_sections['modules']['total'] = 0;
if ($this->_sections['modules']['show']):

            for ($this->_sections['modules']['index'] = $this->_sections['modules']['start'], $this->_sections['modules']['iteration'] = 1;
                 $this->_sections['modules']['iteration'] <= $this->_sections['modules']['total'];
                 $this->_sections['modules']['index'] += $this->_sections['modules']['step'], $this->_sections['modules']['iteration']++):
$this->_sections['modules']['rownum'] = $this->_sections['modules']['iteration'];
$this->_sections['modules']['index_prev'] = $this->_sections['modules']['index'] - $this->_sections['modules']['step'];
$this->_sections['modules']['index_next'] = $this->_sections['modules']['index'] + $this->_sections['modules']['step'];
$this->_sections['modules']['first']      = ($this->_sections['modules']['iteration'] == 1);
$this->_sections['modules']['last']       = ($this->_sections['modules']['iteration'] == $this->_sections['modules']['total']);
?>
			<?php if ($this->_tpl_vars['defaultmodulevalue'] == $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['id']): ?>
				<option value="<?php echo $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['id']; ?>
" selected="selected"><?php echo $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['name']; ?>
</option>
			<?php else: ?>
				<option value="<?php echo $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['name']; ?>
</option>
			<?php endif; ?>
		<?php endfor; endif; ?>
	</select> <input name="remove" type="checkbox" value="yes" /> <label><?php echo smarty_function_pnml(array('name' => '_XA_REMOVE'), $this);?>
</label>
	<br /><br />
	Block:
	<select name="block[]" id="block[]" size="10" multiple="multiple">
	<?php unset($this->_sections['blocks']);
$this->_sections['blocks']['name'] = 'blocks';
$this->_sections['blocks']['loop'] = is_array($_loop=$this->_tpl_vars['blocks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blocks']['show'] = true;
$this->_sections['blocks']['max'] = $this->_sections['blocks']['loop'];
$this->_sections['blocks']['step'] = 1;
$this->_sections['blocks']['start'] = $this->_sections['blocks']['step'] > 0 ? 0 : $this->_sections['blocks']['loop']-1;
if ($this->_sections['blocks']['show']) {
    $this->_sections['blocks']['total'] = $this->_sections['blocks']['loop'];
    if ($this->_sections['blocks']['total'] == 0)
        $this->_sections['blocks']['show'] = false;
} else
    $this->_sections['blocks']['total'] = 0;
if ($this->_sections['blocks']['show']):

            for ($this->_sections['blocks']['index'] = $this->_sections['blocks']['start'], $this->_sections['blocks']['iteration'] = 1;
                 $this->_sections['blocks']['iteration'] <= $this->_sections['blocks']['total'];
                 $this->_sections['blocks']['index'] += $this->_sections['blocks']['step'], $this->_sections['blocks']['iteration']++):
$this->_sections['blocks']['rownum'] = $this->_sections['blocks']['iteration'];
$this->_sections['blocks']['index_prev'] = $this->_sections['blocks']['index'] - $this->_sections['blocks']['step'];
$this->_sections['blocks']['index_next'] = $this->_sections['blocks']['index'] + $this->_sections['blocks']['step'];
$this->_sections['blocks']['first']      = ($this->_sections['blocks']['iteration'] == 1);
$this->_sections['blocks']['last']       = ($this->_sections['blocks']['iteration'] == $this->_sections['blocks']['total']);
?>
		<?php if ($this->_tpl_vars['defaultmodulevalue'] == $this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['id']): ?>
			<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['id'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
		<?php else: ?>
			<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['id'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
		<?php endif; ?>
	<?php endfor; endif; ?>
	</select>
	<input type="submit" value="Update" />
</div>
</form>
</div>				
<div class="pn-sub" style="text-align:center;">
[&nbsp;<?php unset($this->_sections['menuoptions']);
$this->_sections['menuoptions']['name'] = 'menuoptions';
$this->_sections['menuoptions']['loop'] = is_array($_loop=$this->_tpl_vars['menuoptions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['menuoptions']['show'] = true;
$this->_sections['menuoptions']['max'] = $this->_sections['menuoptions']['loop'];
$this->_sections['menuoptions']['step'] = 1;
$this->_sections['menuoptions']['start'] = $this->_sections['menuoptions']['step'] > 0 ? 0 : $this->_sections['menuoptions']['loop']-1;
if ($this->_sections['menuoptions']['show']) {
    $this->_sections['menuoptions']['total'] = $this->_sections['menuoptions']['loop'];
    if ($this->_sections['menuoptions']['total'] == 0)
        $this->_sections['menuoptions']['show'] = false;
} else
    $this->_sections['menuoptions']['total'] = 0;
if ($this->_sections['menuoptions']['show']):

            for ($this->_sections['menuoptions']['index'] = $this->_sections['menuoptions']['start'], $this->_sections['menuoptions']['iteration'] = 1;
                 $this->_sections['menuoptions']['iteration'] <= $this->_sections['menuoptions']['total'];
                 $this->_sections['menuoptions']['index'] += $this->_sections['menuoptions']['step'], $this->_sections['menuoptions']['iteration']++):
$this->_sections['menuoptions']['rownum'] = $this->_sections['menuoptions']['iteration'];
$this->_sections['menuoptions']['index_prev'] = $this->_sections['menuoptions']['index'] - $this->_sections['menuoptions']['step'];
$this->_sections['menuoptions']['index_next'] = $this->_sections['menuoptions']['index'] + $this->_sections['menuoptions']['step'];
$this->_sections['menuoptions']['first']      = ($this->_sections['menuoptions']['iteration'] == 1);
$this->_sections['menuoptions']['last']       = ($this->_sections['menuoptions']['iteration'] == $this->_sections['menuoptions']['total']);
?>
<a href="<?php echo $this->_tpl_vars['menuoptions'][$this->_sections['menuoptions']['index']]['url']; ?>
"><?php echo $this->_tpl_vars['menuoptions'][$this->_sections['menuoptions']['index']]['title']; ?>
</a>
<?php if ($this->_sections['menuoptions']['last'] != true): ?>
&nbsp;|&nbsp;
<?php endif;  endfor; endif; ?>&nbsp;]
</div>
<br />
<div class="pn-normal" style="width:100%;">
<table width="100%" border="3">
	<tr>
		<?php unset($this->_sections['moduleheaders']);
$this->_sections['moduleheaders']['name'] = 'moduleheaders';
$this->_sections['moduleheaders']['loop'] = is_array($_loop=$this->_tpl_vars['moduleheaders']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['moduleheaders']['show'] = true;
$this->_sections['moduleheaders']['max'] = $this->_sections['moduleheaders']['loop'];
$this->_sections['moduleheaders']['step'] = 1;
$this->_sections['moduleheaders']['start'] = $this->_sections['moduleheaders']['step'] > 0 ? 0 : $this->_sections['moduleheaders']['loop']-1;
if ($this->_sections['moduleheaders']['show']) {
    $this->_sections['moduleheaders']['total'] = $this->_sections['moduleheaders']['loop'];
    if ($this->_sections['moduleheaders']['total'] == 0)
        $this->_sections['moduleheaders']['show'] = false;
} else
    $this->_sections['moduleheaders']['total'] = 0;
if ($this->_sections['moduleheaders']['show']):

            for ($this->_sections['moduleheaders']['index'] = $this->_sections['moduleheaders']['start'], $this->_sections['moduleheaders']['iteration'] = 1;
                 $this->_sections['moduleheaders']['iteration'] <= $this->_sections['moduleheaders']['total'];
                 $this->_sections['moduleheaders']['index'] += $this->_sections['moduleheaders']['step'], $this->_sections['moduleheaders']['iteration']++):
$this->_sections['moduleheaders']['rownum'] = $this->_sections['moduleheaders']['iteration'];
$this->_sections['moduleheaders']['index_prev'] = $this->_sections['moduleheaders']['index'] - $this->_sections['moduleheaders']['step'];
$this->_sections['moduleheaders']['index_next'] = $this->_sections['moduleheaders']['index'] + $this->_sections['moduleheaders']['step'];
$this->_sections['moduleheaders']['first']      = ($this->_sections['moduleheaders']['iteration'] == 1);
$this->_sections['moduleheaders']['last']       = ($this->_sections['moduleheaders']['iteration'] == $this->_sections['moduleheaders']['total']);
?>
			<th><?php echo $this->_tpl_vars['moduleheaders'][$this->_sections['moduleheaders']['index']]; ?>
</th>
		<?php endfor; endif; ?>
	</tr>
	<?php unset($this->_sections['modulecontrol']);
$this->_sections['modulecontrol']['name'] = 'modulecontrol';
$this->_sections['modulecontrol']['loop'] = is_array($_loop=$this->_tpl_vars['modulecontrol']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modulecontrol']['show'] = true;
$this->_sections['modulecontrol']['max'] = $this->_sections['modulecontrol']['loop'];
$this->_sections['modulecontrol']['step'] = 1;
$this->_sections['modulecontrol']['start'] = $this->_sections['modulecontrol']['step'] > 0 ? 0 : $this->_sections['modulecontrol']['loop']-1;
if ($this->_sections['modulecontrol']['show']) {
    $this->_sections['modulecontrol']['total'] = $this->_sections['modulecontrol']['loop'];
    if ($this->_sections['modulecontrol']['total'] == 0)
        $this->_sections['modulecontrol']['show'] = false;
} else
    $this->_sections['modulecontrol']['total'] = 0;
if ($this->_sections['modulecontrol']['show']):

            for ($this->_sections['modulecontrol']['index'] = $this->_sections['modulecontrol']['start'], $this->_sections['modulecontrol']['iteration'] = 1;
                 $this->_sections['modulecontrol']['iteration'] <= $this->_sections['modulecontrol']['total'];
                 $this->_sections['modulecontrol']['index'] += $this->_sections['modulecontrol']['step'], $this->_sections['modulecontrol']['iteration']++):
$this->_sections['modulecontrol']['rownum'] = $this->_sections['modulecontrol']['iteration'];
$this->_sections['modulecontrol']['index_prev'] = $this->_sections['modulecontrol']['index'] - $this->_sections['modulecontrol']['step'];
$this->_sections['modulecontrol']['index_next'] = $this->_sections['modulecontrol']['index'] + $this->_sections['modulecontrol']['step'];
$this->_sections['modulecontrol']['first']      = ($this->_sections['modulecontrol']['iteration'] == 1);
$this->_sections['modulecontrol']['last']       = ($this->_sections['modulecontrol']['iteration'] == $this->_sections['modulecontrol']['total']);
?>
		<?php if ($this->_tpl_vars['modulecontrol'][$this->_sections['modulecontrol']['index']]['modulename'] != ''): ?>    
			<tr>
				<td><?php echo $this->_tpl_vars['modulecontrol'][$this->_sections['modulecontrol']['index']]['modulename']; ?>
</td>
				<td>---</td>
				<td>---</td>
				<td>---</td>
				<td>---</td>
				<td>---</td>
				<td>---</td>
			</tr>
		<?php endif; ?>	
		<?php $this->assign('actions', $this->_tpl_vars['modulecontrol'][$this->_sections['modulecontrol']['index']]['actions']); ?>
		<?php unset($this->_sections['actions']);
$this->_sections['actions']['name'] = 'actions';
$this->_sections['actions']['loop'] = is_array($_loop=$this->_tpl_vars['actions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actions']['show'] = true;
$this->_sections['actions']['max'] = $this->_sections['actions']['loop'];
$this->_sections['actions']['step'] = 1;
$this->_sections['actions']['start'] = $this->_sections['actions']['step'] > 0 ? 0 : $this->_sections['actions']['loop']-1;
if ($this->_sections['actions']['show']) {
    $this->_sections['actions']['total'] = $this->_sections['actions']['loop'];
    if ($this->_sections['actions']['total'] == 0)
        $this->_sections['actions']['show'] = false;
} else
    $this->_sections['actions']['total'] = 0;
if ($this->_sections['actions']['show']):

            for ($this->_sections['actions']['index'] = $this->_sections['actions']['start'], $this->_sections['actions']['iteration'] = 1;
                 $this->_sections['actions']['iteration'] <= $this->_sections['actions']['total'];
                 $this->_sections['actions']['index'] += $this->_sections['actions']['step'], $this->_sections['actions']['iteration']++):
$this->_sections['actions']['rownum'] = $this->_sections['actions']['iteration'];
$this->_sections['actions']['index_prev'] = $this->_sections['actions']['index'] - $this->_sections['actions']['step'];
$this->_sections['actions']['index_next'] = $this->_sections['actions']['index'] + $this->_sections['actions']['step'];
$this->_sections['actions']['first']      = ($this->_sections['actions']['iteration'] == 1);
$this->_sections['actions']['last']       = ($this->_sections['actions']['iteration'] == $this->_sections['actions']['total']);
?>
			<?php if ($this->_tpl_vars['actions'][$this->_sections['actions']['index']]['blockname'] == 'Block Control' && $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['modulename'] == $this->_tpl_vars['modulecontrol'][$this->_sections['modulecontrol']['index']]['modulename']): ?>
				<tr>
					<td>|------<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['blockname']; ?>
</td>
					<td><a href="<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['removeurl']; ?>
"><?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['removelabel']; ?>
</a></td>
					<td><img src="images/global/<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['stateimg']; ?>
" /></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			<?php elseif ($this->_tpl_vars['actions'][$this->_sections['actions']['index']]['blockname'] != 'Block Control' && $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['blockname'] != ""): ?>
				<tr>
					<td>|------<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['blockname']; ?>
</td>
					<td><a href="<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['removeurl']; ?>
"><?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['removelabel']; ?>
</a></td>
					<td><img src="images/global/<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['stateimg']; ?>
" /></td>
					<td><a href="<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['up']; ?>
"><img src="images/global/up.gif" alt="<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['uptext']; ?>
" /></a></td>
					<td><a href="<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['down']; ?>
"><img src="images/global/down.gif" alt="<?php echo $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['downtext']; ?>
" /></a></td>
					<td>
						<select name="posizione" onchange="top.location.href=this.options[this.selectedIndex].value">
							<?php $this->assign('dropdown', $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['dropdown']); ?>
							<?php unset($this->_sections['dropdown']);
$this->_sections['dropdown']['name'] = 'dropdown';
$this->_sections['dropdown']['loop'] = is_array($_loop=$this->_tpl_vars['dropdown']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dropdown']['show'] = true;
$this->_sections['dropdown']['max'] = $this->_sections['dropdown']['loop'];
$this->_sections['dropdown']['step'] = 1;
$this->_sections['dropdown']['start'] = $this->_sections['dropdown']['step'] > 0 ? 0 : $this->_sections['dropdown']['loop']-1;
if ($this->_sections['dropdown']['show']) {
    $this->_sections['dropdown']['total'] = $this->_sections['dropdown']['loop'];
    if ($this->_sections['dropdown']['total'] == 0)
        $this->_sections['dropdown']['show'] = false;
} else
    $this->_sections['dropdown']['total'] = 0;
if ($this->_sections['dropdown']['show']):

            for ($this->_sections['dropdown']['index'] = $this->_sections['dropdown']['start'], $this->_sections['dropdown']['iteration'] = 1;
                 $this->_sections['dropdown']['iteration'] <= $this->_sections['dropdown']['total'];
                 $this->_sections['dropdown']['index'] += $this->_sections['dropdown']['step'], $this->_sections['dropdown']['iteration']++):
$this->_sections['dropdown']['rownum'] = $this->_sections['dropdown']['iteration'];
$this->_sections['dropdown']['index_prev'] = $this->_sections['dropdown']['index'] - $this->_sections['dropdown']['step'];
$this->_sections['dropdown']['index_next'] = $this->_sections['dropdown']['index'] + $this->_sections['dropdown']['step'];
$this->_sections['dropdown']['first']      = ($this->_sections['dropdown']['iteration'] == 1);
$this->_sections['dropdown']['last']       = ($this->_sections['dropdown']['iteration'] == $this->_sections['dropdown']['total']);
?>
								<option value=<?php echo $this->_tpl_vars['dropdown'][$this->_sections['dropdown']['index']]['onchange']; ?>
><?php echo $this->_tpl_vars['dropdown'][$this->_sections['dropdown']['index']]['value']; ?>
</option>
							<?php endfor; endif; ?>											
						</select>
					</td>
					<td>
						<select name="template" onchange="top.location.href=this.options[this.selectedIndex].value">
							<?php $this->assign('tdropdown', $this->_tpl_vars['actions'][$this->_sections['actions']['index']]['tdropdown']); ?>
							<?php unset($this->_sections['tdropdown']);
$this->_sections['tdropdown']['name'] = 'tdropdown';
$this->_sections['tdropdown']['loop'] = is_array($_loop=$this->_tpl_vars['tdropdown']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tdropdown']['show'] = true;
$this->_sections['tdropdown']['max'] = $this->_sections['tdropdown']['loop'];
$this->_sections['tdropdown']['step'] = 1;
$this->_sections['tdropdown']['start'] = $this->_sections['tdropdown']['step'] > 0 ? 0 : $this->_sections['tdropdown']['loop']-1;
if ($this->_sections['tdropdown']['show']) {
    $this->_sections['tdropdown']['total'] = $this->_sections['tdropdown']['loop'];
    if ($this->_sections['tdropdown']['total'] == 0)
        $this->_sections['tdropdown']['show'] = false;
} else
    $this->_sections['tdropdown']['total'] = 0;
if ($this->_sections['tdropdown']['show']):

            for ($this->_sections['tdropdown']['index'] = $this->_sections['tdropdown']['start'], $this->_sections['tdropdown']['iteration'] = 1;
                 $this->_sections['tdropdown']['iteration'] <= $this->_sections['tdropdown']['total'];
                 $this->_sections['tdropdown']['index'] += $this->_sections['tdropdown']['step'], $this->_sections['tdropdown']['iteration']++):
$this->_sections['tdropdown']['rownum'] = $this->_sections['tdropdown']['iteration'];
$this->_sections['tdropdown']['index_prev'] = $this->_sections['tdropdown']['index'] - $this->_sections['tdropdown']['step'];
$this->_sections['tdropdown']['index_next'] = $this->_sections['tdropdown']['index'] + $this->_sections['tdropdown']['step'];
$this->_sections['tdropdown']['first']      = ($this->_sections['tdropdown']['iteration'] == 1);
$this->_sections['tdropdown']['last']       = ($this->_sections['tdropdown']['iteration'] == $this->_sections['tdropdown']['total']);
?>
								<option value=<?php echo $this->_tpl_vars['tdropdown'][$this->_sections['tdropdown']['index']]['onchange']; ?>
><?php echo $this->_tpl_vars['tdropdown'][$this->_sections['tdropdown']['index']]['value']; ?>
</option>
							<?php endfor; endif; ?>											
						</select>
					</td>
				</tr>
			<?php endif; ?>
		<?php endfor; endif; ?>
	<?php endfor; endif; ?>
</table>
</div>