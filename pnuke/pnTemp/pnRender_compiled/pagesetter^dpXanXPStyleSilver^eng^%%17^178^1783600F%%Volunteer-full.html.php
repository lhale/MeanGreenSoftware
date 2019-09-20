<?php /* Smarty version 2.6.14, created on 2007-10-22 16:36:03
         compiled from Volunteer-full.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'nocache', 'Volunteer-full.html', 11, false),array('function', 'pnmodurl', 'Volunteer-full.html', 15, false),array('function', 'pnmodcallhooks', 'Volunteer-full.html', 16, false),)), $this); ?>
<?php $this->_cache_serials['pnTemp/pnRender_compiled\pagesetter^dpXanXPStyleSilver^eng^%%17^178^1783600F%%Volunteer-full.html.inc'] = '660eb7472217c3afc40b2b9dfae0a5de'; ?><h1><?php echo $this->_tpl_vars['core']['title']; ?>
</h1>
Title: <?php echo $this->_tpl_vars['title']; ?>
<br/>
Name: <?php echo $this->_tpl_vars['name']; ?>
<br/>
Email Address: <?php echo $this->_tpl_vars['email']['title']; ?>
<br/>
Select any of the checkboxes below: <?php echo $this->_tpl_vars['select_here']; ?>
<br/>
Select from the following (use CTRL key for multiples): <?php echo $this->_tpl_vars['what']; ?>
<br/>
Other - explain: <?php echo $this->_tpl_vars['other']; ?>
<br/>

<br/><br/>

<?php echo $this->_tpl_vars['core']['printThis']; ?>
 | <?php echo $this->_tpl_vars['core']['sendThis']; ?>
 | Hits: <?php if ($this->caching && !$this->_cache_including) { echo '{nocache:660eb7472217c3afc40b2b9dfae0a5de#0}'; };$this->_tag_stack[] = array('nocache', array()); $_block_repeat=true;pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start();  echo $this->_tpl_vars['core']['hitCount'];  $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including) { echo '{/nocache:660eb7472217c3afc40b2b9dfae0a5de#0}'; };?> | <?php if ($this->caching && !$this->_cache_including) { echo '{nocache:660eb7472217c3afc40b2b9dfae0a5de#1}'; };$this->_tag_stack[] = array('nocache', array()); $_block_repeat=true;pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start();  echo $this->_tpl_vars['core']['editThis'];  $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including) { echo '{/nocache:660eb7472217c3afc40b2b9dfae0a5de#1}'; };?>


<?php if ($this->_tpl_vars['core']['useDisplayHooks']): ?>
<?php echo smarty_function_pnmodurl(array('modname' => 'pagesetter','func' => 'viewpub','tid' => $this->_tpl_vars['core']['tid'],'pid' => $this->_tpl_vars['core']['pid'],'assign' => 'viewUrl'), $this);?>

<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'display','hookid' => $this->_tpl_vars['core']['uniqueId'],'module' => 'pagesetter','returnurl' => $this->_tpl_vars['viewUrl']), $this);?>

<?php endif; ?>
