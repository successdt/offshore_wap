<?php get_header(); ?>

<!-- Main Content -->
<div class="span9">

    <!-- Title bar -->
   <div class="title-bar"> <span><?php	$tag = get_tag( get_query_var('tag_id') ); echo $tag->name;?></span>
       <?php echo  get_the_breadcrumb(); ?>
    </div>
    <!-- Title bar -->

								
	<?php $count = 0; 
	while ( have_posts() ) : the_post(); ?>

		<?php if( $count == 0 ):?>
        
            <div class="big-post clearfix">
                <?php get_template_part('content', 'featured');  ?>
            </div>
            
        <?php else: ?>
        
        	<?php $class = ( $count % 2 ) ? 'clearfix' : 'last'; ?>
            
            <div class="small-post <?php echo $class; ?>">
                <?php get_template_part('content'); ?>
            </div>
            
			<?php if( !($count % 2) ) echo '<div class="clearfix"></div>'; ?>
            
         <?php endif; 
		 
		 $count++;
		
	endwhile; ?>
    
    <?php fw_the_pagination(); ?>
    
</div>



<div class="span3">
	<div class="sidebar"> 
		<?php  global $_webnukes; 
		$settings = $_webnukes->get_options( 'sub_sidebars_settings' );
		dynamic_sidebar( kvalue( $settings, 'tag' ) ); ?> 
    </div>
</div>
		

				
<?php get_footer(); ?>