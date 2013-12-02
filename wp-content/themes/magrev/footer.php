					<div class="clearfix"></div>
                    </div>
                    <div class="row">

                        <footer class="clearfix">
            				<?php dynamic_sidebar( 'footer-sidebar1' );?>
                        </footer>

                        <div class="footer-bottom clearfix">
                            <div class="span6">
                                <p><?php echo $GLOBALS['_webnukes']->get_options('sub_footer_settings', 'copyrights'); ?></p>
                            </div>
                            <div class="span6 bottom-errow">
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Scripts -->
           <div class="fw-overlap"></div>
           <div class="fw-ajax-response"></div>
           <?php wp_footer(); ?>
    </body>
</html>