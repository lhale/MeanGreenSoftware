<?php
	
	function themezee_sections_frontpage() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_frontpage_template",
					"name" => __('Activate Frontpage Template', 'zeeNoble_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_slider",
					"name" => __('Frontpage Slider', 'zeeNoble_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_widgets",
					"name" => __('Frontpage Widgets', 'zeeNoble_language'));

		return $themezee_sections;
	}
	
	function themezee_settings_frontpage() {
	
		
		### FRONTPAGE Template
		#######################################################################################
		$themezee_settings[] = array("name" => __('Turn on Frontpage Template?', 'zeeNoble_language'),
						"desc" => __('Check this to automatically display the frontpage template on HOME page. You can also manually create a page and select the "Frontpage Template" page template instead of using this option.', 'zeeNoble_language'),
						"id" => "themeZee_frontpage_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_template");
		
		### FRONTPAGE Slider
		#######################################################################################
		$themezee_settings[] = array("name" => __('Show Frontpage Slider?', 'zeeNoble_language'),
						"desc" => __('Check this to activate the Slideshow displayed on the front page template.', 'zeeNoble_language'),
						"id" => "themeZee_frontpage_slider_active",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Animation', 'zeeNoble_language'),
						"desc" => "",
						"id" => "themeZee_frontpage_slider_animation",
						"std" => "fade",
						"type" => "radio",
						'choices' => array(
									'slide' => __('Horizontal Slider', 'zeeNoble_language'),
									'fade' => __('Fade Slider', 'zeeNoble_language')),
						"section" => "themeZee_frontpage_slider"
						);
									
		$themezee_settings[] = array("name" => __('Slider Speed', 'zeeNoble_language'),
						"desc" => __('Enter the speed of the slideshow cycling (timeout between slides), in milliseconds.', 'zeeNoble_language'),
						"id" => "themeZee_frontpage_slider_speed",
						"std" => "7000",
						"type" => "text",
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Content', 'zeeNoble_language'),
						"desc" => __('Please note: You can insert your content which is displayed in the slideshow on the <b>"Slider Content" tab</b>.', 'zeeNoble_language'),
						"id" => "themeZee_frontpage_slider_info",
						"std" => "",
						"type" => "info",
						"section" => "themeZee_frontpage_slider");	

		### FRONTPAGE WIDGETS
		#######################################################################################		
		$themezee_settings[] = array("name" => __('About Frontpage Widgets', 'zeeNoble_language'),
						"desc" => __('Please note: You can configure your widgets to be displayed on the frontpage template on <b>Appearance > Widgets</b>.', 'zeeNoble_language'),
						"id" => "themeZee_frontpage_widgets_info",
						"type" => "info",
						"std" => '',
						"section" => "themeZee_frontpage_widgets");
		
		return $themezee_settings;
	}

?>