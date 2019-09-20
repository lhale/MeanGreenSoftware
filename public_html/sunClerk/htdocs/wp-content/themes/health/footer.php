<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package health
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf( __( 'Proudly powered by %s', 'health' ), 'WordPress' ); ?>
			<span class="sep"> &amp; </span>
			<?php printf(
			__( '%1$s by %2$s.', 'health' ),
			__('Health WordPress Theme', 'health'),
			'<strong><a href="http://dinozoom.com/">'.__('Dinozoom', 'health' ).'</a></strong>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    
    <div id="back_top"><i class="fa fa-angle-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
