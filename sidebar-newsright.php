<?php
/**
 * The right News ONLY Sidebar containing the widget area.
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */
?>
	<div id="left" class="news widget-area col2" role="complementary">
		<ul class="xoxo">
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'newsright-widget-area' ) ) :
?>
<?php endif; // end right news sidebar area ?>
		</ul>
	</div><!-- #right .news.widget-area -->
