<?php /* Smarty version 2.6.14, created on 2008-12-16 17:56:41
         compiled from blocks/Vinci_lsblock.htm */ ?>
<table  border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="20"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_hg.jpg" width="20" height="20"></td>
    <td ><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_haut.jpg"  height="20" width="130" ></td>
    <td width="16"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_hd2.jpg" width="15" height="20"></td>
  </tr>
  <tr>
    <td width="20" background="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_g1.9.gif"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pixel.gif" width="20" height="8"></td>
<!--
    <td background="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/fond_titre2.1.jpg" width="135" > 
-->
    <td > 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><span class="boxtitle"><b>
            <?php echo $this->_tpl_vars['title']; ?>
 </b>
            </span>
          </td>
        </tr>
        <tr>
          <td >
<!--
LDH - tricky ul/li biz is to override the default bulleted menu with CSS defined stuff
		(put #sidebar li ul  and #sidebar li a selector defines in your stylesheet)
-->
	    <div id="sidebar">
                <ul><li><?php echo $this->_tpl_vars['content']; ?>
</li></ul>
            </div>
<!-- 
            </span>
-->
          </td>
        </tr>
      </table>
      <span class="boxtitle"><b> 
      </b></span>
    </td>
    <td width="16" background="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_d1.7.gif"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pixel.gif" width="16" height="8">
    </td>
  </tr>
  <tr>
    <td width="20"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_bg.jpg" width="20" height="20"></td>
    <td><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_b.jpg"  height="20" width="130" ></td>
    <td width="16"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/menu_bd2.jpg" width="15" height="20"></td>
  </tr>
</table>
<br />