<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav id="navbar" role="navigation">
	<div id="n-right">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'menu',
			'container'      => false,
			'fallback_cb'    => 'wp_page_menu',
		) );
		?>
	</div>

	<div id="n-left">
		<?php get_search_form(); ?>
	</div>
</nav>

<header id="header" role="banner">
	<div id="header-image" style="background-image: url(<?php header_image(); ?>);">
		<?php if ( display_header_text() ) : ?>
			<div id="blog-name">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div>
			<div id="description"><?php bloginfo( 'description' ); ?></div>
		<?php endif; ?>
	</div>
</header>

<div id="wrapper">
