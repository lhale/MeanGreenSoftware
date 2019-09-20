<?php
/*
Template Name: Frontpage Template
*/
?>
<?php get_header(); ?>

<?php $options = get_option('zeevision_options'); // Get Theme Options from Database ?>

	<?php // Show Image Slider as frontpage image if option is checked
	if(isset($options['themeZee_frontpage_slider_active']) and $options['themeZee_frontpage_slider_active'] == 'true' ) :

		themezee_display_frontpage_slideshow();
		
	elseif( is_page() && has_post_thumbnail() ) : ?>
			
		<div id="custom-header" class="container">
			<?php the_post_thumbnail('custom_header_image'); ?>
		</div>
<?php
	elseif( get_header_image() ) : ?>
			
		<div id="custom-header" class="container">
			<img src="<?php echo get_header_image(); ?>" />
		</div>
<?php 
	endif;
?>
	
	<div id="wrap" class="container template-frontpage">
	
	<?php // Display Frontpage Intro text
	if(isset($options['themeZee_frontpage_intro_text']) and $options['themeZee_frontpage_intro_text'] != '' ) : ?>
		<div id="frontpage-intro" class="clearfix">
			<p class="frontpage-intro-text"><?php echo do_shortcode(wp_kses_post($options['themeZee_frontpage_intro_text'])); ?></p>
		</div>
	<?php endif; ?>
	
	
	<?php // Display Frontpage Widgets #1
	if(is_active_sidebar('frontpage-widgets-one')) : ?>
		<div id="frontpage-widgets-one" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-widgets-one'); ?>
		</div>
	<?php endif; ?>
	
	</div>
	
<?php get_footer(); ?>	