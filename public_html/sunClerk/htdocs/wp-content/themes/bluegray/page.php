<?php
/*
 * The default template for displaying pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php while ( have_posts() ) : the_post(); ?>

		<h4 class="page-title"><?php the_title(); ?></h4>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('single', array('class' => 'single-image')); 
		} ?>

		<?php the_content(); ?>

		<div class="pagelink"><?php wp_link_pages(); ?></div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'bluegray' ), '<div class="edit-link">', '</div>' ) ?>

</div>		
<?php get_sidebar(); ?>
<?php get_footer(); ?>