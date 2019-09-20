<?php /* Smarty version 2.6.14, created on 2007-09-28 16:22:34
         compiled from xanthiaadminmodifycolors.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprepfordisplay', 'xanthiaadminmodifycolors.htm', 17, false),array('function', 'pnmodurl', 'xanthiaadminmodifycolors.htm', 116, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<script language="JavaScript">
var bb="";
var trace = "traceoff";
var array_checked = new Array("","","","");
var basehex = true;
var target="background";
var demotarget  = "";
var statuscolor = "#FFFFFF"
var statustext = "Current target for colorchange is "+
"<strong><font color='"+statuscolor+"'>"+target+"</strong>";
var swapflag="no";
var swapsource="";
var updwindow="yes";
var colorvalue="";
<?php unset($this->_sections['items']);
$this->_sections['items']['name'] = 'items';
$this->_sections['items']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['items']['show'] = true;
$this->_sections['items']['max'] = $this->_sections['items']['loop'];
$this->_sections['items']['step'] = 1;
$this->_sections['items']['start'] = $this->_sections['items']['step'] > 0 ? 0 : $this->_sections['items']['loop']-1;
if ($this->_sections['items']['show']) {
    $this->_sections['items']['total'] = $this->_sections['items']['loop'];
    if ($this->_sections['items']['total'] == 0)
        $this->_sections['items']['show'] = false;
} else
    $this->_sections['items']['total'] = 0;
if ($this->_sections['items']['show']):

            for ($this->_sections['items']['index'] = $this->_sections['items']['start'], $this->_sections['items']['iteration'] = 1;
                 $this->_sections['items']['iteration'] <= $this->_sections['items']['total'];
                 $this->_sections['items']['index'] += $this->_sections['items']['step'], $this->_sections['items']['iteration']++):
$this->_sections['items']['rownum'] = $this->_sections['items']['iteration'];
$this->_sections['items']['index_prev'] = $this->_sections['items']['index'] - $this->_sections['items']['step'];
$this->_sections['items']['index_next'] = $this->_sections['items']['index'] + $this->_sections['items']['step'];
$this->_sections['items']['first']      = ($this->_sections['items']['iteration'] == 1);
$this->_sections['items']['last']       = ($this->_sections['items']['iteration'] == $this->_sections['items']['total']);
?>  
	var color1="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color1'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color2="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color2'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color3="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color3'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color4="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color4'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color5="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color5'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color6="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color6'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color7="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color7'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var color8="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color8'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var sepcolor="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['sepcolor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var colorback="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['bgcolor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var colortext1="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['text1'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var colortext2="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['text2'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var colorlink="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['link'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var colorhover="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['hover'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
	var colorvlink="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['vlink'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
";
<?php $this->assign('palname', $this->_tpl_vars['items'][$this->_sections['items']['index']]['palname']); ?>	
<?php endfor; endif; ?>

var hexvalue = new Array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
var hexstring = "0123456789ABCDEF";
var gg="";
var rr="";
var undocolor="FFFFFF";
var redocolor="";

function brighter (){
	tempbase = basehex;
	basehex=false;
	setrgb();
	if (control.document.buttonbar.adjred.checked == true) rr = Math.min(255,rr+1);
	if (control.document.buttonbar.adjgreen.checked == true) gg = Math.min(255,gg+1);
	if (control.document.buttonbar.adjblue.checked == true) bb = Math.min(255,bb+1);
	SetColor(rgbtohex(rr)+rgbtohex(gg)+rgbtohex(bb));
	basehex=tempbase;
	setrgb();
	updrgb();
}

function darker (){
	tempbase = basehex;
	basehex=false;
	setrgb();
	if (control.document.buttonbar.adjred.checked == true) rr = Math.max(0,rr-1);
	if (control.document.buttonbar.adjgreen.checked == true) gg = Math.max(0,gg-1);
	if (control.document.buttonbar.adjblue.checked == true) bb = Math.max(0,bb-1);
	SetColor(rgbtohex(rr)+rgbtohex(gg)+rgbtohex(bb));
	basehex=tempbase;
	setrgb();
	updrgb();
}

function UseValue(rr,gg,bb)
{
    if (basehex == true) {
	    SetColor(rr+gg+bb);
	} else {
	    SetColor(rgbtohex(rr)+rgbtohex(gg)+rgbtohex(bb));
    }
}

function SetDec()
{
	if (basehex == true) {
		control.document.buttonbar.chred.value=parseInt(control.document.buttonbar.chred.value,16);
		control.document.buttonbar.chgreen.value=parseInt(control.document.buttonbar.chgreen.value,16);
		control.document.buttonbar.chblue.value=parseInt(control.document.buttonbar.chblue.value,16);
		basehex = false;
	}
}

function SetHex()
{
	if (basehex ==false) {
		control.document.buttonbar.chred.value=rgbtohex(control.document.buttonbar.chred.value);
		control.document.buttonbar.chgreen.value=rgbtohex(control.document.buttonbar.chgreen.value);
		control.document.buttonbar.chblue.value=rgbtohex(control.document.buttonbar.chblue.value);
		basehex = true;
	}
}

function Hexdec(token) 
{
	var dec = hexstring.indexOf(token);
	return(dec);
}

function hextorgb (token)
{
	return(parseInt(token,16));
}

function rgbtohex(token)
{
	return(Hex(token));
}

function init()
{
	statustext = "Current target for colorchange is <strong><font color='#000080'>"+target+"</strong>";
	status2.location.href='<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'status','authid' => $this->_tpl_vars['authid']), $this);?>
';
}

function swap()
{
	swapflag="yes";
	statustext = "Swapfunction active - push button for swapsource1";
	status2.location.href='<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'status','authid' => $this->_tpl_vars['authid']), $this);?>
';
}

function Hex(value)
{
	hex2 = value % 16;
	hex1 = (value-hex2)/16;
	return(hexvalue[hex1]+hexvalue[hex2]);
}

function SetTarget(dest)
{
	target=dest;
	if (target=='background')undocolor = colorback;
	if (target=='color1')    undocolor = color1;
	if (target=='color2')    undocolor = color2;
	if (target=='color3')    undocolor = color3;
	if (target=='color4')    undocolor = color4;
	if (target=='color5')    undocolor = color5;
	if (target=='color6')    undocolor = color6;
	if (target=='color7')    undocolor = color7;
	if (target=='color8')    undocolor = color8;
	if (target=='sepcolor')  undocolor = sepcolor;
	if (target=='text1')     undocolor = colortext1;
	if (target=='text2')     undocolor = colortext2;
	if (target=='link')      undocolor = colorlink;
	if (target=='vlink')     undocolor = colorvlink;
	if (target=='hover')     undocolor = colorhover;
	if (swapflag=="no") {
		colorvalue=undocolor;
		setrgb();
		updrgb();
		statustext = "Current target for colorchange is <strong><FONT COLOR='"+statuscolor+"'>"+target+"</FONT></strong>";
		status2.location.href='<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'status','authid' => $this->_tpl_vars['authid']), $this);?>
';
	} else {
		if (swapsource=="") {
		   swapsource=target;
		   swapcolor1=undocolor;
		   statustext = "Swapsource1="+swapsource+" - click swapsource2";
		   status2.location.href='<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'status','authid' => $this->_tpl_vars['authid']), $this);?>
';
		} else {
			swapflag="no";
			swapcolor2=undocolor;
			updwindow="no";
			SetColor(swapcolor1);
			SetTarget(swapsource);
			updwindow="yes";
			SetColor(swapcolor2);
			swapsource="";
		}
	}
}

function undo()
{
	SetColor(undocolor);
}

function setrgb()
{
	rr = colorvalue.substring(0,2);
	gg = colorvalue.substring(2,4);
	bb = colorvalue.substring(4,6);
	if (basehex == false) {
		rr = hextorgb(rr);
		gg = hextorgb(gg);
		bb = hextorgb(bb);
	}
}

function updrgb()
{
	control.document.buttonbar.chred.value=rr;
	control.document.buttonbar.chgreen.value=gg;
	control.document.buttonbar.chblue.value=bb;
}

function SetColor(tempcolor)
{
	colorvalue=tempcolor;
	if (target=='background') {
		undocolor=colorback;
		colorback=tempcolor;
	}
	if (target=='color1') {
		undocolor=color1;
		color1 = colorvalue;
	}
	if (target=='color2') {
		undocolor=color2;
		color2 = colorvalue;
	}
	if (target=='color3') {
		undocolor=color3;
		color3 = colorvalue;
	}
	if (target=='color4') {
		undocolor=color4;
		color4 = colorvalue;
	}
	if (target=='color5') {
		undocolor=color5;
		color5 = colorvalue;
	}
	if (target=='color6') {
		undocolor=color6;
		color6 = colorvalue;
	}
	if (target=='color7') {
		undocolor=color7;
		color7 = colorvalue;
	}
	if (target=='color8') {
		undocolor=color8;
		color8 = colorvalue;
	}
	if (target=='sepcolor') {
		undocolor=sepcolor;
		sepcolor = colorvalue;
	}
	if (target=='text1') {
		undocolor=colortext1;
		colortext1 = colorvalue;
	}
	if (target=='text2') {
		undocolor=colortext2;
		colortext2 = colorvalue;
	}
	if (target=='link') {
		undocolor=colorlink;
		colorlink = colorvalue;
	}
	if (target=='vlink') {
		undocolor=colorvlink;
		colorvlink = colorvalue;
	}
	if (target=='hover') {
		undocolor=colorhover;
		colorhover = colorvalue;
	}
	if (updwindow=="yes") {
		setrgb();
		updrgb();
		demo.location.reload();
	}
}
</script>

<table>
	<tr>
		<td>
			<iframe name="control" src="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'control','skin' => $this->_tpl_vars['skin'],'paletteid' => $this->_tpl_vars['paletteid']), $this);?>
" width="600" height="90" scrolling="no" frameborder="0"></iframe>
		</td>
	</tr>
	<tr>
		<td>
			<iframe name="status2" src="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'status','skin' => $this->_tpl_vars['skin'],'paletteid' => $this->_tpl_vars['paletteid']), $this);?>
" width="600" height="35" scrolling="no" frameborder="0"></iframe>
		</td>
	</tr>
</table>
<table>
	<tr>
		<td>
			<iframe name="demo" src="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'demo','skin' => $this->_tpl_vars['skin'],'paletteid' => $this->_tpl_vars['paletteid'],'palname' => $this->_tpl_vars['palname']), $this);?>
" width="400" height="800" scrolling="no" frameborder="0"></iframe>
		</td>
		<td>
			<iframe name="color" src="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'getIncludes','link' => 'color','skin' => $this->_tpl_vars['skin'],'paletteid' => $this->_tpl_vars['paletteid']), $this);?>
" width="200" height="270" scrolling="no" frameborder="0"></iframe>
		</td>
	</tr>
</table>