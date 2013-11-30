	</div>
	<!-- end wrapper -->
	
	<div id="footer-wrapper">
	
		<div id="footer">
		
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 1') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 2') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 4') ) ?>
		
		</div>
	
	</div>
	
	<div id="footer-bottom-wrapper">
	
		<div id="footer-bottom">
		
			<div class="left"><?php echo get_option('fp_footer-text'); ?>. Designed by <a href="http://www.tapete-nach-wunsch.de/blog" title="Fototapeten">Fototapeten</a></div>
			
			<div class="right">
				<a href="http://2thoitrang.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-g.png" alt="thoi trang" /></a>
				<a href="http://www.boothemes.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-g.png" alt="magento themes" /></a>
				<?php if (get_option('fp_feedburner')) { ?><a href="http://feeds.feedburner.com/<?php echo get_option('fp_feedburner'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/rss-g.png" alt="RSS" /></a><?php } else { ?>
				<a href="<?php bloginfo( 'rss2_url' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/rss-g.png" alt="RSS" /></a>
				<?php } ?>
			</div>
			
			
		</div>
	
	</div>
	
	
	<script type="text/javascript">
	 (function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	 })();
	</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<?php wp_footer(); ?>
	<?php $google_analytics = get_option('fp_google_analytics'); if ($google_analytics) { echo stripslashes($google_analytics); } ?>
</body>

</html>