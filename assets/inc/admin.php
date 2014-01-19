<?php
/*
 *  Author: Boluge
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Admin
\*------------------------------------*/
// Personalisation du login Worpdress
if (function_exists('add_theme_support'))
{
	// Add Menu Support
	add_theme_support('menus');

	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
	add_image_size('large', 700, '', true); // Large Thumbnail
	add_image_size('medium', 250, '', true); // Medium Thumbnail
	add_image_size('small', 120, '', true); // Small Thumbnail
	add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

	// Add Support for Custom Backgrounds - Uncomment below if you're going to use
	add_theme_support('custom-background', array(
		'default-color' => 'F5F5F5'
		//'default-image' => get_template_directory_uri() . '/img/bg.jpg'
	));

	// Add Support for Custom Header - Uncomment below if you're going to use
	add_theme_support('custom-header', array(
		'default-image'				=> get_template_directory_uri() . '/img/header.jpg',
		'header-text'				=> false,
		'default-text-color'		=> '000',
		'width'						=> 1500,
		'height'					=> 310,
		'random-default'			=> false,
		'wp-head-callback'			=> '',
		'admin-head-callback'		=> '',
		'admin-preview-callback'	=> ''
	));

	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Localisation Support
	load_theme_textdomain('foundation', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions

// Add Filter
// add_filter('jpeg_quality', function($arg){return 80;}); // Compression des images à 80% au lieu de 90%
add_filter( 'jpeg_quality', create_function( '', 'return 80;' ) ); // Idem php < 5.3