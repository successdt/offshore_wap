<div class="title"> 
	<span style="float: left"> 
		<img src="http://nqdung2306.hayday.mobi/static/icon/2012/11/09/2c759287aca4311c09f06ef2c128f60c1352431306_qybv1.png" alt="Top hot"> 
	</span> 
<span style="float: left; padding-left: 5px;"><h1 class="h2service"><?php echo 'Danh mục'; ?></h1> </span></div>
<div class="related-posts"> 
	<ul>	
		<?php 	$args = array(		'show_option_all'    => '',
									'orderby'            => 'name',
									'order'              => 'DESC',		
									'style'              => 'list',		
									'show_count'         => 1,		
									'hide_empty'         => 1,		
									'use_desc_for_title' => 1,		
									'child_of'           => 0,		
									'feed'               => '',		
									'feed_type'          => '',		
									'feed_image'         => '',		
									'exclude'            => '',		
									'exclude_tree'       => '',		
									'include'            => '',		
									'hierarchical'       => 1,		
									'title_li'           => __( '' ),		
									'show_option_none'   => __('No categories'),		
									'number'             => null,		
									'echo'               => 0,		
									'depth'              => 0,		
									'current_category'   => 0,		
									'pad_counts'         => 0,		
									'taxonomy'           => 'category',		
									'walker'             => null	);		
									$variable = wp_list_categories($args);		
									$variable = preg_replace('~\((\d+)\)(?=\s*+<)~', '$1', $variable);		
								echo strip_shortcodes(wp_list_categories($args));	 ?> 
	</ul>
</div>