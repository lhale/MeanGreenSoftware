<?php
/*
 * The header for displaying menu, header-image and homepage-widgets.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>
<body <?php body_class(); ?> >
<div id="container">

	<div id="header-first">
		<div class="logo"> 
			<?php if ( get_theme_mod( 'bluegray_logo' ) ) : ?> 
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				<img src='<?php echo esc_url( get_theme_mod( 'bluegray_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a> 
			<?php else : ?> 
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> </h1>
				<h4><?php bloginfo('description'); ?></h4> 
			<?php endif; ?>
		</div>
	</div>

	<div id="header-second">
		<?php if ( has_nav_menu( 'primary' ) ) : ?> 
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
		<?php endif; ?>

		<?php if ( is_home() || is_front_page() ) {?> 
			<?php if ( get_header_image() ) {?> 
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="" /> 
			<?php } ?> 
		<?php } ?> 
	</div>

<div id="main-content">

	<?php if( is_home() || is_front_page() ) {?>
	<?php if ( is_active_sidebar( 'homepage-right' ) || is_active_sidebar( 'homepage-middle' ) || is_active_sidebar( 'homepage-left' ) ) {?> 
		<div id="header-widgets">
			<div class="home-left"> 
				<?php dynamic_sidebar( 'homepage-left' ); ?>
			</div>
	
			<div class="home-middle"> 
				<?php dynamic_sidebar( 'homepage-middle' ); ?>
			</div>
	
			<div class="home-right"> 
				<?php dynamic_sidebar( 'homepage-right' ); ?>
			</div>
		</div>
	<?php } ?>	
	<?php } ?>