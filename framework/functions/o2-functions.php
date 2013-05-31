<?php

##  CUSTOM LOGO LOGIN
function my_custom_login_logo() {
    echo '<style type="text/css">
		body.login { background-color:#ffffff!important; }
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; height:87px !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


##  REMOVE ERROR MESSAGE LOGIN
add_filter('login_errors',create_function('$a', "return null;"));


##   REMOVE WORDPRESS LINK ON ADMIN LOGIN LOGO 
function remove_link_on_admin_login_info() {
     return get_bloginfo('url');
}
  
add_filter('login_headerurl', 'remove_link_on_admin_login_info');


##   REMOVE WORDPRESS VERSION GENERATION   
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');


##   SET FAVICONS FOR BACKEND CODE 
function adminfavicon() {
echo '<link rel="icon" type="image/x-icon" href="'.get_bloginfo('template_directory').'/images/favicon.png" />';
}

add_action( 'admin_head', 'adminfavicon' );


##   Custom Menu
add_action('init', 'register_custom_menu');
 
function register_custom_menu() {
	register_nav_menu('menu_top', __('Menu Top'));
	register_nav_menu('menu_footer', __('Menu Footer'));
}

##   Remove some links of Admin menu bar
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

##	Remove unusable core widget
function o2_unregister_widgets() {
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_RSS' );
}
add_action( 'widgets_init', 'o2_unregister_widgets' );


function o2_doctitle() {
		$site_name = get_bloginfo('name');
	    $separator = '|';
	        	
	    if ( is_single() ) {
	      $content = single_post_title('', FALSE);
	    }
	    elseif ( is_home() || is_front_page() ) { 
	      $content = get_bloginfo('description');
	    }
	    elseif ( is_page() ) { 
	      $content = single_post_title('', FALSE); 
	    }
	    elseif ( is_search() ) { 
	      $content = __('Search Results for:', 'uexpress'); 
	      $content .= ' ' . esc_html(stripslashes(get_search_query()));
	    }
	    elseif ( is_category() ) {
	      $content = __('Category Archives:', 'uexpress');
	      $content .= ' ' . single_cat_title("", false);;
	    }
	    elseif ( is_tag() ) { 
	      $content = __('Tag Archives:', 'uexpress');
	      $content .= ' ' . o2_tag_query();
	    }
	    elseif ( is_404() ) { 
	      $content = __('Not Found', 'uexpress'); 
	    }
	    else { 
	      $content = get_bloginfo('description');
	    }
	
	    if (get_query_var('paged')) {
	      $content .= ' ' .$separator. ' ';
	      $content .= 'Page';
	      $content .= ' ';
	      $content .= get_query_var('paged');
	    }
	
	    if($content) {
	      if ( is_home() || is_front_page() ) {
	          $elements = array(
	            'site_name' => $site_name,
	            'separator' => $separator,
	            'content' => $content
	          );
	      }
	      else {
	          $elements = array(
	            'content' => $content
	          );
	      }  
	    } else {
	      $elements = array(
	        'site_name' => $site_name
	      );
	    }
	
	    // Filters should return an array
	    $elements = apply_filters('o2_doctitle', $elements);
		
	    // But if they don't, it won't try to implode
	    if(is_array($elements)) {
	      $doctitle = implode(' ', $elements);
	    }
	    else {
	      $doctitle = $elements;
	    }
	    
	    $doctitle = "\t" . "<title>" . $doctitle . "</title>" . "\n\n";
	    
	    echo $doctitle;
	} // end o2_doctitle

// Creates the content-type section
function o2_create_contenttype() {
    $content  = "\t";
    $content .= "<meta http-equiv=\"Content-Type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= "; charset=";
    $content .= get_bloginfo('charset');
    $content .= "\" />";
    $content .= "\n\n";
    echo apply_filters('o2_create_contenttype', $content);
} // end o2_create_contenttype

// The master switch for SEO functions
function o2_seo() {
		$content = TRUE;
		return apply_filters('o2_seo', $content);
}

// Creates the canonical URL
function o2_canonical_url() {
		if (o2_seo()) {
    		if ( is_singular() ) {
        		$canonical_url = "\t";
        		$canonical_url .= '<link rel="canonical" href="' . get_permalink() . '" />';
        		$canonical_url .= "\n\n";        
        		echo apply_filters('o2_canonical_url', $canonical_url);
				}
    }
} // end o2_canonical_url


// switch use of o2_the_excerpt() - default: ON
function o2_use_excerpt() {
    $display = TRUE;
    $display = apply_filters('o2_use_excerpt', $display);
    return $display;
} // end o2_use_excerpt


// switch use of o2_the_excerpt() - default: OFF
function o2_use_autoexcerpt() {
    $display = FALSE;
    $display = apply_filters('o2_use_autoexcerpt', $display);
    return $display;
} // end o2_use_autoexcerpt

function o2_the_excerpt($deprecated = '') {
	global $post;
	$output = '';
	$output = strip_tags($post->post_excerpt);
	$output = str_replace('"', '\'', $output);
	if ( post_password_required($post) ) {
		$output = __('There is no excerpt because this is a protected post.');
		return $output;
	}

	return $output;
	
}

// Creates the meta-tag description
function o2_create_description() {
		$content = '';
		if (o2_seo()) {
    		if (is_single() || is_page() ) {
      		  if ( have_posts() ) {
          		  while ( have_posts() ) {
            		    the_post();
										if (o2_the_excerpt() == "") {
                    		if (o2_use_autoexcerpt()) {
                        		$content ="\t";
														$content .= "<meta name=\"description\" content=\"";
                        		$content .= o2_excerpt_rss();
                        		$content .= "\" />";
                        		$content .= "\n\n";
                    		}
                		} else {
                    		if (o2_use_excerpt()) {
                        		$content ="\t";
                        		$content .= "<meta name=\"description\" content=\"";
                        		$content .= o2_the_excerpt();
                        		$content .= "\" />";
                        		$content .= "\n\n";
                    		}
                		}
            		}
        		}
    		} elseif ( is_home() || is_front_page() ) {
        		$content ="\t";
        		$content .= "<meta name=\"description\" content=\"";
        		$content .= get_bloginfo('description');
        		$content .= "\" />";
        		$content .= "\n\n";
    		}
    		echo apply_filters ('o2_create_description', $content);
		}
} // end o2_create_description


// meta-tag description is switchable using a filter
function o2_show_description() {
    $display = TRUE;
    $display = apply_filters('o2_show_description', $display);
    if ($display) {
        o2_create_description();
    }
} // end o2_show_description


// create meta-tag robots
function o2_create_robots() {
        global $paged;
		if (o2_seo()) {
    		$content = "\t";
    		if((is_home() && ($paged < 2 )) || is_front_page() || is_single() || is_page() || is_attachment()) {
				$content .= "<meta name=\"robots\" content=\"index,follow\" />";
    		} elseif (is_search()) {
        		$content .= "<meta name=\"robots\" content=\"noindex,nofollow\" />";
    		} else {	
        		$content .= "<meta name=\"robots\" content=\"noindex,follow\" />";
    		}
    		$content .= "\n\n";
    		if (get_option('blog_public')) {
    				echo apply_filters('o2_create_robots', $content);
    		}
		}
} // end o2_create_robots


// meta-tag robots is switchable using a filter
function o2_show_robots() {
    $display = TRUE;
    $display = apply_filters('o2_show_robots', $display);
    if ($display) {
        o2_create_robots();
    }
} // end o2_show_robots

// creates link to style.css
function o2_create_stylesheet() {
    $content = "\t";
    $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
    $content .= get_bloginfo('stylesheet_url');
    $content .= "\" media=\"screen\" />";
    $content .= "\n\n";
    echo apply_filters('o2_create_stylesheet', $content);
}

// Determine whether WP-prettyPhoto plugin is acivated and assign the result to a constant
defined('WP_PRETTY_PHOTO_PLUGIN_ACTIVE')
        || define('WP_PRETTY_PHOTO_PLUGIN_ACTIVE', class_exists( 'WP_prettyPhoto' ) );


// if the WP-prettyPhoto plugin is not active handle rel="wp-prettyPhoto" in links for the prettyPhoto integrated script (if enabled)
if ( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
    /**
     * Insert rel="wp-prettyPhoto" to all links for images, movie, YouTube and iFrame. 
     * This function will ignore links where you have manually entered your own rel reference.
     * @param string $content Post/page contents
     * @return string Prettified post/page contents
     * @link http://0xtc.com/2008/05/27/auto-lightbox-function.xhtml
     * @access public
      */
    function autoinsert_rel_prettyPhoto ($content) {
        global $post;
        $rel = 'wp-prettyPhoto';
        $image_match = '\.bmp|\.gif|\.jpg|\.jpeg|\.png';
        $movie_match = '\.mov.*?';
        $swf_match = '\.swf.*?';
        $youtube_match = 'http:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9]*';
        $iframe_match = '.*iframe=true.*';
        $pattern[0] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(".$image_match."|".$movie_match."|".$swf_match."|".$youtube_match."|".$iframe_match.")('|\")([^\>]*?)>/i";
        $pattern[1] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(".$image_match."|".$movie_match."|".$swf_match."|".$youtube_match."|".$iframe_match.")('|\")(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
        $replacement[0] = '<a$1href=$2$3$4$5$6 rel="'.$rel.'['.$post->ID.']">';
        $replacement[1] = '<a$1href=$2$3$4$5$6$7>';
        $content = preg_replace($pattern, $replacement, $content);
        return $content;
    }
    add_filter('the_content', 'autoinsert_rel_prettyPhoto');
    add_filter('the_excerpt', 'autoinsert_rel_prettyPhoto');


    // Add the 'wp-prettyPhoto' rel attribute to the default WP gallery links
    function gallery_prettyPhoto ($content) {
            // add checks if you want to add prettyPhoto on certain places (archives etc).
            return str_replace("<a", "<a rel='wp-prettyPhoto[gallery]'", $content);
    }
    add_filter( 'wp_get_attachment_link', 'gallery_prettyPhoto');
}

## Enable Post Thumbnail Feature 
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails');
	set_post_thumbnail_size( 200, 200 );
	add_image_size('post_thumb', 800, 800, true);
	add_image_size('medium', 274, 227, true);
	add_image_size('large', 618, 272, true);
}

function thumb_url(){
 global $post;
 global $blog_id;

       if(isset($blog_id) && $blog_id > 0) {

       $imgSrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 2100,2100 ));
       $imageParts = explode('/files/',$imgSrc[0] );

       if(isset($imageParts[1])) {
               $src = '/wp-content/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];

       } else {
               $thumb_src= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 2100,2100 ));
               $src = $thumb_src[0];
       }
       }

       return $src;
}

function excerpt($excerpt_length) {
  global $post;
	$content = $post->post_content;
	$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$content = implode(' ', $words);
	endif;
  
  $content = strip_tags(strip_shortcodes($content));
  
	return $content;

}

function wpapi_pagination($pages = '', $range = 4) {
  $showitems = ($range * 2)+1;
  
  global $paged;
  
  if(empty($paged)) $paged = 1;
    if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }
 
 if(1 != $pages) {
  echo '<div class="wpapi_pagination"><span>Page '.$paged.' of '.$pages.'</span>';
  if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
  if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
   for ($i=1; $i <= $pages; $i++) {
    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
      echo ($paged == $i)? '<span class="current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>';
    }
  }

   if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'">Next &rsaquo;</a>';
   if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
   echo "</div>";
   
 }
}

/* Pagination */
function theme_blog_pagenavi($before = '', $after = '', $blog_query, $paged) {
	global $wpdb, $wp_query;
	
	if (is_single())
		return;
	
	$pagenavi_options = array(
		//'pages_text' => __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','striking_front'),
		'pages_text' => '',
		'current_text' => '%PAGE_NUMBER%',
		'page_text' => '%PAGE_NUMBER%',
		'first_text' => __('&laquo; First','striking_front'),
		'last_text' => __('Last &raquo;','striking_front'),
		'next_text' => __('&raquo;','striking_front'),
		'prev_text' => __('&laquo;','striking_front'),
		'dotright_text' => __('...','striking_front'),
		'dotleft_text' => __('...','striking_front'),
		'style' => 1,
		'num_pages' => 4,
		'always_show' => 0,
		'num_larger_page_numbers' => 3,
		'larger_page_numbers_multiple' => 10,
		'use_pagenavi_css' => 0,
	);
	
	$request = $blog_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	global $wp_version;
	if((is_front_page() || is_home() ) && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query 
		$paged = (get_query_var('paged')) ?intval(get_query_var('paged')) : intval(get_query_var('page'));
	}else{
		$paged = intval(get_query_var('paged'));
	}
	
	$numposts = $blog_query->found_posts;
	$max_page = intval($blog_query->max_num_pages);
	
	if (empty($paged) || $paged == 0)
		$paged = 1;
	$pages_to_show = intval($pagenavi_options['num_pages']);
	$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
	$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor($pages_to_show_minus_1 / 2);
	$half_page_end = ceil($pages_to_show_minus_1 / 2);
	$start_page = $paged - $half_page_start;
	
	if ($start_page <= 0)
		$start_page = 1;
	
	$end_page = $paged + $half_page_end;
	if (($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	
	if ($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	
	if ($start_page <= 0)
		$start_page = 1;
	
	$larger_pages_array = array();
	if ($larger_page_multiple)
		for($i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple)
			$larger_pages_array[] = $i;
	
	if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
		$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
		$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
		echo $before . '<div class="wp-pagenavi">' . "\n";
		switch(intval($pagenavi_options['style'])){
			// Normal
			case 1:
				if (! empty($pages_text)) {
					echo '<span class="pages">' . $pages_text . '</span>';
				}
				if ($start_page >= 2 && $pages_to_show < $max_page) {
					$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
					echo '<a href="' . esc_url(get_pagenum_link()) . '" class="first" title="' . $first_page_text . '">' . $first_page_text . '</a>';
					if (! empty($pagenavi_options['dotleft_text'])) {
						echo '<span class="extend">' . $pagenavi_options['dotleft_text'] . '</span>';
					}
				}
				$larger_page_start = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page" title="' . $page_text . '">' . $page_text . '</a>';
						$larger_page_start++;
					}
				}
				previous_posts_link($pagenavi_options['prev_text']);
				for($i = $start_page; $i <= $end_page; $i++) {
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<span class="current">' . $current_page_text . '</span>';
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="page" title="' . $page_text . '">' . $page_text . '</a>';
					}
				}
				next_posts_link($pagenavi_options['next_text'], $max_page);
				$larger_page_end = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page" title="' . $page_text . '">' . $page_text . '</a>';
						$larger_page_end++;
					}
				}
				if ($end_page < $max_page) {
					if (! empty($pagenavi_options['dotright_text'])) {
						echo '<span class="extend">' . $pagenavi_options['dotright_text'] . '</span>';
					}
					$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
					echo '<a href="' . esc_url(get_pagenum_link($max_page)) . '" class="last" title="' . $last_page_text . '">' . $last_page_text . '</a>';
				}
				break;
			// Dropdown
			case 2:
				echo '<form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="get">' . "\n";
				echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">' . "\n";
				for($i = 1; $i <= $max_page; $i++) {
					$page_num = $i;
					if ($page_num == 1) {
						$page_num = 0;
					}
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<option value="' . esc_url(get_pagenum_link($page_num)) . '" selected="selected" class="current">' . $current_page_text . "</option>\n";
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<option value="' . esc_url(get_pagenum_link($page_num)) . '">' . $page_text . "</option>\n";
					}
				}
				echo "</select>\n";
				echo "</form>\n";
				break;
		}
		echo '</div>' . $after . "\n";
	}
}

function theme_widget_text_shortcode($content) {
	$content = do_shortcode($content);
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= do_shortcode($piece);
		}
	}

	return $new_content;
}

/**
 * Disable Automatic Formatting on Posts
 * Thanks to TheBinaryPenguin (http://wordpress.org/support/topic/plugin-remove-wpautop-wptexturize-with-a-shortcode)
 */
function theme_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
remove_filter('the_content',	'wpautop');
remove_filter('the_content',	'wptexturize');

add_filter('the_content', 'theme_formatter', 99);

# Remove Wordpress automatic formatting
function remove_wpautop( $content ) { 
    $content = do_shortcode( shortcode_unautop( $content ) ); 
    $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    return $content;
}


## Print list of Latest News
function o2_print_latestnews($blogcat,$num=4,$title="") { 
  global $post;
  
  echo $title;
  
  if(is_array($blogcat)) {
    $blog_includes = implode(",",$blogcat);
  } else {
    $blog_includes = $blogcat;
  }  
  
  query_posts('cat='.$blog_includes.'&showposts='.$num);
  ?>
    <ul class="latestnews">
      <?php
      while ( have_posts() ) : the_post();
      $image_thumbnail = get_post_meta($post->ID, '_image_thumbnail', true );
      ?>
        <li>
          <a href="<?php the_permalink();?>"><?php the_title();?></a>
          <p class="posteddate"><?php _e('Posted on ','uexpress');?><?php the_time( get_option('date_format') ); ?></p>
        </li>
      <?php endwhile;?>
      <?php wp_reset_query();?>
 	  </ul>
    <div class="clear"></div>
    <?php 
    $blog_page = get_option('uexpress_blog_page');
    $blog_pid = get_page_by_title($blog_page);
    ?>
    <a href="<?php echo get_permalink($blog_pid->ID);?>"><?php _e('View All News','uexpress');?></a>
  <?php
}

/* Print Testimonial List */
function o2_print_testimonial($cat,$num=1,$title="",$place="") {
  global $post;
  
  echo $title;
  ?>
  <?php
    if (!is_numeric($cat))
      $testicatid = get_cat_ID($cat); 
    else 
      $testicatid = $cat;
    
    query_posts('cat='.$testicatid.'&showposts='.$num.'&orderby=rand');
    ?>
    <?php    
    while ( have_posts() ) : the_post();
    ?>
    <blockquote><?php the_content();?></blockquote>
    <p class="testiname"><?php the_title();?></p> 
  <?php endwhile;wp_reset_query();?>
    <a href="<?php echo esc_url(get_category_link($testicatid));?>"><?php _e('View All Testimonials','uexpress');?></a>
  <?php
}

/* Page with child pages List */
function o2_pagelist($page_name, $num, $orderby="menu_order",$style="2col",$readmore_text="Learn more") {  
  
  $page_id = get_page_by_title($page_name);
  
  $services_num = ($num) ? $num : 4;
  $counter = 0;
  $out = "";
  
   if ($style == "4col") $out .= '<div class="clear"></div><ul class="portfolio-4col">';
   
  query_posts('post_type=page&post_parent='.$page_id->ID.'&showposts='.$services_num.'&orderby='.$orderby);
    
  while (have_posts()) : the_post();
    $counter++;
    
    if ($style == "2col") {
      if ($counter %2 ==0) {
        $out .= '<div class="mainbox box-last">'; 
      } else {
        $out .= '<div class="mainbox">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<a href="'.get_permalink().'"><img src="'.O2_SCRIPTS.'/timthumb.php?src='.thumb_url().'&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" /></a>'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(12).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'uexpress').'<img src="'.O2_IMG.'/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %2 ==0) {
        $out .= '<div class="spacer"></div>'; 
      }      
    } else if ($style == "3col"){
     if ($counter %3 ==0) {
        $out .= '<div class="mainbox2 box-last">'; 
      } else {
        $out .= '<div class="mainbox2">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg2">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<a href="'.get_permalink().'"><img src="'.O2_SCRIPTS.'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" /></a>'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(8).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'uexpress').'<img src="'.O2_IMG.'/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %3 ==0) {
        $out .= '<div class="spacer"></div>'; 
      } 
    } else if ($style == "4col"){
      $out .= '<li'; 
      if ($counter %4 == 0) $out .= ' class="last"';
      $out .= '>';
      $out .= '<div class="portfolio-blockimg3">';
	  $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
        $out .= '<div class="portfolio-imgbox3">';
        if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
          $out .= '<a href="'.get_permalink().'"><img src="'.O2_SCRIPTS.'/timthumb.php?src='.thumb_url().'&amp;h=86&amp;w=196&amp;zc=1" alt="" class="boximg-pad" /></a>'."\n";
        }
        $out .= '</div>';
        $out .= '<p>'.excerpt(15).'</p>';
        $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'uexpress').'<img src="'.O2_IMG.'/arrow_grey.png" alt="" class="readmore"/></span></a>';     
        $out .= '</div>';
        $out .= '</li>';      
    }    
    endwhile;
    if ($style == "4col") $out .= '</ul>';
  wp_reset_query();
  return $out;
}

/* Languages selector with flags only*/
function language_selector_flags(){
	$languages = icl_get_languages('skip_missing=0&orderby=code');
	if(!empty($languages)){
		echo '<ul>';
		foreach($languages as $l){
			echo '<li>';
			if(!$l['active']) echo '<a href="'.$l['url'].'">';
			echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
			if(!$l['active']) echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
	}
}


/* Thumbnail in Portfolio List */
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
 
	function fb_AddThumbColumn($cols) {
	 
	$cols['thumbnail'] = __('Thumbnail','uexpress');
	 
	return $cols;
	}
 
function fb_AddThumbValue($column_name, $post_id) {
 
$width = (int) 100;
$height = (int) 100;
 
if ( 'thumbnail' == $column_name ) {
  // thumbnail of WP 2.9
  $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
  // image from gallery
  $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
  if ($thumbnail_id)
  $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
  elseif ($attachments) {
    foreach ( $attachments as $attachment_id => $attachment ) {
      $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
    }
  }
    if ( isset($thumb) && $thumb ) {
    echo $thumb;
    } else {
    echo __('None','uexpress');
    }
  }
}

function char_limit($string, $lengh) {
	$string = strip_tags($string);
	
	if (strlen($string) > $lengh) {

		// truncate string
		$stringCut = substr($string, 0, $lengh);
	
		// make sure it ends in a word so assassinate doesn't become ass...
		$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
	} else {
		$string = $string . '...'; 
	}
	echo $string;
}
 
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
 
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );

// for Portfolio
add_filter( 'manage_portfolio_columns', 'fb_AddThumbColumn' );
add_action( 'manage_portfolio_custom_column', 'fb_AddThumbValue', 10, 2 );

// for slideshow
add_filter( 'manage_slideshow_columns', 'fb_AddThumbColumn' );
add_action( 'manage_slideshow_custom_column', 'fb_AddThumbValue', 10, 2 );
}

add_filter('manage_edit-portfolio_columns', 'portfolio_columns');
function portfolio_columns($columns) {
    $columns['category'] = 'Portfolio Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'portfolio_show_columns');
function portfolio_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-product_columns', 'product_columns');
function product_columns($columns) {
    $columns['category'] = 'Product Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'product_show_columns');
function product_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'product_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-slideshow_columns', 'slideshow_columns');
function slideshow_columns($columns) {
    $columns['category'] = 'Slideshow Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'slideshow_show_columns');
function slideshow_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'slideshow_category', '', ', ', '' );
            echo $cats;
    }
}


?>