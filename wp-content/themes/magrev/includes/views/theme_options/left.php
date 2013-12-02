<aside class="tb-bar-section">
        <ul class="tb-nav">
			<?php foreach($options as $k=>$v): ?>
                <li>	
                    <?php

                    if( kvalue( $v, 'SUB' ) ): ?>
                    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_<?php echo kvalue( $v, 'id');?>" href="#sub-<?php echo kvalue( $v, 'id');?>"><i class="icon-<?php echo kvalue($v, 'id');?>"></i><?php echo kvalue( $v, 'title');;?></a>
                        <!--Sub-menu-->
                        <ul id="sub-<?php echo kvalue( $v, 'id');?>" class="nav nav-stacked collapse">
                            <?php foreach($v['SUB'] as $sk=>$sv) :?>
                            <li>
                                <a href="<?php echo admin_url('themes.php?page=fw_theme_options&section='.kvalue( $v, 'id').'&subsection='.kvalue( $sv, 'id'));?>">
                                    <?php echo kvalue( $sv, 'title');?>
                                </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        
                    <?php else:?>
                        <a href="<?php echo admin_url('themes.php?page=fw_theme_options&section='.kvalue( $v, 'id'));?>">
                            <i class="icon-<?php echo kvalue( $v, 'id');?>"></i><?php echo kvalue( $v, 'title');?>
                        </a>
                    <?php endif;?>
                </li>
			<?php endforeach;?>
        </ul><!-- Settings Bar ends -->
</aside>