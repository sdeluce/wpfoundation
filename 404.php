<?php get_header(); ?>

	<!-- section -->
	<section role="main">

		<!-- article -->
		<article id="post-404">

			<h1><?php _e( 'Page not found', 'foundation' ); ?></h1>
			<h2>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'foundation' ); ?></a>
			</h2>

		</article>
		<!-- /article -->

	</section>
	<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>