<?php

/*
Plugin Name: Custom Stylesheet
Plugin URI: http://uly.me/wordpress-custom-css-stylesheet/
Description: Do you want a custom stylesheet that sticks? This plugin allows you to keep your custom CSS styles, even if you jump from theme to theme, and regardless of theme update overwrites. This plugin is also a good place to test your custom CSS.
Version: 1.0
Author: Ulysses Ronquillo
Author URI: http://uly.me
*/

// include the main file

function urr_custom_stylesheets() {
	include('main.php');
}


// add this plugin under the appearance theme pages

add_action( 'admin_menu', 'urr_custom_stylesheet_add_options' );

function urr_custom_stylesheet_add_options() {
	add_theme_page( 'Stylesheet', 'Stylesheet', 'manage_options', __FILE__, 'urr_custom_stylesheets' );
}


// add this plugin in the admin bar menu

//add_action('admin_bar_menu', 'urr_custom_stylesheet_toolbar_items', 101);

function urr_custom_stylesheet_toolbar_items($admin_bar){

	$admin_bar->add_menu( array(
		'id'    => 'custom-stylesheet',
		'title' => 'Stylesheet',
		'href'  => get_bloginfo('url') .'/wp-admin/themes.php?page=stylesheet/stylesheet.php',	
		'meta'  => array(
			'title' => __('Stylesheet'),			
		),
	));
	
}


// add our code to the wp_head

add_action( 'wp_head', 'urr_custom_stylesheet_header', 500 );

function urr_custom_stylesheet_header() {
	//get options
	$style = get_option('urr_custom_stylesheet');
	// display to wp_head
	echo '<style type="text/css">'.stripslashes($style).'</style>';
}


/* end of stylesheet.php */