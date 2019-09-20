<?php 
if ( of_get_option( 'health_activate_services' ) or of_get_option( 'health_activate_projects' ) ) {
	get_header();
	/****** get index services  ********/
	if ( of_get_option( 'health_activate_services' ) )
		get_template_part('index', 'services') ;
	
	/****** get index projects  ********/
	if ( of_get_option( 'health_activate_projects' ) )
		get_template_part('index', 'projects') ;
	get_footer();
} else {
	get_template_part('index');
} ?>