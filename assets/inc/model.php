<?php
/*
 *  Author: Boluge
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/



// Posts Formats
$post_formats = array( 'aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' );
add_theme_support('post-formats', $post_formats); // Ajout de Post Format



/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
	$content_width = 900;
}

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
	Functions
\*------------------------------------*/

// Foundation navigation
function foundation_nav()
{
	wp_nav_menu(
		array(
			'theme_location'  => 'header-menu',
			'menu'            => '',
			'container'       => false,
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		)
	);
}
// Footer nav
function footer_nav()
{
	wp_nav_menu(
		array(
			'theme_location'  => 'footer-menu',
			'menu'            => '',
			'container'       => false,
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		)
	);
}








// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
	// Define Sidebar Widget Area 1
	register_sidebar(array(
		'name' => __('Left Sidebar', 'foundation'),
		'description' => __('Description for this widget-area...', 'foundation'),
		'id' => 'left-area',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	// Define Sidebar Widget Area 2
	register_sidebar(array(
		'name' => __('Right Sidebar', 'foundation'),
		'description' => __('Description for this widget-area...', 'foundation'),
		'id' => 'right-area',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	// Define Sidebar Widget Area 2
	register_sidebar(array(
		'name' => __('Footer1', 'foundation'),
		'description' => __('Description for this widget-area...', 'foundation'),
		'id' => 'footer-one',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
} 


// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
	register_taxonomy_for_object_type('category', 'foundation'); // Register Taxonomies for Category
	register_taxonomy_for_object_type('post_tag', 'foundation');
	register_post_type('foundation', // Register Custom Post Type
		array(
		'labels' => array(
			'name' => __('Custom Post', 'foundation'), // Rename these to suit
			'singular_name' => __('Custom Post', 'foundation'),
			'add_new' => __('Add New', 'foundation'),
			'add_new_item' => __('Add New Custom Post', 'foundation'),
			'edit' => __('Edit', 'foundation'),
			'edit_item' => __('Edit Custom Post', 'foundation'),
			'new_item' => __('New Custom Post', 'foundation'),
			'view' => __('View Custom Post', 'foundation'),
			'view_item' => __('View Custom Post', 'foundation'),
			'search_items' => __('Search Custom Post', 'foundation'),
			'not_found' => __('No Custom Posts found', 'foundation'),
			'not_found_in_trash' => __('No Custom Posts found in Trash', 'foundation')
		),
		'public' => true,
		'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
		'has_archive' => true,
		'menu_icon' => '',
		'menu_position' => 5,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail'
		), // Go to Dashboard Custom Foundation post for supports
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array(
			'post_tag',
			'category'
		) // Add Category and Post Tags support
	));
} add_action('init', 'create_post_type_html5'); // Add our Foundation Custom Post Type

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function foundation_shortcode_demo($atts, $content = null)
{
	return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function foundation_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
	return '<h2>' . $content . '</h2>';
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions












// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters


add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)



add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'foundation_view_article'); // Add 'View Article' button instead of [...] for Excerpts



// add_filter('jpeg_quality', function($arg){return 80;}); // Compression des images à 80% au lieu de 90%
add_filter( 'jpeg_quality', create_function( '', 'return 80;' ) ); // Idem php < 5.3



// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
remove_action('wp_head', 'wp_generator'); // Remove Wordpress version

// Theme support


// Shortcodes
add_shortcode('foundation_shortcode_demo', 'foundation_shortcode_demo'); // You can place [foundation_shortcode_demo] in Pages, Posts now.
add_shortcode('foundation_shortcode_demo_2', 'foundation_shortcode_demo_2'); // Place [foundation_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [foundation_shortcode_demo] [foundation_shortcode_demo_2] Here's the page title! [/foundation_shortcode_demo_2] [/foundation_shortcode_demo]

