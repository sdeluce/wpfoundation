<?php
/*
 *  Author: Boluge
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Admin
\*------------------------------------*/
// Personalisation du login Worpdress
function foundation_login_css()  {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />';
}
// Grilles --Front--
function grid($col) {
//	Largeur des sidebars
	$col_left = 3;
	$col_right = 3;

//	Teste si sidebar ou non
	if (is_active_sidebar('left-area') && is_active_sidebar('right-area')) {
		$col_main = 12 - ($col_left + $col_right);
		$col_left = $col_left;
		$col_right = $col_right;
	} else if (is_active_sidebar('left-area')){
		$col_main = 12 - $col_left;
		$col_left = $col_left;
		$col_right = 0;
	} else if (is_active_sidebar('right-area')){
		$col_main = 12 - $col_right;
		$col_left = 0;
		$col_right = $col_right;
	} else {
		$col_main = 12;
		$col_left = 0;
		$col_right = 0;
	}

	switch ($col) {
		case 'left':
			echo $col_left;
			break;
		case 'main':
			echo $col_main;
			break;
		case 'right':
			echo $col_right;
			break;
	}
}

//Deletes empty classes and removes the sub menu class --front--
function change_submenu_class($menu) {
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown" /',$menu);
    return $menu;
}

// Préchargement des pages 
function gkp_prefetch() {	
    if ( is_single() ) {  ?>		
		<!-- Préchargement de la page d\'accueil -->
		<link rel="prefetch" href="<?php echo home_url(); ?>" />
		<link rel="prerender" href="<?php echo home_url(); ?>" />
			
		<!-- Préchargement de l\'article suivant -->
		<link rel="prefetch" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?>" />
		<link rel="prerender" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?>" />
   <?php
   }
}

// Encapsulage des videos
function standard_wrap_embeds( $html, $url, $args ) {
	if( 'video' == get_post_format( get_the_ID() ) ) {
		$html = '<div class="video-wrapper">' . $html . '</div>';
	} // end if 
	return $html; 
} // end standard_wrap_embebds

// Add Dashicons in the theme
function wpc_dashicons() {
	wp_enqueue_style('dashicons');
}

// Ajout des favicons
function favicons() {
?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon-16x16.png" sizes="16x16">
	<meta name="msapplication-TileColor" content="#464646">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/mstile-144x144.png">
	<meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/img/mstile-70x70.png">
	<meta name="msapplication-square144x144logo" content="<?php echo get_template_directory_uri(); ?>/img/mstile-144x144.png">
	<meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/img/mstile-150x150.png">
	<meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/img/mstile-310x310.png">
	<meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/img/mstile-310x150.png">
<?php
}

// Minifier le html
function gkp_html_minify_start()  {
    ob_start( 'gkp_html_minyfy_finish' );
}
 
function gkp_html_minyfy_finish( $html )  {
 
   // Suppression des commentaires HTML, 
   // sauf les commentaires conditionnels pour IE
   $html = preg_replace('/<!--(?!s*(?:[if [^]]+]|!|>))(?:(?!-->).)*-->/s', '', $html);
 
   // Suppression des espaces vides
   $html = str_replace(array("\r\n", "\r", "\n", "\t"), '', $html);
   while ( stristr($html, '  ')) 
       $html = str_replace('  ', ' ', $html);
 
   return $html;
}

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

// Load Foundation scripts (header.php)
function foundation_header_scripts()
{
	if (!is_admin()) {

		wp_deregister_script('jquery'); // Deregister WordPress jQuery
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2'); // Google CDN jQuery
		wp_enqueue_script('jquery'); // Enqueue it!


		wp_register_script('conditionizr', 'http:////cdnjs.cloudflare.com/ajax/libs/conditionizr.js/4.1.0/conditionizr.min.js', array(), '4.1.0'); // Conditionizr
		wp_enqueue_script('conditionizr'); // Enqueue it!

		wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), '2.6.2'); // Modernizr
		wp_enqueue_script('modernizr'); // Enqueue it!

		wp_register_script('foundationscripts', get_template_directory_uri() . '/js/script.js', array(), '1.0.0'); // Custom scripts
		wp_enqueue_script('foundationscripts'); // Enqueue it!
	}
}
// Load Foundation conditional scripts
function foundation_conditional_scripts()
{
	if (is_page('pagenamehere')) {
		wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
		wp_enqueue_script('scriptname'); // Enqueue it!
	}
}

// Load Foundation styles
function foundation_styles()
{
	wp_register_style('foundation', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
	wp_enqueue_style('foundation'); // Enqueue it!
}

// Register Foundation Navigation
function register_foundation_menu()
{
	register_nav_menus(array( // Using array to specify more menus if needed
		'header-menu' 	=> __('Header Menu', 'foundation'), // Main Navigation
		'footer-menu' 	=> __('Footer Menu', 'foundation'), // Sidebar Navigation
		'extra-menu' 	=> __('Extra Menu', 'foundation') // Extra Navigation if needed (duplicate as many as you need!)
	));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
	$args['container'] = false;
	return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
	return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
	return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
			unset($classes[$key]);
		}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}

	return $classes;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions
add_action('login_head', 'foundation_login_css'); // Add Override Login Css
add_action('wp_head', 'gkp_prefetch'); // Optimisation
add_action('wp_enqueue_scripts', 'wpc_dashicons'); // Utilisation de Dashicon WP 3.8
add_action('wp_head', 'favicons'); // Favicons
add_action('get_header', 'gkp_html_minify_start'); // Minifier le html
add_action('init', 'foundation_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'foundation_styles'); // Add Theme Stylesheet
add_action('init', 'register_foundation_menu'); // Add Foundation Menu

// Remove Actions


// Add Filters
add_filter ('wp_nav_menu','change_submenu_class'); // Add class menu
add_filter( 'embed_oembed_html', 'standard_wrap_embeds', 10, 3 ) ; // Video responsive
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation


