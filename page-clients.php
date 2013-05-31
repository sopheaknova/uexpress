<?php
/*
Template Name: Clients Page
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
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>
          <div class="single_article_content">
			<?php the_content(); ?>
          </div>
          <?php endwhile;?>
          <?php endif;?>
          
          <ul class="portfolio-4col">
          <?php 
          $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $client_items_num  = (get_option('uexpress_client_items_num')) ? get_option('uexpress_client_items_num') : 8; 
          $client_order = (get_option('uexpress_client_order')) ? get_option('uexpress_client_order') : "date";
          
          query_posts(array( 'post_type' => 'clients', 'showposts' => $client_items_num,'paged'=>$page,"orderby" => $client_order,'order'=> 'DESC'));
          
          $counter = 0;
          while ( have_posts() ) : the_post();
          $counter++;
            ?>
            <li <?php if ($counter %4 == 0) echo 'class="last"';?>>
              <div class="portfolio-blockimg3cube">
              
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <?php if (get_post_meta($post->ID,"_cmb_client_website",true)) {?>
                  <a href="<?php echo get_post_meta($post->ID,"_cmb_client_website",true); ?>" target="_blank" title="<?php the_title();?>">
                  <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=75&amp;w=200&amp;zc=1" />
                  </a>
                  <?php } else {?>
                  <img src="<?php echo O2_SCRIPTS; ?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=75&amp;w=200&amp;zc=1" />
                  <?php } ?>
                  <?php } ?>
              
              </div>
            </li>            
          <?php endwhile;?>
          </ul>
          <div class="clear"></div>
          <?php 
            global $wp_query; 
            $total_pages = $wp_query->max_num_pages; 
            if ( $total_pages > 1 ) {
            if (function_exists("wpapi_pagination")) {
                wpapi_pagination($total_pages); 
              }
            }
          ?>          
           
      </div>
      <!-- Maincontent-full End -->          
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>