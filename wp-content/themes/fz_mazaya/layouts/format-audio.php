<?php if (has_post_thumbnail()) : ?>
				<?php
				$width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
				$height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
				?>
				
				
								<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" title="<?php the_title(); ?>" data-spotlight="effect:top;" data-lightbox="on">
								<?php the_post_thumbnail('large', array('class' => 'size-auto')); ?>	
								<div class="overlay"><span class="wp-caption-text">  <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>  </span>    <?php the_title(); ?></div></a>
								
								
				
				<div class="post-audio">
                <audio src="<?php echo esc_attr(get_post_meta($post->ID, '_format_audio_embed', true)); ?>" width="100%"></audio>	
	            </div>
				
			<?php endif; ?>