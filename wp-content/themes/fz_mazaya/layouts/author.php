<div id="system">

	<h1 class="page-title"><?php _e('Author Archive', 'warp'); ?></h1>

	<?php the_post(); ?>

	<?php if (get_the_author_meta('description')) : ?>
	<section class="author-box clearfix">

		<?php echo get_avatar(get_the_author_meta('user_email')); ?>
		
		<h3 class="name"><?php the_author(); ?></h3>
		
		<div class="description"><?php the_author_meta('description'); ?></div>
		
		
					<div class="profile-links">
 
    <ul class="social-links">
        <?php if ( get_the_author_meta( 'twitter' ) != '' )  { ?>
            <li><a class="twitter-link" href="https://twitter.com/<?php echo wp_kses( get_the_author_meta( 'twitter' ), null ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Twitter', 'warp'), get_the_author() ); ?>"><i class="icon-twitter"></i></a></li>
        <?php } ?>
 
        <?php if ( get_the_author_meta( 'facebook' ) != '' )  { ?>
            <li><a class="facebook-link" href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Facebook', 'warp'), get_the_author() ); ?>"><i class="icon-facebook"></i></a></li>
        <?php } ?>
 
        <?php if ( get_the_author_meta( 'linkedin' ) != '' )  { ?>
            <li><a class="linkedin-link" href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" title="<?php printf( esc_attr__( 'Connect with %s on LinkedIn', 'warp'), get_the_author() ); ?>"><i class="icon-linkedin"></i></a></li>
        <?php } ?>
 
        <?php if ( get_the_author_meta( 'googleplus' ) != '' )  { ?>
            <li><a class="google-link" href="<?php echo esc_url( get_the_author_meta( 'googleplus' ) ); ?>" title="<?php printf( esc_attr__( 'Follow %s on Google+', 'warp'), get_the_author() ); ?>"><i class="icon-google-plus"></i></a></li>
        <?php } ?>
    </ul>
 
 
</div>

	</section>
	<?php endif; ?>

	<?php rewind_posts(); ?>
	<?php if (have_posts()) : ?>
	
		<?php echo $this->render('_posts'); ?>
		
		<?php echo $this->render("_pagination", array("type"=>"posts")); ?>
		
	<?php endif; ?>

</div>
