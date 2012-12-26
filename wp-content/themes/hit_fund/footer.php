<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
                <h2>哈尔滨工业大学基金会 版权所有</h2>
			</div>
			
			<a href="http://www.baidu.com"><div id="test"></div></a>
	</footer><!-- #colophon -->	
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
