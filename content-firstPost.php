<article id="post-<?php the_ID(); ?>" <?php post_class('very1stPost post-feed'); ?>>
	<?php if(has_post_thumbnail()) : the_post_thumbnail('full'); endif; ?>
	<div class="content-very1stPost">
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
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Selengkapnya %s <span class="meta-nav">&rarr;</span>', 'diajarwp' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'diajarwp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-footer">
			<?php diajarwp_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

	<?php if(in_category('snippets')) : ?>
	<div class="snippets-sign">
		<i class="fa fa-file-code-o"></i>
	</div>
	<?php endif; ?>
</article>