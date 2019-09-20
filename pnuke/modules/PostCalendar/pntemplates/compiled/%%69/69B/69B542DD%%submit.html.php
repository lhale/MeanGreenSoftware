<?php /* Smarty version 2.6.14, created on 2007-10-08 15:27:38
         compiled from default/admin/submit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/admin/submit.html', 4, false),array('function', 'pc_url', 'default/admin/submit.html', 8, false),)), $this); ?>
<!-- main navigation -->
<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<form action="<?php echo smarty_function_pc_url(array('action' => "submit-admin"), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<table border="0" cellpadding="1" cellspacing="0" bgcolor="<?php echo $this->_tpl_vars['BGCOLOR2']; ?>
" width="100%">
    <tr><td align="left" valign="middle" width="100%">
        <table width="100%" border="0" cellpadding="2" cellspacing="0" bgcolor="<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
">

<!-- EVENT INFO ROWS -->            
            <tr>
                <th bgcolor="<?php echo $this->_tpl_vars['BGCOLOR2']; ?>
" colspan="2" align="left" valign="middle" width="100%"><?php echo $this->_tpl_vars['NewEventHeader']; ?>
</th>
            </tr>
            <tr>
                <td bgcolor="<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
" align="left" valign="top" width="50%">
                <?php echo $this->_tpl_vars['EventTitle']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['Required']; ?>
<br />
                <input type="text" name="<?php echo $this->_tpl_vars['InputEventTitle']; ?>
" value="<?php echo $this->_tpl_vars['ValueEventTitle']; ?>
" /><br />
                <?php echo $this->_tpl_vars['DateTimeTitle']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['Required']; ?>
<br />
                <?php echo $this->_tpl_vars['SelectDateTime']; ?>
<br />
                <table border="0" cellpadding="0" cellspacing="1">
                    <tr>
                        <td valign="top" align="left"><input type="radio" name="<?php echo $this->_tpl_vars['InputAllday']; ?>
" value="<?php echo $this->_tpl_vars['ValueAllday']; ?>
" <?php echo $this->_tpl_vars['SelectedAllday']; ?>
 /></td>
                        <td valign="top" align="left"><?php echo $this->_tpl_vars['AlldayEventTitle']; ?>
</td>
                    </tr>
                    <tr>
                        <td valign="top" align="left"><input type="radio" name="<?php echo $this->_tpl_vars['InputTimed']; ?>
" value="<?php echo $this->_tpl_vars['ValueTimed']; ?>
" <?php echo $this->_tpl_vars['SelectedTimed']; ?>
 /></td>
                        <td valign="top" align="left"><?php echo $this->_tpl_vars['TimedEventTitle']; ?>
</td>
                        <td valign="top" align="left"><?php echo $this->_tpl_vars['SelectTimedHours']; ?>
 <?php echo $this->_tpl_vars['SelectTimedMinutes']; ?>
 <?php echo $this->_tpl_vars['SelectTimedAMPM']; ?>
</td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">&nbsp;</td>
                        <td valign="top" align="left"><?php echo $this->_tpl_vars['TimedDurationTitle']; ?>
</td>
                        <td valign="top" align="left">
                        <?php echo '<select name="';  echo $this->_tpl_vars['InputTimedDurationHours'];  echo '">';  $_from = $this->_tpl_vars['TimedDurationHours']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['time']):
 echo '<option value="';  echo $this->_tpl_vars['time']['value'];  echo '" ';  echo $this->_tpl_vars['time']['selected'];  echo '>';  echo $this->_tpl_vars['time']['name'];  echo '</option>';  endforeach; endif; unset($_from);  echo '</select>'; ?>
 
                        <?php echo $this->_tpl_vars['TimedDurationHoursTitle']; ?>

                    
                        <?php echo '<select name="';  echo $this->_tpl_vars['InputTimedDurationMinutes'];  echo '">';  $_from = $this->_tpl_vars['TimedDurationMinutes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['time']):
 echo '<option value="';  echo $this->_tpl_vars['time']['value'];  echo '" ';  echo $this->_tpl_vars['time']['selected'];  echo '>';  echo $this->_tpl_vars['time']['name'];  echo '</option>';  endforeach; endif; unset($_from);  echo '</select>'; ?>

                        <?php echo $this->_tpl_vars['TimedDurationMinutesTitle']; ?>

                        </td>
                    </tr>
                </table>
                <?php echo $this->_tpl_vars['EventDescTitle']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['Required']; ?>
<br />
                <textarea name="<?php echo $this->_tpl_vars['InputEventDesc']; ?>
" rows="15" cols="40"><?php echo $this->_tpl_vars['ValueEventDesc']; ?>
</textarea>
                </td>
                
                <td bgcolor="<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
" align="left" valign="top" width="50%">
                <?php if ($this->_tpl_vars['displayTopics'] == 1): ?>
                    <?php echo $this->_tpl_vars['EventTopicTitle']; ?>
<br />
                    <?php echo '<select name="';  echo $this->_tpl_vars['InputEventTopic'];  echo '">';  $_from = $this->_tpl_vars['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
 echo '<option value="';  echo $this->_tpl_vars['topic']['value'];  echo '" ';  echo $this->_tpl_vars['topic']['selected'];  echo '>';  echo $this->_tpl_vars['topic']['name'];  echo '</option>';  endforeach; endif; unset($_from);  echo '</select>'; ?>

                    <br />
                <?php endif; ?>
                <?php echo $this->_tpl_vars['EventSharingTitle']; ?>
<br />
                <?php echo '<select name="';  echo $this->_tpl_vars['InputEventSharing'];  echo '">';  $_from = $this->_tpl_vars['sharing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['share']):
 echo '<option value="';  echo $this->_tpl_vars['share']['value'];  echo '" ';  echo $this->_tpl_vars['share']['selected'];  echo '>';  echo $this->_tpl_vars['share']['name'];  echo '</option>';  endforeach; endif; unset($_from);  echo '</select>'; ?>

                <br />
                <?php echo $this->_tpl_vars['EventCategoriesTitle']; ?>
<br />
                <?php echo '<select name="';  echo $this->_tpl_vars['InputEventCategory'];  echo '">';  $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
 echo '<option value="';  echo $this->_tpl_vars['category']['value'];  echo '" ';  echo $this->_tpl_vars['category']['selected'];  echo '>';  echo $this->_tpl_vars['category']['name'];  echo '</option>';  endforeach; endif; unset($_from);  echo '</select>'; ?>

                <br />
                
                <table border="0" cellpadding="0" cellspacing="2">
                <tr>
                    <td colspan="3">
                        <?php echo $this->_tpl_vars['EventLocationTitle']; ?>
<br />
                        <input size="40" type="text" name="<?php echo $this->_tpl_vars['InputLocation']; ?>
"  value="<?php echo $this->_tpl_vars['ValueLocation']; ?>
" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?php echo $this->_tpl_vars['EventStreetTitle']; ?>
<br />
                        <input size="40" type="text" name="<?php echo $this->_tpl_vars['InputStreet1']; ?>
"  value="<?php echo $this->_tpl_vars['ValueStreet1']; ?>
" /><br />
                        <input size="40" type="text" name="<?php echo $this->_tpl_vars['InputStreet2']; ?>
"  value="<?php echo $this->_tpl_vars['ValueStreet2']; ?>
" />
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->_tpl_vars['EventCityTitle']; ?>
</td><td><?php echo $this->_tpl_vars['EventStateTitle']; ?>
</td><td><?php echo $this->_tpl_vars['EventPostalTitle']; ?>
</td>
                </tr>
                <tr>
                    <td><input size="10" type="text" name="<?php echo $this->_tpl_vars['InputCity']; ?>
"  value="<?php echo $this->_tpl_vars['ValueCity']; ?>
" /></td>
                    <td><input size="10" type="text" name="<?php echo $this->_tpl_vars['InputState']; ?>
"  value="<?php echo $this->_tpl_vars['ValueState']; ?>
" /></td>
                    <td><input size="10" type="text" name="<?php echo $this->_tpl_vars['InputPostal']; ?>
"  value="<?php echo $this->_tpl_vars['ValuePostal']; ?>
" /></td>
                </tr>
                </table>
                <br />
                <?php echo $this->_tpl_vars['EventContactTitle']; ?>
<br />
                <input type="text" name="<?php echo $this->_tpl_vars['InputContact']; ?>
"   value="<?php echo $this->_tpl_vars['ValueContact']; ?>
" /><br />
                <?php echo $this->_tpl_vars['EventPhoneTitle']; ?>
<br />
                <input type="text" name="<?php echo $this->_tpl_vars['InputPhone']; ?>
"     value="<?php echo $this->_tpl_vars['ValuePhone']; ?>
" /><br />
                <?php echo $this->_tpl_vars['EventEmailTitle']; ?>
<br />
                <input type="text" name="<?php echo $this->_tpl_vars['InputEmail']; ?>
"     value="<?php echo $this->_tpl_vars['ValueEmail']; ?>
" /><br />
                <?php echo $this->_tpl_vars['EventWebsiteTitle']; ?>
<br />
                <input type="text" name="<?php echo $this->_tpl_vars['InputWebsite']; ?>
"   value="<?php echo $this->_tpl_vars['ValueWebsite']; ?>
" /><br />
                <?php echo $this->_tpl_vars['EventFeeTitle']; ?>
<br />
                <input type="text" name="<?php echo $this->_tpl_vars['InputFee']; ?>
"       value="<?php echo $this->_tpl_vars['ValueFee']; ?>
" /><br />
                </td>
            </tr>
<!-- EVENT INFO ROWS -->

<!-- REPEATING ROWS -->            
            <tr>
                <th bgcolor="<?php echo $this->_tpl_vars['BGCOLOR2']; ?>
" colspan="2" align="left" valign="top" width="100%">
                <?php echo $this->_tpl_vars['RepeatingHeader']; ?>

                </th>
            </tr>
            <tr>
                <td bgcolor="<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
" colspan="2" align="left" valign="middle" width="100%">
                <input type="radio" name="<?php echo $this->_tpl_vars['InputNoRepeat']; ?>
" value="<?php echo $this->_tpl_vars['ValueNoRepeat']; ?>
" <?php echo $this->_tpl_vars['SelectedNoRepeat']; ?>
 />
                <?php echo $this->_tpl_vars['NoRepeatTitle']; ?>
<br />
                
                <input type="radio" name="<?php echo $this->_tpl_vars['InputRepeat']; ?>
" value="<?php echo $this->_tpl_vars['ValueRepeat']; ?>
" <?php echo $this->_tpl_vars['SelectedRepeat']; ?>
 /> 
                <?php echo $this->_tpl_vars['RepeatTitle']; ?>

				<input type="text" name="<?php echo $this->_tpl_vars['InputRepeatFreq']; ?>
" value="<?php echo $this->_tpl_vars['InputRepeatFreqVal']; ?>
" size="4" />
				<!--
                <select name="<?php echo $this->_tpl_vars['InputRepeatFreq']; ?>
">
                <?php $_from = $this->_tpl_vars['repeat_freq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    <option value="<?php echo $this->_tpl_vars['repeat']['value']; ?>
" <?php echo $this->_tpl_vars['repeat']['selected']; ?>
><?php echo $this->_tpl_vars['repeat']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>
                -->
				
                <select name="<?php echo $this->_tpl_vars['InputRepeatFreqType']; ?>
">
                <?php $_from = $this->_tpl_vars['repeat_freq_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    <option value="<?php echo $this->_tpl_vars['repeat']['value']; ?>
" <?php echo $this->_tpl_vars['repeat']['selected']; ?>
><?php echo $this->_tpl_vars['repeat']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>
                <br />
                
                <input type="radio" name="<?php echo $this->_tpl_vars['InputRepeatOn']; ?>
" value="<?php echo $this->_tpl_vars['ValueRepeatOn']; ?>
" <?php echo $this->_tpl_vars['SelectedRepeatOn']; ?>
 /> 
                <?php echo $this->_tpl_vars['RepeatOnTitle']; ?>

                <select name="<?php echo $this->_tpl_vars['InputRepeatOnNum']; ?>
">
                <?php $_from = $this->_tpl_vars['repeat_on_num']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    <option value="<?php echo $this->_tpl_vars['repeat']['value']; ?>
" <?php echo $this->_tpl_vars['repeat']['selected']; ?>
><?php echo $this->_tpl_vars['repeat']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>
                <select name="<?php echo $this->_tpl_vars['InputRepeatOnDay']; ?>
">
                <?php $_from = $this->_tpl_vars['repeat_on_day']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    <option value="<?php echo $this->_tpl_vars['repeat']['value']; ?>
" <?php echo $this->_tpl_vars['repeat']['selected']; ?>
><?php echo $this->_tpl_vars['repeat']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>&nbsp;
                <?php echo $this->_tpl_vars['OfTheMonthTitle']; ?>
&nbsp;
				<input type="text" name="<?php echo $this->_tpl_vars['InputRepeatOnFreq']; ?>
" value="<?php echo $this->_tpl_vars['InputRepeatOnFreqVal']; ?>
" size="4" />
				<?php echo $this->_tpl_vars['MonthsTitle']; ?>
.
				<!--
                <select name="<?php echo $this->_tpl_vars['InputRepeatOnFreq']; ?>
">
                <?php $_from = $this->_tpl_vars['repeat_on_freq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    <option value="<?php echo $this->_tpl_vars['repeat']['value']; ?>
" <?php echo $this->_tpl_vars['repeat']['selected']; ?>
><?php echo $this->_tpl_vars['repeat']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>
				-->
                <br /><br />
                
                <?php echo $this->_tpl_vars['EndDateTitle']; ?>
<br />
                <input type="radio" name="<?php echo $this->_tpl_vars['InputEndOn']; ?>
" value="<?php echo $this->_tpl_vars['ValueEndOn']; ?>
" <?php echo $this->_tpl_vars['SelectedEndOn']; ?>
 />&nbsp;
                <?php echo $this->_tpl_vars['SelectEndDate']; ?>

                <br />
                <input type="radio" name="<?php echo $this->_tpl_vars['InputNoEnd']; ?>
" value="<?php echo $this->_tpl_vars['ValueNoEnd']; ?>
" <?php echo $this->_tpl_vars['SelectedNoEnd']; ?>
 />&nbsp;
                <?php echo $this->_tpl_vars['NoEndDateTitle']; ?>

                </td>
            </tr>
<!-- REPEATING ROWS -->
        
        </table>
     </td></tr>
</table>
<?php echo $this->_tpl_vars['EventHTMLorText']; ?>

<?php echo $this->_tpl_vars['FormHidden']; ?>

<?php echo $this->_tpl_vars['FormSubmit']; ?>

</form>