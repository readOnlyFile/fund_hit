<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

/*
 * array in the sidebar, the links are all display as images
 * images all in the folder "images/links/"
 * array(
      image name => page name,
      ....
 * )
 * */
$pagenames = get_hit_config('fast_way');
?>
<div id="secondary" class="widget-area" role="complementary" style = "width:14%">

        <aside id="sidebar-page">
            <ul>
<?php foreach($pagenames as $img => $name):
        $page_info = get_page_by_title($name);
?>
    <li><a href =  "<?=$page_info->guid?>"><img src = "<?=get_template_directory_uri() .  '/images/links/' . $img;?>.jpg" /><?//=$page_info->post_title?></a></li>
<?php endforeach;?>
            </ul>
        </aside>

</div><!-- #secondary .widget-area -->
