<?php
	
	function themezee_sections_colors() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_colors_schemes",
					"name" => __('Predefined Color Schemes', 'zeeNoble_language'));
		
		return $themezee_sections;
	}
	
	function themezee_settings_colors() {
	
		$color_schemes = array(
			'#151515' => __('Black', 'zeeNoble_language'),
			'#1562a5' => __('Blue', 'zeeNoble_language'),
			'#725639' => __('Brown', 'zeeNoble_language'),
			'#2d912e' => __('Green', 'zeeNoble_language'),
			'#e34c00' => __('Orange', 'zeeNoble_language'),
			'#9215a5' => __('Purple', 'zeeNoble_language'),
			'#dd3333' => __('Red', 'zeeNoble_language'),
			'default' => __('Standard', 'zeeNoble_language'));
		
		$themezee_settings = array();
	
		### COLOR SETTINGS
		#######################################################################################
							
		$themezee_settings[] = array("name" => __('Set Color Scheme', 'zeeNoble_language'),
						"desc" => __('Please select your color scheme here.', 'zeeNoble_language'),
						"id" => "themeZee_color_scheme",
						"std" => "default",
						"type" => "select",
						'choices' => $color_schemes,
						"section" => "themeZee_colors_schemes"
						);
						
		$themezee_settings[] = array("name" => __('Navigation Color Style', 'zeeNoble_language'),
						"desc" => __("Choose between light or dark color scheme for dropdown menus and mobile navigation.", 'zeeNoble_language'),
						"id" => "themeZee_colors_navi_style",
						"std" => 'light',
						"type" => "radio",
						'choices' => array(
									'light' => __('Light Navigation', 'zeeNoble_language'),
									'dark' => __('Dark Navigation', 'zeeNoble_language')),
						"section" => "themeZee_colors_schemes"
						);
		
		return $themezee_settings;
	}

?>