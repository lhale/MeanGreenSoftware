<?php
	
	function themezee_sections_colors() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_colors_schemes",
					"name" => __('Predefined Color Schemes', 'zeeVision_language'));
		
		return $themezee_sections;
	}
	
	function themezee_settings_colors() {
	
		$color_schemes = array(
			'#151515' => __('Black', 'zeeVision_language'),
			'#725639' => __('Brown', 'zeeVision_language'),
			'#2d912e' => __('Green', 'zeeVision_language'),
			'#e34c00' => __('Orange', 'zeeVision_language'),
			'#9215a5' => __('Purple', 'zeeVision_language'),
			'#dd3333' => __('Red', 'zeeVision_language'),
			'#009b91' =>  __('Teal', 'zeeVision_language'),
			'default' => __('Standard', 'zeeVision_language'));
		
		$themezee_settings = array();
	
		### COLOR SETTINGS
		#######################################################################################
							
		$themezee_settings[] = array("name" => __('Set Color Scheme', 'zeeVision_language'),
						"desc" => __('Please select your color scheme here.', 'zeeVision_language'),
						"id" => "themeZee_color_scheme",
						"std" => "default",
						"type" => "select",
						'choices' => $color_schemes,
						"section" => "themeZee_colors_schemes"
						);
		
		return $themezee_settings;
	}

?>