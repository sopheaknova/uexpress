<?php

/* Contact Info Widget */
class OfficeAdress_Widget extends WP_Widget {
  function OfficeAdress_Widget() {
    $widgets_opt = array('description'=>'display your contact information');
    parent::WP_Widget(false,$name= "UEXPRESS - Contact Info",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
	
	$contact_title = esc_attr($instance['contact_title']);
  ?>
  <p><label for="contact_title"><?php _e('Title','uexpress');?>:
  		<input id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" class="widefat" value="<?php echo $contact_title;?>"/></label></p>
  <?php    
  } 
  
  function update($new_instance, $old_instance) {
		
		return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $contact_title = apply_filters('contact_title',$instance['contact_title']);
	$pagtitle = get_option('uexpress_contact_page');
	$pagid = get_page_by_title( $pagtitle );
    
    echo $before_widget;
    
    echo $before_title.'<a href="'.get_page_link($pagid->ID).'">'.$contact_title.'</a>'.$after_title;
    
    ?>
    <ul class="addresslist">
      <?php
        $info_address = get_option('uexpress_info_address');
        $info_phone = get_option('uexpress_info_phone');
        $info_fax = get_option('uexpress_info_fax');
        $info_email= get_option('uexpress_info_email');
        $info_website = get_option('uexpress_info_website');
      ?>        
        <li>
          <?php echo $info_address ? stripslashes($info_address) :  
          "No.41-43, Norodom Blvd<br />
          Sankat Phsar Thmey III, Khan Daun Penh,<br />
          Phnom Penh, Cambodia";?>
        </li>
        <li><strong><?php _e('Phone ','uexpress');?></strong>: <?php echo $info_phone ? $info_phone : "+855 23 222 399";?></li>
        
        <li><strong><?php _e('FAX ','uexpress');?></strong>: <?php echo $info_fax ? $info_fax : "+855 23 222 199";?></li>
        
        <li><strong><?php _e('Email ','uexpress');?></strong>: <a href="mailto:<?php echo $info_email;?>"><?php echo $info_email ? $info_email : "info@uexpress.com.kh";?></a></li>
        <li><strong><?php _e('Website ','uexpress');?></strong>: <a href="http://<?php echo $info_website;?>"><?php echo $info_website ? $info_website : "www.uexpress.com.kh";?></a></li>
      </ul>    

   <?php
    echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("OfficeAdress_Widget");'));

?>