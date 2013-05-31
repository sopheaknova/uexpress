<?php
/**************************************************************
 *          All theme Paths 
 ***************************************************************/
            //theme Directory and URI
		define('O2_DIR', get_template_directory());
		define('O2_URI', get_template_directory_uri());
		
		/* Set the file path based on whether the Options Framework is in a parent theme or child theme */

		if ( STYLESHEETPATH == TEMPLATEPATH ) {
			define('OF_FILEPATH', TEMPLATEPATH);
			define('OF_DIRECTORY', get_template_directory_uri());
		} else {
			define('OF_FILEPATH', STYLESHEETPATH);
			define('OF_DIRECTORY', get_stylesheet_directory_uri());
		}

	    //Nova Framework
		define('O2_FW', O2_DIR . '/framework');
        //post types
        define('O2_TYPE', O2_FW . '/posttype');

            //assest
                define('O2_JS', O2_URI . '/js');
                define('O2_CSS', O2_URI . '/css');
                define('O2_IMG', O2_URI . '/images');
                define('O2_SCRIPTS', O2_URI. '/framework/scripts');
                define('O2_FUN', O2_FW . '/functions');
                define('O2_ADMIN', O2_FW . '/admin');
                define('O2_CUSTOMPOST', O2_FW . '/custom-post');
				define('O2_META', O2_FW . '/metaboxes');
                define('O2_SC', O2_FW . '/shortcodes');
                define('O2_WIDGET', O2_FW . '/widgets');
		define('OPTIONS_FRAMEWORK_URL', O2_URI . '/framework/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', O2_ADMIN);	
		
		
		/* These files build out the options interface.  Likely won't need to edit these. */
		require_once (O2_ADMIN . '/admin-functions.php');		// Custom functions and plugins
		require_once (O2_ADMIN . '/admin-interface.php');		// Admin Interfaces (options,framework, seo)	
		require_once (O2_ADMIN . '/theme-options.php'); 		// Options panel settings and custom settings
		require_once (O2_ADMIN . '/tinymce/shortcodes-generator.php');
		
		
		// include scripts
		require O2_FUN . '/scripts.php';
		
		//unlimited sidebars
	    require O2_FUN . '/sidebar-generator.php';
	   
		//mom functions
	   	require O2_FUN . '/o2-functions.php';
		
		// include shortcode
		require O2_FUN . '/shortcodes.php';
		
		// include metabox
		require O2_META . '/theme-metaboxes.php';
		
		// include custom post type
		require O2_FUN . '/post-type.php';
		
		// include widget
		require O2_WIDGET . '/o2-register-sidebar.php';
		require O2_WIDGET . '/latestnews-widget.php';
		require O2_WIDGET . '/searchbox-widget.php';
		require O2_WIDGET . '/contactinfo-widget.php';
		require O2_WIDGET . '/testimonial-widget.php';
		require O2_WIDGET . '/staticgmap-widget.php';
		
		
?>