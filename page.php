<?php get_header(); ?>
<?php 
//  Largeur des sidebars
  $col_left = 3;
  $col_right = 3;

//  Teste si sidebar ou non
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
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="post">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-content">
              <?php the_content(); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
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