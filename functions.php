<?php

function foundation_setup(){
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'foundation' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'foundation' ),
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'foundation_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
} add_action( 'after_setup_theme', 'foundation_setup' );



function foundation_widgets_init() {
	// Add a Widget Position
	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
} add_action( 'widgets_init', 'foundation_setup' );

$args = array(
	'flex-width'     => true,
	'width'          => 1700,
	'flex-height'    => true,
	'height'         => 250,
);
add_theme_support( 'custom-header', $args );


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
} add_action('wp_head', 'gkp_prefetch');

// Fonction qui insere le lien vers le css qui surchargera celui d'origine
function custom_login_css()  {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />';
}
add_action('login_head', 'custom_login_css');

// Ajoute des Widget
if (function_exists('register_sidebar')){
	register_sidebar(
		array(
			'name' 			=> 'Sidebar Gauche',
			'id' 			=> 'left',
			'description'   => 'Apparaît dans la colone gauche du theme',
			'before_widget' => '<div id="my-mega-menu-widget">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '',
			'after_title' 	=> '',
		)
	);
	register_sidebar(
		array(
			'name' 			=> 'Sidebar Right',
			'id' 			=> 'right',
			'description'   => 'Apparaît dans la collone droit du theme',
			'before_widget' => '<div id="my-mega-menu-widget">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '',
			'after_title' 	=> '',
		)
	);
	register_sidebar(
		array(
			'name' 			=> 'Zone de widgets en pied de page',
			'id' 			=> 'footer',
			'description'   => 'Apparaît dans le pied de page',
			'before_widget' => '<div id="my-mega-menu-widget">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '',
			'after_title' 	=> '',
		)
	);
}

function foundation_pagination() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	// if ( get_previous_posts_link() )
	// 	printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="current"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="current"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="current"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	// if ( get_next_posts_link() )
	// 	printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
