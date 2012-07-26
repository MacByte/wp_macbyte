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
				<div class="colmask onecol">
					<div class="colmid">
						<div class="colleft">
							<div class="centerwrap">
								<div id="content" class="center" role="main">
									<?php if ( is_single() ) : the_post() ?>
									<div class="post-container">
										<div <?php post_class(); ?>>
											<div class="post-title"><h1><?php the_title(); ?></h1></div>
											<div class="post-content"><?php the_content(); ?></div>
										</div>
									</div>
									<?php endif; ?>
									<?php
									/**
									 * Display static page content, if that's what this is
									 * TODO: Move this to separate 'page.php'
									 */ ?>
									<?php if ( is_page() ) : the_post() ?>
									<div class="post-container">
										<div <?php post_class(); ?>>
											<div class="post-title"><h1><?php the_title(); ?></h1></div>
											<div class="post-content"><?php the_content(); ?></div>
										</div>
									</div>
									<?php endif; ?>
									<?php
									/**
									 * Display the latest news on front page only
									 * TODO: Move this into separate 'front-page.php'
									 */ ?>
									<?php
										if ( is_home() || is_front_page() ) {
											get_sidebar('home');
										}
									?>
								</div><!-- #content -->
								<?php get_sidebar('left'); ?>
								<?php get_sidebar('right'); ?>
							</div><!-- .centerwrap -->
						</div><!-- .colleft -->
					</div><!-- .colmid -->
				</div><!-- .threecol -->
			</div><!-- #fixed -->
		</div><!-- #container -->
		
<?php get_footer(); ?>
