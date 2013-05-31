<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category uexpress
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	$meta_boxes[] = array(
		'id'         => 'slideshow_metabox',
		'title'      => 'Heading image option',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			
			array(
				'name' => 'Page Heading Image',
				'desc' => __('Upload image for heading image. Good image dimensions whould be 960px X 204px', 'uexpress'),
				'id'   => $prefix . 'heading_image',
				'type' => 'file',
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'clients_metabox',
		'title'      => 'Client option',
		'pages'      => array( 'clients', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			
			array(
				'name' => 'URL/Website address',
				'id'   => $prefix . 'client_website',
				'type' => 'text',
			),
		)
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}