/**
 * Functions for the ExtendedFileManager, used by manager.php only	
 * Authors: Wei Zhuo, Afru
 * Version: Updated on 08-01-2005 by Afru
 * Package: ExtendedFileManager (EFM 1.0 beta)
 * http://www.afrusoft.com/htmlarea
 */

function comboSelectValue(c, val) {
	var ops = c.getElementsByTagName("option");
	for (var i = ops.length; --i >= 0;) {
		var op = ops[i];
		op.selected = (op.value == val);
	}
	c.value = val;
};

	
	//Translation
	function i18n(str) {
		if(I18N)
		  return (I18N[str] || str);
		else
			return str;
	};


	//set the alignment options
	function setAlign(align) 
	{
		var selection = document.getElementById('f_align');
		for(var i = 0; i < selection.length; i++)
		{
			if(selection.options[i].value == align)
			{
				selection.selectedIndex = i;
				break;
			}
		}
	}

	function onTargetChanged() {
	  var f = document.getElementById("f_other_target");
	  if (this.value == "_other") {
		f.style.visibility = "visible";
		f.select();
		f.focus();
	  } else f.style.visibility = "hidden";
	};


	//initialise the form
	init = function () 
	{
		__dlg_init();

		if(I18N)
			__dlg_translate(I18N);

		var uploadForm = document.getElementById('uploadForm');
		if(uploadForm) uploadForm.target = 'imgManager';

		var param = window.dialogArguments;
		if(manager_mode=="image" && param)
		{
			document.getElementById("f_url").value = param["f_url"];
			document.getElementById("f_alt").value = param["f_alt"];
			document.getElementById("f_border").value = param["f_border"];
			document.getElementById("f_vert").value = param["f_vert"];
			document.getElementById("f_horiz").value = param["f_horiz"];
			document.getElementById("f_width").value = param["f_width"];
			document.getElementById("f_height").value = param["f_height"];
			setAlign(param["f_align"]);
			document.getElementById("f_url").focus();
		}

		else if(manager_mode=="link" && param)
		{
			var target_select = document.getElementById("f_target");
			var use_target = true;

			if (param)
			{
				if ( typeof param["f_usetarget"] != "undefined" )
				{
					use_target = param["f_usetarget"];
				}
				if ( typeof param["f_href"] != "undefined" )
				{
					document.getElementById("f_href").value = param["f_href"];
					document.getElementById("f_title").value = param["f_title"];
				    comboSelectValue(target_select, param["f_target"]);
				    if (target_select.value != param.f_target)
					{
						var opt = document.createElement("option");
						opt.value = param.f_target;
						opt.innerHTML = opt.value;
						target_select.appendChild(opt);
						opt.selected = true;
					}
				}
			}
			if (! use_target)
			{
				document.getElementById("f_target_label").style.visibility = "hidden";
				document.getElementById("f_target").style.visibility = "hidden";
				document.getElementById("f_target_other").style.visibility = "hidden";
			}
			
			var opt = document.createElement("option");
			opt.value = "_other";
			opt.innerHTML = "Other";
			target_select.appendChild(opt);
			target_select.onchange = onTargetChanged;
			document.getElementById("f_href").focus();
		}



	}


	function onCancel() 
	{
		__dlg_close(null);
		return false;
	};

	function onOK() 
	{
		if(manager_mode=="image")
		{
			// pass data back to the calling window
			var fields = ["f_url", "f_alt", "f_align", "f_border", "f_horiz", "f_vert", "f_height", "f_width"];
			var param = new Object();
			for (var i in fields) 
			{
				var id = fields[i];
				var el = document.getElementById(id);
				if(id == "f_url" && el.value.indexOf('://') < 0 )
					param[id] = makeURL(base_url,el.value);
				else
					param[id] = el.value;
			}
			__dlg_close(param);
			return false;
		}
		else if(manager_mode=="link")
		{
			var required = {
				// f_href shouldn't be required or otherwise removing the link by entering an empty

				// url isn't possible anymore.

				// "f_href": i18n("You must enter the URL where this link points to")

			};
			for (var i in required) {
			var el = document.getElementById(i);
				if (!el.value) {
				  alert(required[i]);
				  el.focus();
				  return false;
				}
			}

			// pass data back to the calling window
			var fields = ["f_href", "f_title", "f_target" ];
			var param = new Object();
			for (var i in fields) {
				var id = fields[i];
				var el = document.getElementById(id);

				if(id == "f_href" && el.value.indexOf('://') < 0 )
					param[id] = makeURL(base_url,el.value);
				else
					param[id] = el.value;

			}
			if (param.f_target == "_other")
				param.f_target = document.getElementById("f_other_target").value;

//			alert(param.f_target);
			  __dlg_close(param);
			return false;
		}
	};


	//similar to the Files::makeFile() in Files.php
	function makeURL(pathA, pathB) 
	{
		if(pathA.substring(pathA.length-1) != '/')
			pathA += '/';

		if(pathB.charAt(0) == '/');	
			pathB = pathB.substring(1);

		return pathA+pathB;
	}


	function updateDir(selection) 
	{
		var newDir = selection.options[selection.selectedIndex].value;
		changeDir(newDir);
	}

	function goUpDir() 
	{
		var selection = document.getElementById('dirPath');
		var currentDir = selection.options[selection.selectedIndex].text;
		if(currentDir.length < 2)
			return false;
		var dirs = currentDir.split('/');
		
		var search = '';

		for(var i = 0; i < dirs.length - 2; i++)
		{
			search += dirs[i]+'/';
		}

		for(var i = 0; i < selection.length; i++)
		{
			var thisDir = selection.options[i].text;
			if(thisDir == search)
			{
				selection.selectedIndex = i;
				var newDir = selection.options[i].value;
				changeDir(newDir);
				break;
			}
		}
	}

	function changeDir(newDir) 
	{
		if(typeof imgManager != 'undefined')
			imgManager.changeDir(newDir);
	}

	function updateView()
	{
		refresh();
	}

	function toggleConstrains(constrains) 
	{
		var lockImage = document.getElementById('imgLock');
		var constrains = document.getElementById('constrain_prop');

		if(constrains.checked) 
		{
			lockImage.src = "img/locked.gif";	
			checkConstrains('width') 
		}
		else
		{
			lockImage.src = "img/unlocked.gif";	
		}
	}

	function checkConstrains(changed) 
	{
		//alert(document.form1.constrain_prop);
		var constrains = document.getElementById('constrain_prop');
		
		if(constrains.checked) 
		{
			var obj = document.getElementById('orginal_width');
			var orginal_width = parseInt(obj.value);
			var obj = document.getElementById('orginal_height');
			var orginal_height = parseInt(obj.value);

			var widthObj = document.getElementById('f_width');
			var heightObj = document.getElementById('f_height');
			
			var width = parseInt(widthObj.value);
			var height = parseInt(heightObj.value);

			if(orginal_width > 0 && orginal_height > 0) 
			{
				if(changed == 'width' && width > 0) {
					heightObj.value = parseInt((width/orginal_width)*orginal_height);
				}

				if(changed == 'height' && height > 0) {
					widthObj.value = parseInt((height/orginal_height)*orginal_width);
				}
			}			
		}
	}

	function showMessage(newMessage) 
	{
		var message = document.getElementById('message');
		var messages = document.getElementById('messages');
		if(message.firstChild)
			message.removeChild(message.firstChild);

		message.appendChild(document.createTextNode(i18n(newMessage)));
		
		messages.style.display = "block";
	}

	function addEvent(obj, evType, fn)
	{ 
		if (obj.addEventListener) { obj.addEventListener(evType, fn, true); return true; } 
		else if (obj.attachEvent) {  var r = obj.attachEvent("on"+evType, fn);  return r;  } 
		else {  return false; } 
	} 

	function doUpload() 
	{
		
		var uploadForm = document.getElementById('uploadForm');
		if(uploadForm)
			showMessage('Uploading');
	}

	function refresh()
	{
		var selection = document.getElementById('dirPath');
		updateDir(selection);
	}


	function newFolder() 
	{
		var selection = document.getElementById('dirPath');
		var dir = selection.options[selection.selectedIndex].value;

		Dialog("newFolder.html", function(param) 
		{
			if (!param) // user must have pressed Cancel
				return false;
			else
			{
				var folder = param['f_foldername'];
				if(folder == thumbdir)
				{
					alert(i18n('Invalid folder name, please choose another folder name.'));
					return false;
				}

				if (folder && folder != '' && typeof imgManager != 'undefined') 
					imgManager.newFolder(dir, encodeURI(folder)); 
			}
		}, null);
	}

	addEvent(window, 'load', init);
