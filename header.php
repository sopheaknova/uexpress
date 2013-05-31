<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(' - ', true, 'right'); bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php
    //show description
    o2_show_description();
    //Stylesheet
    o2_create_stylesheet();
    ?>

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (get_option('feedburner')!= false) { echo get_option('feedburner'); } else { bloginfo( 'rss2_url' ); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
     <!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/favicons.ico';?>"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<?php $heading_font = get_option('uexpress_heading_font'); if ($heading_font == "") $heading_font = "vegur.cufonfonts.js";?>
<?php if ($heading_font !== "vegur.cufonfonts.js") : ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/fonts/<?php echo $heading_font;?>"></script>
<?php endif ?>
<script type="text/javascript">
  Cufon.replace('h1,h2,h3,h4,h5,h6',{hover: 'true'});
</script>
<style type="text/css">
<?php

  $custom_body_text = get_option('uexpress_custom_body_text');
  $permalinks_color = get_option('uexpress_permalinks_color');
  $permalinks_hover_color = get_option('uexpress_permalinks_hover_color');
  $slogan_bg = get_option('uexpress_slogan_bg');
  
  if ($custom_body_text !== "") {
    echo 'body { font-family: '.$custom_body_text['face'].';}'; 
    echo 'p { color:'.$custom_body_text['color'].';font-size:'.$custom_body_text['size'].'px;font-style:'.$custom_body_text['style'].'}';
    echo 'ol li { color:'.$custom_body_text['color'].'}';
    echo '.arrowlist li { color:'.$custom_body_text['color'].'}';
    echo '.checklist li { color:'.$custom_body_text['color'].'}';
    echo '.bulletlist li { color:'.$custom_body_text['color'].'}';
    echo '.itemlist li { color:'.$custom_body_text['color'].'}';
  }
  
  if ($permalinks_color != "") {
    echo 'a,a:link,a:visited,.mainbox h4 a,.mainbox2 h4 a { color:'.$permalinks_color.';} a.button {color:#666666;}';
  }
  
  if ($permalinks_hover_color != "") {
    echo 'a:hover{ color:'.$permalinks_hover_color.';}, a.button:hover {color:#333333;}';
  }
  
  if ($slogan_bg != "") {
	echo '#slogan{background: url('.$slogan_bg.') 100% 0 no-repeat;}';
  } 
?>
</style>
</head>
<body <?php body_class(''); ?>>

<div id="wrapper">
    <!--Language Switcher Start-->
    <div id="language-switcher">
        
        <?php 
		if ( function_exists('icl_object_id') && function_exists('icl_get_default_language') ) { 
			language_selector_flags(); 
		} else {
		?>
        <ul>
            <li> <a href="#"><img title="English" alt="English" src="<?php echo O2_IMG; ?>/en.png"> </a> </li>
            <li> <a href="#"><img title="Khmer" alt="Khmer" src="<?php echo O2_IMG; ?>/kh.png"> </a> </li>
        </ul>
        <?php } ?>
    </div>
    <!--Language Switcher End-->
    
    <div id="topwrapper"></div>
        <!-- Main Wrapper Start -->
        <div id="mainwrapper">
            
            <!-- Header Start -->
            <div id="header">
                <!-- Logo Start -->
                <div id="logo">
                <?php $logo = get_option('uexpress_logo'); ?>
                <h1>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo ($logo) ? $logo : O2_IMG.'/logo.jpg';?>" alt="U EXPRESS Co., Ltd"/></a>
                </h1>    
                <p>EXPRESS Co., Ltd, based in Cambodia since 1998 is the exclusive agent of CLASQUIN. Over the past 15 years, we have developed a wide range of local and international logistics services to offer full support in our customers Supply Chain Management.</p>
                </div>
                <!-- Logo End -->    
                <!-- Slogan Start -->
                <div id="slogan">
                    <h3><?php echo get_option('uexpress_slogan_title'); ?></h3>
                </div>
                <!-- Slogan End -->
            </div>
            <!-- Header End -->
            
            <!--Navigation Start-->
            <div id="mainmenu">
                <?php 
					if (function_exists('wp_nav_menu')) { 
					  wp_nav_menu( array( 'menu_class' => '', 'theme_location' => 'menu_top', 'container_id' => 'myslidemenu', 'container_class' => 'jqueryslidemenu') );
					} 
				?>
                <div class="clear"></div>
            </div>
            <!--Navigation End-->
    