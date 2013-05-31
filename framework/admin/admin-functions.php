<?php

/*-----------------------------------------------------------------------------------*/
/* Head Hook
/*-----------------------------------------------------------------------------------*/

function of_head() { do_action( 'of_head' ); }

/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','of_option_setup');
}

function of_option_setup(){

	//Update EMPTY options
	$of_array = array();
	add_option('of_options',$of_array);

	$template = get_option('of_template');
	$saved_options = get_option('of_options');
	
	foreach($template as $option) {
		if($option['type'] != 'heading'){
			if (isset($option['id'])) {
			   $id = $option['id'];
			}
			if (isset($option['std'])) {
			   $std = $option['std'];
			}
			$db_option = get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$of_array[$c_id] = $c_std; 
					}
				} else {
					update_option($id,$std);
					$of_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$of_array[$id] = $db_option;
			}
		}
	}
	update_option('of_options',$of_array);
}

/*-----------------------------------------------------------------------------------*/
/* Admin Backend */
/*-----------------------------------------------------------------------------------*/
function optionsframework_admin_head() { 
	
	//Tweaked the message on theme activate
	?>
    <script type="text/javascript">
    jQuery(function(){
	  var message = '<p>This theme comes with an <a href="<?php echo admin_url('admin.php?page=optionsframework'); ?>">options panel</a> to configure settings. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
}


if(is_admin()){
  add_action('admin_head', 'optionsframework_admin_head'); 
	add_action('admin_init', 'add_admin_scripts');
}


function add_admin_scripts() {
  wp_enqueue_script( 'shortcodes', O2_ADMIN . '/framework/admin/tinymce/shortcodelocalization.js');
	wp_localize_script( 'shortcodes', 'objectL10n', array(
  'columns_title' => __('Columns','uexpress'),
  'elements_title' => __('Elements','uexpress'),
  'list_title' => __('List Style','uexpress'),
  
  'onefourth_title' => __('One Fourth','uexpress'),
  'onefourth_last_title' => __('One Fourth Last','uexpress'),
  'onethird_title' => __('One Third','uexpress'),
  'onethird_last_title' => __('One Third Last','uexpress'),
  'onehalf_title' => __('One Half','uexpress'),
  'onehalf_last_title' => __('One Half Last','uexpress'),
  'twothird_title' => __('Two Third','uexpress'),
  'twothird_last_title' => __('Two Third Last','uexpress'),
  'threefourth_title' => __('Three Fourth','uexpress'),
  'onefifth_title' => __('One Fifth','uexpress'),
  'onefifth_last_title' => __('One Fifth Last','uexpress'),
  
  'onefourth_inner_title' => __('One Fourth','uexpress'),
  'onefourth_inner_last_title' => __('One Fourth Last','uexpress'),
  'onethird_inner_title' => __('One Third Inner','uexpress'),
  'onethird_inner_last_title' => __('One Third Inner Last','uexpress'),
  'onehalf_inner_title' => __('One Half  Inner','uexpress'),
  'onehalf_inner_last_title' => __('One Half Inner Last','uexpress'),
  'twothird_inner_title' => __('Two Third Inner ','uexpress'),
  'threefourth_inner_title' => __('Three Fourth Inner ','uexpress'),
  
  'dropcap_title' => __('Dropcap','uexpress'),
  'pullquote_left_title' => __('Pullquote Left','uexpress'),
  'pullquote_right_title' => __('Pullquote Right','uexpress'),
  'divider_title' => __('Divider','uexpress'),
  'spacer_title' => __('Spacer','uexpress'),
  'tabs_title' => __('Tabs','uexpress'),
  'toggle_title' => __('Toggle','uexpress'),
  'image_title' => __('Image','uexpress'),
  'testimonial_title' => __('Testimonial Block','uexpress'),
  'gmap_title' => __('Google Map','uexpress'),
  'youtube_title' => __('Youtube','uexpress'),
  'vimeo_title' => __('Vimeo','uexpress'),
  'button_title' => __('Buttons','uexpress'),
  'bigbutton_title' => __('Big Buttons','uexpress'),
  
  'bulletlist_title' => __('Bullet List','uexpress'),
  'starlist_title' => __('Star List','uexpress'),
  'arrowlist_title' => __('Arrow List','uexpress'),
  'itemlist_title' => __('Item List','uexpress'),
  'checklist_title' => __('Check List','uexpress'),
  'infobox_title' => __('Info Box','uexpress'),
  'successbox_title' => __('Success Box','uexpress'),
  'warningbox_title' => __('Warning Box','uexpress'),
  'errorbox_title' => __('Error Box','uexpress'),
	
	));

}


// Load static framework options pages 
		$functions_path = OF_FILEPATH . '/framework/admin/';
		
		function optionsframework_add_admin() {
		
			global $query_string;
			
			$themename =  get_option('of_themename');      
			$shortname =  get_option('of_shortname'); 
		   
			if ( isset($_REQUEST['page']) && $_REQUEST['page'] == 'optionsframework' ) {
				if (isset($_REQUEST['of_save']) && 'reset' == $_REQUEST['of_save']) {
					$options =  get_option('of_template'); 
					of_reset_options($options,'optionsframework');
					header("Location: admin.php?page=optionsframework&reset=true");
					die;
				}
			}
				
			//$of_page = add_submenu_page('themes.php', $themename, 'Theme Options', 'edit_theme_options', 'optionsframework','optionsframework_options_page'); // Default
			$of_page = add_menu_page($themename." Options", $themename, 'edit_themes', 'optionsframework', 'optionsframework_options_page', '', 9999);
			
			// Add framework functionaily to the head individually
			add_action("admin_print_scripts-$of_page", 'of_load_only');
			add_action("admin_print_styles-$of_page",'of_style_only');
		} 
		
		add_action('admin_menu', 'optionsframework_add_admin');
	
	
?>