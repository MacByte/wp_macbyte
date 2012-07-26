<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */

$pagesize = (get_query_var('posts_per_page')) ? get_query_var('posts_per_page') : 2;
$page = get_query_var('page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$new_query_string = $query_string . "&posts_per_page=$pagesize&paged=$paged";

get_header(); ?>

<?php query_posts( $new_query_string );?>
<!-- 



wp_query:

<?php print_r($wp_query); ?>

 -->

		<div id="container">
			<div id="fixed">
				<div class="colmask twocol">
					<div class="colleft">
						<div class="centerwrap">
							<div id="content" class="center" role="main">
								<?php
								/* Run the loop to output the posts.
								 * If you want to overload this in a child theme then include a file
								 * called loop-news.php and that will be used instead.
								 */
								 get_template_part( 'loop', 'news' );
								?>
							</div><!-- #content -->
						</div><!-- .centerwrap -->
						<?php get_sidebar('newsright'); ?>
					</div><!-- .colleft -->
				</div><!-- .twocol -->
			</div><!-- #fixed -->
		</div><!-- #container -->
		
<?php get_footer(); ?>
