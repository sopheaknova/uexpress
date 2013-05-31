<?php

/* Search box Widget */
class searchbox_Widget extends WP_Widget {
  function searchbox_Widget () {
    $widgets_opt = array('description'=>'UEXPRESS search box widget');
    parent::WP_Widget(false,$name= "UEXPRESS - Search Box",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $searchboxtitle = esc_attr($instance['searchboxtitle']);         
  ?>
    <p><label for="bannertitle">Title:
  		<input id="<?php echo $this->get_field_id('searchboxtitle'); ?>" name="<?php echo $this->get_field_name('searchboxtitle'); ?>" type="text" class="widefat" value="<?php echo $searchboxtitle;?>" /></label></p>       		
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post,$searchboxtitle;
    
    extract($args);
    
    echo $before_widget;
    
    $searchboxtitle = apply_filters('searchboxtitle',$instance['searchboxtitle']);
    
    if ($searchboxtitle == "") $searchboxtitle = __("Search",'uexpress');
    
    get_template_part( 'searchbox','UEXPRESS search box' );
    
    echo $after_widget; 
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("searchbox_Widget");'));

?>