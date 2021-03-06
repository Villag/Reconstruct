<?php
/**
 * Home Template
 *
 * This is the home template.  Technically, it is the "posts page" template.  It is used when a visitor is on the
 * page assigned to show a site's latest blog posts.
 *
 * @package Enterprise
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // enterprise_before_content ?>

	<div id="content" class="<?php echo enterprise_get_layout( 'content' ); ?>">

		<?php do_atomic( 'open_content' ); // enterprise_open_content ?>

		<div class="hfeed">

			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // enterprise_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // enterprise_open_entry ?>

						<?php get_template_part( 'before-after' ); ?>

						<div class="project-bar">

							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title] by [entry-author]' ); ?>

							<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-comments-link]', 'enterprise' ) . '</div>' ); ?>

							<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "]', 'enterprise' ) . '</div>' ); ?>

						</div><!-- .project-bar -->

						<?php do_atomic( 'close_entry' ); // enterprise_close_entry ?>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // enterprise_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // enterprise_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // enterprise_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>