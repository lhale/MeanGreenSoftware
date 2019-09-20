<?php
/**
 * Template Name: Full Width Page
 *
 * @package Tesseract
 */

get_header(); ?>

	<div id="primary" class="full-width-page">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'page' );
					
					// If comments are open or we have at least one comment, load up the comment template
                                        /* LDH - comments section on every page disabled (at least for full-width ones)
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
*/
				?>

			<?php endwhile; ?>

			<?php tesseract_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<div id="larry">
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
