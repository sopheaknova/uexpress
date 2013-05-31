<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "uexpress";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
  $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
}    
//$categories_tmp = array_unshift($of_categories, "Select a category:");    


$of_product_categories = array();
$product_categories = get_categories('taxonomy=product_category&orderby=ID&title_li=&hide_empty=0');
foreach ($product_categories as $product_category) { 
  $of_product_categories[$product_category->cat_ID] = $product_category->cat_name;
}

$of_slide_categories = array();
$slideshow_categories = get_categories('taxonomy=slideshow_category&orderby=ID&title_li=&hide_empty=0');
foreach ($slideshow_categories as $slide_category) { 
  $of_slide_categories[$slide_category->cat_ID] = $slide_category->cat_name;
}


//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('parent=-1');
foreach ($of_pages_obj as $of_page) {
  $of_pages[$of_page->ID] = $of_page->post_title; 
}
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

/* Get Cufon fonts into a drop-down list */
$cufonts = array();
if(is_dir(TEMPLATEPATH . "/js/fonts/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/js/fonts")) {
		while(($cufontfonts = readdir($open_dirs)) !== false) {
			if(stristr($cufontfonts, ".js") !== false) {
				$cufonts[] = $cufontfonts;
			}
		}
	}
}
$cufonts_dropdown = $cufonts;

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
    
$slide_effects = array("sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random","slideInRight","slideInLeft","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse");

// Set the Options Array
$options = array();


$options[] = array( "name" => "General Settings",
                    "icon" => "general",
                    "type" => "heading");

$options[] = array( "type" => "info",
                    "std" => "General settings for your site that will be used in general pages");

$options[] = array( "name" => "Custom Main Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => "Enter slogan text",
					"desc" => "Enter you new slogan text",
					"id" => $shortname."_slogan_title",
					"std" => "",
					"type" => "text");					

$options[] = array( "name" => "Custom Slogan Background Image",
					"desc" => "Upload a slogan background image (.jpg, .png or .gif)",
					"id" => $shortname."_slogan_bg",
					"std" => "",
					"type" => "upload");					
                
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
					
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");                       
                                       
$options[] = array( "name" => "404 Text",
					"desc" => "Enter your 404 (Page Not Found) Text here.",
					"id" => $shortname."_404_text",
					"std" => "",
					"type" => "textarea");    
					
$options[] = array( "type" => "info",
                    "std" => "General settings for your site footer");
          
$options[] = array( "name" => "Footer Text",
					"desc" => "Enter your site copyright here.",
					"id" => $shortname."_footer_text",
					"std" => "",
					"type" => "textarea");						     

$options[] = array( "name" => "Homepage Settings",
                    "icon" => "homepage",
                    "type" => "heading");
					
$options[] = array( "type" => "info",
                    "std" => "Banner image for homepage");					
					
$options[] = array( "name" => "Custom banner image for homepage",
					"desc" => "Upload your custom banner image (size 960px X 300px)",
					"id" => $shortname."_banner_home",
					"std" => "",
					"type" => "upload");	
					
$options[] = array( "name" => "Banner image link",
					"desc" => "Enter the URL/Link for banner image above",
					"id" => $shortname."_banner_link",
					"std" => "",
					"type" => "text");									
					       
$options[] = array( "type" => "info",
                    "std" => "Add your Welcome title and message");
										
$options[] = array( "name" => "Welcome Title",
					"desc" => "Enter welcome title for your site here",
					"id" => $shortname."_welcome_title",
					"std" => "",
					"type" => "text");					
					
$options[] = array( "name" => "Welcome Message",
					"desc" => "Enter your welcome message here",
					"id" => $shortname."_welcome_message",
					"std" => "",
					"type" => "textarea");

$options[] = array( "type" => "info",
                    "std" => "Site overview for 4 columns homepage section");
					                    
$options[] = array( "name" => "Title for site overview column #1",
					"desc" => "Enter your title for site overview column #1",
					"id" => $shortname."_site_overview_title1",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #1",
					"desc" => "Enter your custom URL for site overview column #1",
					"id" => $shortname."_site_overview_url1",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Image for services overview column #1",
					"desc" => "Enter your image url for services overview column #1",
					"id" => $shortname."_site_overview_icon1",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #1",
					"desc" => "Enter your brief short description for homepage site overview box #1",
					"id" => $shortname."_site_overview_desc1",
					"std" => "",
					"type" => "textarea");  
					
$options[] = array( "name" => "Learn more text for site overview column #1",
					"id" => $shortname."_learn_more_desc1",
					"std" => "Learn more",
					"type" => "text");  					
					
$options[] = array( "name" => "Title for site overview column #2",
					"desc" => "Enter your title for site overview column #2",
					"id" => $shortname."_site_overview_title2",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #2",
					"desc" => "Enter your custom URL for site overview column #2",
					"id" => $shortname."_site_overview_url2",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #2",
					"desc" => "Enter your image url for services site column #2",
					"id" => $shortname."_site_overview_icon2",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #2",
					"desc" => "Enter your brief short description for homepage site overview box #2",
					"id" => $shortname."_site_overview_desc2",
					"std" => "",
					"type" => "textarea"); 
					
$options[] = array( "name" => "Learn more text for site overview column #2",
					"id" => $shortname."_learn_more_desc2",
					"std" => "Learn more",
					"type" => "text");  						 
										
$options[] = array( "name" => "Title for services overview column #3",
					"desc" => "Enter your title for services overview column #3",
					"id" => $shortname."_site_overview_title3",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #3",
					"desc" => "Enter your custom URL for site overview column #3",
					"id" => $shortname."_site_overview_url3",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #3",
					"desc" => "Enter your image url for site overview column #3",
					"id" => $shortname."_site_overview_icon3",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #3",
					"desc" => "Enter your brief short description for homepage site overview box #3",
					"id" => $shortname."_site_overview_desc3",
					"std" => "",
					"type" => "textarea");
					
$options[] = array( "name" => "Learn more text for site overview column #3",
					"id" => $shortname."_learn_more_desc3",
					"std" => "Learn more",
					"type" => "text");					  
															
$options[] = array( "name" => "Title for site overview column #4",
					"desc" => "Enter your title for site overview column #4",
					"id" => $shortname."_site_overview_title4",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #4",
					"desc" => "Enter your custom URL for site overview column #4",
					"id" => $shortname."_site_overview_url4",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #4",
					"desc" => "Enter your image url for site overview column 4",
					"id" => $shortname."_site_overview_icon4",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #4",
					"desc" => "Enter your brief short description for homepage site overview box #4",
					"id" => $shortname."_site_overview_desc4",
					"std" => "",
					"type" => "textarea"); 
					
$options[] = array( "name" => "Learn more text for site overview column #4",
					"id" => $shortname."_learn_more_desc4",
					"std" => "Learn more",
					"type" => "text");					

$options[] = array( "name" => "Title for site overview column #5",
					"desc" => "Enter your title for site overview column #5",
					"id" => $shortname."_site_overview_title5",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #5",
					"desc" => "Enter your custom URL for site overview column #5",
					"id" => $shortname."_site_overview_url5",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #5",
					"desc" => "Enter your image url for site overview column 5",
					"id" => $shortname."_site_overview_icon5",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #5",
					"desc" => "Enter your brief short description for homepage site overview box #5",
					"id" => $shortname."_site_overview_desc5",
					"std" => "",
					"type" => "textarea");
					
$options[] = array( "name" => "Learn more text for site overview column #5",
					"id" => $shortname."_learn_more_desc5",
					"std" => "Learn more",
					"type" => "text");					
					
$options[] = array( "name" => "Title for site overview column #6",
					"desc" => "Enter your title for site overview column #6",
					"id" => $shortname."_site_overview_title6",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #6",
					"desc" => "Enter your custom URL for site overview column #6",
					"id" => $shortname."_site_overview_url6",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #6",
					"desc" => "Enter your image url for site overview column 6",
					"id" => $shortname."_site_overview_icon6",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #6",
					"desc" => "Enter your brief short description for homepage site overview box #6",
					"id" => $shortname."_site_overview_desc6",
					"std" => "",
					"type" => "textarea");
					
$options[] = array( "name" => "Learn more text for site overview column #6",
					"id" => $shortname."_learn_more_desc6",
					"std" => "Learn more",
					"type" => "text");					
					
$options[] = array( "type" => "info",
                    "std" => "Add your option messages");	

$options[] = array( "name" => "Enable message option 1",
					"desc" => "Please check this option if you want to enable message option 1.",
					"id" => $shortname."_enable_message1",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Image for message option 1",
					"desc" => "Upload your custom image for message option 1",
					"id" => $shortname."_img_message1",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Enter the url/link on Image for message option 1",
					"desc" => "Enter the url/link on Image for message option 1",
					"id" => $shortname."_link_img_message1",
					"std" => "#",
					"type" => "text");					
										
$options[] = array( "name" => "Message option 1",
					"desc" => "Enter your message to show under welcome message",
					"id" => $shortname."_message1",
					"std" => "",
					"type" => "textarea");	
					
$options[] = array( "name" => "Enable message option 2",
					"desc" => "Please check this option if you want to enable message option 2.",
					"id" => $shortname."_enable_message2",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Image for message option 2",
					"desc" => "Upload your custom image for message option 2",
					"id" => $shortname."_img_message2",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Enter the url/link on Image for message option 2",
					"desc" => "Enter the url/link on Image for message option 2",
					"id" => $shortname."_link_img_message2",
					"std" => "#",
					"type" => "text");					
										
$options[] = array( "name" => "Message option 2",
					"desc" => "Enter your message to show under welcome message",
					"id" => $shortname."_message2",
					"std" => "",
					"type" => "textarea");							
                    
$options[] = array( "name" => "Clients Options",
          "icon" => "portfolio",
					"type" => "heading");

$options[] = array( "name" => "Your client page",
					"desc" => "Select your client page.",
					"id" => $shortname."_client_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);  
					
$options[] = array( "name" => "Number items to display per page",
					"desc" => "Please enter your number to display your client items per page.",
					"id" => $shortname."_client_items_num",
					"std" => "",
					"type" => "text");  
					
$options[] = array( "name" => "Client Items Order",
					"desc" => "Select your order parameter for client items.",
					"id" => $shortname."_client_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    
					
$options[] = array( "name" => "News Options",
          "icon" => "blog",
					"type" => "heading"); 	   

$options[] = array( "name" => "Your News page",
					"desc" => "Select your News page.",
					"id" => $shortname."_blog_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$options[] = array( "name" => "News Categories",
					"desc" => "Please check the categories that you want to include in News page.",
					"id" => $shortname."_blog_categories",
					"std" => "",
					"type" => "multicheck",
					"options" => $of_categories);				  
					
$options[] = array( "name" => "Excerpt number",
					"desc" => "Please enter your number for News post excerpt.",
					"id" => $shortname."_blog_text_num",
					"std" => "",
					"type" => "text");  
					
$options[] = array( "name" => "News Items Order",
					"desc" => "Select your order parameter for News items.",
					"id" => $shortname."_blog_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    
                                         
$options[] = array( "name" => "Number items to display per page",
					"desc" => "Please enter your number to display your News items per page.",
					"id" => $shortname."_blog_items_num",
					"std" => "",
					"type" => "text");  							

$options[] = array( "name" => "Font Options",
          "icon" => "styling",
					"type" => "heading");
					
$options[] = array( "type" => "info",
                    "std" => "Heading font");
                    
$options[] = array( "name" => "Heading Font",
					"desc" => "Select your default Heading font.",
					"id" => $shortname."_heading_font",
					"std" => "",
					"type" => "select",
					"options" => $cufonts);					

$options[] = array( "type" => "info",
                    "std" => "Body text color, size and font family");
                    
$options[] = array( "name" => "Body Text Typograpy",
					"desc" => "Please set this option if you want to use your custom styling for body text paragraph",
					"id" => $shortname."_custom_body_text",
					"std" => array('size' => '12','unit' => 'em','face' => 'Arial','color' => '#666666'),
					"type" => "typography");
					
$options[] = array( "name" => "Permalinks Color",
					"desc" => "please define your permalinks color here.",
					"id" => $shortname."_permalinks_color",
					"std" => "",
					"type" => "color"); 					
					
$options[] = array( "name" => "Permalinks Hover Color",
					"desc" => "please define your permalinks hover color here.",
					"id" => $shortname."_permalinks_hover_color",
					"std" => "",
					"type" => "color");					
          
$options[] = array( "name" => "Contact Info",
          "icon" => "contact",
					"type" => "heading");      

$options[] = array( "name" => "Your Contact page",
					"desc" => "Select your Contact page.",
					"id" => $shortname."_contact_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);
          
$options[] = 	array(	"name" => "Latitude",
			"desc" => "Enter your latitude here, for quick search your latitude, please visit <a href='http://itouchmap.com/latlong.html'>http://itouchmap.com/latlong.html</a>",
			"id" => $shortname."_info_latitude",
			"type" => "text");

$options[] = 	array(	"name" => "Longitude",
			"desc" => "Enter your longitude here, for quick search your longitude, <a href='http://itouchmap.com/latlong.html'>http://itouchmap.com/latlong.html</a>",
			"id" => $shortname."_info_longitude",
			"type" => "text");
      
					
$options[] = array( "name" => "Your main office addess",
					"desc" => "Please add your office address here.",
					"id" => $shortname."_info_address",
					"std" => "",
					"type" => "textarea");    

$options[] = array( "name" => "Phone nubmer",
					"desc" => "Please add your phone number here.",
					"id" => $shortname."_info_phone",
					"std" => "",
					"type" => "text");    

$options[] = array( "name" => "FAX nubmer",
					"desc" => "Please add your FAX number here.",
					"id" => $shortname."_info_fax",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "E-mail Address",
					"desc" => "Please add your e-mail address here.",
					"id" => $shortname."_info_email",
					"std" => "",
					"type" => "text");
          
$options[] = array( "name" => "Website",
					"desc" => "Please add your website address here without <strong>http://</strong>.",
					"id" => $shortname."_info_website",
					"std" => "",
					"type" => "text");
          
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}

	
?>
