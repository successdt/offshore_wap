<?php /* Template Name: Portfolio */
get_header(); ?>

  <!-- Title bar -->
<div class="span12">
        
	<div class="title-bar"> <span><?php global $post; echo $post->post_title;?></span>
       <?php echo  get_the_breadcrumb(); ?>
    </div>

</div>
    <!-- Title bar -->


    <div class="clearfix"></div>
    <!-- portfolio 2colm -->
    <div class="portfolio-wrap <?php echo $layout = str_replace('_','-',kvalue(  $_webnukes->get_options('sub_general'), 'portfolio_setting' )); ?> clearfix">

        <div class="container">
            <div class=" row clearfix" id="project-container">
                <?php 
				while ( have_posts() ) : the_post();  
					if ($layout == 'two-colm') 
						$span = 'span4';
					else if ($layout == 'three-colm') 
						$span = 'span3';
					else 
						$span = 'span6'; 
						
					$videos = get_post_meta(get_the_id(), 'wpnukes_videos');
					$images = get_post_meta(get_the_id(), 'wpnukes_gallery'); 
			
					if ($layout == 'two-colm') 
						$size = array(374,248);
					else if ($layout == 'three-colm') 
						$size = array(260,180);
					else 
						$size = array(575,282);
					
					if(!empty($images[0])):
						foreach($images[0] as $img) : ?>
						<div class="<?php echo $span; ?> protfolio ">
							<figure>	
								<a href="#">
									<img src="<?php $imgs = wp_get_attachment_image_src( $img, $size ); 
									echo $imgs[0];?>" />
								</a>
								<div class="overlay">
									<?php $thumb = wp_get_attachment_image_src( $img, 'large' );
									$thumb_url = $thumb['0'];?>
									<a class="zoom" href="<?php echo $thumb_url; ?>"></a>
								</div>
							</figure>
						</div>
					<?php endforeach;
					endif; 
					if(!empty($videos[0])):
						foreach($videos[0] as $vid) : //printr($vid);?>
						<div class="<?php echo $span; ?> protfolio ">
							<figure>	
								<a href="#"><img src="<?php echo $vid['thumb'];?>" /></a>
								
								<div class="overlay">
									<?php if( kvalue( $vid, 'source') == 'vimeo'): ?>
										<a class="zoom" href="<?php echo 'http://youtube.com/watch?v='. kvalue($vid, 'id') .''; ?>"></a>
									<?php elseif( kvalue( $vid, 'source') == 'youtube'): ?>
										<a class="zoom" href="<?php echo 'http://vimeo.com/'. kvalue($vid, 'id') .''; ?>"></a>
									<?php endif; ?>
								</div>
							</figure>
						</div>
					<?php endforeach;
					endif; ?>
            <?php endwhile; ?>
                
            </div>
        </div>

    </div>
                            <!-- portfolio 2colm -->



                            <!-- Main Content -->


<div class="span3">
	<div class="sidebar"> 
		<?php  global $_webnukes; 
		$settings = $_webnukes->get_options( 'sub_sidebars_settings' );
		dynamic_sidebar( kvalue( $settings, 'gallery' ) ); ?> 
    </div>
</div>
		    

<?php get_footer(); ?>