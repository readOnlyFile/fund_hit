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
					<h1 class="page-title"><?php
						printf( __( '当前位置: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>
                <ul class = "post-list">
                <?php 
                    $args = array(
                        'posts_per_page' => 10,
                        'paged' => 1,
                        'category_name' => '捐赠档案',
                    );
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


			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
