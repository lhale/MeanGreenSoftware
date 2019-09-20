
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