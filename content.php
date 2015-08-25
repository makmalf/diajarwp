<?php
/**
 * @package diajarwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-rest post-feed'); ?>>

	<?php if(has_post_thumbnail()) : 
		echo '<div class="row">';
		echo '<div class="col-md-3 col-sm-3 hidden-xs">';
		the_post_thumbnail('thumbnail'); 
		echo '</div>';
		echo '<div class="col-md-9 col-sm-9">';
		else : 
			if(!in_category('snippets')) :
			echo '<div class="row">';
			echo '<div class="col-md-3 col-sm-3 hidden-xs">';
			echo '<img src="'.get_template_directory_uri() . '/img/no-feat.png'.'" alt="'.get_the_title().'" ">';
			echo '</div>';
			echo '<div class="col-md-9 col-sm-9">';
			endif;
	endif; ?>

	<header class="entry-header">
		
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php diajarwp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php if(!in_category('snippets')) : ?>
	<div class="entry-content">
		<?php
			the_excerpt();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'diajarwp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php if(has_post_thumbnail()) : 
			echo '</div>';
			echo '</div>';
	endif; ?>

	<footer class="entry-footer">
		<?php diajarwp_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if(in_category('snippets')) : ?>
	<div class="snippets-sign">
		<span class="glyphicon glyphicon-console" aria-hidden="true"></span>
	</div>
	<?php endif; ?>

</article><!-- #post-## -->