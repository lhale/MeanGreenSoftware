/**
 * Functions for the image listing, used by images.php only	
 * Authors: Wei Zhuo, Afru
 * Version: Updated on 08-01-2005 by Afru
 * Package: ExtendedFileManager (EFM 1.0 beta)
 * http://www.afrusoft.com/htmlarea
 */

	function i18n(str) {
		if(I18N)
		  return (I18N[str] || str);
		else
			return str;
	};

	function changeDir(newDir) 
	{
		showMessage('Loading');
		var mode=window.top.document.getElementById('manager_mode').value;
		var selection = window.top.document.getElementById('viewtype');
		var viewtype = selection.options[selection.selectedIndex].value;
		location.href = "images.php?mode="+mode+"&dir="+newDir+"&viewtype="+viewtype;
	}

	function newFolder(dir, newDir) 
	{
		var mode=window.top.document.getElementById('manager_mode').value;
		var selection = window.top.document.getElementById('viewtype');
		var viewtype = selection.options[selection.selectedIndex].value;
		location.href = "images.php?mode="+mode+"&dir="+dir+"&newDir="+newDir+"&viewtype="+viewtype;
	}

	//update the dir list in the parent window.
	function updateDir(newDir)
	{
		var selection = window.top.document.getElementById('dirPath');
		if(selection)
		{
			for(var i = 0; i < selection.length; i++)
			{
				var thisDir = selection.options[i].text;
				if(thisDir == newDir)
				{
					selection.selectedIndex = i;
					showMessage('Loading');
					break;
				}
			}		
		}

	}

	function emptyProperties()
	{
		toggleImageProperties(false);
		var topDoc = window.top.document;
		topDoc.getElementById('f_url').value = '';
		topDoc.getElementById('f_alt').value = '';
		topDoc.getElementById('f_width').value = '';
		topDoc.getElementById('f_vert').value = '';
		topDoc.getElementById('f_height').value = '';
		topDoc.getElementById('f_horiz').value = '';
		topDoc.getElementById('f_border').value = '';
	}

	function toggleImageProperties(val)
	{
		var topDoc = window.top.document;
		if(val==true)
		{
			topDoc.getElementById('f_width').value = '';
			topDoc.getElementById('f_vert').value = '';
			topDoc.getElementById('f_height').value = '';
			topDoc.getElementById('f_horiz').value = '';
			topDoc.getElementById('f_border').value = '';
		}
		topDoc.getElementById('f_width').disabled = val;
		topDoc.getElementById('f_vert').disabled = val;
		topDoc.getElementById('f_height').disabled = val;
		topDoc.getElementById('f_horiz').disabled = val;
		topDoc.getElementById('f_align').disabled = val;
		topDoc.getElementById('f_border').disabled = val;
		topDoc.getElementById('constrain_prop').disabled = val;
	}

	function selectImage(filename, alt, width, height) 
	{
		var topDoc = window.top.document;

		if(topDoc.getElementById('manager_mode').value=="image")
		{
			var obj = topDoc.getElementById('f_url');  obj.value = filename;
			var obj = topDoc.getElementById('f_alt'); obj.value = alt;
			
			if(width==0 && height==0) toggleImageProperties(true);
			else
			{
				toggleImageProperties(false);
				var obj = topDoc.getElementById('f_width');  obj.value = width;
				var obj = topDoc.getElementById('f_height'); obj.value = height;
				var obj = topDoc.getElementById('orginal_width'); obj.value = width;
				var obj = topDoc.getElementById('orginal_height'); obj.value = height;	
			}
		}
		else if (topDoc.getElementById('manager_mode').value=="link")
		{
			var obj = topDoc.getElementById('f_href');  obj.value = filename;
			var obj = topDoc.getElementById('f_title'); obj.value = alt;
		}

		return false;
	}

	function showMessage(newMessage) 
	{
		var topDoc = window.top.document;

		var message = topDoc.getElementById('message');
		var messages = topDoc.getElementById('messages');
		if(message && messages)
		{
			if(message.firstChild)
				message.removeChild(message.firstChild);

			message.appendChild(topDoc.createTextNode(i18n(newMessage)));
			
			messages.style.display = "block";
		}
	}

	function updateDiskMesg(newMessage) 
	{
		var topDoc = window.top.document;

		var diskmesg = topDoc.getElementById('diskmesg');
		if(diskmesg)
		{
			if(diskmesg.firstChild)
				diskmesg.removeChild(diskmesg.firstChild);

			diskmesg.appendChild(topDoc.createTextNode(newMessage));
			
		}
	}


	function addEvent(obj, evType, fn)
	{ 
		if (obj.addEventListener) { obj.addEventListener(evType, fn, true); return true; } 
		else if (obj.attachEvent) {  var r = obj.attachEvent("on"+evType, fn);  return r;  } 
		else {  return false; } 
	} 

	function confirmDeleteFile(file) 
	{
		if(confirm(i18n("Delete "+file+" ?")))
			return true;
	
		return false;		
	}

	function confirmDeleteDir(dir, count) 
	{
		if(count > 0)
		{
			alert(i18n("Folder is not Empty. Please delete all Files and Sub Folders inside."));
			return false;
		}

		if(confirm(i18n("Delete folder "+dir+" ?")))
			return true;

		return false;
	}

	addEvent(window, 'load', init);