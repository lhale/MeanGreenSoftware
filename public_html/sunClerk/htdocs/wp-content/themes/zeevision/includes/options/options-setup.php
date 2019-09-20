<?php
/***
 * Setup Theme Options
 *
 * Includes all settings from the /includes/options/settings/ folder
 * (setting arrays are splitted in multiple files for reasons of clarity)
 *
 * Defines the theme options array containing all tabs, sections and settings.
 * Contain functions to display the welcome screen and sidebar content on options screen.
 *
 */

// Include all Setting Files
require( get_template_directory() . '/includes/options/settings/settings-general.php' );
require( get_template_directory() . '/includes/options/settings/settings-colors.php' );
require( get_template_directory() . '/includes/options/settings/settings-frontpage.php' );
require( get_template_directory() . '/includes/options/settings/settings-slider.php' );


// Creates theme options array with all sections and settings
function themezee_options_array() {

	/* Section and Setting functions come from setting files included above */
	
	$theme_options = array();
	
	$theme_options['general'] = array(
			"name" => __('General', 'zeeVision_language'),
			"sections" => themezee_sections_general(),
			"settings" => themezee_settings_general());
	
	$theme_options['colors'] = array(
			"name" => __('Colors', 'zeeVision_language'),
			"sections" => themezee_sections_colors(),
			"settings" => themezee_settings_colors());
			
	$theme_options['frontpage'] = array(
			"name" => __('Front Page', 'zeeVision_language'),
			"sections" => themezee_sections_frontpage(),
			"settings" => themezee_settings_frontpage());
	
	$theme_options['slider'] = array(
			"name" => __('Slider Content', 'zeeVision_language'),
			"sections" => themezee_sections_slider(),
			"settings" => themezee_settings_slider());	
	
	return $theme_options;
}
	

// Display Sidebar
function themezee_options_sidebar() {
	$theme_data = wp_get_theme(); 
?>
	<div class="zee_options_sidebar">
	
		<dl><dt><h4><?php _e('Theme Data', 'zeeVision_language'); ?></h4></dt>
			<dd>
				<p><?php _e('Name', 'zeeVision_language'); ?>: <?php echo $theme_data->Name; ?><br/>
				<?php _e('Version', 'zeeVision_language'); ?>: <b><?php echo $theme_data->Version; ?></b>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('(Changelog)', 'zeeVision_language'); ?></a><br/>
				<?php _e('Author', 'zeeVision_language'); ?>: <a href="http://themezee.com/" target="_blank">ThemeZee</a><br/>
				</p>
			</dd>
		</dl>
		
		<dl><dt><h4><?php _e('Upgrade', 'zeeVision_language'); ?> <?php echo $theme_data->Name; ?></h4></dt>
			<dd>
				<ul>
					<li><a href="http://themezee.com/themes/zeevision/#PROVersion-1" target="_blank"><?php _e('Check out the PRO Version', 'zeeVision_language'); ?></a></li>
					<li><a href="http://themezee.com/join-the-theme-club/" target="_blank"><?php _e('Join the Theme Club and get Support', 'zeeVision_language'); ?></a></li>
				</ul>
			</dd>
		</dl>
		
		<dl><dt><h4><?php _e('Help to translate', 'zeeVision_language'); ?> </h4></dt>
			<dd>
				<p><?php _e('You want to use this WordPress theme in your native language? Then help out to translate it!', 'zeeVision_language'); ?></p>
				<ul>
					<li><a href="http://translate.themezee.org/projects/zeevision" target="_blank"><?php _e('Join the Online Translation Project', 'zeeVision_language'); ?></a></li>
				</ul>
			</dd>
		</dl>
				
		<dl><dt><h4><?php _e('Subscribe Now', 'zeeVision_language'); ?></h4></dt>
			<dd>
				<p><?php _e('Subscribe now and get informed about each <b>Theme Release</b> from ThemeZee.', 'zeeVision_language'); ?></p>
				<ul class="subscribe">
					<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/rss.png"/><a href="http://themezee.com/feed/" target="_blank"><?php _e('RSS Feed', 'zeeVision_language'); ?></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/email.png"/><a href="http://feedburner.google.com/fb/a/mailverify?uri=Themezee" target="_blank"><?php _e('Email Subscription', 'zeeVision_language'); ?></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/twitter.png"/><a href="http://twitter.com/ThemeZee" target="_blank"><?php _e('Follow me on Twitter', 'zeeVision_language'); ?></a></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/facebook.png"/><a href="http://www.facebook.com/ThemeZee" target="_blank"><?php _e('Become a Facebook Fan', 'zeeVision_language'); ?></a></li>
				</ul>
			</dd>
		</dl>
	</div>
	<div class="clear"></div>
<?php
}


// Display Welcome Page
function themezee_options_welcome_page() { 
	$theme_data = wp_get_theme();
	$pro_url = 'http://themezee.com/themes/zeevision/';
	$club_url = 'http://themezee.com/join-the-theme-club/';
?>
	<div id="zee_welcome">
		<h3><?php _e('Thank you for installing this theme!', 'zeeVision_language'); ?></h3>
		<div class="container">
			<h1><?php _e('Welcome to', 'zeeVision_language'); ?> <?php echo $theme_data->Name; ?></h1>
			<div class="zee_intro">
				<?php _e("First of all, the theme options might alarm you, <b>but don't panic</b>. Everything is organized and documented well enough for you.", 'zeeVision_language'); ?>
			</div>
		</div>
		<div class="welcome_halfed">
			<div class="welcome_left">
				<h3><?php _e('Want more features?', 'zeeVision_language'); ?></h3>
				<div class="container">
					<h2><?php _e('Check out', 'zeeVision_language'); ?> <?php echo $theme_data->Name; ?>Pro</h2>
					<p><?php _e('The <b>PRO Version</b> provide additional features to <b>customize</b> and configure your Theme.', 'zeeVision_language'); ?></p>
					<p><h4><?php _e('Some Pro Features:', 'zeeVision_language'); ?></h4>
						<ul>
							<li><?php _e('+ Custom Color Management', 'zeeVision_language'); ?></li>
							<li><?php _e('+ Unlimited Slides on frontpage template', 'zeeVision_language'); ?></li>
							<li><?php _e('+ several Pro Widgets', 'zeeVision_language'); ?></li>
							<li><?php _e('+ Custom Font Manager', 'zeeVision_language'); ?></li>
							<li><?php _e('+ Footer Widgets', 'zeeVision_language'); ?></li>
							<li><?php _e('+ and a lot more..', 'zeeVision_language'); ?></li>
						</ul>
						<a class="welcome_button" href="<?php echo $pro_url; ?>#PROVersion-1" target="_blank"><?php _e('Learn more about the PRO Version', 'zeeVision_language'); ?></a>
					</p>
				</div>
			</div>
			<div class="welcome_right">
				<h3><?php _e('Need support?', 'zeeVision_language'); ?></h3>
				<div class="container">
					<h2><?php _e('Join the Theme Club', 'zeeVision_language'); ?></h2>
					<p><?php _e('You want <b>top-notch Support</b> for installing and configuring your Theme? Become a <b>Member</b>!', 'zeeVision_language'); ?></p>
					<p><h4><?php _e('Theme Club Features:', 'zeeVision_language'); ?></h4>
						<ul>
							<li><?php _e('+ access to the Support Forum at ThemeZee.com', 'zeeVision_language'); ?></li>
							<li><?php _e('+ download all Pro Themes', 'zeeVision_language'); ?></li>
							<li><?php _e('+ advanced online Theme Documentation', 'zeeVision_language'); ?></li>
							<li><?php _e('+ fast and helpful answers to all your questions', 'zeeVision_language'); ?></li>
						</ul>
						<a class="welcome_button" href="<?php echo $club_url; ?>" target="_blank"><?php _e('Learn more about the Theme Club', 'zeeVision_language'); ?></a>
					</p>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<h3><?php _e('Not happy with', 'zeeVision_language'); ?> <?php echo $theme_data->Name; ?>?</h3>
		<div class="container">
		<p><?php _e('ThemeZee.com provide several other <b>free WordPress Themes</b>.', 'zeeVision_language'); ?>
		<a href="http://themezee.com/themes/" target="_blank"><?php _e('Click here to browse through all of my themes.', 'zeeVision_language'); ?></a>
		</p>
		</div>
	</div>
<?php
}
?>