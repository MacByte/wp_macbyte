<?php
/**
 * The loop that displays the most recent 5 posts in the 'News' Category.
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
 * <code>get_template_part( 'latest-news', 'index' );</code>
 *
 * @package TWSS
 * @subpackage MacByte
 * @since MacByte 1.0
 */
?>
<h3><?php echo esc_html__( 'Latest News', 'macbyte'); ?></h3>
<div id="latest-news">
<?php /* We only want the most recent 5 'News' stories */ ?>
<?php query_posts('category=news&posts_per_page=1'); ?>
<?php if ( ! have_posts() ) : ?>
	No News
<?php endif; ?>

<?php while( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" class="news-post">
		<div <?php post_class(); ?>>
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'macbyte' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			<div class="entry-excerpt"><?php the_excerpt(); ?></div><!-- .entry-excerpt -->
		</div>
	</div><!-- #post-(id) -->
<?php endwhile; ?>
</div><!-- #latest-news -->