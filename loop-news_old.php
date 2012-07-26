<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'macbyte' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'macbyte' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'macbyte' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested content. Perhaps searching will help find a related post.', 'macbyte' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<div class="page-title"><h1><?php single_cat_title(); ?></h1></div>

<?php
	/* Start the Loop.
	 *
	 * In MacByte theme we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
	/* The News Category (slightly different rendering)
	*/ ?>

	<?php if ( in_category( _x('news', 'news category slug', 'macbyte') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" class="news-post">
			<div <?php post_class(); ?>>
				<?php if ( is_single() ) : ?>
				<div <?php post_class(); ?>>
					<div class="post-title"><h1><?php the_title(); ?></h1></div>
					<div class="post-content"><?php the_content(); ?></div>
				</div>
				<?php else : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'macbyte' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry-excerpt">
					<?php the_content(); ?>
				</div><!-- .entry-excerpt -->
				<?php endif; ?>
			</div><!-- <?php post_class(); ?> -->
		</div><!-- #post-<?php the_ID(); ?> -->
	<?php else : ?>

		<?php if ( is_single() ) : ?>
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
		<?php if ( is_page() ) : ?>
			<div class="page-container">
				<div <?php post_class(); ?>>
					<div class="page-title"><h1><?php the_title(); ?></h1></div>
					<div class="page-content"><?php the_content(); ?></div>
				</div>
			</div>
		<?php endif; ?>

	<?php endif; ?>
	

<?php endwhile; // End the loop. Whew. ?>



<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'macbyte' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'macbyte' ) ); ?></div>
	</div><!-- #nav-below -->
<?php endif; ?>
