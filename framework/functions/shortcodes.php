<?php

/* ======================================
   List Styles 
   ======================================*/
function o2_checklist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="checklist">', do_shortcode($content));
	return remove_wpautop($content);	
}
add_shortcode('checklist', 'o2_checklist');

function o2_itemlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="itemlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('itemlist', 'o2_itemlist');

function o2_bulletlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="bulletlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('bulletlist', 'o2_bulletlist');

function o2_arrowlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="arrowlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('arrowlist', 'o2_arrowlist');

function o2_starlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="starlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('starlist', 'o2_starlist');

/* ======================================
   Messages Box
   ======================================*/
function o2_warningbox( $atts, $content = null ) {
   return '<div class="warning">' . do_shortcode($content) . '</div>';
}
add_shortcode('warning', 'o2_warningbox');


function o2_infobox( $atts, $content = null ) {
   return '<div class="info">' . do_shortcode($content) . '</div>';
}
add_shortcode('info', 'o2_infobox');

function o2_successbox( $atts, $content = null ) {
   return '<div class="success">' . do_shortcode($content) . '</div>';
}
add_shortcode('success', 'o2_successbox');

function o2_errorbox( $atts, $content = null ) {
   return '<div class="error">' . do_shortcode($content) . '</div>';
}
add_shortcode('error', 'o2_errorbox');

/* ======================================
   Pullquote
   ======================================*/

function o2_pullquote_right( $atts, $content = null ) {
   return '<span class="pullquote_right">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_right', 'o2_pullquote_right');


function o2_pullquote_left( $atts, $content = null ) {
   return '<span class="pullquote_left">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_left', 'o2_pullquote_left');

function o2_quotebox( $atts, $content = null ) {
  return '<div class="content_quotebox"><h3>'.do_shortcode($content).'</h3></div>';
}
add_shortcode('quotebox', 'o2_quotebox');


/* ======================================
   Dropcap
   ======================================*/
function o2_drop_cap( $atts, $content = null ) {
   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'o2_drop_cap');

/* ======================================
   Spacer
   ======================================*/
function o2_spacer( $atts, $content = null ) {
   return '<div class="spacer"></div>';
}
add_shortcode('spacer', 'o2_spacer');


/* ======================================
   Highlight
   ======================================*/
function o2_highlight_yellow( $atts, $content = null ) {
   return '<span class="highlight-yellow">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_yellow', 'o2_highlight_yellow');

function o2_highlight_dark( $atts, $content = null ) {
   return '<span class="highlight-dark">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_dark', 'o2_highlight_dark');

function o2_highlight_green( $atts, $content = null ) {
   return '<span class="highlight-green">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_green', 'o2_highlight_green');

function o2_highlight_red( $atts, $content = null ) {
   return '<span class="highlight-red">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_red', 'o2_highlight_red');

/* ======================================
   Columns
   ======================================*/
function o2_col_12( $atts, $content = null ) {
   return '<div class="col_12">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_12', 'o2_col_12');

function o2_col_12_last( $atts, $content = null ) {
   return '<div class="col_12_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_12_last', 'o2_col_12_last');

function o2_col_13( $atts, $content = null ) {
   return '<div class="col_13">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_13', 'o2_col_13');

function o2_col_13_last( $atts, $content = null ) {
   return '<div class="col_13_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_13_last', 'o2_col_13_last');

function o2_col_14( $atts, $content = null ) {
   return '<div class="col_14">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14', 'o2_col_14');

function o2_col_14_last( $atts, $content = null ) {
   return '<div class="col_14_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_14_last', 'o2_col_14_last');

function o2_col_23( $atts, $content = null ) {
   return '<div class="col_23">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_23', 'o2_col_23');

function o2_col_23_last( $atts, $content = null ) {
   return '<div class="col_23_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_23_last', 'o2_col_23_last');

function o2_col_34($atts, $content = null ) {
   return '<div class="col_34">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_34', 'o2_col_34');

/* ======================================
   Inner Columns
   ======================================*/
function o2_col_12_inner( $atts, $content = null ) {
   return '<div class="col_12_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_12_inner', 'o2_col_12_inner');

function o2_col_12_inner_last( $atts, $content = null ) {
   return '<div class="col_12_inner_last">' . remove_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_12_inner_last', 'o2_col_12_inner_last');

function o2_col_13_inner( $atts, $content = null ) {
   return '<div class="col_13_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_13_inner', 'o2_col_13_inner');

function o2_col_13_inner_last( $atts, $content = null ) {
   return '<div class="col_13_inner_last">' . remove_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_13_inner_last', 'o2_col_13_inner_last');

function o2_col_14_inner( $atts, $content = null ) {
   return '<div class="col_14_inner">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14_inner', 'o2_col_14_inner');

function o2_col_24_inner( $atts, $content = null ) {
   return '<div class="col_24_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_24_inner', 'o2_col_24_inner');

function o2_col_14_inner_last( $atts, $content = null ) {
   return '<div class="col_14_inner_last">' . remove_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('col_14_inner_last', 'o2_col_14_inner_last');

function o2_col_23_inner( $atts, $content = null ) {
   return '<div class="col_23_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_23_inner', 'o2_col_23_inner');

function o2_col_34_inner($atts, $content = null ) {
   return '<div class="col_34_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_34_inner', 'o2_col_34_inner');

/* ======================================
   Buttons 
   ======================================*/
function o2_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
    ), $atts));

	$out = "<a class=\"button\" href=\"" .$link. "\"><span>" .do_shortcode($content). "</span></a>";
    
    return $out;
}
add_shortcode('button', 'o2_button');

/* ======================================
   Video
   ======================================*/
#### Vimeo eg http://vimeo.com/5363880 id="5363880"
function vimeo_code($atts,$content = null){

	extract(shortcode_atts(array(  
		"id" 		=> '',
		"width"		=> '', 
		"height" 	=> ''
	), $atts)); 
	 
	$data = "<object width='$width' height='$height' data='http://vimeo.com/moogaloop.swf?clip_id=$id&amp;server=vimeo.com&amp;autoplay=0&amps;loop=0' type='application/x-shockwave-flash'>
			<param name='allowfullscreen' value='true' />
			<param name='allowscriptaccess' value='always' />
			<param name='wmode' value='opaque'>
			<param name='movie' value='http://vimeo.com/moogaloop.swf?clip_id=$id&amp;server=vimeo.com' />
		</object>";
	return $data;
} 
add_shortcode("vimeo_video", "vimeo_code"); 

#### YouTube eg http://www.youtube.com/v/MWYi4_COZMU&hl=en&fs=1& id="MWYi4_COZMU&hl=en&fs=1&"
function youTube_code($atts,$content = null){

	extract(shortcode_atts(array(  
      "id" 		=> '',
  		"width"		=> '', 
  		"height" 	=> ''
		 ), $atts)); 
	 
	$data = "<object width='$width' height='$height' data='http://www.youtube.com/v/$id' type='application/x-shockwave-flash'>			
      <param name='allowfullscreen' value='true' />
			<param name='allowscriptaccess' value='always' />
			<param name='FlashVars' value='playerMode=embedded' />
			<param name='wmode' value='opaque'>
			<param name='movie' value='http://www.youtube.com/v/$id' />
		</object>";
	return $data;
} 
add_shortcode("youtube_video", "youTube_code");

/* ======================================
   Custom Slideshow
   ======================================*/
function o2_custom_slideshow($atts,$content = null) {
  global $post;
  
	extract(shortcode_atts(array(
      "type" => '',
      "category" 	=> '',  
  		"num" 	=> '',
  		"width" 	=> '',
  		"height" 	=> '',
  		"transition" => '',
  		"speed" => ''
		 ), $atts)); 
  
  $id = rand(100,1000);
  $img_width = ($width) ? $width : 620;
  $img_height = ($height) ? $height : 313;
  $effect_transition = ($transition) ? $transition : "random";
  $speed_transition = ($speed) ? $speed : 4000;
  $category_id = get_cat_ID($category);
  
  $out = '<div id="custom_nivoslider" class="nivo_custom_'.$id.'" style="width:'.$img_width.'px;height:'.$img_height.'px;">';
    query_posts(array( 'post_type' => $type,'cat' =>$category_id,'showposts' => $num,'orderby'=>'date'));
    if (have_posts()) :
      while (have_posts() ) : the_post();
        $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
        $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
        $pf_preview = ($pf_link) ? $pf_link : thumb_url();
        $slide_permalink = htmlspecialchars("<a href=".get_permalink().'>'.get_the_title()."</a>");
            
        $out .= '<img src="'.get_bloginfo('template_directory').'/timthumb.php?src='.thumb_url().'&amp;h='.$img_height.'&amp;w='.$img_width.'&amp;zc=1" title="'.$slide_permalink.'" />';
        
      endwhile;endif;
      wp_reset_query();
  $out .= '</div><style type="text/css">.nivo-caption {width:'.$img_width.'px};</style>';
  $out .= '<script type="text/javascript">';
  $out .= "  jQuery(document).ready(function($) {	 
    $('.nivo_custom_".$id."').nivoSlider({
      directionNavHide:true,
      controlNav:false,
      effect: '".$effect_transition."',
      animSpeed:500, 
      pauseTime:".$speed_transition."
    }); 
    });";
  $out .= '</script>';
  
  return  $out;  
}
add_shortcode("slideshow", "o2_custom_slideshow");


/* ======================================
   Child pages list base on parent page
   ======================================*/
function o2_pagelist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "parent_page" => '',
    "num" => '',
    "orderby" => '',
    "style" => '',
    "readmore_text"
  ),$atts));
  
  if ($style == "") $style = "3col";
  if ($orderby == "") $orderby = "date";
  if ($readmore_text == "") $readmore_text = "Learn more";
   
  return o2_pagelist($parent_page,$num,$orderby,$style,$readmore_text);
}

add_shortcode('pagelist','o2_pagelist_shortcode');


## Tabs and Accordiaon
function theme_shortcode_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '<div class="tabs-wrapper"><ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div></div>';
		
		return '<div class="'.$code.'_container">' . $output . '</div><div class="clear"></div>';
	}
}
add_shortcode('tabs', 'theme_shortcode_tabs');
add_shortcode('mini_tabs', 'theme_shortcode_tabs');

## Images 
function o2_imagealignment( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'source'      => '#',
        'align' => '',
        'style' =>''
    ), $atts));
  
  switch ($align) {
    case "left" :
      $class="alignleft";
    break;
    case "right" :
      $class="alignright";
    break;
    case "center" :
      $class="aligncenter";
    break;
  }
  
  if ($style == "frame1") {
    $out .= '<div class="boximg box-left">';
    $out .= '<img class="boximg-pad" src="'.O2_SCRIPTS.'/timthumb.php?src='.$source.'&amp;h=84&amp;w=84&amp;zc=1" alt="">';
    $out .= '</div>';
  } else if ($style == "frame2") {    
    $out .= '<div class="portfolio-blockimg3"><div class="portfolio-imgbox3">';
    $out .= '<img class="boximg-pad" src="'.O2_SCRIPTS.'/timthumb.php?src='.$source.'&amp;h=86&amp;w=196&amp;zc=1" alt="">';
    $out .= '</div></div>';
  } else if ($style == "frame3") {
    $out .= '<div class="portfolio-blockimg2"><div class="portfolio-imgbox2">';
    $out .= '<img class="boximg-pad2" src="'.O2_SCRIPTS.'/timthumb.php?src='.$source.'&amp;h=122&amp;w=270&amp;zc=1" alt="">';
    $out .= '</div></div>';
  } else {
    $out = "<img class=\"".$class." imgbox2\" src=\"" .$source. "\" alt=\"\">"; 
  }
    
  return remove_wpautop($out);
}
add_shortcode('image', 'o2_imagealignment');


/* ======================================
   Google Map
   ======================================*/
function theme_shortcode_googlemap($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		"width" => false,
		"height" => '400',
		"address" => '',
		"latitude" => 0,
		"longitude" => 0,
		"zoom" => 14,
		"html" => '',
		"popup" => 'false',
		"controls" => 'true',
		'pancontrol' => 'true',
		'zoomcontrol' => 'true',
		'maptypecontrol' => 'true',
		'scalecontrol' => 'true',
		'streetviewcontrol' => 'true',
		'overviewmapcontrol' => 'true',
		"scrollwheel" => 'true',
		'doubleclickzoom' =>'true',
		"maptype" => 'ROADMAP',
		"marker" => 'true',
		'align' => false,
	), $atts));
	
	if($width){
		if(is_numeric($width)){
			$width = $width.'px';
		}
		$width = 'width:'.$width.';';
	}else{
		$width = '';
		$align = false;
	}
	if($height){
		if(is_numeric($height)){
			$height = $height.'px';
		}
		$height = 'height:'.$height.';';
	}else{
		$height = '';
	}
	
	wp_print_scripts( 'jquery-gmap');
	
	/* fix */
	$search  = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_DEFAULT_MAP_TYPES', 'G_PHYSICAL_MAP');
	$replace = array('ROADMAP', 'SATELLITE', 'HYBRID', 'HYBRID', 'TERRAIN');
	$maptype = str_replace($search, $replace, $maptype);
	/* end fix */
	
	if($controls == 'true'){
		$controls = <<<HTML
{
	panControl: {$pancontrol},
	zoomControl: {$zoomcontrol},
	mapTypeControl: {$maptypecontrol},
	scaleControl: {$scalecontrol},
	streetViewControl: {$streetviewcontrol},
	overviewMapControl: {$overviewmapcontrol}
}
HTML;
	}
	
	$align = $align?' align'.$align:'';
	$id = rand(100,1000);
	if($marker != 'false'){
		return <<<HTML
<div id="google_map_{$id}" class="google_map{$align}" style="{$width}{$height}"></div>
[raw]
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var tabs = jQuery("#google_map_{$id}").parents('.tabs_container,.mini_tabs_container,.accordion');
	jQuery("#google_map_{$id}").bind('initGmap',function(){
		jQuery(this).gMap({
			zoom: {$zoom},
			markers:[{
				address: "{$address}",
				latitude: {$latitude},
				longitude: {$longitude},
				html: "{$html}",
				popup: {$popup}
			}],
			controls: {$controls},
			maptype: '{$maptype}',
			doubleclickzoom:{$doubleclickzoom},
			scrollwheel:{$scrollwheel}
		});
		jQuery(this).data("gMapInited",true);
	}).data("gMapInited",false);
	if(tabs.size()!=0){
		tabs.find('ul.tabs,ul.mini_tabs,.accordion').data("tabs").onClick(function(index) {
			this.getCurrentPane().find('.google_map').each(function(){
				if(jQuery(this).data("gMapInited")==false){
					jQuery(this).trigger('initGmap');
				}
			});
		});
	}else{
		jQuery("#google_map_{$id}").trigger('initGmap');
	}
});
</script>
[/raw]
HTML;
	}else{
return <<<HTML
<div id="google_map_{$id}" class="google_map{$align}" style="{$width}{$height}"></div>
[raw]
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var tabs = jQuery("#google_map_{$id}").parents('.tabs_container,.mini_tabs_container,.accordion');
	jQuery("#google_map_{$id}").bind('initGmap',function(){
		jQuery("#google_map_{$id}").gMap({
			zoom: {$zoom},
			latitude: {$latitude},
			longitude: {$longitude},
			address: "{$address}",
			controls: {$controls},
			maptype: '{$maptype}',
			doubleclickzoom:{$doubleclickzoom},
			scrollwheel:{$scrollwheel}
		});
		jQuery(this).data("gMapInited",true);
	}).data("gMapInited",false);
	if(tabs.size()!=0){
		tabs.find('ul.tabs,ul.mini_tabs,.accordion').data("tabs").onClick(function(index) {
			this.getCurrentPane().find('.google_map').each(function(){
				if(jQuery(this).data("gMapInited")==false){
					jQuery(this).trigger('initGmap');
				}
			});
		});
	}else{
		jQuery("#google_map_{$id}").trigger('initGmap');
	}
});
</script>
[/raw]
HTML;
	}
}

add_shortcode('gmap','theme_shortcode_googlemap');


?>