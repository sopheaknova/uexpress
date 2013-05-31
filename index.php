<?php get_header();?>

    <!-- Slideshow Wrapper -->
    <div id="slide-wrapper">
        <!-- Slideshow Start -->
        <div id="slider">
	<?php $banner_home = get_option('uexpress_banner_home'); ?>
    <?php $banner_link = get_option('uexpress_banner_link'); ?>
    <?php if ($banner_home !='') : ?>
        <?php if ($banner_link !='') : ?>
        <a href="<?php echo $banner_link; ?>">	
		<img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo $banner_home; ?>&amp;h=300&amp;w=960&amp;zc=1" />
        </a>
        <?php else: ?>
        <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo $banner_home; ?>&amp;h=300&amp;w=960&amp;zc=1" />
        <?php endif ?>
	<?php else: ?>
    	<?php if ($banner_link !='') : ?>
        <a href="<?php echo $banner_link; ?>">
        <img src="<?php echo O2_IMG; ?>/freight-forwarding-banner.jpg" />
        </a>
        <?php else: ?>
        <img src="<?php echo O2_IMG; ?>/freight-forwarding-banner.jpg" />
        <?php endif ?>
    <?php endif ?>    
        </div>
        <!-- Slideshow End -->
    </div>
    <!-- Slideshow Wrapper End -->
    <div class="clear"></div>    
    
    <!-- Inner Start -->
    <div class="inner-content">
        <!-- Main Content Start -->
        <div class="maincontent-home">
        <?php
			$welcome_title = get_option('uexpress_welcome_title');
			$short_message = get_option('uexpress_welcome_message');
			$default_short_message = 'U EXPRESS Co., Ltd, based in Cambodia since 1998 is the exclusive agent of CLASQUIN. Over the past 15 years, we have developed a wide range of <strong>local and international logistics</strong> services to offer full support in our customers <strong>Supply Chain Management</strong>:';
		?>
        <h3><?php echo ($welcome_title !== '') ? $welcome_title : _e('About U EXPRESS', 'uexpress'); ?></h3>
        <p><?php echo ($short_message !== '') ? stripslashes($short_message) : stripslashes($default_short_message); ?></p>
        </div>
        <!-- Main Content Home End -->
        
        <!-- Quick View Start -->
        <div class="quick-view">
          <?php 
		  	//echo theme_widget_text_shortcode(do_shortcode('[pagelist parent_page="about us" num=6 orderby="date" style="3col" readmore_text="Learn more"]')); 
		  	get_template_part( 'site-overview','4 cols site overview' );	
		  ?>
        </div>  
        <!-- Quick View End -->
        
        <!-- Clients list and Partner Start -->
        
        <!-- List of Client Start -->
        <?php
			query_posts(array( 'post_type' => 'clients', 'showposts' => 14));
		?>
        <div class="clients-list">
        
        <div class="msgbox">
        <!-- Message option 01 -->	
    <?php if ( get_option('uexpress_enable_message1') == 'true' ) : ?>
        <div class="msg-option">
        <?php if ( get_option('uexpress_img_message1') != '' ) : ?>
        <div class="custom-boximg alignleft round-box">
        <a href="<?php echo get_option('uexpress_link_img_message1'); ?>" target="_blank">
        <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo get_option('uexpress_img_message1'); ?>&amp;h=73&amp;w=180&amp;zc=1" />
        </a>
        </div>
        <?php endif ?>
        <p><?php echo stripslashes(get_option('uexpress_message1')); ?></p>
        </div>
        <div class="clear"></div>
	<?php endif ?>
        <!-- Message option 01 End -->	
        
        <!-- Message option 02 -->	
    <?php if ( get_option('uexpress_enable_message2') == 'true') : ?>
        <div class="msg-option">
        <?php if ( get_option('uexpress_img_message2') != '' ) : ?>
        <div class="custom-boximg alignleft round-box">
        <a href="<?php echo get_option('uexpress_link_img_message2'); ?>" target="_blank">
        <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo get_option('uexpress_img_message2'); ?>&amp;h=73&amp;w=180&amp;zc=1" />
        </a>
        </div>
        <?php endif ?>
        <p><?php echo stripslashes(get_option('uexpress_message2')); ?></p>
        </div>
        <div class="clear"></div>
    <?php endif ?>
        <!-- Message option 02 End -->
        
        </div>
        <!-- msgbox end -->
        
        <h3>List of Clients</h3>
            <ul id="client-carousel" class="jcarousel-skin-tango">
              <?php while ( have_posts() ) : the_post(); ?>	
              <li>
              <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <?php if (get_post_meta($post->ID,"_cmb_client_website",true)) {?>
              <a href="<?php echo get_post_meta($post->ID,"_cmb_client_website",true); ?>" target="_blank" title="<?php the_title();?>">
              <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=75&amp;w=200&amp;zc=1" />
              </a>
              <?php } else {?>
              <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=75&amp;w=200&amp;zc=1" />
              <?php } ?>
			  <?php } ?>
              </li>
              <?php endwhile;?>
            </ul>
        </div>
        <?php wp_reset_query();?>
        <!-- List of Client End -->  
            
        <!-- White Page Start -->
        <div id="whitepage-sidebar">
        <div id="sidebar">
        
        <div class="partner-link round-box">
    
        <div class="custom-boximg round-box">
        <a href="http://www.geolinkgroup.com" target="_blank">
        <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo O2_IMG; ?>/geo-link-logo.gif&amp;h=64&amp;w=209&amp;zc=1" />
        </a>
        </div>
        <p><strong>Geolink</strong> is one of the leading Cambodian logistics and distribution companies, offering a wide range of customized transportation, and supply chain management services. Geolink's clients are both multinational and local companies. Geolink's main success is in offering full supply chain solutions and cost reduction  to its clients.</p>
        </div>
        
        <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Whitepage sidebar')){ }else { ?>
            <p class="noside"><?php _e('Please place Image Widgets into this sidebar', 'uexpress'); ?></p>
        <?php } ?>
        </div>
        </div>
        <!-- White Page End -->
        <div class="clear"></div>
        
        <!-- Clients list End -->
        
        
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>