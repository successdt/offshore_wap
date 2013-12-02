<?php get_header(); ?> 
	<div class="entry"> 
		<div id="container">

	 		<?php
	 			$catId = 1;
	 			$args['category'] = $catId;
			 	$posts = get_posts( $args );
			 ?>
		 	<?php if(count($posts)) :?>
			 	<div class="post-wrapper" style="margin-top: 10px;">
					<div class="post post-title">
						<a href="<?php echo get_category_link($catId); ?>" title="<?php echo get_category($catId)->name ?>"><?php echo get_category($catId)->name ?></a>
					</div>		 	
			 		<?php foreach($posts as $post): ?>
					<div class="post" id="post-<?php echo $post->ID; ?>">
						<div class="imgpost">
							<a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
								<img src="<?php echo get_first_image(); ?>" alt="<?php echo $post->post_title; ?>" width="56" height="56"/>
							</a>
						</div>
						 <div class="title">
						 	<a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
	                           <h2><?php echo $post->post_title; ?></h2>
	    					</a>
						</div>
						<div class="description">
							<?php echo getTheDescription($post->post_content);?>
						</div>                    
	                    <div class="date" style="display: inline;">
	                        <?php
							$downloadLink = get_post_meta(get_the_ID(), 'download_link');
							if(getDownloadLink($post->post_content)) : ?>
								<a href="<?php echo getDownloadLink($post->post_content) ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Download miễn phí
								</a>                            	
                            
                            <?php elseif($downloadLink) : ?>
								<a href="<?php echo $downloadLink[0] ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Download miễn phí
								</a>                            	
                            <?php endif; ?>
	                    </div>        	
	                </div>
			 		<?php endforeach ?>
			 		<div class="post" style="text-align: right;">
						<a href="<?php echo get_category_link($catId); ?>" title="Xem thêm">Xem thêm...</a> 
				 	</div>
			 	</div>
		 	<?php endif; ?>

			<?php if(have_posts()) : ?>
				<div class="post-wrapper" style="margin-top: 10px;">
					<div class="post post-title">
						Mới nhất
					</div>
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				 		query_posts('posts_per_page=5&paged=' . $paged);
				 	?>
					<?php while(have_posts()) : the_post(); ?>
						
						<div class="post" id="post-<?php the_ID(); ?>">
							<div class="imgpost">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<img src="<?php echo get_first_image(); ?>" alt="<?php the_title(); ?>" width="56" height="56"/>
								</a>
							</div>
							 <div class="title">
							 	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                           <h2><?php the_title(); ?></h2>
	        					</a>
							</div>
							<div class="description">
								<?php echo getTheDescription();?>
							</div>                    
	                        <div class="date" style="display: inline;">
	                            <?php if(getDownloadLink()) : ?>
									
									<a href="<?php echo getDownloadLink() ?>">
										<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
										Download miễn phí
									</a>	                            	
	                            <?php endif ?>
	                        </div>        	
		                </div>
						
	                <?php endwhile; ?>
			        <div class="navigation post">
						<span class="goright"><?php next_posts_link('Xem thêm &raquo;') ?></span>
						<span class="goleft"><?php previous_posts_link('&laquo; Trang trước') ?></span>
			            <div class="clear"></div>
					</div>	                
				</div>

                                    

        <?php endif; ?>
        
        
        <?php
        	$args = array(
				'posts_per_page'  => 5,
				'offset'          => 0,
				'category'        => 9,
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'include'         => '',
				'exclude'         => '',
				'meta_key'        => '',
				'meta_value'      => '',
				'post_type'       => 'post',
				'post_mime_type'  => '',
				'post_parent'     => '',
				'post_status'     => 'publish',
				'suppress_filters' => true
			);
			
			
			$categories = array('3', '4', '15', '5');
	 	?>
	 	<?php foreach($categories as $catId): ?>
	 		<?php
	 			$args['category'] = $catId;
			 	$posts = get_posts( $args );
			 ?>
		 	<?php if(count($posts)) :?>
			 	<div class="post-wrapper" style="margin-top: 10px;">
					<div class="post post-title">
						<a href="<?php echo get_category_link($catId); ?>" title="<?php echo get_category($catId)->name ?>"><?php echo get_category($catId)->name ?></a>
					</div>		 	
			 		<?php foreach($posts as $post): ?>
					<div class="post" id="post-<?php echo $post->ID; ?>">
						<div class="imgpost">
							<a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
								<img src="<?php echo get_first_image(); ?>" alt="<?php echo $post->post_title; ?>" width="56" height="56"/>
							</a>
						</div>
						 <div class="title">
						 	<a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
	                           <h2><?php echo $post->post_title; ?></h2>
	    					</a>
						</div>
						<div class="description">
							<?php echo getTheDescription($post->post_content);?>
						</div>                    
	                    <div class="date" style="display: inline;">
	                        <?php if(getDownloadLink($post->post_content)) : ?>
								
								<a href="<?php echo getDownloadLink($post->post_content) ?>">
									<img src="<?php echo get_bloginfo('url') ?>/wp-content/themes/mobiletheme/images/download2.png" alt="download" />
									Download miễn phí
								</a>	                            	
	                        <?php endif ?>
	                    </div>        	
	                </div>
			 		<?php endforeach ?>
			 		<div class="post" style="text-align: right;">
						<a href="<?php echo get_category_link($catId); ?>" title="Xem thêm">Xem thêm...</a> 
				 	</div>
			 	</div>
		 	<?php endif; ?>	 	
	 	
	 	<?php endforeach; ?>

    </div>
         
        
    </div> <!--entry-->
	<?php get_sidebar(); ?>
 <?php get_footer(); ?>        