<?php get_header(); ?> 
        <?php
			
			$category = get_category( get_query_var( 'cat' ) );
    		$cat_id = $category->cat_ID;
			$category_layout = get_option('category_layout_' . $cat_id);
		?>    
        <div class="main_body_mobile"> 
	        <table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<?php if($category_layout == 'game'):
						$args = array(
							'type' => 'post',
							'parent' => $cat_id 
						);
						$categories = get_categories($args);
						foreach($categories as $category):
							 query_posts('cat=' . $category->term_id);
						?>
							<tr>
								<td colspan="3">
									<a href="<?php echo get_category_link($category->term_id) ?>">
										<h3 class="cat-name"><?php echo $category->name ?></h3>
									</a>
								
								</td>
							</tr>
				            <tr>
				            	<td style="background-color:#ffffff; width:15px;"></td>  
								<td style="background-color:#ffffff;">
			                        <div class="container">
			            
			                            <?php if(have_posts()) : ?>
			                            <?php while(have_posts()) : the_post(); ?>
												<div class="post_mobile list" id="post-<?php the_ID(); ?>">
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumbnail-link">
														<div class="small-thumb" style="background: url('<?php echo catch_that_image(); ?>') no-repeat top center; 	background-size: 100% 100%;">
														</div>
													</a>
			                                        <div class="post_the_title">
			                                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			           	                         	</div>
													<div class="entry">                        
														<div class="postmetadata">
															<div class="post_the_date">
				                                                <?php echo timeAgo(get_the_time('Y/m/d h:i:s'));//  the_time('d/m/y'); ?>
				                                            </div>
														</div>
													</div>  	
			                                    </div> 										
			                            <?php endwhile; ?>
			                            
			                               <div class="navigation">
			                                    <a href="<?php echo get_category_link($category->term_id) ?>">Xem thêm</a>
			                               </div>               
			            
			                            <?php else : ?>
			            
			                                <div class="post" id="post-<?php the_ID(); ?>">
			                                    <h2><?php _e('No posts are added.'); ?></h2>
			                                </div>
			            
			                            <?php endif; ?>
			                            
			                        </div>
				                </td>
				                <td style="background-color:#ffffff; width:15px; "></td>
				            </tr>
			            <?php endforeach; ?>
					<?php elseif($category_layout == 'news'): ?>
						<tr>
							<td colspan="3">
								<h3 class="cat-name"><?php echo $category->cat_name ?></h3>
							</td>
							
						</tr>
			            <tr>
			            	<td style="background-color:#ffffff; width:15px;"></td>  
							<td style="background-color:#ffffff;">
		                        <div class="container">
		            
		                            <?php if(have_posts()) :
										$i = 0;
									?>
		                            <?php while(have_posts()) : the_post(); ?>
		            					
										<?php if($i < 5): ?>
		
											<div class="post_mobile <?php echo (($i < 5) ? 'hot-news news-' . $i : '') ?>" id="post-<?php the_ID(); ?>">
												<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
													<div class="big-thumb" style="background-image: url('<?php echo catch_that_image(); ?>');">
													</div>											
		                                            <div class="post_the_title">
		                                                <h2><?php the_title(); ?></h2>
		                                            </div>
												</a>       	
		                                    </div> 
											
										<?php else: ?>
											<div class="post_mobile list" id="post-<?php the_ID(); ?>">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<div class="small-thumb" style="background: url('<?php echo catch_that_image(); ?>') no-repeat top center; 	background-size: 100% 100%;">
													</div>
												</a>
		                                        <div class="post_the_title">
		                                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		           	                         	</div>
												<div class="entry">                        
													<div class="postmetadata">
														<div class="post_the_date">
			                                                <?php echo timeAgo(get_the_time('Y/m/d h:i:s'));//  the_time('d/m/y'); ?>
			                                            </div>
													</div>
												</div>  	
		                                    </div> 										
										
										
										<?php endif;
											$i++;
										?> 
		           
		            
		                            <?php endwhile; ?>
		                            
		                               <div class="navigation">
		                                    <?php posts_nav_link(' &#124; ','&#171; Trang trước','Trang sau &#187;'); ?>
		                               </div>               
		            
		                            <?php else : ?>
		            
		                                <div class="post" id="post-<?php the_ID(); ?>">
		                                    <h2><?php _e('No posts are added.'); ?></h2>
		                                </div>
		            
		                            <?php endif; ?>
		                            
		                        </div>
			                </td>
			                <td style="background-color:#ffffff; width:15px; "></td>
			            </tr>
					<?php else: ?>
						<tr>
							<td colspan="3">
								<h3 class="cat-name"><?php echo $category->cat_name ?></h3>
							</td>
						</tr>
			            <tr>
			            	<td style="background-color:#ffffff; width:15px;"></td>  
							<td style="background-color:#ffffff;">
		                        <div class="container">
		            
		                            <?php if(have_posts()) : ?>
		                            <?php while(have_posts()) : the_post(); ?>
 
											<div class="post_mobile list" id="post-<?php the_ID(); ?>">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<div class="small-thumb" style="background: url('<?php echo catch_that_image(); ?>') no-repeat top center; 	background-size: 100% 100%;">
													</div>
												</a>
		                                        <div class="post_the_title">
		                                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		           	                         	</div>
												<div class="entry">                        
													<div class="postmetadata">
														<div class="post_the_date">
			                                                <?php echo timeAgo(get_the_time('Y/m/d h:i:s'));//  the_time('d/m/y'); ?>
			                                            </div>
													</div>
												</div>  	
		                                    </div> 									
		                            <?php endwhile; ?>
		                            
		                               <div class="navigation">
		                                    <?php posts_nav_link(' &#124; ','&#171; Trang trước','Trang sau &#187;'); ?>
		                               </div>               
		            
		                            <?php else : ?>    
		                                <div class="post" id="post-<?php the_ID(); ?>">
		                                    <h2><?php _e('No posts are added.'); ?></h2>
		                                </div>
		                            <?php endif; ?>
		                            
		                        </div>
			                </td>
			                <td style="background-color:#ffffff; width:15px; "></td>
			            </tr>
					<?php endif; ?>
		        </tbody>
		   	</table>  
        
        </div> 

        <?php get_footer(); ?>        