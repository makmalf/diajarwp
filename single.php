<?php
/**
 * The template for displaying all single posts.
 *
 * @package diajarwp
 */

get_header(); ?>

<?php start_contentWrapper(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php diajarwp_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

<?php end_contentWrapper(); ?>

<?php get_footer(); ?>
