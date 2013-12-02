<?php
/**
 * @version   $Id: postlist.php 10888 2013-05-30 06:32:18Z btowles $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

global $RokSprocket_plugin_path, $RokSprocket_plugin_url;
?>

<div style="margin: 0 auto;">
    <div>

        <div style="float:left;clear:none;">
            <?php echo $that->searchbox; ?>
        </div>
        <div style="float:right;clear:none;">
            <?php echo $that->typelist; ?>
            <?php echo $that->catlist; ?>
        </div>
    </div>
    <div style="clear:both;"></div>

    <table cellspacing="0" class="widefat" style="margin: 0 auto;">
        <thead>
        <tr>
            <th align="left">
                <span>Title</span>
                <a class="arrow_up"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('orderby' => 'title', 'order' => 'ASC'));?>"><img
                    src="<?php echo $that->images_path;?>bullet_arrow_up.png" width="16" height="16" alt="" title=""
                    style="vertical-align:middle;"/></a>
                <a class="arrow_down"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('orderby' => 'title', 'order' => 'DESC'));?>"><img
                    src="<?php echo $that->images_path;?>bullet_arrow_down.png" width="16" height="16" alt=""
                    title=""
                    style="vertical-align:middle;"/></a>
            </th>

            <th align="left">
                <span>Category</span>
            </th>

            <th align="left">
                <span>PostType</span>
                <a class="arrow_up"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('orderby' => 'post_type', 'order' => 'ASC'));?>"><img
                    src="<?php echo $that->images_path;?>bullet_arrow_up.png" width="16" height="16" alt="" title=""
                    style="vertical-align:middle;"/></a>
                <a class="arrow_down"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('orderby' => 'post_type', 'order' => 'DESC'));?>"><img
                    src="<?php echo $that->images_path;?>bullet_arrow_down.png" width="16" height="16" alt=""
                    title=""
                    style="vertical-align:middle;"/></a>
            </th>

            <th align="left">
                <span>Status</span>
            </th>

            <th align="left">
                <span>Date</span>
                <a class="arrow_up"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('orderby' => 'post_date', 'order' => 'ASC'));?>"><img
                    src="<?php echo $that->images_path;?>bullet_arrow_up.png" width="16" height="16" alt="" title=""
                    style="vertical-align:middle;"/></a>
                <a class="arrow_down"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('orderby' => 'post_date', 'order' => 'DESC'));?>"><img
                    src="<?php echo $that->images_path;?>bullet_arrow_down.png" width="16" height="16" alt=""
                    title=""
                    style="vertical-align:middle;"/></a>
            </th>
        </tr>

        </thead>
        <tbody>

        <?php $j = 0; foreach ($that->posts as $post) : $j++; ?>
        <tr class="<?php echo (($j % 2 == 0) ? 'alternate ' : '');?>iedit">
            <td>
                <a class="article-link"
                   href="#"
                   rel="<?php echo get_permalink($post->ID)?>"
                   title="<?php echo $post->post_title;?>"
                   pid="<?php echo $post->ID?>"
                   ptype="<?php echo $post->post_type?>"
                   onclick="if (window.parent) window.parent.jSelectUser_Sprocket('<?php echo $post->ID; ?>', '<?php echo addslashes($post->post_title);?>');">
                    <span><?php echo $post->post_title; ?></span></a>
            </td>
            <td>
                <?php $cats = get_the_category($post->ID);
                if ($cats):
                    $i = count($cats);
                    foreach ($cats as $cat):
                        $i--?>
                        <a class="thickbox"
                           href="<?php echo RokCommon_URL::updateParams($that->link, array('category' => $cat->cat_ID));?>">
                            <span><?php echo $cat->cat_name; ?></span></a>
                        <?php if ($i != 0) echo ', ';
                    endforeach; else:?>
                    <span>Not Available</span>
                    <?php endif;?>
            </td>
            <td>
                <a class="thickbox"
                   href="<?php echo RokCommon_URL::updateParams($that->link, array('post_type' => $post->post_type));?>">
                    <span><?php echo $post->post_type; ?></span></a>
            </td>
            <td>
                <span><?php echo $post->post_status; ?></span>
            </td>
            <td>
                <span><?php echo $post->post_date; ?></span>
            </td>
        </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
        <tr>
            <td class="pagination" align="center">
                <div class="aligncenter"></div>
                <?php
                if ($that->total_pages > 1) {
                    for ($k = 1; $k <= $that->total_pages; $k++) {
                        if ($k == $that->paged) {
                            ?>
                            <span class=""><?php echo $k?></span>
                            <?php } else { ?>
                            <a class=""
                               href="<?php echo RokCommon_URL::updateParams($that->link, array('paged' => $k))?>"><?php echo $k?></a>
                            <?php
                        }
                    }
                }
                ?>
</div>
</td>
</tr>
</tfoot>
</table>
</div>


<div style="clear:both;"></div>
