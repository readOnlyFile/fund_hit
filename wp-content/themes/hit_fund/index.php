<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>


		<div id="primary">
			<div id="content" role="main">


<!--************基金会简介***************-->
            <div id = "decription">
            <div class = "head"><span class = "head-name">基金会简介</span><label>Introduction</label><a href = "<?=get_page_link(get_page_by_title(get_hit_config('page.introduction.name'))->ID)?>" class="more">更多</a></div>
<p>
<?php bloginfo('description'); ?>
</p>
            </div> <!--end decription-->



<!--************新闻中心***************-->
            <div id = "news">
            <div class = "head"><span class = "head-name">新闻中心</span><label>News</label><a href = "<?=get_category_link(get_cat_ID(get_hit_config('cat.donate_archives.name')))?>" class = "more">更多</a></div>
<ul>
<?php 
$args = array(
    'posts_per_page' => 3,
    'paged' => 1,
    'category_name' => get_hit_config('cat.donate_archives.name'),
);
$query = new WP_Query($args);
$recent_posts = wp_get_recent_posts($query);
while($query->have_posts()):
    $query->next_post();
    $post_id = $query->post->ID;
    $post_title = urldecode($query->post->post_name);
    $post_time = $query->post->post_date;

?>
<li><?="[" . $post_time . "]  ";?><a href = "<?=get_permalink($post_id);?>" title = "<?=$post_title;?>"><?=$post_title;?></a></li>
<?php endwhile; ?>
</ul>

            </div><!-- # news-->


<!--************快速通道****************-->
            <div id = "fast-trace">
                <div class = "head"><span class = "head-name">快速通道</span><label>Channel</label></div>
<?php 

    // 快速通道配置
$pagenames = get_hit_config('fast_way');

?>
            <ul>
<?php foreach($pagenames as $img => $name):
        $page_info = get_page_by_title($name);
?>
    <li><a href =  "<?=$page_info->guid;?>"><img src = "<?=get_template_directory_uri() .  '/images/links/' . $img;?>.jpg" /><?//=$page_info->post_title?></a></li>
<?php endforeach;?>
            <div style = "clear:both;"></div>
            </ul>

            </div> <!--fast-trace-->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php include('sidebar-home.php'); ?>
<?php get_footer(); ?>
