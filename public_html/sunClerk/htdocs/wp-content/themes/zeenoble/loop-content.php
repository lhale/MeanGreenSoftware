		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_post_thumbnail('featured_image', array('class' => 'alignleft')); ?></a>
		
		<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<div class="postmeta"><?php themezee_display_postmeta(); ?></div>
		
		<div class="entry clearfix">
			<?php the_content(__('Read more', 'zeeNoble_language')); ?>
		</div>
		<div class="page-links"><?php wp_link_pages(); ?></div>
		
		<div class="postinfo clearfix"><?php themezee_display_postinfo_index(); ?></div>

	</article>