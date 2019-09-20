<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that BlueGray supports
	function bluegray_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 700;

	// Make theme available for translation
		load_theme_textdomain('bluegray', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'bluegray' ), 
	 	) ); 

	// Add document title
		add_theme_support( 'title-tag' );

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 1700,
		'height' => 400,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Default header
		register_default_headers( array(
		'boats' => array(
			'url' => '%s/images/boats.jpg',
			'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
			'description' => __( 'Boats', 'bluegray' )
		)
		));

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 350, 350 ); 

	// Resize single page thumbnail
		add_image_size( 'single', 350, 350 ); 

	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'bluegray_setup' ); 


// Add html5 support for IE 8 and older 
	function bluegray_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		} 
	add_action( 'wp_head', 'bluegray_html5' ); 


// Enqueues scripts and styles for front-end
	function bluegray_scripts() {
			wp_enqueue_style( 'bluegray-style', get_stylesheet_uri() );
			wp_enqueue_script( 'bluegray-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'bluegray-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'bluegray_scripts' );


// Sidebars
	function bluegray_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'bluegray' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Right', 'bluegray' ),
		'id' => 'homepage-right',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Middle', 'bluegray' ),
		'id' => 'homepage-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Left', 'bluegray' ),
		'id' => 'homepage-left',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'bluegray' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'bluegray' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'bluegray' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'bluegray_widgets_init' );


// Add class to post nav 
	function bluegray_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'bluegray_post_next'); 

	function bluegray_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'bluegray_post_prev'); 


// Add class to comment nav 
	function bluegray_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'bluegray_comment_next'); 

	function bluegray_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'bluegray_comment_prev'); 


// Custom excerpt lenght (default length is 55 words)
	function bluegray_excerpt_length( $length ) { 
		return 55; } 
	add_filter( 'excerpt_length', 'bluegray_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function bluegray_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'bluegray_logo_section' , array( 
			'title' => __( 'Logo', 'bluegray' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header', 'bluegray' ),
		) );
		$wp_customize->add_setting( 'bluegray_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bluegray_logo', array( 
			'label' => __( 'Logo', 'bluegray' ), 
			'section' => 'bluegray_logo_section', 
			'settings' => 'bluegray_logo', 
		) ) );
	} 
	add_action('customize_register', 'bluegray_theme_customizer');

?>