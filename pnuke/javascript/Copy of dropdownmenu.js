/***********************************************
* AnyLink Drop Down Menu- ? Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
****(modified by Mean Green Software) *********/

// This is just a no drop down placeholder
var menu0=new Array()

//Contents for menu 1 - Services
var menu1=new Array()
menu1[0]='<a href="http://codingforums.com">Management</a>'			 // Client, project, development mgmt, tech analysis
menu1[1]='<a href="http://www.freewarejava.com">Consulting</a>'		 // Marketing programs, Buy vs Build; business process; audit (hazards/mitigation), FMEA; compliance
menu1[2]='<a href="http://www.javascriptkit.com">Web Applications</a>'   // developing custom sftwre
menu1[3]='<a href="http://www.javascriptkit.com">Mobile Applications</a>'   // developing pervasive sftwre
menu1[4]='<a href="http://www.cssdrive.com">Project Augmentation</a>'		 // Team dev't mgmt aid/assistance 

//Contents for menu 2 - Industries
var menu2=new Array()
menu2[0]='<a href="http://cnn.com">Life Sciences</a>'  // Biotech, Health care, Clinical trials, medical diagnostics
menu2[1]='<a href="http://msnbc.com">Environment</a>'  // {RE, environmental} mon'g/rprt'g, organizational web presence, 
menu2[2]='<a href="http://news.bbc.co.uk">Social Networking</a>'   // Forums, Events,
menu2[3]='<a href="http://news.bbc.co.uk">Hospitality</a>'   // Hotel on-line congeniality & concierge
menu2[4]='<a href="http://news.bbc.co.uk">Retail</a>'   // large & small retail chains
menu2[5]='<a href="http://news.bbc.co.uk">Insurance</a>'   // BC/BS legacy integration

//Contents for menu 3 - Solutions
var menu3=new Array()
menu3[0]='<a href="http://cnn.com">Enterprise Integration</a>'
menu3[1]='<a href="http://msnbc.com">Mobile</a>'
menu3[2]='<a href="http://news.bbc.co.uk">Clinical Trials</a>'
menu3[3]='<a href="http://msnbc.com">Biomonitoring & Reporting</a>'
menu3[4]='<a href="http://msnbc.com">Biomonitoring & Reporting</a>'
menu3[5]='<a href="http://msnbc.com">Computational & User Analytics</a>'  // Comp bioinfo, MSA style monitoring & learning

//Contents for menu 4 - About Us
var menu4=new Array()
menu4[0]='<a href="http://cnn.com">Management Methodologies</a>'  // List out the mgmt strengths, various meth's
menu4[1]='<a href="http://cnn.com">Technical Knowledge</a>'  // List out the technical strengths, platforms
menu4[2]='<a href="http://msnbc.com">Solution Holisitics</a>' // The right blend of expertise to expertly handle "cradle to cradle" projects
menu4[3]='<a href="http://news.bbc.co.uk">Adaptable Projects</a>'   // Expertise in selecting the right project methodology for your project

// LDH - Added for nav bar actions (some chg'd to simpler CSS entities)
var hovercolor = 'rgb(153, 204, 0)'		// nav bar hover color (Matches logo font color)
// var hovertext = '#000000'			// nav bar hover text color
var navcolor = 'rgb(0, 102, 102)'   // Original forest green nav color (used for mouseOut events)
// var textcolor = '#FFFFFF'			// Original nav bar hover text color
	
var menuwidth='165px' //default menu width
var menubgcolor='rgb(153, 204, 0)'  //menu bgcolor
var disappeardelay=250  //menu disappear speed onMouseout (in miliseconds)
var hidemenu_onclick="yes" //hide menu when user clicks within menu?

/////No further editting needed

var ie4=document.all
var ns6=document.getElementById&&!document.all

if (ie4||ns6)
document.write('<div id="dropmenudiv" style="visibility:hidden;width:'+menuwidth+';background-color:'+menubgcolor+'" onMouseover="clearhidemenu()" onMouseout="dynamichide(event)"></div>')

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}

// LDH - obj is the DOM element's style
function showhide(obj, e, visible, hidden, menuwidth)
{
    if (ie4||ns6)
        dropmenuobj.style.left=dropmenuobj.style.top="-500px"
    if (menuwidth!=""){
        dropmenuobj.widthobj=dropmenuobj.style
        dropmenuobj.widthobj.width=menuwidth
    }
    if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover")
        obj.visibility=visible
    else if (e.type=="click")
        obj.visibility=hidden
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=0
if (whichedge=="rightedge"){
var windowedge=ie4 && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-15 : window.pageXOffset+window.innerWidth-15
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure-obj.offsetWidth
}
else{
var topedge=ie4 && !window.opera? iecompattest().scrollTop : window.pageYOffset
var windowedge=ie4 && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure){ //move up?
edgeoffset=dropmenuobj.contentmeasure+obj.offsetHeight
if ((dropmenuobj.y-topedge)<dropmenuobj.contentmeasure) //up no good either?
edgeoffset=dropmenuobj.y+obj.offsetHeight-topedge
}
}
return edgeoffset
}

function populatemenu(what)
{
     if (ie4||ns6)
     dropmenuobj.innerHTML=what.join("")
}

// LDH - menu-less entries should pass an empty menucontents and a menuwidth of '0px'
function dropdownmenu(obj, e, menucontents, menuwidth)
{
    if (window.event) event.cancelBubble=true
    else if (e.stopPropagation) e.stopPropagation()
    clearhidemenu()
    dropmenuobj=document.getElementById ? document.getElementById("dropmenudiv") : dropmenudiv
//	alert(obj.style.backgroundColor);
    navcolor = obj.style.backgroundColor
    obj.style.backgroundColor = hovercolor
//	textcolor =  obj.style.color   // !  wrk
//    obj.style.color = hovertext
        populatemenu(menucontents)
    
    if (ie4||ns6)
	{
        showhide(dropmenuobj.style, e, "visible", "hidden", menuwidth)
        dropmenuobj.x=getposOffset(obj, "left")
        dropmenuobj.y=getposOffset(obj, "top")
        dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+"px"
        dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+obj.offsetHeight+"px"
    }

    return clickreturnvalue()
}

function clickreturnvalue(){
if (ie4||ns6) return false
else return true
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function dynamichide(e){
if (ie4&&!dropmenuobj.contains(e.toElement))
delayhidemenu(null)
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhidemenu(null)
}

function hidemenu(e)
{
    if (typeof dropmenuobj != "undefined"){
          if (ie4||ns6)
          dropmenuobj.style.visibility="hidden"
   }
}

function delayhidemenu(obj)
{
    if (ie4||ns6)
        delayhide=setTimeout("hidemenu()",disappeardelay)
    if ( obj != null)
    {
        obj.style.backgroundColor = navcolor
//	 obj.style.color = textcolor
    }
}

function clearhidemenu()
{
    if (typeof delayhide != "undefined")
    clearTimeout(delayhide)
}
// LDH - do nothing for now (RFU)
function nsResizeHandler()
{
}

if (hidemenu_onclick=="yes")
document.onclick=hidemenu
