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

<nav class="navbar-modern">
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
					<?php echo almothafar_icon( 'github' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $linkedin ) ) : ?>
				<a href="https://linkedin.com/in/<?php echo esc_attr( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn">
					<?php echo almothafar_icon( 'linkedin-in' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $twitter ) ) : ?>
				<a href="https://x.com/<?php echo esc_attr( $twitter ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="X">
					<?php echo almothafar_icon( 'x-twitter' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $facebook ) ) : ?>
				<a href="https://fb.me/<?php echo esc_attr( $facebook ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="Facebook">
					<?php echo almothafar_icon( 'facebook-f' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $youtube ) ) : ?>
				<a href="https://youtube.com/@<?php echo esc_attr( $youtube ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="YouTube">
					<?php echo almothafar_icon( 'youtube' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( ! empty( $steam ) ) : ?>
				<a href="https://steamcommunity.com/id/<?php echo esc_attr( $steam ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="Steam">
					<?php echo almothafar_icon( 'steam' ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<div class="navbar-start">
		<?php get_search_form(); ?>
	</div>
</nav>

<header class="site-header"<?php if ( get_header_image() ) : ?> style="background-image: url(<?php echo esc_url( get_header_image() ); ?>);"<?php endif; ?>>
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
