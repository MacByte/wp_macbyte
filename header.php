<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		// Add the blog name.
		wp_title( '|', true, 'right' ); 
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'macbyte' ), max( $paged, $page ) );

	?></title>
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/reset.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common.css" type="text/css" charset="utf-8">
	<style type="text/css" media="screen, projection">
			@import url(<?php echo get_stylesheet_directory_uri(); ?>/jq_fade.css);
	</style>		
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery.innerfade.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/retina.js"></script>
	
	<script type="text/javascript">
	$(document).ready(
		function(){
			$('#header_banner').innerfade({
				speed: '1000',
				timeout: 5000,
				type: 'sequence',
				containerheight: '350px'
			});
		}
	);
	</script>
<!-- Google Analytics -->	
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27246995-1']);
  _gaq.push(['_setDomainName', 'macbyte.co.uk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	<link media="screen and (min-device-width: 481px)" href="<?php echo get_stylesheet_directory_uri(); ?>/macbyte-screen.css" type="text/css" rel="stylesheet" charset="utf-8">
	<link media="only screen and (max-device-width: 480px)" href="<?php echo get_stylesheet_directory_uri(); ?>/macbyte-mobile.css" type="text/css" rel="stylesheet" charset="utf-8">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/macbyte-icon-iphone.png" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/macbyte-icon-ipad.png" sizes="72x72" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/macbyte-icon-iphone4.png" sizes="114x114" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	
	<div id="header" role="banner">
		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
		<<?php echo $heading_tag; ?> id="site-title">
			<img src="<?php header_image(); ?>" title="MacByte - supporting macs like never before" alt="MacByte - supporting macs like never before" />
		</<?php echo $heading_tag; ?>>
	</div><!-- #header -->
	
	<div id="access" role="navigation">
	  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
		<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'macbyte' ); ?>"><?php _e( 'Skip to content', 'macbyte' ); ?></a></div>
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
		<div class="menu-container">
			<?php wp_nav_menu( array(
				'container_class' => 'menu-header',
				'theme_location' => 'left-navbar',
				'before' => '<h5>',
				'after' => '</h5>') ); ?>
			<div class="splitter">|</div>
			<?php wp_nav_menu( array(
				'container_class' => 'menu-header',
				'theme_location' => 'right-navbar',
				'before' => '<h5>',
				'after' => '</h5>') ); ?>
		</div>
	</div><!-- #access -->
	
	<div id="main">