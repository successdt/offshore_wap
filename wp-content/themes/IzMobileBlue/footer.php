		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-content') ) : ?>
		<?php endif; ?>
	</div>
	<div class="iz-footer">
		&copy; <?php echo date("Y"); ?>, <a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?> - <?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a><br />
	</div>
		<?php wp_footer(); ?>
	</body>
</html>