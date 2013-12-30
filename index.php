<?php get_header(); ?>

<?php 
//	Largeur des sidebars
	$col_left = 3;
	$col_right = 3;

//	Teste si sidebar ou non
	if (is_active_sidebar('left') && is_active_sidebar('right')) {
		$col_main = 12 - ($col_left + $col_right);
	} else if (is_active_sidebar('left')){
		$col_main = 12 - $col_left;
	} else if (is_active_sidebar('right')){
		$col_main = 12 - $col_right;
	} else {
		$col_main = 12;
	}

 ?>

<div class="row">

	<?php if ( is_active_sidebar( 'left' ) ) : ?>
		<div class="large-<?php echo $col_left; ?> columns">
			<ul id="sidebar">
				<?php dynamic_sidebar( 'left' ); ?>
			</ul>
		</div>
	<?php endif; ?>

	<div class="large-<?php echo $col_main; ?> columns">
		<div class="main">
			<?php get_template_part('loop'); ?>
			<?php foundation_pagination(); ?>
		</div>
	</div>

	<?php if ( is_active_sidebar( 'right' ) ) : ?>
		<div class="large-<?php echo $col_right; ?> columns">
			<ul id="sidebar">
				<?php dynamic_sidebar( 'right' ); ?>
			</ul>
		</div>
	<?php endif; ?>

</div>






<?php get_footer(); ?>