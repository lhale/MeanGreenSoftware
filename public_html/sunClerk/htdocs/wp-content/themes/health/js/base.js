(function($){
	jQuery(document).ready(function($){
		
		$("#site-navigation .menu-toggle").click(function(){					   
			var term = $("#site-navigation .menu").css("display");
			if(term == "none"){$("#site-navigation .menu").css("display","block");
			}else{
				$("#site-navigation .menu").removeAttr( "style" );
			}		   
		});
											
		jQuery('#back_top').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 'normal');return false;
		});	
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop() !== 0){jQuery('#back_top').fadeIn();}else{jQuery('#back_top').fadeOut();}
		});
		if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').show();}else{jQuery('#back_top').hide();}
	});
})(jQuery);