<?php
if ( ! function_exists( 'health_slider' ) ) :
/**
 * display featured post slider
 */
function health_slider() { ?>
	<div class="slider-wrap">
		<div class="slider-cycle">
			<?php
			for( $i = 1; $i <= 4; $i++ ) {
				$health_slider_title = of_get_option( 'health_slider_title'.$i , '' );
				$health_slider_text = of_get_option( 'health_slider_text'.$i , '' );
				$health_slider_image = of_get_option( 'health_slider_image'.$i , '' );
				$health_slider_link = of_get_option( 'health_slider_link'.$i , '#' );

				if( !empty( $health_slider_image ) ) {
					if ( $i == 1 ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
					?>
					<section id="featured-slider" class="<?php echo $classes; ?>">
						<figure class="slider-image-wrap">
							<img alt="<?php echo esc_attr( $health_slider_title ); ?>" src="<?php echo esc_url( $health_slider_image ); ?>">
					    </figure>
					    <?php if( !empty( $health_slider_title ) || !empty( $health_slider_text ) ) { ?>
						    <article id="slider-text-box">
					    		<div class="inner-wrap">
						    		<div class="slider-text-wrap">
						    			<?php if( !empty( $health_slider_title )  ) { ?>
							     			<span id="slider-title" class="clearfix"><a title="<?php echo esc_attr( $health_slider_title ); ?>" href="<?php echo esc_url( $health_slider_link ); ?>"><?php echo esc_html( $health_slider_title ); ?></a></span>
							     		<?php } ?>
							     		<?php if( !empty( $health_slider_text )  ) { ?>
							     			<span id="slider-content"><?php echo esc_html( $health_slider_text ); ?></span>
							     		<?php } ?>
							     	</div>
							    </div>
							</article>
						<?php } ?>
					</section><!-- .featured-slider -->
				<?php
				}
			}
			?>
		</div>
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers -->
	</div><!-- .slider-cycle -->
<?php
}
endif;

?>