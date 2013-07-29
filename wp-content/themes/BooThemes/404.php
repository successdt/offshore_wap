<?php get_header(); ?>

		<div id="main">
		
			<div class="post page">
			
				<h2 class="post-title"><?php _e('Page not found', 'marisa'); ?></h2>
				
				<div class="content-404">
					<span class="text-404">404</span>
					<p><?php _e('Sorry, the page you are looking for could not be found.', 'marisa'); ?></p>
					<?php get_search_form(); ?>
				</div>
			
			</div>
				

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>