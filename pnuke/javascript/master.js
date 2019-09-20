// Use when href's title doesn't work (older IE brswrs)

// format of call = onmouseover="return wMes('Whatever you want to say ');"
function wMes(s)
{
	window.status = s;
	return true;
}
// format of call = onmouseout="cMes();"
function cMes()
{
	window.status = '';
}

// Top tab mouse control functions (borrowed & enhanced from us44.htm)
// format of call = onmouseover="return FP_swapImg(1,0,'hovered img id','url_location/hovered.jpg')",
//					onmouseout="return FP_swapImg(0,0,'normal img id','url_location/normal.jpg')"
//					onmousedown="return FP_swapImg(1,0,'clicked img id','url_location/clicked.jpg')" 
//					onmouseup="return FP_swapImg(0,0,'hovered img id','url_location/hovered.jpg')"
//
function FP_swapImg() 
{//v1.0
 	var doc=document,args=arguments,elm,n; 
 	doc.$imgSwaps=new Array(); 
 	for(n=2; n<args.length;n+=2) 
 	{ 
 		elm=FP_getObjectByID(args[n]);
 
//	alert("elm=" + elm);
 		 if(elm) 
 		 { 
 		 	doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 			elm.$src=elm.src; 
 			elm.src=args[n+1]; 
 		} 
 	}
}

function FP_getObjectByID(id,o) 
{//v1.0
 	var c,el,els,f,m,n;
 	if(!o)
 		o=document; 
 	if(o.getElementById) 
 		el=o.getElementById(id);
 	else if(o.layers) 
 			c=o.layers;
 		else if(o.all) 
 				el=o.all[id];		 

	if(el)
		return el;
		
	if(o.id==id || o.name==id) 
		return o; 
	if(o.childNodes) 
		c=o.childNodes; 
	if(c)
 		for(n=0; n<c.length; n++) 
 		{ 
 			el=FP_getObjectByID(id,c[n]);
 			if(el) 
 				return el; 
 		}
 	f=o.forms; 
 	if(f) 
 		for(n=0; n<f.length; n++) 
 		{ 
 			els=f[n].elements;
 			for(m=0; m<els.length; m++)
 			{ 
 				el=FP_getObjectByID(id,els[n]); 
 				if(el) 
 					return el; 
 			}
 		}
 	return null;
}
