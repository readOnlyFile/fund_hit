<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary" class = "primary-big">
			<div id="content" role="main">

<p>当前位置: <a href="http://fund.hit.edu.cn/" title="首页">首页</a>&gt;&gt;<?php $categorys = get_the_category(); $category = $categorys[0];echo(get_category_parents($category->term_id,true,'>>')); ?> 阅读正文</p>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar();?>
<?php get_footer(); ?>
