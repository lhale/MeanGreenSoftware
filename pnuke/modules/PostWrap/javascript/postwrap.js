// ----------------------------------------------------------------------
// Copyright (c) 2002-2004 Shawn McKenzie
// http://spidean.mckenzies.net
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

// Get all TDs in document
var docTD = document.getElementsByTagName('td');

// Define the IFRAME
var theIframe = document.getElementById('postwrap-content');

// Find the TD with the greatest height
var i = 0;
var theHeight = 0;

while (i != docTD.length) {
    theTD = docTD[i];

	if (theTD.offsetHeight > theHeight) {
        var theHeight = theTD.offsetHeight;
	}
	i++;
  }

// Size the IFRAME
if (theHeight != 0) {
    theIframe.height = theHeight;
}

/***********************************************
* IFrame SSI script II- © Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
* Visit DynamicDrive.com for hundreds of original DHTML scripts
* This notice must stay intact for legal use
* (LDH - see http://www.dynamicdrive.com/dynamicindex17/iframessi2.htm for all details)
***********************************************/

//Input the IDs of the IFRAMES you wish to dynamically resize to match its content height:
//Separate each ID with a comma. Examples: ["myframe1", "myframe2"] or ["myframe"] or [] for none:
var iframeids=["postwrap-content"]

//Should script hide iframe from browsers that don't support this script (non IE5+/NS6+ browsers. Recommended):
var iframehide="yes"

var getFFVersion=navigator.userAgent.substring(navigator.userAgent.indexOf("Firefox")).split("/")[1]
var FFextraHeight=parseFloat(getFFVersion)>=0.1? 20 : 0 //extra height in px to add to iframe in FireFox 1.x & 2.0+ browsers
var FFextraWidth=parseFloat(getFFVersion)>=0.1? 40 : 0 //extra width in px to add to iframe in FireFox 1.x & 2.0+ browsers

function resizeCaller() {
var dyniframe=new Array()
for (i=0; i<iframeids.length; i++){
if (document.getElementById)
resizeIframe(iframeids[i])
//reveal iframe for lower end browsers? (see var above):
if ((document.all || document.getElementById) && iframehide=="no"){
var tempobj=document.all? document.all[iframeids[i]] : document.getElementById(iframeids[i])
tempobj.style.display="block"
}
}
}
/* Main function called by PostWrap instead the the above
 * side effect is that a large hsize causes possible right page truncation
 * requiring a horizontal resize and redraw of the browser window
 * LDH: FFox 2.x complaining about non existent currentfr.contentDocument.body. Instead,
 *      there appears to be a currentfr.offsetHeight, but it always seems to be 0. For now,
 *		I'll let it complain, since this is all a non-W3C MS convention anyways.
 */
function resizeIframe(frameid)
{
	var currentfr=document.getElementById(frameid)
	if (currentfr && !window.opera)
	{
		currentfr.style.display="block"
//		alert(currentfr.id + " offsetHeight/Width=" + currentfr.offsetHeight + "/" + currentfr.offsetWidth + ",Xtra Ht/Wi=" + FFextraHeight + "/" + FFextraWidth);  // LDH - debug
		if (currentfr.contentDocument && currentfr.contentDocument.body && currentfr.contentDocument.body.offsetHeight) //ns6 & ffox syntax
		{
			currentfr.height = currentfr.contentDocument.body.offsetHeight+FFextraHeight;
			currentfr.width = currentfr.contentDocument.body.offsetWidth+FFextraWidth;   // Stuck at 100% - ??
			// currentfr.style.width = "auto";   // Shrinks the width down to 300 px - ??
			// currentfr.width = "auto";  // Doesn't work - same as 100%
			// currentfr.style.width = currentfr.contentDocument.body.offsetWidth+FFextraWidth + "px";  // Doesn't change the style attr - ??
			currentfr.style.overflowX = "hidden";   // There's a stubborn 1 px overflow - sheesh
			// DBG: Ffox dbg is showing this is called 3 times for every pg load - ??
		}
		else if (currentfr.Document && currentfr.Document.body && currentfr.Document.body.scrollHeight) //ie5 & ie6 + syntax
			currentfr.height = currentfr.Document.body.scrollHeight;
		if (currentfr.addEventListener)
			currentfr.addEventListener("load", readjustIframe, false)
		else if (currentfr.attachEvent)
		{
			currentfr.detachEvent("onload", readjustIframe) // Bug fix line
			currentfr.attachEvent("onload", readjustIframe)
		}
	}
}

function readjustIframe(loadevt) {
var crossevt=(window.event)? event : loadevt
var iframeroot=(crossevt.currentTarget)? crossevt.currentTarget : crossevt.srcElement
if (iframeroot)
resizeIframe(iframeroot.id);
}

function loadintoIframe(iframeid, url){
if (document.getElementById)
document.getElementById(iframeid).src=url
}

if (window.addEventListener)
window.addEventListener("load", resizeCaller, false)
else if (window.attachEvent)
window.attachEvent("onload", resizeCaller)
else
window.onload=resizeCaller
