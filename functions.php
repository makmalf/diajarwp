<?php
/**
 * diajarwp functions and definitions
 *
 * @package diajarwp
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'diajarwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function diajarwp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on diajarwp, use a find and replace
	 * to change 'diajarwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'diajarwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'diajarwp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'diajarwp_custom_background_args', array(
		'default-color' => false,
		'default-image' => '',
	) ) );
}
endif; // diajarwp_setup
add_action( 'after_setup_theme', 'diajarwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function diajarwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'diajarwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	/* Widgets on Expanded Area */

	register_sidebar( array(
		'name'          => __( 'Expanded Area Col-1', 'diajarwp' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Expanded Area Col-2', 'diajarwp' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Expanded Area Col-3', 'diajarwp' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'diajarwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function diajarwp_scripts() {
	wp_enqueue_style( 'diajarwp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'diajarwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'diajarwp-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Load bootstrap assets
	wp_enqueue_style( 'diajarwp-bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_script( 'diajarwp-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.2', true );
}
add_action( 'wp_enqueue_scripts', 'diajarwp_scripts' );

/**
 * Register Custom Post Type shortWords
 */
function diajarwp_post_type_shortWords() {

	$labels = array(
		'name'                => _x( 'shortWords Items', 'Post Type General Name', 'diajarwp' ),
		'singular_name'       => _x( 'shortWords Item', 'Post Type Singular Name', 'diajarwp' ),
		'menu_name'           => __( 'shortWords', 'diajarwp' ),
		'parent_item_colon'   => __( 'Parent Item:', 'diajarwp' ),
		'all_items'           => __( 'All Items', 'diajarwp' ),
		'view_item'           => __( '', 'diajarwp' ),
		'add_new_item'        => __( 'Add New Item', 'diajarwp' ),
		'add_new'             => __( 'Add New', 'diajarwp' ),
		'edit_item'           => __( 'Edit Item', 'diajarwp' ),
		'update_item'         => __( 'Update Item', 'diajarwp' ),
		'search_items'        => __( 'Search Item', 'diajarwp' ),
		'not_found'           => __( 'Not found', 'diajarwp' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'diajarwp' ),
	);
	$args = array(
		'label'               => __( 'diajarwp_shortWords', 'diajarwp' ),
		'description'         => __( 'shortWords adalah quote alternatif', 'diajarwp' ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'shortWords', $args );

}

// Hook into the 'init' action
add_action( 'init', 'diajarwp_post_type_shortWords', 0 );

/**
 *
 * Add metaboxes 
 *
 */
function diajarwp_add_post_meta_boxes() {
	//Portfolio Postype
  	add_meta_box(
    	'diajarwp_metabox_shortWords',      // Unique ID
    	esc_html__( 'Quote Content', 'aegis' ),    // Title
    	'diajarwp_metabox_shortWords_view',   // Callback function
    	'shortWords',         // Admin page (or post type)
    	'normal',         // Context
    	'high'         // Priority
  	);
}

function diajarwp_setup_post_meta_boxes() {
  	add_action( 'add_meta_boxes', 'diajarwp_add_post_meta_boxes' );
  	add_action( 'save_post', 'diajarwp_save_meta_boxes', 10, 2 );
}
add_action( 'load-post.php', 'diajarwp_setup_post_meta_boxes' );
add_action( 'load-post-new.php', 'diajarwp_setup_post_meta_boxes' );

function diajarwp_metabox_shortWords_view( $object, $box ) { ?>
 
	<?php wp_nonce_field( basename( __FILE__ ), 'diajarwp_shortWords_nonce' ); ?>
 
	<p>
	<textarea name="shortWords_content" id="shortWords_content" class="widefat" cols="60" rows="4"><?php echo esc_attr( get_post_meta( $object->ID, 'shortWords_content', true ) ); ?>
	</textarea>
	</p>
 
<?php }

function diajarwp_save_meta_boxes( $post_id, $post ) {
	// Define nonce
	if ( !isset( $_POST['diajarwp_shortWords_nonce'] ) || !wp_verify_nonce( $_POST['diajarwp_shortWords_nonce'], basename( __FILE__ ) ) )
	return $post_id;
	$post_type = get_post_type_object( $post->post_type );
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	return $post_id;

	$new_meta_value_shortWords = ( isset( $_POST['shortWords_content'] ) ? wp_kses_post( $_POST['shortWords_content'] ) : '' );
	$meta_key_shortWords = 'shortWords_content';
	$meta_value_shortWords = get_post_meta( $post_id, $meta_key_shortWords, true );
	if ( $new_meta_value_shortWords && '' == $meta_value_shortWords )
	add_post_meta( $post_id, $meta_key_shortWords, $new_meta_value_shortWords, true );
	elseif ( $new_meta_value_shortWords && $new_meta_value_shortWords != $meta_value_shortWords )
	update_post_meta( $post_id, $meta_key_shortWords, $new_meta_value_shortWords );
	elseif ( '' == $new_meta_value_shortWords && $meta_value_shortWords )
	delete_post_meta( $post_id, $meta_key_shortWords, $meta_value_shortWords );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Bootstrap Navwalker
 * Credit: https://github.com/twittem/wp-bootstrap-navwalker
 */
require_once get_template_directory() . '/assets/wp_bootstrap_navwalker.php';

/**
 * Include wptutsid's indie functionalities.
 */
//include get_template_directory() . '/extras/extras-func.php';

