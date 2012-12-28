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

  </div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<h2>哈尔滨市南岗区西大直街92号  电话：+86-451-86412114  P.C.:150001</h2>
 				<h2>Copyright&copy; 2012 哈尔滨工业大学教育发展基金会</h2>
			</div>
			
	</footer><!-- #colophon -->	
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
