                <?php global $searchboxtitle;?>
                <h4 class="sidebarheading"><?php echo $searchboxtitle;?></h4>
                <div class="searchbox">
                  <form  method="get" id="search" action="<?php echo home_url(); ?>/">
                    <div>
                    <input type="text" class="searchinput" value="<?php _e('Search...','uexpress');?>" onblur="if (this.value == ''){this.value = '<?php _e('Search...','uexpress');?>'; }" onfocus="if (this.value == '<?php _e('Search...','uexpress');?>') {this.value = ''; }"   name="s" id="s"/>
                    <input type="submit" class="searchsubmit" value=""/>
                    </div>
                  </form>
                </div>
                <div class="clear"></div>