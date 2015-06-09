<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package diajarwp
 */

/**
 * Breadcrumb
 */
function diajarwp_breadcrumb() {
    if (!is_home()) {
    	echo '<div class="breadcrumb">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo "</a> / ";
        if (is_category() || is_single()) {
            the_category(', ');
            
        }
        echo '</div>';
    }
}

/**
 * Wrapper Content and The Accesories: Sidebar :)
 */
function start_contentWrapper() { ?>
	<div class="col-md-9">
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
<?php }

function end_contentWrapper() { ?>
	</main><!-- #main -->
		</div><!-- #primary -->
	</div>

	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
<?php }

/**
 * Numeric Pagination
 */
function diajarwp_numeric_posts_nav() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
	  	return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**     Add current page to the array */
	if ( $paged >= 1 )
	  	$links[] = $paged;

	/**     Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
	 	 $links[] = $paged - 1;
	  	$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
	  	$links[] = $paged + 2;
	 	$links[] = $paged + 1;
	}

	echo '<div class="navigation marginTop marginBottom"><ul class="num-pagination">' . "\n";

	/**     Previous Post Link */
	if ( get_previous_posts_link() )
	  	printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**     Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
	  	$class = 1 == $paged ? ' class="active"' : '';

	  	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

	  	if ( ! in_array( 2, $links ) )
	       	echo '<li>…</li>';
	}

	/**     Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
	  	$class = $paged == $link ? ' class="active"' : '';
	  	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**     Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
	  	if ( ! in_array( $max - 1, $links ) )
	       	echo '<li>…</li>' . "\n";

	  	$class = $paged == $max ? ' class="active"' : '';
	  	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**     Next Post Link */
	if ( get_next_posts_link() )
	  	printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

function diajarwp_expandWidget_searchForm() { ?>
	<form class="search-form marginBottom" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search here…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<button type="submit" class="btn btn-link">
			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</button>
	</form>
<?php }

function diajarwp_searchForm() { ?>
	<form class="form-inline search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group">
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
			<input type="search" class="search-field form-control rgbaWhite" placeholder="<?php echo esc_attr_x( 'Search here…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		</div>
		<button type="submit" class="btn btn-link">
			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</button>
	</form>
<?php }

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'diajarwp' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'diajarwp' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'diajarwp' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'diajarwp_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function diajarwp_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'diajarwp' ); ?></h2>
		<div class="nav-links row">
			<div class="col-md-6 text-left">
				<?php previous_post_link( __( '<div class="label-nav"><i>Entry sebelumnya</i></div><div class="nav-previous">%link</div>', 'diajarwp'), '%title' ); ?>
			</div>

			<div class="col-md-6 text-right">
				<?php next_post_link( __( '<div class="label-nav"><i>Entry selanjutnya</i></div><div class="nav-next">%link</div>', 'diajarwp' ), '%title' ); ?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'diajarwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function diajarwp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'diajarwp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'diajarwp' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'diajarwp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function diajarwp_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'diajarwp' ) );
		if ( $categories_list && diajarwp_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>' . __( '%1$s', 'diajarwp' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'diajarwp' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>' . __( '%1$s', 'diajarwp' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		echo '<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>';
		comments_popup_link( __( 'Leave a comment', 'diajarwp' ), __( '1', 'diajarwp' ), __( '%', 'diajarwp' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'diajarwp' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'diajarwp' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'diajarwp' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'diajarwp' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'diajarwp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'diajarwp' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'diajarwp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'diajarwp' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'diajarwp' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'diajarwp' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'diajarwp' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'diajarwp' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'diajarwp' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'diajarwp' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'diajarwp' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function diajarwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'diajarwp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'diajarwp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so diajarwp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so diajarwp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in diajarwp_categorized_blog.
 */
function diajarwp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'diajarwp_categories' );
}
add_action( 'edit_category', 'diajarwp_category_transient_flusher' );
add_action( 'save_post',     'diajarwp_category_transient_flusher' );
