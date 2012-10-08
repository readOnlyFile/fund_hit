<?php
/**
 * Template Name: Sidebar Home Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>


		<div id="secondary" class = "widget-area" role = "complementary">
                <aside id = "home-recent-donate">
<h3 class = "head"><span class="head-name">最新捐赠</span></h3>
<?php 
if (! $year = get_hit_config('page.scroll_page.name'))
    $year = date("Y");
$page = get_page_by_title($year);

if (!$page) {
    $year = $year - 1;
    $page = get_page_by_title($year);
}
?>
<div id = "roll-content">
<div class = "words" onmouseover="clearInterval(handle)" onmouseout="handle = setInterval('move()', 50)">
<?php 
if ($page)
    echo $page->post_content; 
else 
    echo "对不起，没有捐赠记录";
?>
</div>
</div>
                </aside>
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
		</div><!-- #primary -->
<script type = "text/javascript">
var roll = document.getElementById("roll-content");
roll = roll.children[0];
var height = roll.offsetHeight - 200;
var i = 0;
function move() {

    if (i + height <= 0) {
        i = 0;
    } else {
        i--;
    }
    roll.style.top = i + "px";
}

var handle = setInterval("move()",50);
</script>
