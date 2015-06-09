<?php
/**
 * @package diajarwp
 */

get_header(); ?>
	
	<?php start_contentWrapper(); ?>

			<?php $count = 0; ?>
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); $count++; ?>
				
					<?php 
						if( $count == 1 && has_post_thumbnail() && !is_paged() ) { 

							get_template_part('content', 'firstPost');

						} else { 
					
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						}

					?>

				<?php endwhile; ?>

				<?php 
					diajarwp_numeric_posts_nav(); 
					//the_posts_navigation(); 
				?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

	<?php end_contentWrapper() ?>

<?php get_footer(); ?>
