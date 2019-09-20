<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 */
	

// Display Custom Header
if ( ! function_exists( 'themezee_display_custom_header' ) ):
	
	function themezee_display_custom_header() {
		
		// Get Theme Options from Database
		$options = get_option('zeevision_options'); 
		
		// Don't display header image on template-frontpage.php
		if( is_page_template('template-frontpage.php') )
			return;
			
		// Don't display header image when "display frontpage template automatically on home page" option is activated
		if( is_front_page() and isset($options['themeZee_frontpage_activate']) and $options['themeZee_frontpage_activate'] == 'true' )
			return;
			
		// Check if page is displayed and featured header image is used
		if( is_page() && has_post_thumbnail() ) :
		?>
			<div id="custom-header" class="container">
				<?php the_post_thumbnail('custom_header_image'); ?>
			</div>
<?php
		// Check if there is a custom header image
		elseif( get_header_image() ) :
		?>
			<div id="custom-header" class="container">
				<img src="<?php echo get_header_image(); ?>" />
			</div>
<?php 
		endif;

	}
	
endif;


// Display Postmeta Data
if ( ! function_exists( 'themezee_display_postmeta' ) ) :
	
	function themezee_display_postmeta() { ?>
		
		<span class="meta-date">
		<?php printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a>', 'zeeVision_language'), 
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		?>
		</span>
		
		<span class="meta-author sep">
		<?php printf(__('by <a href="%1$s" title="%2$s" rel="author">%3$s</a>', 'zeeVision_language'), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'zeeVision_language' ), get_the_author() ) ),
				get_the_author()
			);
		?>
		</span>

	<?php if ( comments_open() ) : ?>
		<span class="meta-comments sep">
			<?php comments_popup_link( __('Leave a comment', 'zeeVision_language'),__('One comment','zeeVision_language'),__('% comments','zeeVision_language') ); ?>
		</span>
	<?php endif; ?>
	<?php
		edit_post_link(__( 'Edit Post', 'zeeVision_language' ));
	}
	
endif;


// Display Postinfo Data on Archive Pages
if ( ! function_exists( 'themezee_display_postinfo_index' ) ):
	
	function themezee_display_postinfo_index() { ?>
	
		<span class="meta-category">
			<?php printf(__('Posted in %1$s', 'zeeVision_language'), get_the_category_list(', ')); ?>
		</span>
		
	<?php
	
	}
	
endif;


// Display Postinfo Data
if ( ! function_exists( 'themezee_display_postinfo_single' ) ):
	
	function themezee_display_postinfo_single() { ?>
		
		<span class="meta-category">
			<?php printf(__('Posted in %1$s', 'zeeVision_language'), get_the_category_list(', ')); ?>
		</span>
		
	<?php
		$tag_list = get_the_tag_list('', ', ');
		if ( $tag_list ) : ?>
			<span class="meta-tags">
				<?php printf(__('tagged with %1$s', 'zeeVision_language'), $tag_list); ?>
			</span>
	<?php 
		endif; 
		
	}
	
endif;

	
// Display Content Pagination
if ( ! function_exists( 'themezee_display_pagination' ) ):
	
	function themezee_display_pagination() { 
		
		global $wp_query;
		
		if ( $wp_query->max_num_pages > 1 ) :

			if(function_exists('wp_pagenavi')) : // if PageNavi is activated
				
				wp_pagenavi();
			
			else : // Otherwise, use traditional Navigation ?>
				
				<div class="post-pagination clearfix">
					<span class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'zeeVision_language')) ?></span>
					<span class="alignright"><?php previous_posts_link (__('Recent Entries &raquo;', 'zeeVision_language')) ?></span>
				</div>
				
	<?php 	
			endif;
		endif;
		
	}
	
endif;


// Display Frontpage Slideshow
if ( ! function_exists( 'themezee_display_frontpage_slideshow' ) ):
	
	function themezee_display_frontpage_slideshow() { 
	
		// Get Theme Options
		$options = get_option('zeevision_options');
		
		// Get Frontpage Slide #1
		$slide_one_image = esc_attr($options['themeZee_slider_one_image']);
		$slide_one_title = esc_attr($options['themeZee_slider_one_title']);
		$slide_one_content = wp_kses_post($options['themeZee_slider_one_content']);
		$slide_one_link_name = esc_attr($options['themeZee_slider_one_link_name']);
		$slide_one_link_url = esc_url($options['themeZee_slider_one_link_url']);
		
		// Get Frontpage Slide #2
		$slide_two_image = esc_attr($options['themeZee_slider_two_image']);
		$slide_two_title = esc_attr($options['themeZee_slider_two_title']);
		$slide_two_content = wp_kses_post($options['themeZee_slider_two_content']);
		$slide_two_link_name = esc_attr($options['themeZee_slider_two_link_name']);
		$slide_two_link_url = esc_url($options['themeZee_slider_two_link_url']);
		
		?>
		<div id="frontpage-slider-container">
			<div id="frontpage-slider-wrap" class="container clearfix">
				<div id="frontpage-slider" class="zeeflexslider">
					<ul class="zeeslides">
						
						<li id="slide-1" class="zeeslide clearfix">

						<?php if ( $slide_one_image <> '' ) : ?>
							<div class="slide-image">
								<?php if ( $slide_one_link_url <> '' ) : ?>
									<a href="<?php echo $slide_one_link_url; ?>" title="<?php echo $slide_one_link_name; ?>" >
								<?php endif; ?>

										<img src="<?php echo $slide_one_image; ?>" alt="slide-image" class="alignnone wp-post-image" />
								
								<?php if ( $slide_one_link_url <> '' ) : ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
							<div class="slide-entry">
							
								<h2 class="slide-title"><?php echo $slide_one_title; ?></h2>
								
								<?php echo $slide_one_content; ?>
							
							<?php if ( $slide_one_link_url <> '' ) : ?>
								<div class="slide-more">
									<a class="slide-link" href="<?php echo $slide_one_link_url; ?>" title="<?php echo $slide_one_link_name; ?>" >
										<?php if ( $slide_one_link_name <> '' ) : 
											echo $slide_one_link_name;
										else : 
											_e('Read more &raquo;', 'zeeVision_language');
										endif;
										?>
									</a>
								</div>
							<?php endif; ?>
							
							</div>

						</li>
						
						<li id="slide-2" class="zeeslide clearfix">

						<?php if ( $slide_two_image <> '' ) : ?>
							<div class="slide-image">
								<?php if ( $slide_two_link_url <> '' ) : ?>
									<a href="<?php echo $slide_two_link_url; ?>" title="<?php echo $slide_two_link_name; ?>" >
								<?php endif; ?>

										<img src="<?php echo $slide_two_image; ?>" alt="slide-image" class="alignnone wp-post-image" />
								
								<?php if ( $slide_two_link_url <> '' ) : ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
							<div class="slide-entry">
							
								<h2 class="slide-title"><?php echo $slide_two_title; ?></h2>
								
								<?php echo $slide_two_content; ?>
							
							<?php if ( $slide_two_link_url <> '' ) : ?>
								<div class="slide-more">
									<a class="slide-link" href="<?php echo $slide_two_link_url; ?>" title="<?php echo $slide_two_link_name; ?>" >
										<?php if ( $slide_two_link_name <> '' ) : 
											echo $slide_two_link_name;
										else : 
											_e('Read more &raquo;', 'zeeVision_language');
										endif;
										?>
									</a>
								</div>
							<?php endif; ?>
						
							</div>
							
						</li>
						
					</ul>
				</div>
			</div>
		</div>
<?php
	}
	
endif;


?>