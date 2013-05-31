<?php

/*-----------------------------------------------------------------------------------*/
/* Create whitepages custom post type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'o2_whitepages_init' );

function o2_whitepages_init()  {
  $labels = array(
    'name' 								=> __( 'Subject',                   'uexpress' ),
    'singular_name' 			=> __( 'Subject',                    'uexpress' ),
    'add_new' 						=> __( 'Add Subject',                'uexpress' ),
    'add_new_item' 				=> __( 'Add Subject',                'uexpress' ),
    'edit_item' 					=> __( 'Edit Subject',               'uexpress' ),
    'new_item' 						=> __( 'New Subject',                'uexpress' ),
    'view_item' 					=> __( 'View Subject',               'uexpress' ),
    'search_items' 				=> __( 'Search Subject',            'uexpress' ),
    'not_found' 					=> __( 'No Subject found',          'uexpress' ),
    'not_found_in_trash'	=> __( 'No Subject found in Trash', 'uexpress' ), 
    'parent_item_colon'		=> __( '',                         'uexpress' ),
    'menu_name' 					=> __( 'Whitepages',              'uexpress' )
  );
  
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true, 
    'show_in_menu'       => true, 
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'whitepages' ),
    'capability_type'    => 'post',
    'has_archive'        => 'whitepages', 
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'page-attributes' ),
    'menu_position'      => 114,
	'menu_icon' => get_stylesheet_directory_uri() . '/images/favicon-16.png'
  );
  
  register_post_type( 'whitepages', $args );
  
}




/*-----------------------------------------------------------------------------------*/
/* Styling for the custom post type icon
/*-----------------------------------------------------------------------------------*/

add_filter( 'enter_title_here', 'o2_whitepages_change_default_title' );

function o2_whitepages_change_default_title( $title ){
	$screen = get_current_screen();
 
	if ( 'whitepages' == $screen->post_type ) {
		$title = __( 'Enter Subject', 'uexpress' );
	}
 
	return $title;
}


/*-----------------------------------------------------------------------------------*/
/* Create whitepages custom post type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'o2_clients_init' );

function o2_clients_init()  {
  $labels = array(
    'name' 								=> __( 'Client',                   'uexpress' ),
    'singular_name' 			=> __( 'Client',                    'uexpress' ),
    'add_new' 						=> __( 'Add Client',                'uexpress' ),
    'add_new_item' 				=> __( 'Add Client',                'uexpress' ),
    'edit_item' 					=> __( 'Edit Client',               'uexpress' ),
    'new_item' 						=> __( 'New Client',                'uexpress' ),
    'view_item' 					=> __( 'View Client',               'uexpress' ),
    'search_items' 				=> __( 'Search Client',            'uexpress' ),
    'not_found' 					=> __( 'No Client found',          'uexpress' ),
    'not_found_in_trash'	=> __( 'No Client found in Trash', 'uexpress' ), 
    'parent_item_colon'		=> __( '',                         'uexpress' ),
    'menu_name' 					=> __( 'Clients',              'uexpress' )
  );
  
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true, 
    'show_in_menu'       => true, 
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'clients' ),
    'capability_type'    => 'post',
    'has_archive'        => 'clients', 
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail'),
    'menu_position'      => 115,
	'menu_icon' => get_stylesheet_directory_uri() . '/images/favicon-16.png'
  );
  
  register_post_type( 'clients', $args );
  
}




/*-----------------------------------------------------------------------------------*/
/* Styling for the custom post type icon
/*-----------------------------------------------------------------------------------*/

add_filter( 'enter_title_here', 'o2_clients_change_default_title' );

function o2_clients_change_default_title( $title ){
	$screen = get_current_screen();
 
	if ( 'clients' == $screen->post_type ) {
		$title = __( 'Enter Client Name', 'uexpress' );
	}
 
	return $title;
}				

?>