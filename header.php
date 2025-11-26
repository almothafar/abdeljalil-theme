<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar-modern" role="navigation">
	<div class="navbar-end">
		<div class="social-icons">
			<?php
			$github = get_theme_mod( 'almothafar_github', 'almothafar' );
			$linkedin = get_theme_mod( 'almothafar_linkedin', 'almothafar' );
			$twitter = get_theme_mod( 'almothafar_twitter', 'almothafar' );
			$facebook = get_theme_mod( 'almothafar_facebook', 'almothafar' );
			$steam = get_theme_mod( 'almothafar_steam', 'almothafar' );
			$youtube = get_theme_mod( 'almothafar_youtube', 'almothafar' );

			if ( ! empty( $github ) ) :
			?>
				<a href="https://github.com/<?php echo esc_attr( $github ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="GitHub">
					<i class="fab fa-github"></i>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $linkedin ) ) : ?>
				<a href="https://linkedin.com/in/<?php echo esc_attr( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn">
					<i class="fab fa-linkedin-in"></i>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $twitter ) ) : ?>
				<a href="https://x.com/<?php echo esc_attr( $twitter ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="X">
					<i class="fab fa-x-twitter"></i>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $facebook ) ) : ?>
				<a href="https://fb.me/<?php echo esc_attr( $facebook ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="Facebook">
					<i class="fab fa-facebook-f"></i>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $youtube ) ) : ?>
				<a href="https://youtube.com/@<?php echo esc_attr( $youtube ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="YouTube">
					<i class="fab fa-youtube"></i>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $steam ) ) : ?>
				<a href="https://steamcommunity.com/id/<?php echo esc_attr( $steam ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="Steam">
					<i class="fab fa-steam"></i>
				</a>
			<?php endif; ?>
		</div>
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

<div class="site-wrapper">
