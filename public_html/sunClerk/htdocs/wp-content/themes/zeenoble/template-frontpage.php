<?php
/*
Template Name: Frontpage Template
*/
?>
<?php get_header(); ?>

<?php $options = get_option('zeenoble_options'); // Get Theme Options from Database ?>

	<?php // Show Image Slider as frontpage image if option is checked
	if(isset($options['themeZee_frontpage_slider_active']) and $options['themeZee_frontpage_slider_active'] == 'true' ) :

		themezee_display_frontpage_slideshow();
		
	elseif( is_page() && has_post_thumbnail() ) : ?>
			
		<div id="custom-header">
			<?php the_post_thumbnail('custom_header_image'); ?>
		</div>
<?php
	elseif( get_header_image() ) : ?>
			
		<div id="custom-header">
			<img src="<?php echo get_header_image(); ?>" />
		</div>
<?php 
	endif;
?>
	
	<div id="wrap" class="template-frontpage">
	
	<?php // Display Frontpage Widgets #2
	if(is_active_sidebar('frontpage-widgets-two')) : ?>
		<div id="frontpage-widgets-two" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-widgets-two'); ?>
		</div>
	<?php endif; ?>
	
	</div>
	
<?php get_footer(); ?>	