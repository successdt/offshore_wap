<?php get_header(); ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('index-content') ) : ?>
		<?php endif; ?>
<?php get_footer(); ?>