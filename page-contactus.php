<?php
/*
Template Name: Contact Form
*/
?> 

<?php get_header();?>
	
	<?php
    $info_address = get_option('uexpress_info_address');
    $info_phone = get_option('uexpress_info_phone');
    $info_fax = get_option('uexpress_info_fax');
    $info_email= get_option('uexpress_info_email');
    $info_website = get_option('uexpress_info_website');
    $info_latitude = get_option('uexpress_info_latitude') ? get_option('uexpress_info_latitude') : "11.56971";
    $info_longitude = get_option('uexpress_info_longitude') ? get_option('uexpress_info_longitude') : "104.924197";
    ?>
                
	<?php
        global $post;
        $heading_image = get_post_meta($post->ID,"_cmb_heading_image",true);
    ?>    
    <!-- Page Heading -->
    <div id="page-heading">
        <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $heading_image ? $heading_image : O2_IMG.'/page-heading4.jpg';?>&amp;h=204&amp;w=960&amp;zc=1" alt="" />
    </div>
    <!-- Page Heading End -->
    
    <!-- Inner Start -->
    <div class="inner-content">
        <div class="maincontent-full">
        
        <h2><?php the_title(); ?></h2>
		<!-- Contact Form -->
          <div id="conctactleft">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();?>
            <div class="single_article_content">
			<?php the_content(); ?>
            </div>
            <?php endwhile;?>
            <?php endif;?>
            
            <?php $success_msg  = get_option('uexpress_success_msg');?>
            <div class="success-message"><?php echo ($success_msg) ? stripslashes($success_msg) : __("Your message has been sent successfully. Thank you!",'uexpress');?></div>
            
            <div id="maincontactform">
              <form action="#" id="contactform"> 
              <div>
                <label for="contactname"><?php _e('Name ','uexpress');?></label>
                <input type="text" name="contactname" class="textfield" id="contactname" value=""  /><span class="require"> *</span>
                <label for="contactsubject"><?php _e('Subject ','uexpress');?></label>
                <input type="text" name="contactsubject" class="textfield" id="contactsubject" value=""/><span class="require"> *</span>
                <label for="contactemail"><?php _e('E-mail ','uexpress');?></label> 
                <input type="text" name="contactemail" class="textfield" id="contactemail" value="" /><span class="require"> *</span>
                <label for="contactmessage"><?php _e('Message ','uexpress');?></label> 
                <textarea name="contactmessage" id="contactmessage" class="textarea" cols="8" rows="12"></textarea><span class="require"> *</span>
                <div class="clear"></div>
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo get_template_directory_uri();?>" />   
                <input type="hidden" name="sendto" id="sendto" value="<?php echo (get_option('uexpress_info_email')) ? get_option('uexpress_info_email') : get_option('admin_email');?>" />           
                <a href="#" class="button" id="buttonsend"><span><?php _e('SEND','uexpress');?></span></a>
                <span class="loading" style="display: none;"><?php _e('Please wait..','uexpress');?></span>
              </div>
              </form>
            </div>
          </div>
          <!-- Contact Form End -->
          
          <!-- Contact Address -->
          <div id="contactright">
            
            <div id="map" class="imgbox">
            	<?php echo theme_widget_text_shortcode(do_shortcode('[gmap width="424" height="246" latitude="'.$info_latitude.'" longitude="'.$info_longitude.'" zoom="15" html="'.$info_address.'" popup="true"]'));?>
            </div>
                
            <ul class="contactinfo">
              <li>
              <?php echo $info_address ? stripslashes($info_address) : 
			  "No.41-43, Norodom Blvd<br />
          Sankat Phsar Thmey III, Khan Daun Penh,<br />
          Phnom Penh, Cambodia";?></li>
              <li><strong><?php _e('Phone ','uexpress');?></strong>: <?php echo $info_phone ? $info_phone : "+855 23 222 399";?></li>        
        	  <li><strong><?php _e('FAX ','uexpress');?></strong>: <?php echo $info_fax ? $info_fax : "+855 23 222 199";?></li>
              <li><strong><?php _e('Email','uexpress');?></strong> : <a href="mailto:<?php echo $info_email ? $info_email : "#";?>"><?php echo $info_email;?></a><br />
              <strong><?php _e('Website','uexpress');?></strong> : <a href="http://<?php echo $info_website ? $info_website : "#";?>"><?php echo $info_website;?></a></li>
            </ul>      
            <div class="clear"></div>
          </div>
          <!-- Contact Address End -->  
          <div class="clear"></div>
          </div>
		  <!-- Maincontent-full End -->          
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>