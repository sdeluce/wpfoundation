<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class('antialiased'); ?>>
		<div class="row">
			<div class="contain-to-grid fixed" >
				<nav class="top-bar show-for-small" data-topbar>
				  <a class="left-off-canvas-toggle menu-icon">
				    <span><?php bloginfo('name'); ?></span>
				  </a>
				</nav>
				<nav class="top-bar hide-for-small-only" data-topbar>
					<ul class="title-area">
						<li class="name">
							<?php if (is_single()) : ?>
								<p><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></p>
							<?php else : ?>
								<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
							<?php endif; ?>
						</li>
					</ul>

					<?php
					$menu = array(
						'theme_location'  => 'header-menu',
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
						<?php foundation_nav( $menu ); ?>
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