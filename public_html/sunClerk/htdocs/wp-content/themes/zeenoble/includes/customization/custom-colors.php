<?php
/***
 * Custom Color Options
 *
 * Get custom colors from theme options and embed CSS color settings 
 * in the <head> area of the theme. 
 *
 */


// Add Custom Colors
add_action('wp_head', 'themezee_custom_colors');
function themezee_custom_colors() { 
	
	// Get Theme Options
	$options = get_option('zeenoble_options');
	
	// Get Color Scheme and set color scheme to default if nothing is selected)
	$color_scheme = $options['themeZee_color_scheme'] <> '' ? esc_attr($options['themeZee_color_scheme']) : 'default';
	
	$link_color = $color_scheme;
	$navi_color = $color_scheme;
	$footer_color = '#444444';
	$post_title_color = $color_scheme;
	$post_title_color_hover = '#333333';
	$post_button_color = $color_scheme;
	$sidebar_title_color = '#444444';
	$sidebar_link_color = $color_scheme;
	$frontpage_slider_color = $color_scheme;
	$frontpage_widgets_color = $color_scheme;

	
	// Set CSS settings except color scheme is default (=> default colors are already defined in style.css)
	if( $color_scheme <> 'default') :
	
		$color_css = '<style type="text/css">';
		$color_css .= '
			a, a:link, a:visited, .comment a:link, .comment a:visited {
				color: '. $link_color .';
			}
			.wp-pagenavi .current {
				background-color: '. $link_color .';
			}
			#logo a .site-title {
				color: '. $navi_color .';
			}
			#logo a .site-title {
				color: '. $navi_color .';
			}
			#mainnav-menu li.current_page_item a, #mainnav-menu li.current-menu-item a, #mainnav-icon {
				background-color: '. $navi_color .';
			}
			#footer-widgets, #footer {
				background-color: '. $footer_color .';
			}
			.post-title, .post-title a:link, .post-title a:visited, #respond h3{
				color: '. $post_title_color .';
			}
			.post-title a:hover, .post-title a:active {
				color: '. $post_title_color_hover .';
			}
			input[type="submit"], .more-link, #commentform #submit {
				background-color: '. $post_button_color .';
			}
			#sidebar .widgettitle, #frontpage-posts .frontpage-posts-head .frontpage-posts-title,
			#frontpage-widgets-two .widgettitle, #frontpage-widgets-three .widgettitle {
				color: '. $sidebar_title_color .';
				border-bottom: 1px solid '. $sidebar_title_color .';
			}
			#sidebar a:link, #sidebar a:visited, 
			#frontpage-widgets-two .widget a:link, #frontpage-widgets-two .widget a:visited,
			#frontpage-widgets-three .widget a:link, #frontpage-widgets-three .widget a:visited {
				color: '. $sidebar_link_color .';
			}
			#frontpage-slider-wrap {
				background-color: '. $frontpage_slider_color .';
			}
			#frontpage-slider .zeeslide .slide-entry .slide-more .slide-link {
				color: '. $frontpage_slider_color .';
			}
			#frontpage-widgets-one .widget {
				background-color: '. $frontpage_widgets_color .';
			}
		';
		$color_css .= '</style>';
		
		// Print Color CSS
		echo $color_css;
	
	endif;
}