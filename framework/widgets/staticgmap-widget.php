<?php

/* Static Map Widget */

class Gmap_Widget extends WP_Widget {
  
  function Gmap_Widget() {
    $widgets_opt = array('description'=>'UEXPRESS Static Gmap Zoom Theme Widget');
    parent::WP_Widget(false,$name= "UEXPRESS - Static Gmap Zoom",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $maptitle = esc_attr($instance['maptitle']);
    $latitudewidget = esc_attr($instance['latitudewidget']);
	$longitudewidget = esc_attr($instance['longitudewidget']);
    
  ?>
    <p><label for="maptitle">Title:
  		<input id="<?php echo $this->get_field_id('maptitle'); ?>" name="<?php echo $this->get_field_name('maptitle'); ?>" type="text" class="widefat" value="<?php echo $maptitle;?>" /></label></p>  
    <p><small><a href="http://itouchmap.com/" target="_blank">Get your Lat &amp; Lng value</a></small></p>    
	<p><label for="latitudewidget">Enter value of latitude:
  		<input id="<?php echo $this->get_field_id('latitudewidget'); ?>" name="<?php echo $this->get_field_name('latitudewidget'); ?>" type="text" class="widefat" value="<?php echo $latitudewidget;?>" /></label></p>
    <p><label for="longitudewidget">Enter value of longitude:
  		<input id="<?php echo $this->get_field_id('longitudewidget'); ?>" name="<?php echo $this->get_field_name('longitudewidget'); ?>" type="text" class="widefat" value="<?php echo $longitudewidget;?>" /></label></p>    
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $maptitle = apply_filters('maptitle',$instance['maptitle']);
    $latitudewidget = apply_filters('latitudewidget',$instance['latitudewidget']);
    $longitudewidget = apply_filters('longitudewidget',$instance['longitudewidget']);    
    
    if ($latitudewidget == "") $latitudewidget = get_option('uexpress_info_latitude') ? get_option('uexpress_info_latitude') : "11.56971";
    if ($longitudewidget == "") $longitudewidget = get_option('uexpress_info_longitude') ? get_option('uexpress_info_longitude') : "104.924197";
    
    echo $before_widget;
    $title = $before_title.$maptitle.$after_title;
    o2_print_staticmap($maptitle,$latitudewidget,$longitudewidget);

   echo $after_widget;
   
  } 
}

## Print Map
function o2_print_staticmap($title="", $latitudewidget, $longitudewidget) { 
  
  echo $title;  
  
  ?>
  <div class="imgbox"><div id="gmap"></div></div>
  	<script type="text/javascript" src="<?php echo O2_JS ?>/jquery.staticgmapzoom.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var options = {mapWidth:200,mapHeight:156,mapZoom1:12,mapZoom2:16};
			$('#gmap').staticgmapzoom('<?php echo $latitudewidget ?>,<?php echo $longitudewidget ?>', options);
		});
    </script> 
  
  <?php
}

add_action('widgets_init', create_function('', 'return register_widget("Gmap_Widget");'));

?>