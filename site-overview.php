        <?php 
    
          $site_overview_title1 = get_option('uexpress_site_overview_title1'); 
          $site_overview_url1   = get_option('uexpress_site_overview_url1');
          $site_overview_icon1  = get_option('uexpress_site_overview_icon1');
          $site_overview_desc1  = get_option('uexpress_site_overview_desc1');
          $site_overview_title2 = get_option('uexpress_site_overview_title2'); 
          $site_overview_url2   = get_option('uexpress_site_overview_url2');
          $site_overview_icon2  = get_option('uexpress_site_overview_icon2');
          $site_overview_desc2  = get_option('uexpress_site_overview_desc2');
          $site_overview_title3 = get_option('uexpress_site_overview_title3'); 
          $site_overview_url3   = get_option('uexpress_site_overview_url3');
          $site_overview_icon3  = get_option('uexpress_site_overview_icon3');
          $site_overview_desc3  = get_option('uexpress_site_overview_desc3');
          $site_overview_title4 = get_option('uexpress_site_overview_title4'); 
          $site_overview_url4   = get_option('uexpress_site_overview_url4');
          $site_overview_icon4  = get_option('uexpress_site_overview_icon4');
          $site_overview_desc4  = get_option('uexpress_site_overview_desc4');
		  $site_overview_title5 = get_option('uexpress_site_overview_title5'); 
          $site_overview_url5   = get_option('uexpress_site_overview_url5');
          $site_overview_icon5  = get_option('uexpress_site_overview_icon5');
          $site_overview_desc5  = get_option('uexpress_site_overview_desc5');
		  $site_overview_title6 = get_option('uexpress_site_overview_title6'); 
          $site_overview_url6   = get_option('uexpress_site_overview_url6');
          $site_overview_icon6  = get_option('uexpress_site_overview_icon6');
          $site_overview_desc6  = get_option('uexpress_site_overview_desc6');  
		                  
        ?>          
          
          <div class="quick-view">
          <!-- Content Box #1 -->
          <?php if ($site_overview_url1 !="") { ?>
          <div class="mainbox">
            <h4><a href="<?php echo $site_overview_url1 ? $site_overview_url1 :"#";?>"><?php echo ($site_overview_title1) ? stripslashes($site_overview_title1) :  "";?></a></h4>
              <?php if ($site_overview_icon1 !="") { ?>
              	<div class="boximg">
                <a href="<?php echo $site_overview_url1 ? $site_overview_url1 :"#";?>">
                <img src="<?php echo O2_SCRIPTS?>/timthumb.php?src=<?php echo $site_overview_icon1;?>&amp;h=84&amp;w=84&amp;zc=1" class="boximg-pad" alt="" />
                </a>
                </div>
              <?php } ?>
            <p><?php char_limit($site_overview_desc1, 100) ?></p>
            <a href="<?php echo $site_overview_url1 ? $site_overview_url1 :"#";?>" class="button"><span><?php echo get_option('uexpress_learn_more_desc1'); ?><img src="<?php echo O2_IMG; ?>/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <?php } ?>
          
          <!-- Content Box #2 -->
          <?php if ($site_overview_url2 !="") { ?>
          <div class="mainbox">
            <h4><a href="<?php echo $site_overview_url2 ? $site_overview_url2 :"#";?>"><?php echo ($site_overview_title2) ? stripslashes($site_overview_title2) :  "";?></a></h4>
              <?php if ($site_overview_icon2 !="") { ?>
              	<div class="boximg">
                <a href="<?php echo $site_overview_url2 ? $site_overview_url2 :"#";?>">
                <img src="<?php echo O2_SCRIPTS?>/timthumb.php?src=<?php echo $site_overview_icon2;?>&amp;h=84&amp;w=84&amp;zc=1" class="boximg-pad" alt="" />
                </a>
                </div>
              <?php } ?>
            <p><?php char_limit($site_overview_desc2, 100) ?></p>
            <a href="<?php echo $site_overview_url2 ? $site_overview_url2 :"#";?>" class="button"><span><?php echo get_option('uexpress_learn_more_desc2'); ?><img src="<?php echo O2_IMG; ?>/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <?php } ?>
          
          <!-- Content Box #3 -->
          <?php if ($site_overview_url3 !="") { ?>
          <div class="mainbox box-last">
            <h4><a href="<?php echo $site_overview_url3 ? $site_overview_url3 :"#";?>"><?php echo ($site_overview_title3) ? stripslashes($site_overview_title3) :  "";?></a></h4>
              <?php if ($site_overview_icon3 !="") { ?>
              	<div class="boximg">
                <a href="<?php echo $site_overview_url3 ? $site_overview_url3 :"#";?>">
                <img src="<?php echo O2_SCRIPTS?>/timthumb.php?src=<?php echo $site_overview_icon3;?>&amp;h=84&amp;w=84&amp;zc=1" class="boximg-pad" alt="" />
                </a>
                </div>
              <?php } ?>
            <p><?php char_limit($site_overview_desc3, 100) ?></p>
            <a href="<?php echo $site_overview_url3 ? $site_overview_url3 :"#";?>" class="button"><span><?php echo get_option('uexpress_learn_more_desc3'); ?><img src="<?php echo O2_IMG; ?>/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <?php } ?>
          
          <div class="clear"></div>
          
          <!-- Content Box #4 -->
          <?php if ($site_overview_url4 !="") { ?>
          <div class="mainbox">
            <h4><a href="<?php echo $site_overview_url4 ? $site_overview_url4 :"#";?>"><?php echo ($site_overview_title4) ? stripslashes($site_overview_title4) :  "";?></a></h4>
              <?php if ($site_overview_icon4 !="") { ?>
              	<div class="boximg">
                <a href="<?php echo $site_overview_url4 ? $site_overview_url4 :"#";?>">
                <img src="<?php echo O2_SCRIPTS?>/timthumb.php?src=<?php echo $site_overview_icon4;?>&amp;h=84&amp;w=84&amp;zc=1" class="boximg-pad" alt="" />
                </a>
                </div>
              <?php } ?>
            <p><?php char_limit($site_overview_desc4, 100) ?></p>
            <a href="<?php echo $site_overview_url4 ? $site_overview_url4 :"#";?>" class="button"><span><?php echo get_option('uexpress_learn_more_desc4'); ?><img src="<?php echo O2_IMG; ?>/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <?php } ?>
          
          <!-- Content Box #5 -->
          <?php if ($site_overview_url5 !="") { ?>
          <div class="mainbox">
            <h4><a href="<?php echo $site_overview_url5 ? $site_overview_url5 :"#";?>"><?php echo ($site_overview_title5) ? stripslashes($site_overview_title5) :  "";?></a></h4>
              <?php if ($site_overview_icon5 !="") { ?>
              	<div class="boximg">
                <a href="<?php echo $site_overview_url5 ? $site_overview_url5 :"#";?>">
                <img src="<?php echo O2_SCRIPTS?>/timthumb.php?src=<?php echo $site_overview_icon5;?>&amp;h=84&amp;w=84&amp;zc=1" class="boximg-pad" alt="" />
                </a>
                </div>
              <?php } ?>
            <p><?php char_limit($site_overview_desc5, 100) ?></p>
            <a href="<?php echo $site_overview_url5 ? $site_overview_url5 :"#";?>" class="button"><span><?php echo get_option('uexpress_learn_more_desc5'); ?><img src="<?php echo O2_IMG; ?>/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <?php } ?>
          
          <!-- Content Box #3 -->
          <?php if ($site_overview_url6 !="") { ?>
          <div class="mainbox box-last">
            <h4><a href="<?php echo $site_overview_url6 ? $site_overview_url6 :"#";?>"><?php echo ($site_overview_title6) ? stripslashes($site_overview_title6) :  "";?></a></h4>
              <?php if ($site_overview_icon6 !="") { ?>
              	<div class="boximg">
                <a href="<?php echo $site_overview_url6 ? $site_overview_url6 :"#";?>">
                <img src="<?php echo O2_SCRIPTS?>/timthumb.php?src=<?php echo $site_overview_icon6;?>&amp;h=84&amp;w=84&amp;zc=1" class="boximg-pad" alt="" />
                </a>
                </div>
              <?php } ?>
            <p><?php char_limit($site_overview_desc6, 100) ?></p>
            <a href="<?php echo $site_overview_url6 ? $site_overview_url6 :"#";?>" class="button"><span><?php echo get_option('uexpress_learn_more_desc6'); ?><img src="<?php echo O2_IMG; ?>/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <?php } ?>
          
          </div>
          <!--/.quick-view-->