<?php
/**
 * @package health
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ):?> 
	<div class="post-entry-media">
    	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_post_thumbnail();?></a>
    </div>
    <?php endif;?> 

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php health_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'health' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php health_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
