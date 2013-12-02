<?php $cat = current( (array) get_the_category() );?>

<h2><?php echo kvalue( $cat, 'name' ); ?></h2>
<?php if(has_post_thumbnail() ) : ?>
<figure> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(130,144)); ?></a> </figure>
<?php endif; ?>
<div>
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <div class="line"><span></span></div>
    <?php the_excerpt(); ?>
    <p class="post-meta"><span class="eye"><a href="#"><?php echo fw_get_post_views(get_the_id()); ?></a></span><span class="time"><?php the_time('h:iA');?></span><span class="talk"><a href="#"><?php comments_number( '0', '1', '%' ); ?></a></span> </p>
</div>
