<?php get_header();?>

<div class="container">
    <div class="row wrapper">
        <div class="span12 page-404">
            <span>404</span>
            <h3><?php echo __('Page Not Found', THEME_NAME);?></h3>
            <p><?php echo __('Sorry but the page you are looking for cannot be found.<br /> Please use search box to search anything or go back to <a href="'.home_url().'">Home page</a>.', THEME_NAME);?></p>
  
        </div>
    </div>
</div>
    
<?php get_footer();?>