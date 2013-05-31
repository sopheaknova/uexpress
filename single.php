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
    
    <!-- Inner Start -->
    <div class="inner-content">
    	<div class="maincontent">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post();?>
            <h3><?php the_title();?></h3>
            
            <div class="metapost">
            <span class="first"><?php _e('Posted at ','uexpress');?><?php the_time( get_option('date_format') ); ?></span> | 
            <span><?php _e('By ','uexpress');?>: <?php the_author_posts_link();?></span>  |                         
            <span><?php _e('Categories ','uexpress');?>: <?php the_category(',');?></span> 
            </div>           
            
            <div class="clear"></div>
            <div class="single_article_content">
			<?php the_content(); ?>
            </div>
            
            <?php endwhile;?>
            <?php endif;?>
          
          <div class="clear"></div>
          
        </div> 
        <!-- Main Content End -->
        
		<?php wp_reset_query();?>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
    <!-- Main Content End -->

</div>
<!-- inner-content End -->
        
<?php get_footer();?>