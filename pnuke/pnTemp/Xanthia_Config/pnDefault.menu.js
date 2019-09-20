var agt = navigator.userAgent.toLowerCase();
var versInt = parseInt(navigator.appVersion);
var is_ie	= ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_ie3    = (is_ie && (versInt < 4));
var is_ie4    = (is_ie && (versInt == 4) && (agt.indexOf("msie 4")!=-1) );
var is_aol   = (agt.indexOf("aol") != -1);
var is_aol3  = (is_aol && is_ie3);
var is_aol4  = (is_aol && is_ie4);
var is_aol5  = (agt.indexOf("aol 5") != -1);
var is_aol6  = (agt.indexOf("aol 6") != -1);
var is_comp   = (agt.indexOf("compuserve") != -1);
var is_comp2000   = (agt.indexOf("cs") != -1);
var is_compie = (is_comp && is_ie);
function xan_navBar( tableCellRef, hoverFlag, navStyle ) {
	if ( hoverFlag ) {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#CBCDCD';
				break;
			default:
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#B0B5B6';
				}
		}
	} else {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#979D9E';
				break;
			default:
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#B0B5B6';
				}
		}
	}
}
function xan_goTo (url) {
  location.href = url;
}
function xan_navBarClick( tableCellRef, navStyle, url ) {
	xan_navBar( tableCellRef, 0, navStyle );
	xan_goTo( url );
}
function napVector (vectorChoice) {
	   location.href = document.nap.vector.options[document.nap.vector.selectedIndex].value;
	   }
function ipVector (vectorChoice) {
	   location.href = document.ip.vector.options[document.ip.vector.selectedIndex].value;
	   }
function clickEdLink() {
	if ((document.cookie.indexOf('SelectedEdition') == -1) && (document.cookie.indexOf('envoid') != -1)) {
		launchEditionPopup();
	}
}
