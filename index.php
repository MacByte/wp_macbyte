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

get_header(); ?>

		<div id="container">
			<div id="fixed">
				<div class="colmask twocol">
					<div class="colmid">
						<div class="colleft">
							<div class="centerwrap">
								<div id="content" class="center" role="main">
									<div class="breadcrumbs">
									<?php
									if(function_exists('bcn_display'))
									{
									    bcn_display();
									}
									?>
									</div>
									<?php
									/* Run the loop to output the posts.
									 * If you want to overload this in a child theme then include a file
									 * called loop-index.php and that will be used instead.
									 */
									 get_template_part( 'loop', 'index' );
									?>
								</div><!-- #content -->
							</div><!-- .centerwrap -->
						</div><!-- .colleft -->
					</div><!-- .colmid -->
				</div><!-- .threecol -->
			</div><!-- #fixed -->
		</div><!-- #container -->

<?php get_footer(); ?>
