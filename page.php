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
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="single_article_content">
        <?php the_content(); ?>
        </div>
        <?php
        	endwhile;       
        endif;?>
        </div>
        <!-- maincontent-full End -->
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>