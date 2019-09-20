<?php /* Smarty version 2.6.14, created on 2008-11-13 08:31:20
         compiled from News-index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'articleadminlinks', 'News-index.htm', 4, false),array('function', 'pnml', 'News-index.htm', 6, false),)), $this); ?>
 <div class="middle-column-box-white">
 <div class="middle-column-box-title-blue"><p>
	    <?php echo $this->_tpl_vars['preformat']['catandtitle']; ?>
</p></div>
		<p><?php echo $this->_tpl_vars['info']['briefdate']; ?>
&nbsp;&nbsp;&nbsp;<?php echo smarty_function_articleadminlinks(array('sid' => $this->_tpl_vars['info']['sid']), $this);?>
</p>
        <p> <?php echo $this->_tpl_vars['info']['hometext']; ?>
</p>
        <p> <?php echo smarty_function_pnml(array('name' => '_POSTEDBY'), $this);?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['info']['informant']; ?>
</p>
        
         <p> <?php echo $this->_tpl_vars['preformat']['comment']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['preformat']['readmore']; ?>
</p>
        </div>