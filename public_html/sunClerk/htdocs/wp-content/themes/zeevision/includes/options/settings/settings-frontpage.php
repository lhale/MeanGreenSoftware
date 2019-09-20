<?php
	
	function themezee_sections_frontpage() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_frontpage_template",
					"name" => __('Activate Frontpage Template', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_slider",
					"name" => __('Frontpage Slider', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_intro",
					"name" => __('Frontpage Intro', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_widgets",
					"name" => __('Frontpage Widgets', 'zeeVision_language'));

		return $themezee_sections;
	}
	
	function themezee_settings_frontpage() {
	
		
		### FRONTPAGE Template
		#######################################################################################
		$themezee_settings[] = array("name" => __('Turn on Frontpage Template?', 'zeeVision_language'),
						"desc" => __('Check this to automatically display the frontpage template on HOME page. You can also manually create a page and select the "Frontpage Template" page template instead of using this option.', 'zeeVision_language'),
						"id" => "themeZee_frontpage_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_template");
		
		### FRONTPAGE Slider
		#######################################################################################
		$themezee_settings[] = array("name" => __('Show Frontpage Slider?', 'zeeVision_language'),
						"desc" => __('Check this to activate the Slideshow displayed on the front page template.', 'zeeVision_language'),
						"id" => "themeZee_frontpage_slider_active",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Animation', 'zeeVision_language'),
						"desc" => "",
						"id" => "themeZee_frontpage_slider_animation",
						"std" => "fade",
						"type" => "radio",
						'choices' => array(
									'slide' => __('Horizontal Slider', 'zeeVision_language'),
									'fade' => __('Fade Slider', 'zeeVision_language')),
						"section" => "themeZee_frontpage_slider"
						);
									
		$themezee_settings[] = array("name" => __('Slider Speed', 'zeeVision_language'),
						"desc" => __('Enter the speed of the slideshow cycling (timeout between slides), in milliseconds.', 'zeeVision_language'),
						"id" => "themeZee_frontpage_slider_speed",
						"std" => "7000",
						"type" => "text",
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Content', 'zeeVision_language'),
						"desc" => __('Please note: You can insert your content which is displayed in the slideshow on the <b>"Slider Content" tab</b>.', 'zeeVision_language'),
						"id" => "themeZee_frontpage_slider_info",
						"std" => "",
						"type" => "info",
						"section" => "themeZee_frontpage_slider");
						
		### FRONTPAGE INTRO
		#######################################################################################							
		$themezee_settings[] = array("name" => __('Frontpage Intro Text', 'zeeVision_language'),
						"desc" => __('Enter here the Text of the Frontpage Intro.', 'zeeVision_language'),
						"id" => "themeZee_frontpage_intro_text",
						"std" => "",
						"type" => "editor",
						"section" => "themeZee_frontpage_intro");

		### FRONTPAGE WIDGETS
		#######################################################################################		
		$themezee_settings[] = array("name" => __('About Frontpage Widgets', 'zeeVision_language'),
						"desc" => __('Please note: You can configure your widgets to be displayed on the frontpage template on <b>Appearance > Widgets</b>.', 'zeeVision_language'),
						"id" => "themeZee_frontpage_widgets_info",
						"type" => "info",
						"std" => '',
						"section" => "themeZee_frontpage_widgets");

		return $themezee_settings;
	}

?>