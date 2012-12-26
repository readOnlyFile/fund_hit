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
