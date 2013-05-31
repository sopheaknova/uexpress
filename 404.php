<?php get_header();?>

    <!-- Page Heading -->
    <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : O2_IMG.'/page-heading1.jpg';?>" alt="" />
    </div>
    <!-- Page Heading End -->
    
    <!-- Inner Start -->
    <div class="inner-content">
        
        <?php
          $_404_text = (get_option('uexpress_404_text')) ? get_option('uexpress_404_text') : __("Apologies, but the page you requested could not be found",'uexpress_');
        ?>
        <h1 align="center"><?php echo stripslashes($_404_text);?></h1>
        <h4 align="center"><?php _e('Try to use or click on the top navigation menu','uexpress');?></h4>
        
    </div>
    <!-- Inner End -->

</div>
<!-- Main Wrapper End -->
        
<?php get_footer();?>