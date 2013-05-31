<?php 

##	Add theme sidebar
/* ----------------------------------------------------------- */
/* Register Sidebar												   */
/* ----------------------------------------------------------- */

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'General Sidebar',
    'before_widget' => '<div class="sidebar"><div class="sidebartop"></div><div class="sidebarmain"><div id="%1$s" class="sidebarcontent %2$s">',
    'after_widget' => '</div></div><div class="sidebarbottom"></div></div>',
    'before_title' => '<h4 class="sidebarheading">',
    'after_title' => '</h4>'
  ));
/*if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'Partner Sidebar',
    'before_widget' => '<div class="sidebar"><div class="sidebartop"></div><div class="sidebarmain"><div id="%1$s" class="sidebarcontent %2$s">',
    'after_widget' => '</div></div><div class="sidebarbottom"></div></div>',
    'before_title' => '<h4 class="sidebarheading">',
    'after_title' => '</h4>'
  ));*/  
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'Whitepage Sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ));    
/*if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'About Page Sidebar',
    'before_widget' => '<div class="sidebar"><div class="sidebartop"></div><div class="sidebarmain"><div id="%1$s" class="sidebarcontent %2$s">',
    'after_widget' => '</div></div><div class="sidebarbottom"></div></div>',
    'before_title' => '<h4 class="sidebarheading">',
    'after_title' => '</h4>'
  )); 
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'Services Page Sidebar',
    'before_widget' => '<div class="sidebar"><div class="sidebartop"></div><div class="sidebarmain"><div id="%1$s" class="sidebarcontent %2$s">',
    'after_widget' => '</div></div><div class="sidebarbottom"></div></div>',
    'before_title' => '<h4 class="sidebarheading">',
    'after_title' => '</h4>'
  )); 
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'News Sidebar',
    'before_widget' => '<div class="sidebar"><div class="sidebartop"></div><div class="sidebarmain"><div id="%1$s" class="sidebarcontent %2$s">',
    'after_widget' => '</div></div><div class="sidebarbottom"></div></div>',
    'before_title' => '<h4 class="sidebarheading">',
    'after_title' => '</h4>'
  ));
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'News Detail Sidebar',
    'before_widget' => '<div class="sidebar"><div class="sidebartop"></div><div class="sidebarmain"><div id="%1$s" class="sidebarcontent %2$s">',
    'after_widget' => '</div></div><div class="sidebarbottom"></div></div>',
    'before_title' => '<h4 class="sidebarheading">',
    'after_title' => '</h4>'
  )); */ 
  
  
  
  if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'bottom1',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ));        
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'bottom2',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ));        
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'bottom3',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ));        
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'bottom4',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ));

?>