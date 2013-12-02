<div class="post-gallery flexslider">
		<?php if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ ?>
		<ul class="slides">
			<?php foreach( $images as $image ) :  ?>
				<li><?php echo wp_get_attachment_link($image->ID, 'standard'); ?></li>
			<?php endforeach; ?>
		</ul>
		<?php } ?>
	</div>	

