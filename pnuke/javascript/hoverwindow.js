// <!-- 
// This is the function that will open the
// new window when the mouse is moved over the link
function open_new_window() 
{
    new_window = open("","hoverwindow","width=300,height=200");
    
    // open new document 
    new_window.document.open();
    
    // Text of the new document
    // Replace your " with ' or \" or your document.write statements will fail
    new_window.document.write("<html><title>JavaScript New Window</title>");
    new_window.document.write("<body bgcolor=\"#FFFFFF\">");
    new_window.document.write("This is a new html document created by JavaScript ");
    new_window.document.write("statements contained in the previous document.");
    new_window.document.write("<br>");
    new_window.document.write("</body></html>");
    
    // close the document
    new_window.document.close(); 
}

// This is the function that will close the
// new window when the mouse is moved off the link
function close_window() 
{
new_window.close();
}


function PopupInfo(thispopup) 
{
// <!-- Due to different browser naming of certain key global variables, we need to do three different tests to determine their values -->

	 // Determine how much the visitor had scrolled

    var scrolledX, scrolledY;
    if( self.pageYOffset ) {
      scrolledX = self.pageXOffset;
      scrolledY = self.pageYOffset;
    } else if( document.documentElement && document.documentElement.scrollTop ) {
      scrolledX = document.documentElement.scrollLeft;
      scrolledY = document.documentElement.scrollTop;
    } else if( document.body ) {
      scrolledX = document.body.scrollLeft;
      scrolledY = document.body.scrollTop;
    }

	// Determine the coordinates of the center of browser's window

    var centerX, centerY;
    if( self.innerHeight ) {
      centerX = self.innerWidth;
      centerY = self.innerHeight;
    } else if( document.documentElement && document.documentElement.clientHeight ) {
      centerX = document.documentElement.clientWidth;
      centerY = document.documentElement.clientHeight;
    } else if( document.body ) {
      centerX = document.body.clientWidth;
      centerY = document.body.clientHeight;
    }

    var leftOffset = scrolledX + (centerX - 250) / 2;
    var topOffset = scrolledY + (centerY - 200) / 2;
  
  	document.getElementById(thispopup).style.top = topOffset + "px";
    document.getElementById(thispopup).style.left = leftOffset + "px";
    document.getElementById(thispopup).style.display = "block";
}

// X picels from the left, Y pixels from the top (of a window or iframe
// Alas - IE totally miffs up any semblence of logical coordinates here - sorry
function PopupInfoXY(thispopup, leftOffset, topOffset) 
{
  	document.getElementById(thispopup).style.top = topOffset + "px";
    document.getElementById(thispopup).style.left = leftOffset + "px";
    document.getElementById(thispopup).style.display = "block";
}

// Actually, just hide it from view (again)
function PopupClose(thispopup) 
{
	document.getElementById(thispopup).style.display = "none";
}
// -->
