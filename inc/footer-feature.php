<div class="btn-group dropup" role="group">

	<!-- Share Button -->
  	<button 
  		type="button dropdown-toggle" 
  		class="btn btn-default btn-lg noRadius noBorder"
  		data-toggle="dropdown" 
  		title="<?php __('Bagikan Artikel Ini', 'diajarwp'); ?>"  
  		aria-expanded="false">

  		<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
  	</button>

  	<ul class="dropdown-menu" role="menu">
    	<li>
			<div 
				class="fb-like" 
				data-href="<?php the_permalink(); ?>" 
				data-width="300" 
				data-layout="button_count" 
				data-action="like" 
				data-show-faces="true" 
				data-share="true">
			</div>
		</li>

		<li>
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="makmalf" data-size="large">Tweet</a>
		</li>

		<li>
			<div 
				class="g-plus" 
				data-action="share" 
				data-annotation="bubble" 
				data-height="24" 
				data-href="<?php the_permalink(); ?>">
			</div>
		</li>
  	</ul>

  	<?php if ( is_single() || comments_open() )  : ?>

  	<!-- Comment Button -->
	<button 
		type="button" 
		class="btn btn-default btn-lg noRadius noBorderTop noBorderBottom" 
		data-toggle="tooltip" 
		title="<?php echo get_comments_number( $post_id );?> <?php _e('Komentar', 'diajarwp');?>">

		<a href="<?php the_permalink(); ?>#respond" class="featureBtn">
			<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
		</a>
	</button>

	<?php endif;?>

	<?php $next_post = get_next_post();	if (!empty( $next_post ) && !is_page()) : ?>

	<!-- Read Next Button --> 
	<button 
		type="button" 
		class="btn btn-default btn-lg noRadius noBorderTop noBorderBottom noBorderRight" 
		data-toggle="tooltip" 
		title="<?php _e('Bacaan selanjutnya:', 'diajarwp'); ?> <?php echo $next_post->post_title; ?>">

		<a href="<?php echo get_permalink( $next_post->ID ); ?>">
			<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
		</a>
	</button>

  	<?php endif; ?>
</div>


