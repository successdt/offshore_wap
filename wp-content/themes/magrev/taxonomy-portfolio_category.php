<?php get_header(); ?>

<!-- Title bar -->
<div class="span12">
    
    <!-- Title bar -->
	<div class="title-bar"> <span><?php echo single_cat_title("", false);?></span>
       <?php echo  get_the_breadcrumb(); ?>
    </div>
    <!-- Title bar -->

</div>
<!-- Title bar -->


<div class="clearfix"></div>
<!-- portfolio 2colm -->

<div class="portfolio-wrap <?php echo $layout = str_replace('_','-',kvalue(  $_webnukes->get_options('sub_general'), 'portfolio_setting' )); ?> clearfix">

    <div class="container">
        <div class=" row clearfix" id="project-container">
            
            <?php 
            while ( have_posts() ) : the_post(); 
            $post_terms = get_the_terms( get_the_id(), 'portfolio_category' ); 
            $terms_class = '';
            if(!empty($post_terms)) {
                foreach($post_terms as $term)
                    $terms_class .= ' '. $term->slug;
            } ?>
            <?php if ($layout == 'two-colm') 
                    $span = 'span4';
                  else if ($layout == 'three-colm') 
                    $span = 'span3';
                  else 
                    $span = 'span6'; ?>
                <div class="<?php echo $span; ?> protfolio <?php echo $terms_class; ?> ">
                    <?php if(has_post_thumbnail()) : ?>
                        <figure>
                            <?php if ($layout == 'two-colm') 
                                    $size = array(374,248);
                                  else if ($layout == 'three-colm') 
                                    $size = array(260,180);
                                  else 
                                    $size = array(575,282); ?>
                            <a href="#"><?php the_post_thumbnail($size); ?></a>
                            <div class="overlay">
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_excerpt(); ?></p>
                                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                                $thumb_url = $thumb['0'];?>
                                <a class="zoom" href="<?php echo $thumb_url; ?>"></a><a class="pls" href="<?php the_permalink(); ?>"></a>
                            </div>
                        </figure>
                     <?php endif; ?>
                </div>
             <?php endwhile; ?>
            
        </div>
    </div>

</div>
                            <!-- portfolio 2colm -->



                            <!-- Main Content -->

<?php get_footer(); ?>