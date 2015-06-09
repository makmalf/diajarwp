<?php
/**
 * @package diajarwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>>
	<header class="entry-header">
		<?php diajarwp_breadcrumb(); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php diajarwp_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if(!has_post_thumbnail()) { ?>
	
	<?php } ?>

	<div class="entry-content">

		
		<?php 
			if(has_post_thumbnail()) : 
				echo '<div class="img-head">';
				the_post_thumbnail('full'); 
				echo '</div>';
		endif; ?>
			
		

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'diajarwp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<hr/>

	<footer class="entry-footer">
		<?php diajarwp_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<hr/>
</article><!-- #post-## -->
