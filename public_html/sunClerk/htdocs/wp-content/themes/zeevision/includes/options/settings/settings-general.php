<?php
	
	function themezee_sections_general() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_general_header",
					"name" => __('Header Settings', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_general_layout",
					"name" => __('Layout Settings', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_general_css_section",
					"name" => __('Custom CSS Code', 'zeeVision_language'));
					
		return $themezee_sections;
	}
	
	function themezee_settings_general() {

		$themezee_settings = array();
	
		### HEADER SETTINGS
		#######################################################################################
		$themezee_settings[] = array("name" => __('Logo Image', 'zeeVision_language'),
						"desc" => __('Paste the full Image URL of your logo or click Upload Image. Leave this field blank to display the site title instead of a logo image.', 'zeeVision_language'),
						"id" => "themeZee_general_logo",
						"std" => "",
						"type" => "image",
						"section" => "themeZee_general_header");

		$themezee_settings[] = array("name" => __('Show Tagline?', 'zeeVision_language'),
						"desc" => __('Check this if you want to show your tagline(blog description) below the logo', 'zeeVision_language'),
						"id" => "themeZee_general_tagline",
						"std" => "true",
						"type" => "checkbox",
						"section" => "themeZee_general_header");
						
		### LAYOUT SETTINGS
		#######################################################################################				
		$themezee_settings[] = array("name" => __('Sidebar Options', 'zeeVision_language'),
						"desc" => "",
						"id" => "themeZee_general_sidebars",
						"std" => 'right',
						"type" => "radio",
						'choices' => array(
									'left' => __('Left Sidebar', 'zeeVision_language'),
									'right' => __('Right Sidebar', 'zeeVision_language')),
						"section" => "themeZee_general_layout"
						);
						
		$themezee_settings[] = array("name" => __('Footer Content', 'zeeVision_language'),
						"desc" => __('Enter the content which is displayed in the footer here.', 'zeeVision_language'),
						"id" => "themeZee_general_footer",
						"std" => "Place your Footer Content here",
						"type" => "html",
						"section" => "themeZee_general_layout");
						
		### CUSTOM CSS
		#######################################################################################					
		$themezee_settings[] = array("name" => __('Custom CSS', 'zeeVision_language'),
						"desc" => __('Place your Custom CSS code here.', 'zeeVision_language'),
						"id" => "themeZee_general_css",
						"std" => "",
						"type" => "textarea",
						"section" => "themeZee_general_css_section");
										
		return $themezee_settings;
	}

?>