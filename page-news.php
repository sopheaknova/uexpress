<?php
/*
Template Name: News page
*/
?>  
<?php get_header();?>
    
      <?php
        global $post;
        $heading_image = get_post_meta($post->ID,"_cmb_heading_image",true);
   	  ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $heading_image ? $heading_image : O2_IMG.'/page-heading4.jpg';?>&amp;h=204&amp;w=960&amp;zc=1" alt="" />
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="inner-content">
        
        <!-- Main Content Wrapper -->
        <div class="maincontent">
        <h2><?php the_title(); ?></h2>
        <!-- List Latest News Start //-->
        <ul id="listlatestnews">
        <?php
          $blog_cats_include = get_option('uexpress_blog_categories');
          if(is_array($blog_cats_include)) {
            $blog_include = implode(",",$blog_cats_include);
          } 
          
          $paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
          $blog_items_num = (get_option('uexpress_blog_items_num')) ? get_option('uexpress_blog_items_num') : 5;
          $blog_order = (get_option('uexpress_blog_order')) ? get_option('uexpress_blog_order')  : "date"; 
          $blog_text_num = (get_option('uexpress_blog_text_num')) ? get_option('uexpress_blog_text_num') : 75;
          
          $r = new WP_Query(array('cat'=>$blog_include,'showposts'=>$blog_items_num,'orderby'=>$blog_order,'paged'=>$paged));
          while ( $r->have_posts() ) : $r->the_post();
          ?>
          <li>
            <!--<div class="boximg-blog">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <div class="blogimage">
                <img src="<?php echo O2_SCRIPTS;?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />
              </div>
            <?php } ?>
            </div>-->
            <div class="postbox <?php post_class(); ?>">
            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p>
            <?php 
              if($post->post_excerpt) { 
                the_excerpt(); 
              } else {
                echo excerpt($blog_text_num);
              } 
              ?>
            </p>
           </div>
           <div class="clear"></div>
            <div class="metapost">
              <span class="first"><?php echo _e('Posted at ','uexpress');?><?php the_time( get_option('date_format') ); ?></span> | 
              <span><?php echo _e('By ','uexpress');?>: <?php the_author_posts_link();?></span>  |                         
              <span><?php echo _e('Categories ','uexpress');?>: <?php the_category(',');?></span> 
            </div>           
            <div class="clear"></div>
          </li>
          <?php endwhile;?> 
          </ul>
          <div class="clear"></div>
          <div class="pagination">
            <?php theme_blog_pagenavi('', '', $r, $paged);?>
          </div>           
        </div>
        <!-- Main content End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
        
 		<div class="clear"></div>
        
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>