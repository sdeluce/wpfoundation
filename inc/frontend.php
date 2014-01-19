<?php
/*
 *  Author: Boluge
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Front End
\*------------------------------------*/

// Grilles
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


?>