<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package health
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'health' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
        
		<?php
        if( ( of_get_option( 'health_show_header_logo_text', 'text_only' ) == 'both' || of_get_option( 'health_show_header_logo_text', 'text_only' ) == 'logo_only' ) && of_get_option( 'health_header_logo_image', '' ) != '' ) {
        ?>
            <div class="header-logo-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url(of_get_option( 'health_header_logo_image', '' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
            </div><!-- #header-logo-image -->
        <?php
        }

        if( of_get_option( 'health_show_header_logo_text', 'text_only' ) == 'both' || of_get_option( 'health_show_header_logo_text', 'text_only' ) == 'text_only' ) {
        ?>
        	<div class="header-text">
			<h1 class="site-title"><i class="fa <?php echo esc_attr( of_get_option( 'health_header_text_icon', 'fa-3x fa-h-square' ) ); ?>"></i><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        	</div>

        <?php
        }
        ?>
            <div class="header-search">
            	<div class="site-description">
                	<?php
                    $adress = of_get_option( 'health_header_adress', 'Massachusetts Ave, Cambridge, MA, USA' );
					$mail = of_get_option( 'health_header_mail', 'info@example.com' );
					$phone = of_get_option( 'health_header_phone', '+1 617-253-1000' );
					if ($adress) echo '<i class="fa fa-map-marker"></i>'.$adress;
					if ($mail) echo '<i class="fa fa-envelope-o"></i>'.$mail;
					if ($phone) echo '<i class="fa fa-phone"></i>'.$phone;
					?>
                </div>
                <?php get_search_form(); ?>
            </div>    
            <div class="clear"></div>
		</div><!-- .site-branding -->


	</header><!-- #masthead -->
    
    <nav id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'health' ); ?></button>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
        
        <div class="clear"></div>
        <div class="nav-foot"></div>
    </nav><!-- #site-navigation -->
    
<?php
if( of_get_option( 'health_activate_slider', '0' ) == '1' ) {
	if ( is_front_page() ) {
?>
		<div class="site-slider"><div class="inner">
<?php
		health_slider();
?>
		<div class="clear"></div></div></div>
<?php
	}
}
?>

	<div id="content" class="site-content">