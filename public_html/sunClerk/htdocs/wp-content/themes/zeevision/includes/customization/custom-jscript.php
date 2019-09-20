<?php 
/***
 * Custom Javascript Options
 *
 * Passing Variables from custom Theme Options to the javascript files
 * of theme navigation and frontpage slider. 
 *
 */

// Passing Variables to Theme Navigation ( js/navigation.js)
add_action('wp_enqueue_scripts', 'themezee_custom_jscript_navigation');

if ( ! function_exists( 'themezee_custom_jscript_navigation' ) ):
function themezee_custom_jscript_navigation() { 

	// Set Parameters array
	$params = array(
		'menuTitle' => __('Menu', 'zeeVision_language')
	);
	
	// Passing Parameters to Javascript
	wp_localize_script( 'themezee_jquery_navigation', 'customNavigationParams', $params );
}
endif;


// Passing Variables to Frontpage Slider ( js/slider.js)
add_action('wp_enqueue_scripts', 'themezee_custom_jscript_slider');

if ( ! function_exists( 'themezee_custom_jscript_slider' ) ):
function themezee_custom_jscript_slider() { 
	
	// Get Theme Options
	$options = get_option('zeevision_options');
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	if( isset($options['themeZee_frontpage_slider_animation']) ) :
		$params['animation'] = esc_attr($options['themeZee_frontpage_slider_animation']);
	endif;
	
	// Define Slider Speed
	if( isset($options['themeZee_frontpage_slider_speed']) ) :
		$params['speed'] = esc_attr($options['themeZee_frontpage_slider_speed']);
	endif;
	
	// Passing Parameters to Javascript
	wp_localize_script( 'themezee_jquery_frontpage_slider', 'customSliderParams', $params );
}
endif;

?>