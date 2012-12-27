<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary" class="primary-big">
			<div id="content" role="main">

				<header class="page-header">

				<p>当前位置: <a href="http://fund.hit.edu.cn/" title="首页">首页</a>&gt;&gt;<?php $categorys = get_the_category(); $category = $categorys[0];echo(get_category_parents($category->term_id,true,'')); ?></p>
					<h1 class="page-title">

					</h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>
                <ul class = "post-list">
                <?php 

                    $args = array(
                        'posts_per_page' => (int)get_option('posts_per_page'),
                        'paged' => 1,
                        'cat' => $cat,
                    );
                    
                    if ($paged) 
                        $args['paged'] = $paged;
                    $query = new WP_Query($args);
                    $recent_posts = wp_get_recent_posts($query);
                    $i = 1;
                    while($query->have_posts()):
                        $query->next_post();
                        $post_id = $query->post->ID;
                        $post_title = urldecode($query->post->post_name);
                        $post_time = $query->post->post_date;
                ?>
                        <li class="<?=$i++ % 2 == 0?'even':'odd';?>"><span class = "post-date"><?="[" . substr($post_time, 0, 10) . "]  ";?></span><a href = "<?=get_permalink($post_id);?>" title = "<?=$post_title;?>"><?=$post_title;?></a></li>

				<?php endwhile; ?>
                </ul>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span>上一页 ', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php next_posts_link( __( '下一页 <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
                <?php 
                        //echo get_posts_nav_link(array('sep' => '   ')); 
                ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
