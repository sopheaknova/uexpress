<?php get_header();?>
	
    <?php
        global $post;
        $heading_image = get_post_meta($post->ID,"_cmb_heading_image",true);
    ?>
      
    
    <!-- Page Heading -->
    <div id="page-heading">
        <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $heading_image ? $heading_image : O2_IMG.'/page-heading1.jpg';?>&amp;h=204&amp;w=960&amp;zc=1" alt="" />
    </div>
    <!-- Page Heading End -->
    <div class="clear"></div>
    
    <!-- Inner Start -->
    <div class="inner-content">
    	<div class="maincontent">
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		  <?php /* If this is a category archive */ if (is_category()) { ?>
            <h3><?php single_cat_title(); ?></h3>
          <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <h3><?php single_tag_title(); ?></h3>
          <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <h3><?php _e('Archive for ','uexpress');?><?php the_time('F jS, Y'); ?></h3>
          <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h3><?php _e('Archive for ','uexpress');?><?php the_time('F, Y'); ?></h3>
          <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h3><?php _e('Archive for','uexpress');?> <?php the_time('Y'); ?></h3>
          <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <h3><?php _e('Author Archive','uexpress');?></h3>
          <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h3><?php _e('Archives','uexpress');?></h3>
          <?php } ?> 
        <!-- List Latest News Start //-->

        <ul id="listlatestnews">
        <?php
          $blog_cats_include = get_option('uexpress_blog_categories');
          if(is_array($blog_cats_include)) {
            $blog_include = implode(",",$blog_cats_include);
          } 

          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $blog_items_num = (get_option('uexpress_blog_items_num')) ? get_option('uexpress_blog_items_num') : 5;
          $blog_order = (get_option('uexpress_blog_order')) ? get_option('uexpress_blog_order')  : "date"; 
          $blog_text_num = (get_option('uexpress_blog_text_num')) ? get_option('uexpress_blog_text_num') : 75;

          while ( have_posts() ) : the_post();
          ?>

          <li>
           <!-- <div class="boximg-blog">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <div class="blogimage">
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />
              </div>
            <?php } ?>
            </div>-->

            <div class="postbox">
            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p><?php echo excerpt($blog_text_num);?></p>
           </div>
           <div class="clear"></div>

           <div class="metapost">
              <span class="first"><?php _e('Posted at ','uexpress');?><?php the_time( get_option('date_format') ); ?></span> | 
              <span><?php _e('By ','uexpress');?>: <?php the_author_posts_link();?></span>  |                         
              <span><?php _e('Categories ','uexpress');?>: <?php the_category(',');?></span>  
           </div>           
           <div class="clear"></div>
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
          <!-- Main Content End -->
          <!-- Inner End -->
		<?php wp_reset_query();?>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
    

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>