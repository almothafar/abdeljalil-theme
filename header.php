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

<nav class="navbar-modern" role="navigation">
	<div class="navbar-end">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'menu',
			'container'      => false,
			'fallback_cb'    => 'wp_page_menu',
		) );
		?>
	</div>

	<div class="navbar-start">
		<?php get_search_form(); ?>
	</div>
</nav>

<header class="site-header" role="banner" style="background-image: url(<?php header_image(); ?>);">
	<?php if ( display_header_text() ) : ?>
		<div class="header-content">
			<div class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		</div>
	<?php endif; ?>
</header>

<div id="wrapper">
