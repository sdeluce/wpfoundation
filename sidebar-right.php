<?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left-area') ) : ?>
<?php //endif; ?>

<?php
    if (! is_active_sidebar('right-area'))
        return;
?>
<aside class="large-<?php grid('right'); ?> columns">
    <?php if ( is_active_sidebar('right-area') ) : ?>

            <?php dynamic_sidebar('right-area'); ?>

    <?php endif; ?>
</aside>