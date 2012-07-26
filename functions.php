<?php
/**
 * MacByte functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, macbyte_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'macbyte_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 960;

/** Tell WordPress to run macbyte_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'macbyte_setup' );

if ( ! function_exists('macbyte_setup') ) :

function macbyte_setup() {
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'macbyte', TEMPLATEPATH . '/languages' );
	
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'left-navbar' => __( 'Navigation Left Bar', 'macbyte' ),
		'right-navbar'=> __( 'Navigation Right Bar', 'macbyte' ),
	) );
	
	// This theme allows users to set a custom background
	add_custom_background();
	
	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/logo.png' );
	
	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 198 ) );
	
	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	
	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );
	
	// ... and thus ends the changeable header business.
}

endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override macbyte_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since MacByte 1.0
 * @uses register_sidebar
 */
function macbyte_widgets_init() {
	/* Left widget sidebar */
	register_sidebar( array(
		'name' => __('Left Widget Area', 'macbyte'),
		'id' => 'left-widget-area',
		'description' => __( 'The left widget area', 'macbyte' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	/* Right widget sidebar */
	register_sidebar( array(
		'name' => __('Right Widget Area', 'macbyte'),
		'id' => 'right-widget-area',
		'description' => __( 'The right widget area', 'macbyte' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	/* Home Page bottom bar */
	register_sidebar( array(
		'name' => __('Homepage Widget Area', 'macbyte'),
		'id' => 'homepage-widget-area',
		'description' => __('Widget area at bottom of the Homepage', 'macbyte'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/* Grouped Pages widget sidebar */
	register_sidebar( array(
		'name' => __('Grouped Page Widget Area', 'macbyte'),
		'id' => 'groupedpage-widget-area',
		'description' => __('Left Widget Area for Grouped Pages', 'macbyte'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/* Right News widget sidebar */
	register_sidebar( array(
		'name' => __('Right News Widget Area', 'macbyte'),
		'id' => 'newsright-widget-area',
		'description' => __('Right Widget Area for News ONLY', 'macbyte'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/* Footer Left widget sidebar */
	register_sidebar( array(
		'name' => __('Footer Left Widget Area', 'macbyte'),
		'id' => 'footer-left-widget-area',
		'description' => __('Footer Left Widget Area', 'macbyte'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/* Footer Center widget sidebar */
	register_sidebar( array(
		'name' => __('Footer Center Widget Area', 'macbyte'),
		'id' => 'footer-center-widget-area',
		'description' => __('Footer Center Widget Area', 'macbyte'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	/* Footer Center widget sidebar */
	register_sidebar( array(
		'name' => __('Footer Right Widget Area', 'macbyte'),
		'id' => 'footer-right-widget-area',
		'description' => __('Footer Right Widget Area', 'macbyte'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running macbyte_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'macbyte_widgets_init' );

?>