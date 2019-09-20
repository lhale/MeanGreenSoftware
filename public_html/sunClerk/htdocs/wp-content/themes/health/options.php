<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'health_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'health'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'health' ),
		'two' => __( 'Two', 'health' ),
		'three' => __( 'Three', 'health' ),
		'four' => __( 'Four', 'health' ),
		'five' => __( 'Five', 'health' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'health' ),
		'two' => __( 'Pancake', 'health' ),
		'three' => __( 'Omelette', 'health' ),
		'four' => __( 'Crepe', 'health' ),
		'five' => __( 'Waffle', 'health' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Header', 'health' ),
		'type' => 'heading'
	);

	// Header Logo upload option
	$options[] = array(
		'name'  => __( 'Header Logo', 'health' ),
		'desc' => __( 'Upload logo for your header.', 'health' ),
		'id' => 'health_header_logo_image',
		'type' => 'upload'
	);

	// Header logo and text display type option
	$header_display_array = array(
		'logo_only' => __( 'Header Logo Only', 'health' ),
		'text_only' => __( 'Header Text Only', 'health' ),
		'both' => __( 'Show Both', 'health' ),
		'none' => __( 'Disable', 'health' )
	);
	$options[] = array(
		'name' => __( 'Show', 'health' ),
		'desc' => __( 'Choose the option that you want.', 'health' ),
		'id' => 'health_show_header_logo_text',
		'std' => 'text_only',
		'type' => 'radio',
		'options' => $header_display_array 
	);
	$options[] = array(
		'name' => __( 'Header Icon and Size', 'health' ),
		'desc' => __( 'Example:"<strong>fa-3x fa-h-square</strong>". All icons list http://fortawesome.github.io/Font-Awesome/icons/#search', 'health' ),
		'id' => 'health_header_text_icon',
		'std' 	=> 'fa-3x fa-h-square',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Adress', 'health' ),
		'id' => 'health_header_adress',
		'std' 	=> '77 Massachusetts Ave, Cambridge, MA, USA',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Mail', 'health' ),
		'desc' => __( 'Link or mail', 'health' ),
		'id' => 'health_header_mail',
		'std' 	=> 'info@example.com',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Phone', 'health' ),
		'id' => 'health_header_phone',
		'std' 	=> '+1 617-253-1000',
		'type' 	=> 'text'
	);

	/*************************************************************************/
	
	$options[] = array(
		'name' => __( 'Design', 'health' ),
		'type' => 'heading'
	);
	// Site primary color option
	$options[] = array(
		'name' 		=> __( 'Primary color option', 'health' ),
		'desc' 		=> __( 'This will reflect in links, buttons and many others. Choose a color to match your site.', 'health' ),
		'id' 			=> 'health_primary_color',
		'std' 		=> '#ff8800',
		'type' 		=> 'color' 
	);
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Additional', 'health' ),
		'type' => 'heading'
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'health' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'health' ),
		'id' 			=> 'health_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Fav icon upload option
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'health' ),
		'desc' 	=> __( 'Upload favicon for your site.', 'health' ),
		'id' 		=> 'health_favicon',
		'type' 	=> 'upload'
	);
	
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Slider', 'health' ),
		'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'health' ),
		'desc' 		=> __( 'Check to activate slider.', 'health' ),
		'id' 			=> 'health_activate_slider',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);

	// Slide options
	$def_image = 1;
	for( $i=1; $i<=4; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'health' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'health' ),
			'id' 		=> 'health_slider_image'.$i,
			'std' 	=> $imagepath."slider$def_image.jpg",
			'type' 	=> 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter title for your slider.', 'health' ),
			'id' 		=> 'health_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter your slider description.', 'health' ),
			'id' 		=> 'health_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect slider when clicked', 'health' ),
			'id' 		=> 'health_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$def_image ++;
		if ($def_image>4) $def_image = 1;
	}

	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Services', 'health' ),
		'type' => 'heading'
	);

	//  activate option
	$options[] = array(
		'name' 		=> __( 'Activate services', 'health' ),
		'desc' 		=> __( 'Check to activate services.', 'health' ),
		'id' 			=> 'health_activate_services',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);
	$options[] = array(
		'name' => __('Main Service','health'),
		'desc' 	=> __( 'Service Title', 'health' ),
		'id' 		=> 'health_main_service_title',
		'std' 	=> "Awesome Medical Services",
		'type' 	=> 'text'
	);
	$options[] = array(
		'desc' 	=> __( 'Service Description', 'health' ),
		'id' 		=> 'health_main_service_desc',
		'std' 	=> 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.',
		'type' 	=> 'textarea'
	);	
	
	//
	$scarr = array();
	for( $i=1; $i<=16; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of services','health'),
        'desc' => __('How many services is the homepage. (Set and click SAVE)', 'health'),
        'id' => 'health_services_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// Services options
	$rand_icons = array("ambulance","h-square","heart","heart-o","heartbeat","hospital-o","medkit","plus-square","stethoscope","user-md","wheelchair");
	$rand_titles = array("Heart Disease","Eye Health","Pregnancy","Diabetes","Medical Treatments","Cardio Monitoring","Emergency Help","Medical Guidance");
	$services_count = of_get_option( 'health_services_count', 4 );
	for( $i=1; $i<=$services_count; $i++) {
		shuffle($rand_icons);
		$options[] = array(
			'name' 	=>	sprintf( __( 'Service #%1$s', 'health' ), $i ),
			'desc' 	=> __( 'Service Icon<br />
			Service Icon (Using Font Awesome icons name) like: fa-medkit. <a href="http://fortawesome.github.io/Font-Awesome/icons/">Get your fontawesome icons.</a>', 'health' ),
			'id' 		=> 'health_service_icon'.$i,
			'std' 	=> "fa-".$rand_icons[0],
			'type' 	=> 'text'
		);
		shuffle($rand_titles);
		$options[] = array(
			'desc' 	=> __( 'Service Title', 'health' ),
			'id' 		=> 'health_service_title'.$i,
			'std' 	=> $rand_titles[0],
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Service Description', 'health' ),
			'id' 		=> 'health_service_desc'.$i,
			'std' 	=> 'Lorem ipsum dolor sit amet, consectetur adipricies sem Cras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis ',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect service when clicked', 'health' ),
			'id' 		=> 'health_service_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Projects', 'health' ),
		'type' => 'heading'
	);

	// activate option
	$options[] = array(
		'name' 		=> __( 'Activate projects', 'health' ),
		'desc' 		=> __( 'Check to activate projects.', 'health' ),
		'id' 			=> 'health_activate_projects',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);
	$options[] = array(
		'name' => __('Main Project','health'),
		'desc' 	=> __( 'Title', 'health' ),
		'id' 		=> 'health_main_project_title',
		'std' 	=> "Health Portfolio Projects",
		'type' 	=> 'text'
	);
	$options[] = array(
		'desc' 	=> __( 'Description', 'health' ),
		'id' 		=> 'health_main_project_desc',
		'std' 	=> 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.',
		'type' 	=> 'textarea'
	);	
	
	//
	$scarr = array();
	for( $i=1; $i<=16; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of projects','health'),
        'desc' => __('How many projects is the homepage. (Set and click SAVE)', 'health'),
        'id' => 'health_projects_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// Services options
	$rand_titles = array("Heart Disease","Eye Health","Pregnancy","Diabetes","Medical Treatments","Cardio Monitoring","Emergency Help","Medical Guidance");
	//
	$services_count = of_get_option( 'health_services_count', 4 );
	for( $i=1; $i<=$services_count; $i++) {
		$options[] = array(
			'name'  => __( 'Service', 'health' ). ' #'.$i,
			'desc' => __( 'Image', 'health' ). ' #'.$i.' (270x160px)',
			'id' => 'health_project_image'.$i,
			'std' 	=> $imagepath.'240x140.png',
			'type' => 'upload'
		);
		shuffle($rand_titles);
		$options[] = array(
			'desc' 	=> __( 'Title', 'health' ),
			'id' 		=> 'health_project_title'.$i,
			'std' 	=> $rand_titles[0],
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Description', 'health' ),
			'id' 		=> 'health_project_desc'.$i,
			'std' 	=> 'Lorem ipsum dolor sit amet, consectetur adipricies sem Cras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis ',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect project when clicked', 'health' ),
			'id' 		=> 'health_project_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}

/////	
	
	return $options;
}

?>