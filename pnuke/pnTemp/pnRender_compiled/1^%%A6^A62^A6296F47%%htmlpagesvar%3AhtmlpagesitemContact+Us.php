<?php /* Smarty version 2.6.14, created on 2009-01-23 18:23:36
         compiled from htmlpagesvar:htmlpagesitemContact+Us */ ?>
<script type="text/javascript" src="/pnuke/javascript/formcheck.js"></script>

<div class=pn-blockcontent>
    <div id="OutsideBox" class="OutsideBox" >
		<div class="meangreenleaf">
			<center>  <!-- This legacy stuff for IE's benefit - sheesh -->
      		<div id="InsideBox" class="InsideBox" style="width: 150px; background-color: white" >
      			<p class="Summary" ><b>
      			Contact Us
      			</b></p>
			</div>
       		<p class="Summary" >
       			<b>	 
         			</b>
       		</p>
   			<div id="InsideBox" class="InsideBox"  style="width: 120px; background-color: white" >
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
		</center>
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
			    <div class="selectbox"  style="width: 160px;">
			  	  <select id="mgs_Industry" name="mgs_Industry" class="inputtext">
				  	<option value="0" selected="selected">Choose Your Industry</option>
                	<option value="Life Sciences">Life Sciences</option>
                	<option value="Medical Information">Medical Information</option>
                	<option value="Medical Devices">Medical Devices</option>
                	<option value="Environmental">Environmental</option>
                	<option value="Social Networking">Social Networking</option>
                	<option value="Hospitality">Hospitality</option>
                	<option value="Manufacturing">Manufacturing</option>
                	<option value="Retail">Retail</option>
<!--                	<option value="Telecommunications">Telecommunications</option>   -->
                	<option value="Other">Other</option>

				  </select>
				</div>
			  </td>
              <td align="right">Solutions:</td>
			  <td>
			    <div class="selectbox" style="width: 215px;">
			  	  <select id="mgs_Solutions" name="mgs_Solutions[]" class="inputtext" MULTIPLE SIZE=3>
				  	<option value="0" selected="selected">Choose one or more</option>
                	<option value="Enterprise Intergration">Enterprise Intergration</option>
                	<option value="Mobile">Mobile</option>
                	<option value="Clinical Trials">Clinical Trials</option>
                	<option value="Health Care Records">Health Care Records</option>
                	<option value="Biomonitoring & Reporting">Biomonitoring & Reporting</option>
                	<option value="Bioinformatics">Bioinformatics</option>
                	<option value="MedicalDiagnostics">Medical Diagnostics</option>
                	<option value="Green Teamwork">'Green' Teamwork</option>
                	<option value="OnlineConcierge">Online Concierge</option>
                	<option value="Computational & User Analytics">Computational & User Analytics</option>
                	<option value="eCommerce">eCommerce</option>
                	<option value="Other">Other</option>
				</select>
			  </div>
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
              <td colspan="3"><textarea name="mmessage" cols="60" rows="10" wrap="VIRTUAL" class="inputtext" id="mmessage"></textarea></td>
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