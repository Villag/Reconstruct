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

		<form id="new-project" method="post" enctype="multipart/form-data" class="text-center">
		    <p><input type="text" name="post_title" value="Sample post title" /></p>
			<p><input name="reconstruct_original_image" type="file" style="margin:0 auto;"/></p>
			<p><input name="reconstruct_revised_image" type="file" style="margin:0 auto;"/></p>
		    <p><button>Submit</button></p>
		</form>

		<hr>

		<div class="hfeed">

			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // enterprise_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // enterprise_open_entry ?>

<?php

$reconstruct_original_image_id = get_post_meta( get_the_ID(), '_reconstruct_original_image', true );
$reconstruct_revised_image_id = get_post_meta( get_the_ID(), '_reconstruct_revised_image', true );

$original_image = wp_get_attachment_image_src( $reconstruct_original_image_id, 'large' );
$revised_image = wp_get_attachment_image_src( $reconstruct_revised_image_id, 'large' );

 ?>

<div class="before-after">
 <div><img alt="before" src="<?php echo $original_image[0]; ?>" width="<?php echo $original_image[1]; ?>" height="<?php echo $original_image[2]; ?>"></div>
 <div><img alt="after" src="<?php echo $revised_image[0]; ?>" width="<?php echo $revised_image[1]; ?>" height="<?php echo $revised_image[2]; ?>"></div>
</div>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published]', 'enterprise' ) . '</div>' ); ?>

						<div class="entry-summary">
							<?php the_excerpt(); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'enterprise' ), 'after' => '</p>' ) ); ?>
						</div><!-- .entry-summary -->

						<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'enterprise' ) . '</div>' ); ?>

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