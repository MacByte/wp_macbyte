<?php
/**
 * The Homepage Sidebar containing the widget area.
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */
?>
	<div id="bottom" class="widget-area table" role="complementary">
		<div class="xoxo table-row">
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'homepage-widget-area' ) ) :
?>
<?php endif; // end homepage sidebar area ?>
		</div>
	</div><!-- #bottom .widget-area -->
