<?php
/*
Template Name: Whitepage Form
*/
?> 

<?php get_header();?>
	
	<?php
        global $post;
        $heading_image = get_post_meta($post->ID,"_cmb_heading_image",true);
    ?>    
    <!-- Page Heading -->
    <div id="page-heading">
        <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $heading_image ? $heading_image : O2_IMG.'/page-heading2.jpg';?>&amp;h=204&amp;w=960&amp;zc=1" alt="" />
    </div>
    <!-- Page Heading End -->
    
    <!-- Inner Start -->
    <div class="inner-content">
       <div class="maincontent-full">
        
        <h2><?php the_title(); ?></h2>
        
		
        <?php $success_msg  = get_option('uexpress_success_msg');?>
            <div class="success-message"><?php echo ($success_msg) ? stripslashes($success_msg) : __("Your message has been sent successfully. Thank you!",'uexpress');?></div>
        
        <!-- Contact Form -->
        <form action="#" id="whitepageform">
        <div>
        		
                <div class="whitepages-list">      
                <ul class="col_12">
                <?php $whitepages_args = array ('post_type' => 'whitepages', 'posts_per_page' => 100);
                        $subjects = new WP_Query($whitepages_args);
                        
                        
                if ($subjects->have_posts()) : while($subjects->have_posts()) : $i++; if(($i % 2) == 0) : $subjects->next_post(); else : $subjects->the_post(); ?>
                    <li>
                        <label><input type="checkbox" name="subscribesubject" value="<?php the_title();?>"> <?php the_title();?></label>
                    </li>
                    
                    <?php endif; endwhile; else: ?>
                    <li class="nodata">Sorry, We will add subjects soon!</li>
                    <?php endif; ?>  
                </ul>
                <?php $i = 0; rewind_posts(); ?>
        
                <ul class="col_12_last">
                <?php if ($subjects->have_posts()) : while($subjects->have_posts()) : $i++; if(($i % 2) !== 0) : $subjects->next_post(); else : $subjects->the_post(); ?>
                    <li>
                        <label><input type="checkbox" name="subscribesubject" value="<?php the_title();?>"> <?php the_title();?></label>
                    </li>
                    
                    <?php endif; endwhile; else: ?>
                    <li class="nodata">Sorry, We will add subjects soon!</li>
                    <?php endif; ?>  
                </ul>
                <div class="clear"></div>
                </div>
		        <!-- whitepage-list End -->  
                
                <ul class="subscribe-whitepage">
                  <li>
                  	<label for="whitepagename"><?php _e('Name ','uexpress');?></label>
                    <input type="text" name="whitepagename" class="textfield" id="whitepagename" value=""  /><span class="require"> *</span>
                  </li>
                  <li>  
                    <label for="whitepageemail"><?php _e('E-mail ','uexpress');?></label> 
                    <input type="text" name="whitepageemail" class="textfield" id="whitepageemail" value="" /><span class="require"> *</span>
                  </li>
                  <li>
                  	<input type="hidden" name="whitepagesubject" id="whitepagesubject" value="<?php _e('Whitepage Subscriber','uexpress');?>" />   
                    <input type="hidden" name="siteurl" id="siteurl" value="<?php echo get_template_directory_uri();?>" />   
                    <input type="hidden" name="sendto" id="sendto" value="<?php echo (get_option('uexpress_info_email')) ? get_option('uexpress_info_email') : get_option('admin_email');?>" />           
                    <a href="#" class="button" id="buttonsendwhitepage"><span><?php _e('SEND','uexpress');?></span></a>
                    <span class="loading" style="display: none;"><?php _e('Please wait..','uexpress');?></span>
                  </li>  
                </ul>    
                <div class="clear"></div>
                 
        </div>
        </form>   
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="single_article_content">
        <?php the_content(); ?>
        </div>
        <?php
        	endwhile;       
        endif;?>      
           
      </div>
      <!-- Maincontent-full End -->          
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>