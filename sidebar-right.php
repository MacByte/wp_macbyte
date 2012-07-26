<?php
/**
 * The right Sidebar containing the widget area.
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */
?>
	<div id="right" class="widget-area col2" role="complementary">
		<ul class="xoxo">
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'right-widget-area' ) ) :
?>
<?php endif; // end right sidebar area ?>
		</ul>
	</div><!-- #right .widget-area -->
