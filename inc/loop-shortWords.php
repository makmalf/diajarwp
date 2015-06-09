<?php $loop = new WP_Query( array( 'post_type' => 'shortWords', 'posts_per_page' => 1, 'orderby' => 'rand' ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<?php 
		$quoteContent = get_post_meta( get_the_ID(), 'shortWords_content', true );
		// check if the custom field has a value
		if( ! empty( $quoteContent ) ) {
			echo '<span id="shortWords">';
			echo '<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> ';
			echo '<i>"';
		  	echo $quoteContent;
		  	echo '"</i>';
		  	echo ' ~ ';
		  	the_title();
		  	echo '</span>';
		} 
	?>
<?php endwhile; wp_reset_query(); ?>