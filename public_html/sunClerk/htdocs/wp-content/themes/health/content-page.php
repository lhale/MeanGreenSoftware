<?php
/**
 * The template used for displaying page content in page.php
 *
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
        <?php edit_post_link( __( 'Edit', 'health' ), '<span class="edit-link"><i class="fa fa-edit"></i> ', '</span>' ); ?>
        </div>
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
    
</article><!-- #post-## -->
