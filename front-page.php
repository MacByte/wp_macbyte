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
				<div class="colmask thincol">
					<div class="colmid">
						<div class="colleft">
							<div class="centerwrap">
								<div id="content" class="center" role="main">
									<?php the_post() ?>
									<div class="post-container">
										<div <?php post_class(); ?>>
											<div class="post-content"><?php the_content(); ?></div>
										</div>
									</div>
									<div class="home-side table">
										<h3>Contact Us</h3>
										<a href="mailto:info@macbyte.co.uk">info@macbyte.co.uk</a>
										<p>47-49 Loveday Street,<br> 
										Birmingham, B4 6NR</p>
										<p>0121 285 0875</p>
									</div>
									<div class="home-bottom table">
										<div class="table-row">
											<div class="table-cell">
												<?php get_template_part( 'latest-news', 'index' ); ?>
												<a href="http://localhost:8888/macbyte/news">More…</a>
											</div>
											<!-- <div class="table-cell bottom-sidebar"> -->
												<?php //get_sidebar('home'); ?>
											<!-- </div>  -->
										</div>
									</div>
									<div class"home-side table">
											<h3>More Stuff...</h3>
											<a href="http://localhost:8888/macbyte/kb">Knowledge Base</a>
									</div>
									
									</div>
								</div><!-- #content -->
								<!-- Sidebars here -->
							</div><!-- .centerwrap -->
						</div><!-- .colleft -->
					</div><!-- .colmid -->
				</div><!-- .threecol -->
			</div><!-- #fixed -->
		</div><!-- #container -->
		
<?php get_footer(); ?>
