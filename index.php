<?php get_header(); ?>

<?php get_sidebar('left'); ?>	
	<!-- section -->
	<section class="large-<?php grid('main'); ?> columns" role="main">
	
		<h1><?php _e( 'Latest Posts', 'foundation' ); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->
	
<?php get_sidebar('right'); ?>

<?php get_footer(); ?>