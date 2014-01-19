<?php
/*
 *  Author: Boluge
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	ajax
\*------------------------------------*/
// Personalisation du login Worpdress
function foundation_login_css()  {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />';
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions
add_action('login_head', 'foundation_login_css'); // Add Override Login Css