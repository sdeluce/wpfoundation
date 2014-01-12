<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
		<h1><?php echo sprintf( __( '%s Search Results for ', 'foundation' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
		
		<?php 
		//	Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;
		?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>