/**
 * ExtendedFileManager extended-file-manager.js file.
 * Authors: Wei Zhuo, Afru
 * Version: Updated on 08-01-2005 by Afru
 * Package: ExtendedFileManager (EFM 1.0 beta)
 * http://www.afrusoft.com/htmlarea
 */


/**
 * Installation example for ExtendedFileManager plugin.
 *
 *
 *		HTMLArea.loadPlugin("ExtendedFileManager");
 *	    HTMLArea.onload = function() {
 *      var myeditor = new HTMLArea("textarea_id");
 *		myeditor.registerPlugin(ExtendedFileManager);
 *      myeditor.generate();
 *      };
 *      HTMLArea.init();
 *
 *
 * Then configure the config.inc.php file, that is all.
 */

/**
 * It is pretty simple, this file over rides the HTMLArea.prototype._insertImage
 * function with our own, only difference is the popupDialog url
 * point that to the php script.
 */


function ExtendedFileManager(editor)
{
	var tt = ExtendedFileManager.I18N;	

	this.editor = editor;
	        
    var cfg = editor.config;
	var toolbar = cfg.toolbar;
        
	cfg.registerButton({
		id        : "linkfile",
		tooltip   : "Insert File Link",
		image     : _editor_url + 'plugins/ExtendedFileManager/img/ed_linkfile.gif',
		textMode  : false,
		action    : function(editor) {
                editor._linkFile();
              }
		});
	cfg.toolbar.push([ "linkfile" ]);
};

ExtendedFileManager._pluginInfo = {
	name          : "ExtendedFileManager",
	version       : "1.0 beta",
	developer     : "Afru",
	developer_url : "http://www.afrusoft.com/htmlarea/",
	license       : "htmlArea"
};


// Over ride the _insertImage function in htmlarea.js.
// Open up the ExtendedFileManger script instead.
HTMLArea.prototype._insertImage = function(image) {

	var editor = this;	// for nested functions
	var outparam = null;
	if (typeof image == "undefined") {
		image = this.getParentElement();
		if (image && !/^img$/i.test(image.tagName))
			image = null;
	}
	if (image) outparam = {
		f_url    : HTMLArea.is_ie ? image.src : image.getAttribute("src"),
		f_alt    : image.alt,
		f_border : image.border,
		f_align  : image.align,
		f_vert   : image.vspace,
		f_horiz  : image.hspace,
		f_width  : image.width,
		f_height  : image.height
	};

	var manager = _editor_url + 'plugins/ExtendedFileManager/manager.php?mode=image';

	Dialog(manager, function(param){
		if (!param)
		{	// user must have pressed Cancel
			return false;
		}

		var img = image;
		if (!img)
		{
			var sel = editor._getSelection();
			var range = editor._createRange(sel);			
			editor._doc.execCommand("insertimage", false, param.f_url);
			if (HTMLArea.is_ie)
			{
				img = range.parentElement();
				// wonder if this works...
				if (img.tagName.toLowerCase() != "img")
				{
					img = img.previousSibling;
				}
			}
			else
			{
				img = range.startContainer.previousSibling;
			}
		}
		else
		{			
			img.src = param.f_url;
		}
		
		for (field in param)
		{
			var value = param[field];
			switch (field)
			{
			    case "f_alt"    : img.alt	 = value; break;
			    case "f_border" : img.border = parseInt(value || "0"); break;
			    case "f_align"  : img.align	 = value; break;
			    case "f_vert"   : img.vspace = parseInt(value || "0"); break;
			    case "f_horiz"  : img.hspace = parseInt(value || "0"); break;
				case "f_width"  : img.width = parseInt(value || "0"); break;
				case "f_height"  : img.height = parseInt(value || "0"); break;
			}
		}
		
		
	}, outparam);



};




HTMLArea.prototype._linkFile = function(link) {

	var editor = this;
	var outparam = null;
	if (typeof link == "undefined") {
		link = this.getParentElement();
		if (link) {
			if (/^img$/i.test(link.tagName))
				link = link.parentNode;
			if (!/^a$/i.test(link.tagName))
				link = null;
		}
	}
	if (!link) {
		var sel = editor._getSelection();
		var range = editor._createRange(sel);
		var compare = 0;
		if (HTMLArea.is_ie) {
			compare = range.compareEndPoints("StartToEnd", range);
		} else {
			compare = range.compareBoundaryPoints(range.START_TO_END, range);
		}
		if (compare == 0) {
			alert("Please select some text to link to.");
			return;
		}
		outparam = {
			f_href : '',
			f_title : '',
			f_target : '',
			f_usetarget : editor.config.makeLinkShowsTarget
		};
	} else
		outparam = {
			f_href   : HTMLArea.is_ie ? link.href : link.getAttribute("href"),
			f_title  : link.title,
			f_target : link.target,
			f_usetarget : editor.config.makeLinkShowsTarget
		};


	var manager = _editor_url + 'plugins/ExtendedFileManager/manager.php?mode=link';

	Dialog(manager, function(param){
		if (!param)
			return false;
		var a = link;
		if (!a) try {
			editor._doc.execCommand("createlink", false, param.f_href);
			a = editor.getParentElement();
			var sel = editor._getSelection();
			var range = editor._createRange(sel);
			if (!HTMLArea.is_ie) {
				a = range.startContainer;
				if (!/^a$/i.test(a.tagName)) {
					a = a.nextSibling;
					if (a == null)
						a = range.startContainer.parentNode;
				}
			}
		} catch(e) {}
		else {
			var href = param.f_href.trim();
			editor.selectNodeContents(a);
			if (href == "") {
				editor._doc.execCommand("unlink", false, null);
				editor.updateToolbar();
				return false;
			}
			else {
				a.href = href;
			}
		}
		if (!(a && /^a$/i.test(a.tagName)))
			return false;
		a.target = param.f_target.trim();
		a.title = param.f_title.trim();
		editor.selectNodeContents(a);
		editor.updateToolbar();
	}, outparam);

}

