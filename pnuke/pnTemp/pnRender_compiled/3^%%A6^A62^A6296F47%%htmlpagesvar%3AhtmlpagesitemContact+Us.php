<?php /* Smarty version 2.6.14, created on 2008-11-18 10:02:19
         compiled from htmlpagesvar:htmlpagesitemContact+Us */ ?>

<script language="JavaScript">
if (document.all){ 
		document.onkeydown=nextfocus; 
} 
function nextfocus(){
    if(window.event.keyCode==13 && event.srcElement.type!="submit"&&event.srcElement.type!="textarea")
   {
     window.event.keyCode=9;
   }
}
function check()
{
    name=document.form1.name.value;
	if (name=="")
	{
		alert("Please fill in your name");
		document.form1.name.focus();
		document.form1.name.select();
		return false;
	}
	
	
	email=document.form1.memail.value;
	emaillen=email.length;
    phone=document.form1.phone.value;
	
	if (emaillen == 0 && phone=="" )
	{
		alert("Please fill in either your email adress or your phone number");
		document.form1.memail.focus();
		document.form1.memail.select();
        return false;
	}
	// No check made for last com (or whatever) suffix
	if (email.indexOf("@")==-1 || email.indexOf("@")==0 || 
	   	email.indexOf(".")==emaillen-1 || email.indexOf(".")==0 ||
		email.lastIndexOf(".") < email.indexOf("@"))
	{
    	alert("Please correctly fill in your email address");
    	document.form1.memail.focus();
    	document.form1.memail.select();
    	return false;
	}

	if (phone != "" && check_phone_number(phone) == false)
	{
    	document.form1.phone.focus();
    	document.form1.phone.select();
    	return false;
	}
}

// see http://www.geekpedia.com/KB51_How-to-validate-a-phone-number-in-JavaScript.html
function check_phone_number(number_string)
{
   if(number_string.search(/\d{3}\-\d{3}\-\d{4}/)==-1)
   {
      alert("The phone number you entered is not valid.\r\nPlease enter a phone number with the format xxx-xxx-xxxx.");
      return false;
   }
   return true;
}
</script>

<script type="text/javascript" src="/pnuke/javascript/hoverwindow.js">
</script>
<script type="text/javascript" src="/pnuke/javascript/BoxOver.js">
</script>

<div class=pn-blockcontent>
    <div id="OutsideBox" class="OutsideBox" >
		<div class="meangreenleaf">
      		<div id="InsideBox" class="InsideBox" style="margin: auto auto 0pt; width: 150px; background-color: white" >
      			<p class="Summary" ><b>
      			Contact Us
      			</b></p>
			</div>
       		<p class="Summary" >
       			<b>	 
         			</b>
       		</p>
   			<div id="InsideBox" class="InsideBox" style="margin: auto auto 0pt; width: 120px; background-color: white" >
         		<div class="meangreen">
         			 <center>
         			 Tel: 408-679-3161
					 <!-- Email removed so as not to draw spam bot's attention -->
         			 </center>
         		</div>
 			</div>
       		<p class="Summary" >
       			<b>	 
         			</b>
       		</p>
		</div>  <!-- end meangreenleaf -->
		
        <form action="/pnuke/modules/Contact/proc_formmail.php" method="post" name="form1" onSubmit="return check()" >
       		<p class="Summary" >
       			<b>	 
         			</b>
       		</p>
          <table width="542" border="0" align="center">
            <tr>
              <td width="15">&nbsp;</td>
              <td width="98"> Name:</td>
              <td width="50"><strong>
                <input name="name" type="inputtext" class="inputtext" id="name" size="30"> 
                </strong></td>
              <td align="right"> E-mail:</td>
              <td><input name="memail" type="inputtext" class="inputtext" id="memail" size="30"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td> Company:</td>
              <td><input name="company" type="inputtext" class="inputtext" id="company" size="30"></td>
              <td align="right"> Phone:</td>
              <td><input name="phone" type="inputtext" class="inputtext" id="phone" size="30" value="xxx-xxx-xxxx"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Industry:</td>
			  <td>
			  	  <select id="mgs_Industry" name="mgs_Industry">
				  	<option value="0" selected="selected">Choose Your Industry</option>
                	<option value="Life Sciences">Life Sciences</option>
                	<option value="Medical Information">Medical Information</option>
                	<option value="Medical Devices">Medical Devices</option>
                	<option value="Environmental">Environmental</option>
                	<option value="Social Networking">Social Networking</option>
                	<option value="Hospitality">Hospitality</option>
                	<option value="Manufacturing">Manufacturing</option>
                	<option value="Retail">Retail</option>
                	<option value="Telecommunications">Telecommunications</option>
                	<option value="Other">Other</option>

				</select>
				</td>
              <td align="right">Solutions:</td>
			  <td>
			  	  <select id="mgs_Solutions" name="mgs_Solutions[]" MULTIPLE SIZE=3>
				  	<option value="0" selected="selected">Choose one or more</option>
                	<option value="Enterprise Intergration">Enterprise Intergration</option>
                	<option value="Mobile">Mobile</option>
                	<option value="Clinical Trials">Clinical Trials</option>
                	<option value="Health Care Records">Health Care Records</option>
                	<option value="Biomonitoring & Reporting">Biomonitoring & Reporting</option>
                	<option value="Bioinformatics">Bioinformatics</option>
                	<option value="Green Teamwork">'Green' Teamwork</option>
                	<option value="Computational & User Analytics">Computational & User Analytics</option>
                	<option value="Other">Other</option>
				</select>
				</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td > Message Subject:</td>
              <td colspan="3"><input name="msubject" type="inputtext" class="inputtext" id="msubject" size="50"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td> Message: </td>
              <td colspan="3"><textarea name="mmessage" cols="60" rows="10" wrap="VIRTUAL" class="textarea_style" id="mmessage"></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" class="btn" name="Submit" value="Submit">
                <input type="reset"  class="btn" name="Submit2" value="Clear form"></td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>
	</div>  <!--  End OutsideBox div -->
</div>