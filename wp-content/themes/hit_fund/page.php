<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary" class = "primary-big">
			<div id="content" role="main">

                <?php 
                    while ( have_posts() ) :
                        the_post(); 

                        // 把该页面下的所有子页面的链接都显示在文章上面
                        // 如果没有子页面，就显示和该也面同级的页面 ，顶级页面除外

                        $pid = $post->ID; //该页面ID

                        $parent_id = $post->post_parent; //父页面id

                        $args = array(
                            'post_type' => 'page',
                            'post_parent' => $pid,
                            'order' => 'ASC'
                        );
                        $children_array = get_children($args);

                        // 判断，如果没有子页面，并且也不是一个顶级页面
                        if (! $children_array && $parent_id != 0) {
                            $args = array(
                                'post_type' => 'page',
                                'post_parent' => $parent_id,
                                'order' => 'ASC'
                            );
                            $children_array = get_children($args);
                        }

                        echo "<div id = 'related-page'>";

                        foreach($children_array as $post) { ?>

                            <a href = "<?=$post->guid?>" class = "<?=($pid == $post->ID)?'current-page':'';?>"><?=$post->post_title?></a>

                        <?php } ?>
                        <div class = "clear"></div>
                        </div> <!--related-page-->

					<?php get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar();?>

<?php get_footer(); ?>
