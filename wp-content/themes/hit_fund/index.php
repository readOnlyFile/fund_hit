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

<!--------------图片滑动---------->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();  ?>/css/slides.global.css">
	
	<script src="<?php echo get_template_directory_uri();  ?>/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri();  ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri();  ?>/js/slides.min.jquery.js" type="text/javascript"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
<div id="example">
<!--<img src="img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">-->
<div id="slides">
	<div class="slides_container">
		<img src="./img/slide-1.jpg" width="210" height="170" alt="Slide 1">
		<img src="./img/slide-2.jpg" width="210" height="170" alt="Slide 2">
		<img src="./img/slide-3.jpg" width="210" height="170" alt="Slide 3">
	</div>
	<!--<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a> -->
	<!-- <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>  -->
</div>
<img src="img/example-frame.png"  alt="Example Frame" id="frame">
</div>


<!--************新闻中心***************-->
            <div id = "news">
            <div class = "head"><span class = "head-name">新闻中心</span><label>News</label><a href = "<?=get_category_link(get_cat_ID(get_hit_config('cat.news.name')))?>" class = "more">更多</a></div>
<ul>
<?php 
$args = array(
    'posts_per_page' => 5,
    'paged' => 1,
    'category_name' => get_hit_config('cat.news.name'),
);
$query = new WP_Query($args);
$recent_posts = wp_get_recent_posts($query);
while($query->have_posts()):
    $query->next_post();
    $post_id = $query->post->ID;
    $post_title = urldecode($query->post->post_name);
    $post_time = $query->post->post_date;

?>
<!-- <li><?="[" . $post_time . "]  ";?><a href = "<?=get_permalink($post_id);?>" title = "<?=$post_title;?>"><?=$post_title;?></a></li> -->
<li><a href = "<?=get_permalink($post_id);?>" title = "<?=$post_title;?>"><?=$post_title;?></a></li>
<?php endwhile; ?>
</ul>

            </div><!-- # news-->


<!--************公告栏***************-->
                <aside id = "home-recent-announce">
                <h3 class = "head" ><span class="head-name">公告栏</span><label>Notice</label><a href= "<?=get_category_link(get_cat_ID(get_hit_config('cat.announce.name')));?>" class="more">更多</a></h3>
<ul>
<?php 
$args = array(
    'posts_per_page' => 3,
    'paged' => 1,
    'category_name' => get_hit_config('cat.announce.name'),
);
$query = new WP_Query($args);
$recent_posts = wp_get_recent_posts($query);
while ($query->have_posts()):
    $query->next_post();
    $post_id = $query->post->ID;
    $post_title = urldecode($query->post->post_name);
?>
    <li><a href = "<?=get_permalink($post_id)?>" title = "<?=$post_title?>"><?=$post_title?></a></li>
<?php
endwhile;
?>
</ul>
                </aside>


<!--************基金会简介***************-->
          <!--  <div id = "decription"> -->
            <!--<div class = "head"><span class = "head-name">基金会简介</span><label>Introduction</label><a href = "<?=get_page_link(get_page_by_title(get_hit_config('page.introduction.name'))->ID)?>" class="more">更多</a></div>-->
<!--<p>-->
<!--<?php bloginfo('description'); ?>-->
<!--</p>-->
          <!--  </div> <!--end decription--> 





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
    <li><a href =  "<?=$page_info->guid;?>"><img width="106px" height="62px"src = "<?=get_template_directory_uri() .  '/images/links/' . $img;?>.jpg" /><?//=$page_info->post_title?></a></li>
<?php endforeach;?>
            <div style = "clear:both;"></div>
            </ul>

            </div> <!--fast-trace-->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php include('sidebar-home.php'); ?>
<?php get_footer(); ?>
