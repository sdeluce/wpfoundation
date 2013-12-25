<!DOCTYPE html>
<html>
	<head <?php language_attributes(); ?>>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?20131218" type="text/css">
		<?php wp_head(); ?>
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" type="image/x-icon" />
	</head>
	<body <?php body_class(); ?>>
		<div class="row">
			<div class="contain-to-grid fixed">
				<nav class="top-bar show-for-small">
				  <a class="left-off-canvas-toggle menu-icon">
				    <span><?php bloginfo('name'); ?></span>
				  </a>
				</nav>
				<nav class="top-bar hide-for-small-only" data-topbar>
					<ul class="title-area">
						<li class="name">
							<?php if (is_single()) : ?>
								<p><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></p>
							<?php else : ?>
								<h1><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h1>
							<?php endif; ?>
						</li>
					</ul>

					<?php
					$menu = array(
						'theme_location'  => 'primary',
						'menu'            => 'test',
						'container'       => false,
						'container_class' => 'top-bar-section',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<section class="top-bar-section"><ul class="right">%3$s</ul></section>',
						'depth'           => 0,
						'walker'          => ''
					);
					?>
					<section class="top-bar-section">
						<?php wp_nav_menu( $menu ); ?>
					</section>
				</nav>
			</div>
		</div>
		<header id="bdimage" <?php if ( get_header_image() ) : ?>data-image="<?php header_image(); ?>"<?php endif; ?>>
			<div class="row">
				<?php if ( !get_header_image() ) : ?>
					<?php if (is_single()) : ?>
						<p><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></p>
						<p><?php bloginfo('description'); ?></p>
					<?php else : ?>
						<h1><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h1>
						<p><?php bloginfo('description'); ?></p>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</header>
			<div class="row">
			

