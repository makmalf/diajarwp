<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package diajarwp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,700italic,700,500italic,500,400italic,900' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/img/favicon/favicon.ico'; ?>" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon.png'; ?>" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-57x57.png'; ?>" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-72x72.png'; ?>" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-76x76.png'; ?>" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-114x114.png'; ?>" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-120x120.png'; ?>" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-144x144.png'; ?>" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri() . '/img/favicon/apple-touch-icon-152x152.png'; ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class('diajarwp-body'); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'diajarwp' ); ?></a>

	<header id="masthead" class="site-header padding marginBottom" role="banner">
		<div class="container">
		<div class="row">

			<div class="col-md-4 site-branding">
				
					<?php if ( get_header_image() ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
						</a>
					<?php else: ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php endif; // End header image check. ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div><!-- .site-branding -->

			<div class="col-md-8">
				<nav class="navbar navbar-default" id="navSite" role="navigation">
					
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header site-branding">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-navigation">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand hidden-md hidden-lg hidden-sm" href="#">Menus</a>
					</div>

					<div id="site-navigation" class="collapse navbar-collapse">

						<?php
							wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => 'primary',
								'depth'             => 2,
								'container'         => '',
								'container_class'   => '',
								'container_id'      => '',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);
						?>

						<ul class="nav navbar-nav navbar-right">
							<li>
								<button class="btn btn-warning navbar-btn" data-toggle="modal" data-target="#widgetExpand">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</button>
							</li>
						</ul>

					</div>
					
				</nav>

				<div id="searchForm-header" class="text-right">
					<?php diajarwp_searchForm(); ?>
				</div>

			</div>

		</div><!-- .row -->
		</div><!-- .container-fluid  -->
	</header><!-- #masthead -->

	<!-- Modal -->
	<?php include get_template_directory() . '/inc/expanded-area.php'; ?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="row">