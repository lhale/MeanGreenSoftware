<?php
	
	function themezee_sections_slider() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_slider_content",
					"name" => __('Frontpage Slideshow', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_slider_slide_one",
					"name" => __('Frontpage Slide #1', 'zeeVision_language'));
					
		$themezee_sections[] = array("id" => "themeZee_slider_slide_two",
					"name" => __('Frontpage Slide #2', 'zeeVision_language'));

		return $themezee_sections;
	}
	
	function themezee_settings_slider() {
	
		
		### About Frontpage Slideshow
		#######################################################################################
		$themezee_settings[] = array("name" => __('About the FrontPage Slider', 'zeeVision_language'),
						"desc" => __('<b>Please note:</b> The slider content inserted here on this option page is displayed in the frontpage slideshow. You have to <b>activate the frontpage template and frontpage slider</b> on the "Front Page" tab in order to display the slideshow.', 'zeeVision_language'),
						"id" => "themeZee_slider_content_info",
						"std" => "",
						"type" => "info",
						"section" => "themeZee_slider_content");
		
		### FRONTPAGE Slide #1
		#######################################################################################
	
		$themezee_settings[] = array("name" => __('Slider Image', 'zeeVision_language'),
						"desc" => __('You can upload your slider image by clicking "Upload Image" or just paste the full Image URL here.', 'zeeVision_language'),
						"id" => "themeZee_slider_one_image",
						"std" => get_template_directory_uri() . '/images/slide-one.jpg',
						"type" => "image",
						"section" => "themeZee_slider_slide_one");
						
		$themezee_settings[] = array("name" => __('Slider Title', 'zeeVision_language'),
						"desc" => __('Please enter the slider title here.', 'zeeVision_language'),
						"id" => "themeZee_slider_one_title",
						"std" => "Welcome to zeeVision",
						"type" => "text",
						"section" => "themeZee_slider_slide_one");
						
		$themezee_settings[] = array("name" => __('Slider Content', 'zeeVision_language'),
						"desc" => __('You can enter the slideshow content here (basic HTML allowed).', 'zeeVision_language'),
						"id" => "themeZee_slider_one_content",
						"std" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.",
						"type" => "html",
						"section" => "themeZee_slider_slide_one");
						
		$themezee_settings[] = array("name" => __('Slider Link Name', 'zeeVision_language'),
						"desc" => __('Enter the link name in case your slide should be hyperlinked to some URL.', 'zeeVision_language'),
						"id" => "themeZee_slider_one_link_name",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_slider_slide_one");
						
		$themezee_settings[] = array("name" => __('Slider Link URL', 'zeeVision_language'),
						"desc" => __('Enter the URL of the link which the slide should point to.', 'zeeVision_language'),
						"id" => "themeZee_slider_one_link_url",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_slider_slide_one");
		
		
		### FRONTPAGE Slide #2
		#######################################################################################
	
		$themezee_settings[] = array("name" => __('Slider Image', 'zeeVision_language'),
						"desc" => __('You can upload your slider image by clicking "Upload Image" or just paste the full Image URL here.', 'zeeVision_language'),
						"id" => "themeZee_slider_two_image",
						"std" => get_template_directory_uri() . '/images/slide-two.jpg',
						"type" => "image",
						"section" => "themeZee_slider_slide_two");
						
		$themezee_settings[] = array("name" => __('Slider Title', 'zeeVision_language'),
						"desc" => __('Please enter the slider title here.', 'zeeVision_language'),
						"id" => "themeZee_slider_two_title",
						"std" => "Second Slide",
						"type" => "text",
						"section" => "themeZee_slider_slide_two");
						
		$themezee_settings[] = array("name" => __('Slider Content', 'zeeVision_language'),
						"desc" => __('You can enter the slideshow content here (basic HTML allowed).', 'zeeVision_language'),
						"id" => "themeZee_slider_two_content",
						"std" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.",
						"type" => "html",
						"section" => "themeZee_slider_slide_two");
						
		$themezee_settings[] = array("name" => __('Slider Link Name', 'zeeVision_language'),
						"desc" => __('Enter the link name in case your slide should be hyperlinked to some URL.', 'zeeVision_language'),
						"id" => "themeZee_slider_two_link_name",
						"std" => "Demo Link to ThemeZee.com",
						"type" => "text",
						"section" => "themeZee_slider_slide_two");
						
		$themezee_settings[] = array("name" => __('Slider Link URL', 'zeeVision_language'),
						"desc" => __('Enter the URL of the link which the slide should point to.', 'zeeVision_language'),
						"id" => "themeZee_slider_two_link_url",
						"std" => "http://themezee.com/",
						"type" => "text",
						"section" => "themeZee_slider_slide_two");
		
		return $themezee_settings;
	}

?>