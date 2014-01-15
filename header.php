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

	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		<script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		<script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class('antialiased'); ?>>
		<div class="row">
			<header id="bdimage" <?php if ( get_header_image() ) : ?>data-image="<?php header_image(); ?>"<?php endif; ?>>
				<?php if ( !get_header_image() ) : ?>
					<?php if (is_single() || is_page()): ?>
						<p class="h1"><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></p>
						<p><?php bloginfo('description'); ?></p>
					<?php else : ?>
						<h1><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h1>
						<p><?php bloginfo('description'); ?></p>
					<?php endif; ?>
				<?php else: ?>
					<img width="100%" src="<?php header_image(); ?>" />
				<?php endif; ?>
			</header>
			<nav class="top-bar" data-topbar>
				<?php foundation_nav( $menu ); ?>
			</nav>
		</div>
		<p class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, perspiciatis, iure quis quam illum accusamus aliquam facilis officia culpa tenetur porro incidunt maiores ipsa! Dolorum magni et suscipit reiciendis consequuntur!</p>
		<div class="row">