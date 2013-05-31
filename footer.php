<div id="bottomwrapper"></div>
        
        <!-- Footer Start -->
        <div id="footer">
        
        	<!-- Four Cols Footer Start -->
        	<div class="footerbox">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom1')) { ?>
                <?php _e('Please add Testimonial Widget into bottom1 sidebar', 'uexpress'); ?>
                <?php } ?>
            </div>
            <div class="footerbox">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom2')) { ?>
                <?php _e('Please add Members Link Widget into bottom2 sidebar', 'uexpress'); ?>
                <?php } ?>
            </div>
            <div class="footerbox">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom3')) { ?>
                <?php _e('Please add Contact Info Widget into bottom3 sidebar', 'uexpress'); ?>
                <?php } ?>
            </div>
            <div class="footerbox box-last">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom4')) { ?>
                <?php _e('Please add Static Gmap Zoom Widget into bottom4 sidebar', 'uexpress'); ?>
                <?php } ?>
            </div>
            <div class="clear"></div>
            <!-- Four Cols Footer End -->
            
            <!-- Bottom Start -->
            <div class="footer-bottom">
            	<?php 
					if (function_exists('wp_nav_menu')) { 
					  wp_nav_menu( array( 'theme_location' => 'menu_footer', 'container_class' => 'footer-menu') );
					} 
				?>
            	<div class="copyright">
                    <p><?php $footer_text = get_option('uexpress_footer_text');?>
        			<?php echo ($footer_text) ? $footer_text : "&copy; " . date("Y") . " GEOLINK GROUP – U EXPRESS Co., Ltd. All Rights Reserved.";?></p>
                </div>
            </div>
            <!-- Bottom Start -->
            
        </div>
        <!-- Footer End -->
                    
	</div> 
    <!--End Wrap-->
     <?php wp_footer(); ?>
     <!--solve IE cufon font render delay, should be the last item in the body-->
	 <script type="text/javascript">    Cufon.now(); </script>
</body>
</html>