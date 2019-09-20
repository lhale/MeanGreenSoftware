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
	$options = get_option('zeevision_options');
	
	// Get Color Scheme and set color scheme to default if nothing is selected)
	$color_scheme = $options['themeZee_color_scheme'] <> '' ? esc_attr($options['themeZee_color_scheme']) : 'default';
	
	$link_color = $color_scheme;
	$header_color = $color_scheme;
	$footer_color = '#444444';
	$content_border_color = $color_scheme;
	$postmeta_color = $color_scheme;
	$sidebar_title_color =  $color_scheme;
	$sidebar_link_color = $color_scheme;
	$frontpage_title_color = $color_scheme;
	$frontpage_link_color = $color_scheme;
	
	
	// Set CSS settings except color scheme is default (=> default colors are already defined in style.css)
	if( $color_scheme <> 'default') :
	
		$color_css = '<style type="text/css">';
		$color_css .= '
			a, a:link, a:visited, .comment a:link, .comment a:visited {
				color: '. $link_color .';
			}
			input[type="submit"], .more-link, #commentform #submit {
				background-color: '. $link_color .';
			}
			#header-wrap {
				background-color: '. $header_color .';
			}
			#footer-widgets-bg, #footer-wrap {
				background-color: '. $footer_color .';
			}
			.type-post, .type-page, .type-attachment {
				border-top: 8px solid '. $content_border_color .';
			}
			.archive-title, .post-pagination, .wp-pagenavi {
				background-color: '. $content_border_color .';
			}
			.wp-pagenavi .current {
				color: '. $content_border_color .';
			}
			.postmeta, #image-nav, .comment-author .fn  {
				background-color: '. $postmeta_color .';
			}
			.post-title a:hover, .post-title a:active {
				color: '. $postmeta_color .';
			}
			#sidebar .widgettitle, #sidebar .widget-tabnav li a {
				background-color: '. $sidebar_title_color .';
			}
			#sidebar a:link, #sidebar a:visited{
				color: '. $sidebar_link_color .';
			}
			#frontpage-intro, #frontpage-entry {
				border-top: 8px solid '. $frontpage_title_color .';
			}
			#frontpage-slider .zeeslide .slide-title {
				color: '. $frontpage_title_color .';
			}
			#frontpage-posts .frontpage-posts-head, 
			#frontpage-slider .zeeflex-next:hover, #frontpage-slider .zeeflex-prev:hover,
			#frontpage-slider .zeeflex-control-paging li a.zeeflex-active {
				background-color: '. $frontpage_title_color .';
			}
			.frontpage-widgets .widgettitle, .frontpage-widgets .widget-tabnav li a {
				background-color: '. $frontpage_title_color .';
			}
			.frontpage-widgets a:link, .frontpage-widgets a:visited {
				color: '. $frontpage_link_color .';
			}
			#frontpage-slider .zeeslide .slide-entry .slide-more .slide-link {
				background-color: '. $frontpage_link_color .';
			}
		';
		$color_css .= '</style>';
		
		// Print Color CSS
		echo $color_css;
	
	endif;
}