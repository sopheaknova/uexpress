<?php

/* ----------------------------------------------------------- */
/* Javascripts												   */
/* ----------------------------------------------------------- */

function register_scritps() {
	
	wp_deregister_script('jquery'); // register local jquery
	wp_register_script('jquery', O2_JS . '/jquery-1.7.2.min.js', 'jquery', '1.7');
	wp_register_script('slidemenu', O2_JS . '/jqueryslidemenu.js', 'jquery', '1.0', TRUE);
	wp_register_script('jcarousel', O2_JS . '/jquery.jcarousel.min.js', 'jquery', '1.0', TRUE);
	wp_register_script('gmap', O2_JS . '/jquery.gmap.min.js', 'jquery', '1.0', TRUE);
	wp_register_script('toolstabs', O2_JS . '/jquery.tools.tabs.min.js', 'jquery', '1.0', TRUE);
	wp_register_script('cufon', O2_JS . '/cufon-yui.js', 'jquery', '1.0', FALSE);
	wp_register_script('vegurfont', O2_JS . '/fonts/vegur.cufonfonts.js', 'jquery', '1.0', FALSE);
	
	wp_register_script('customs', O2_JS . '/customs.js', 'jquery', '1.0', TRUE);
	
	wp_register_style('jcarouselskin', O2_CSS . '/jcarousel-skin.css', '', '1.0', 'screen');
	
	if ( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
		wp_enqueue_style('pretty_photo', O2_JS . '/prettyPhoto/css/prettyPhoto.css', false, '3.1.3', 'screen');
	}
}

/* ----------------------------------------------------------- */
/* Load Scripts												   */
/* ----------------------------------------------------------- */

function print_scripts() {
	// load scripts into queue
	wp_enqueue_script('jquery');
	wp_enqueue_script('slidemenu');
	wp_enqueue_script('jcarousel');
	wp_enqueue_script('toolstabs');
	
	// PrettyPhoto script
	if(!WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
		wp_enqueue_script('pretty_photo_lib', O2_JS."/prettyPhoto/js/jquery.prettyPhoto.js", array('jquery'), '3.1.3', false);
		wp_enqueue_script('custom_pretty_photo', O2_JS."/prettyPhoto/custom_params.js", array('pretty_photo_lib'), '3.1.3', false);
	}
	
	wp_enqueue_script('gmap');
	
	wp_enqueue_script('cufon');
	wp_enqueue_script('vegurfont');	
	 
	wp_enqueue_script('customs');
	
	wp_enqueue_style('jcarouselskin');
}

// add scripts not on dashboard
if(!is_admin()) {
	add_action('init', 'register_scritps');
	add_action('wp_print_scripts', 'print_scripts');
}

?>