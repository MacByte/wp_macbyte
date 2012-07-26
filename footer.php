<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */

$current_year = date('Y');

?>
		<div class="push"></div>
	</div><!-- #main -->


</div><!-- #wrapper -->

<div id="footer" role="contentinfo">
	<div id="footer-widgets" class="table">
		<div class="table-row">
			<?php get_sidebar('footer-left'); ?>
			<?php get_sidebar('footer-center'); ?>
			<?php get_sidebar('footer-right'); ?>
		</div>
	</div><!-- #footer-widgets -->
	<div id="site-info" class="table">
		<div class="table-row">
			<div class="table-cell">
				<div>
					All content Copyright &copy; 2008-<?php echo $current_year ?>
					<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						MacByte.
					</a>
				</div>
				<div>
					Site created and designed by <a href="http://www.twss.co.uk" title="TWSS - Affordable Web/iPhone Development">TWSS</a>
				</div>
			</div>
		</div>
	</div><!-- #site-info -->
</div><!-- #footer -->


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
