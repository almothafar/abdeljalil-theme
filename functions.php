<?php
/**
 * Abdeljalil Theme Functions
 *
 * Modernized for WordPress 6.8+ and PHP 8.4+
 *
 * @package Abdeljalil
 * @version 2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/***************************************************************
 * Theme Constants
 **************************************************************/
// Define theme dimensions as constants for use in PHP.
// Guarded so a child theme or plugin can define them first.
if ( ! defined( 'ALMOTHAFAR_HEADER_WIDTH' ) ) {
	define( 'ALMOTHAFAR_HEADER_WIDTH', 1200 );
}

if ( ! defined( 'ALMOTHAFAR_HEADER_HEIGHT' ) ) {
	define( 'ALMOTHAFAR_HEADER_HEIGHT', 190 );
}

if ( ! defined( 'ALMOTHAFAR_THUMBNAIL_WIDTH' ) ) {
	define( 'ALMOTHAFAR_THUMBNAIL_WIDTH', 1200 );
}

if ( ! defined( 'ALMOTHAFAR_THUMBNAIL_HEIGHT' ) ) {
	define( 'ALMOTHAFAR_THUMBNAIL_HEIGHT', 400 );
}

if ( ! defined( 'ALMOTHAFAR_CONTENT_WIDTH' ) ) {
	define( 'ALMOTHAFAR_CONTENT_WIDTH', 1200 );
}

/***************************************************************
 * Theme Setup
 **************************************************************/
function abdeljalil_theme_setup() {
	// Add theme support for HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add theme support for title tag
	add_theme_support( 'title-tag' );

	// Add theme support for post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( ALMOTHAFAR_THUMBNAIL_WIDTH, ALMOTHAFAR_THUMBNAIL_HEIGHT, true );

	// Add theme support for automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add theme support for custom background
	add_theme_support( 'custom-background', array(
		'default-color' => 'fbfbfb',
	) );

	// Add theme support for custom header
	add_theme_support( 'custom-header', array(
		'default-image'      => get_template_directory_uri() . '/images/headers/plane.jpg',
		'width'              => ALMOTHAFAR_HEADER_WIDTH,
		'height'             => ALMOTHAFAR_HEADER_HEIGHT,
		'flex-width'         => true,
		'flex-height'        => true,
		'header-text'        => true,
		'uploads'            => true,
	) );

	// Register default headers
	register_default_headers( array(
		'berries' => array(
			'url'           => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			'description'   => __( 'Berries', 'abdeljalil' ),
		),
		'cherryblossoms' => array(
			'url'           => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			'description'   => __( 'Cherry Blossoms', 'abdeljalil' ),
		),
		'fern' => array(
			'url'           => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			'description'   => __( 'Fern', 'abdeljalil' ),
		),
		'forestfloor' => array(
			'url'           => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			'description'   => __( 'Forest Floor', 'abdeljalil' ),
		),
		'inkwell' => array(
			'url'           => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			'description'   => __( 'Inkwell', 'abdeljalil' ),
		),
		'path' => array(
			'url'           => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			'description'   => __( 'Path', 'abdeljalil' ),
		),
		'sunset' => array(
			'url'           => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			'description'   => __( 'Sunset', 'abdeljalil' ),
		),
		'plane' => array(
			'url'           => '%s/images/headers/plane.jpg',
			'thumbnail_url' => '%s/images/headers/plane-thumbnail.jpg',
			'description'   => __( 'Plane', 'abdeljalil' ),
		),
	) );

	// Register navigation menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'abdeljalil' ),
	) );
}
add_action( 'after_setup_theme', 'abdeljalil_theme_setup' );

/***************************************************************
 * Theme Customizer - Social Media Links
 **************************************************************/
function almothafar_customize_register( $wp_customize ) {
	// Add Social Media Section
	$wp_customize->add_section( 'almothafar_social_section', array(
		'title'       => __( 'روابط التواصل الاجتماعي', 'abdeljalil' ),
		'description' => __( 'أدخل اسم المستخدم فقط، بدون الرابط الكامل', 'abdeljalil' ),
		'priority'    => 30,
	) );

	// GitHub
	$wp_customize->add_setting( 'almothafar_github', array(
		'default'           => 'almothafar',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'almothafar_github', array(
		'label'       => __( 'GitHub', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: github.com/almothafar', 'abdeljalil' ),
		'input_attrs' => array(
			'placeholder' => 'almothafar',
		),
	) );

	// LinkedIn
	$wp_customize->add_setting( 'almothafar_linkedin', array(
		'default'           => 'almothafar',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'almothafar_linkedin', array(
		'label'       => __( 'LinkedIn', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: linkedin.com/in/almothafar', 'abdeljalil' ),
		'input_attrs' => array(
			'placeholder' => 'almothafar',
		),
	) );

	// X (Twitter)
	$wp_customize->add_setting( 'almothafar_twitter', array(
		'default'           => 'almothafar',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'almothafar_twitter', array(
		'label'       => __( 'X', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: x.com/almothafar', 'abdeljalil' ),
		'input_attrs' => array(
			'placeholder' => 'almothafar',
		),
	) );

	// Facebook
	$wp_customize->add_setting( 'almothafar_facebook', array(
		'default'           => 'almothafar',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'almothafar_facebook', array(
		'label'       => __( 'Facebook', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: fb.me/almothafar', 'abdeljalil' ),
		'input_attrs' => array(
			'placeholder' => 'almothafar',
		),
	) );

	// Steam
	$wp_customize->add_setting( 'almothafar_steam', array(
		'default'           => 'almothafar',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'almothafar_steam', array(
		'label'       => __( 'Steam', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: steamcommunity.com/id/almothafar', 'abdeljalil' ),
		'input_attrs' => array(
			'placeholder' => 'almothafar',
		),
	) );

	// YouTube
	$wp_customize->add_setting( 'almothafar_youtube', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'almothafar_youtube', array(
		'label'       => __( 'YouTube', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم القناة فقط (مثال: almothafar) - يصبح الرابط: youtube.com/@almothafar', 'abdeljalil' ),
		'input_attrs' => array(
			'placeholder' => 'almothafar',
		),
	) );
}
add_action( 'customize_register', 'almothafar_customize_register' );

/***************************************************************
 * Theme Customizer - Header Text Colors
 **************************************************************/
function almothafar_header_colors_customize_register( $wp_customize ) {
	// Add Header Colors Section
	$wp_customize->add_section( 'almothafar_header_colors_section', array(
		'title'    => __( 'ألوان نصوص الترويسة', 'abdeljalil' ),
		'priority' => 35,
	) );

	// Site Title Color
	$wp_customize->add_setting( 'almothafar_site_title_color', array(
		'default'           => '#d32f2f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'almothafar_site_title_color', array(
		'label'   => __( 'لون عنوان الموقع', 'abdeljalil' ),
		'section' => 'almothafar_header_colors_section',
	) ) );

	// Site Description Color
	$wp_customize->add_setting( 'almothafar_site_description_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'almothafar_site_description_color', array(
		'label'   => __( 'لون وصف الموقع', 'abdeljalil' ),
		'section' => 'almothafar_header_colors_section',
	) ) );

	// Text Shadow Toggle
	$wp_customize->add_setting( 'almothafar_header_text_shadow', array(
		'default'           => true,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'almothafar_header_text_shadow', array(
		'label'   => __( 'تفعيل ظل النص', 'abdeljalil' ),
		'section' => 'almothafar_header_colors_section',
		'type'    => 'checkbox',
	) );
}
add_action( 'customize_register', 'almothafar_header_colors_customize_register' );

/***************************************************************
 * Apply Header Text Colors from Customizer
 **************************************************************/
function almothafar_header_text_colors_css() {
	// Defaulting to '' rather than a hex keeps the colour literals out of PHP:
	// an untouched setting emits nothing and style.css's :root value applies.
	// Re-validate on output too, since esc_attr() is an HTML escaper, not a CSS one.
	$title_color       = sanitize_hex_color( get_theme_mod( 'almothafar_site_title_color', '' ) );
	$description_color = sanitize_hex_color( get_theme_mod( 'almothafar_site_description_color', '' ) );
	$text_shadow       = get_theme_mod( 'almothafar_header_text_shadow', true );

	// Only overrides are emitted. style.css declares the defaults on :root, so
	// anything left at its default needs no declaration here and no !important
	// to win specificity -- and the shadow value itself lives in one place.
	$declarations = array();

	if ( $title_color ) {
		$declarations[] = '--header-title-color:' . $title_color;
	}

	if ( $description_color ) {
		$declarations[] = '--header-description-color:' . $description_color;
	}

	if ( ! $text_shadow ) {
		$declarations[] = '--header-text-shadow:none';
	}

	if ( ! $declarations ) {
		return;
	}

	wp_add_inline_style( 'abdeljalil-style', ':root{' . implode( ';', $declarations ) . ';}' );
}
add_action( 'wp_enqueue_scripts', 'almothafar_header_text_colors_css', 20 );

/***************************************************************
 * Register Sidebar
 **************************************************************/
function abdeljalil_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'السايدبار', 'abdeljalil' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'abdeljalil' ),
		// One element opened, one closed. after_title used to open a .list-content
		// wrapper that after_widget closed, but WordPress omits both title arguments
		// when a widget has no title -- the default for several core widgets -- and
		// the unmatched </div> then closed the sidebar itself, throwing every later
		// widget out of it. Nothing can wrap only the widget body: there is no hook
		// that fires after the title and also fires when there is no title. The gap
		// .list-content provided lives on .widgettitle in style.css instead.
		'before_widget' => '<div class="%2$s sidebox" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widgettitle">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'abdeljalil_widgets_init' );


/***************************************************************
 * Enqueue Scripts and Styles
 **************************************************************/
function abdeljalil_scripts() {
	// Enqueue main stylesheet
	wp_enqueue_style( 'abdeljalil-style', get_stylesheet_uri(), array(), '2.1' );

	// Enqueue comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'abdeljalil_scripts' );

/***************************************************************
 * Preload the Header Image
 **************************************************************/
// The header image is normally the LCP element, but it is applied as an inline
// background-image, which the preload scanner cannot see. Announce it early.
function almothafar_preload_header_image() {
	$header_image = get_header_image();

	if ( ! $header_image ) {
		return;
	}

	printf(
		'<link rel="preload" as="image" href="%s" fetchpriority="high" />' . "\n",
		esc_url( $header_image )
	);
}
add_action( 'wp_head', 'almothafar_preload_header_image', 2 );

/***************************************************************
 * Inline SVG Icons
 **************************************************************/
/**
 * Return one of the theme's nine icons as inline SVG.
 *
 * The theme draws nine pictures. Font Awesome charged 318 KB for them -- a
 * render-blocking cross-origin stylesheet plus two complete icon fonts of
 * several thousand glyphs each -- and disclosed every visitor's IP address to
 * a CDN to do it. These are the same nine glyphs, taken from Font Awesome
 * Free 7.3.1, and they cost about 7 KB of markup with no request at all.
 *
 * Two of the class names the theme used had already been renamed upstream:
 * fa-search is the version 4 name for magnifying-glass, and fa-telegram-plane
 * the version 5 name for telegram. Both resolved only through Font Awesome's
 * v4 compatibility shim and would have vanished silently the day it is
 * dropped. The current names are what this table uses.
 *
 * The icons are decorative -- aria-hidden keeps them out of the accessibility
 * tree and focusable="false" keeps them out of the tab order, so the link or
 * button around each one supplies the name.
 *
 * The return value is a literal assembled from the table below; no caller
 * input reaches it, so it is echoed as-is.
 *
 * @param string $name Icon name, e.g. 'github'.
 * @return string Inline <svg> markup, or an empty string if $name is unknown.
 */
function almothafar_icon( $name ) {
	// The viewBox and the single path of each file, copied verbatim from
	// Font Awesome Free 7.3.1: svgs/brands/*.svg, and svgs/solid for
	// magnifying-glass. To replace an icon, copy those two values out of the
	// new file; nothing else in the SVG differs between them.
	$icons = array(
		'github'           => array(
			'view_box' => '0 0 512 512',
			'path'     => 'M216.5 362.5c-66-8-112.5-55.5-112.5-117 0-25 9-52 24-70-6.5-16.5-5.5-51.5 2-66 20-2.5 47 8 63 22.5 19-6 39-9 63.5-9s44.5 3 62.5 8.5c15.5-14 43-24.5 63-22 7 13.5 8 48.5 1.5 65.5 16 19 24.5 44.5 24.5 70.5 0 61.5-46.5 108-113.5 116.5 17 11 28.5 35 28.5 62.5l0 52C323 491.5 335.5 500 350.5 494 441 459.5 512 369 512 257 512 115.5 397 0 255.5 0S0 115.5 0 257c0 111 70.5 203 165.5 237.5 13.5 5 26.5-4 26.5-17.5l0-40c-7 3-16 5-24 5-33 0-52.5-18-66.5-51.5-5.5-13.5-11.5-21.5-23-23-6-.5-8-3-8-6 0-6 10-10.5 20-10.5 14.5 0 27 9 40 27.5 10 14.5 20.5 21 33 21s20.5-4.5 32-16c8.5-8.5 15-16 21-21z',
		),
		'linkedin-in'      => array(
			'view_box' => '0 0 448 512',
			'path'     => 'M100.3 448l-92.9 0 0-299.1 92.9 0 0 299.1zM53.8 108.1C24.1 108.1 0 83.5 0 53.8 0 39.5 5.7 25.9 15.8 15.8s23.8-15.8 38-15.8 27.9 5.7 38 15.8 15.8 23.8 15.8 38c0 29.7-24.1 54.3-53.8 54.3zM447.9 448l-92.7 0 0-145.6c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7l0 148.1-92.8 0 0-299.1 89.1 0 0 40.8 1.3 0c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3l0 164.3-.1 0z',
		),
		'x-twitter'        => array(
			'view_box' => '0 0 448 512',
			'path'     => 'M357.2 48L427.8 48 273.6 224.2 455 464 313 464 201.7 318.6 74.5 464 3.8 464 168.7 275.5-5.2 48 140.4 48 240.9 180.9 357.2 48zM332.4 421.8l39.1 0-252.4-333.8-42 0 255.3 333.8z',
		),
		'facebook-f'       => array(
			'view_box' => '0 0 320 512',
			'path'     => 'M80 299.3l0 212.7 116 0 0-212.7 86.5 0 18-97.8-104.5 0 0-34.6c0-51.7 20.3-71.5 72.7-71.5 16.3 0 29.4 .4 37 1.2l0-88.7C291.4 4 256.4 0 236.2 0 129.3 0 80 50.5 80 159.4l0 42.1-66 0 0 97.8 66 0z',
		),
		'youtube'          => array(
			'view_box' => '0 0 576 512',
			'path'     => 'M549.7 124.1C543.5 100.4 524.9 81.8 501.4 75.5 458.9 64 288.1 64 288.1 64S117.3 64 74.7 75.5C51.2 81.8 32.7 100.4 26.4 124.1 15 167 15 256.4 15 256.4s0 89.4 11.4 132.3c6.3 23.6 24.8 41.5 48.3 47.8 42.6 11.5 213.4 11.5 213.4 11.5s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zM232.2 337.6l0-162.4 142.7 81.2-142.7 81.2z',
		),
		'steam'            => array(
			'view_box' => '0 0 512 512',
			'path'     => 'M504 256c0 137-111.2 248-248.4 248-113.8 0-209.6-76.3-239-180.4l95.2 39.3c6.4 32.1 34.9 56.4 68.9 56.4 39.2 0 71.9-32.4 70.2-73.5l84.5-60.2c52.1 1.3 95.8-40.9 95.8-93.5 0-51.6-42-93.5-93.7-93.5s-93.7 42-93.7 93.5l0 1.2-59.2 85.7c-15.5-.9-30.7 3.4-43.5 12.1L8 236.1C18.2 108.4 125.1 8 255.6 8 392.8 8 504 119 504 256zM163.7 384.3l-30.5-12.6c5.6 11.6 15.3 20.8 27.2 25.8 26.9 11.2 57.8-1.6 69-28.4 5.4-13 5.5-27.3 .1-40.3S214 305.6 201 300.2c-12.9-5.4-26.7-5.2-38.9-.6l31.5 13c19.8 8.2 29.2 30.9 20.9 50.7-8.3 19.9-31 29.2-50.8 21zM337.5 129.8a62.3 62.3 0 1 1 0 124.6 62.3 62.3 0 1 1 0-124.6zm.1 109a46.8 46.8 0 1 0 0-93.6 46.8 46.8 0 1 0 0 93.6z',
		),
		'telegram'         => array(
			'view_box' => '0 0 512 512',
			'path'     => 'M256 8a248 248 0 1 0 0 496 248 248 0 1 0 0-496zM371 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5c-2.2 .5-37.1 23.5-104.6 69.1-9.9 6.8-18.9 10.1-26.9 9.9-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3 .6-4.5 6.7-9 18.4-13.7 72.3-31.5 120.5-52.3 144.6-62.3 68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9 2 1.7 3.2 4.1 3.5 6.7 .5 3.2 .6 6.5 .4 9.8z',
		),
		'whatsapp'         => array(
			'view_box' => '0 0 448 512',
			'path'     => 'M380.9 97.1c-41.9-42-97.7-65.1-157-65.1-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480 117.7 449.1c32.4 17.7 68.9 27 106.1 27l.1 0c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1s56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6zM325.1 300.5c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7s-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4s4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6z',
		),
		'magnifying-glass' => array(
			'view_box' => '0 0 512 512',
			'path'     => 'M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376C296.3 401.1 253.9 416 208 416 93.1 416 0 322.9 0 208S93.1 0 208 0 416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z',
		),
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	// Font Awesome Free's own attribution comment, kept in the output rather
	// than only in this file: CC BY 4.0 asks for attribution wherever the work
	// is distributed, and the rendered page is where these icons are
	// distributed.
	$attribution = '<!--! Font Awesome Free 7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2026 Fonticons, Inc. -->';

	return sprintf(
		'<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="%1$s" aria-hidden="true" focusable="false">%2$s<path fill="currentColor" d="%3$s"/></svg>',
		$icons[ $name ]['view_box'],
		$attribution,
		$icons[ $name ]['path']
	);
}

/***************************************************************
 * Social Sharing Buttons
 **************************************************************/
function abdeljalil_social_sharing_buttons() {
	if ( ! is_single() ) {
		return;
	}

	// add_query_arg() does NOT encode values -- build_query() calls
	// _http_build_query( $data, null, '&', '', false ), where that false is
	// $urlencode. Core's docblock says the caller must encode, so an unencoded
	// "&" in a post title would otherwise start a new query parameter.
	$post_url   = rawurlencode( get_permalink() );
	$post_title = rawurlencode( get_the_title() );

	$facebook_url = add_query_arg( 'u', $post_url, 'https://www.facebook.com/sharer/sharer.php' );
	$twitter_url  = add_query_arg(
		array(
			'url'  => $post_url,
			'text' => $post_title,
		),
		'https://x.com/intent/tweet'
	);
	// share-offsite is LinkedIn's current endpoint and takes `url` only. It reads
	// the title and description from the page's Open Graph tags, which
	// almothafar_add_opengraph_tags() already emits, so passing a title is both
	// unnecessary and ignored.
	$linkedin_url = add_query_arg( 'url', $post_url, 'https://www.linkedin.com/sharing/share-offsite/' );
	$telegram_url = add_query_arg(
		array(
			'url'  => $post_url,
			'text' => $post_title,
		),
		'https://telegram.me/share/url'
	);
	$whatsapp_url = add_query_arg( 'text', $post_title . ' ' . $post_url, 'https://wa.me/' );

	?>
	<div class="social-share-buttons">
		<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button facebook" title="<?php esc_attr_e( 'شارك على فيسبوك', 'abdeljalil' ); ?>">
			<?php echo almothafar_icon( 'facebook-f' ); ?>
			<span>Facebook</span>
		</a>
		<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button twitter" title="<?php esc_attr_e( 'شارك على X (تويتر)', 'abdeljalil' ); ?>">
			<?php echo almothafar_icon( 'x-twitter' ); ?>
			<span>X</span>
		</a>
		<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button linkedin" title="<?php esc_attr_e( 'شارك على لينكد إن', 'abdeljalil' ); ?>">
			<?php echo almothafar_icon( 'linkedin-in' ); ?>
			<span>LinkedIn</span>
		</a>
		<a href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button telegram" title="<?php esc_attr_e( 'شارك على تيليجرام', 'abdeljalil' ); ?>">
			<?php echo almothafar_icon( 'telegram' ); ?>
			<span>Telegram</span>
		</a>
		<a href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button whatsapp" title="<?php esc_attr_e( 'شارك على واتساب', 'abdeljalil' ); ?>">
			<?php echo almothafar_icon( 'whatsapp' ); ?>
			<span>WhatsApp</span>
		</a>
	</div>
	<?php
}

/***************************************************************
 * SEO Helpers
 **************************************************************/
/**
 * Reduce post content or an excerpt to plain text fit for a meta description.
 *
 * strip_tags() alone leaves shortcodes and block delimiters behind, so a post
 * opening with [gallery] or any plugin shortcode gets that literal text as its
 * description and its schema description.
 *
 * @param string $text Raw post content or excerpt.
 * @return string Plain text, no markup, no shortcodes, no block delimiters.
 */
function almothafar_plain_text_summary( $text ) {
	return wp_strip_all_tags( strip_shortcodes( excerpt_remove_blocks( $text ) ) );
}

/**
 * A URL and the real dimensions of the file it points at.
 *
 * wp_get_attachment_image_src() returns both from one call, so the two always
 * describe the same file. Attachment metadata does not: it reports the original
 * upload, which stops being the linked file the moment WordPress generates a
 * smaller size for it.
 *
 * @param int    $attachment_id Attachment to look up.
 * @param string $size          Registered image size to link.
 * @return array|false Keys url, width and height, or false if there is no such image.
 */
function almothafar_get_sized_image( $attachment_id, $size ) {
	$image = wp_get_attachment_image_src( $attachment_id, $size );

	if ( ! $image ) {
		return false;
	}

	return array(
		'url'    => $image[0],
		'width'  => $image[1],
		'height' => $image[2],
	);
}

/***************************************************************
 * Meta Description
 **************************************************************/
function almothafar_add_meta_description() {
	$description = '';

	if ( is_singular() ) {
		// For single posts/pages
		global $post;
		if ( $post ) {
			// Use excerpt if available
			if ( has_excerpt( $post ) ) {
				$description = get_the_excerpt( $post );
			} else {
				// Generate from content
				$description = wp_trim_words( almothafar_plain_text_summary( $post->post_content ), 30, '...' );
			}
		}
	} elseif ( is_category() ) {
		// Category archive
		$description = category_description();
		if ( ! $description ) {
			$description = sprintf( __( 'تصفح جميع المقالات في تصنيف %s', 'abdeljalil' ), single_cat_title( '', false ) );
		}
	} elseif ( is_tag() ) {
		// Tag archive
		$description = tag_description();
		if ( ! $description ) {
			$description = sprintf( __( 'تصفح جميع المقالات الموسومة بـ %s', 'abdeljalil' ), single_tag_title( '', false ) );
		}
	} elseif ( is_author() ) {
		// Author archive
		$author = get_queried_object();
		$description = get_the_author_meta( 'description', $author->ID );
		if ( ! $description ) {
			$description = sprintf( __( 'تصفح جميع مقالات الكاتب %s', 'abdeljalil' ), get_the_author_meta( 'display_name', $author->ID ) );
		}
	} elseif ( is_home() || is_front_page() ) {
		// Homepage
		$description = get_bloginfo( 'description' );
	} elseif ( is_search() ) {
		// Search results
		$description = sprintf( __( 'نتائج البحث عن: %s', 'abdeljalil' ), get_search_query() );
	}

	// Clean and output
	if ( $description ) {
		$description = almothafar_plain_text_summary( $description );
		$description = str_replace( array( "\r", "\n", "\t" ), ' ', $description );
		$description = trim( preg_replace( '/\s+/', ' ', $description ) );
		echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
	}
}
add_action( 'wp_head', 'almothafar_add_meta_description', 1 );

/***************************************************************
 * JSON-LD Structured Data (Schema.org)
 **************************************************************/
function almothafar_add_structured_data() {
	if ( is_singular( 'post' ) ) {
		// No setup_postdata() here: on a singular request the main query has already
		// set the loop up before wp_head fires, so the call achieves nothing.
		global $post;

		$author_id = $post->post_author;
		$schema = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'Article',
			'headline'      => get_the_title(),
			'description'   => has_excerpt()
				? almothafar_plain_text_summary( get_the_excerpt() )
				: wp_trim_words( almothafar_plain_text_summary( $post->post_content ), 30 ),
			'datePublished' => get_the_date( 'c' ),
			'dateModified'  => get_the_modified_date( 'c' ),
			'author'        => array(
				'@type' => 'Person',
				'name'  => get_the_author_meta( 'display_name', $author_id ),
				'url'   => get_author_posts_url( $author_id ),
			),
			'publisher'     => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo( 'name' ),
				'logo'  => array(
					'@type' => 'ImageObject',
					'url'   => get_template_directory_uri() . '/screenshot.png',
				),
			),
			'mainEntityOfPage' => array(
				'@type' => 'WebPage',
				'@id'   => get_permalink(),
			),
		);

		// Add image if available.
		if ( has_post_thumbnail() ) {
			$image = almothafar_get_sized_image( get_post_thumbnail_id( $post->ID ), 'large' );
			if ( $image ) {
				$schema['image'] = array(
					'@type'  => 'ImageObject',
					'url'    => $image['url'],
					'width'  => $image['width'],
					'height' => $image['height'],
				);
			}
		}

		// Add article section (category)
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$schema['articleSection'] = $categories[0]->name;
		}

		// Add keywords (tags)
		$tags = get_the_tags();
		if ( $tags ) {
			$keywords = array();
			foreach ( $tags as $tag ) {
				$keywords[] = $tag->name;
			}
			$schema['keywords'] = implode( ', ', $keywords );
		}

		echo "\n<!-- JSON-LD Structured Data -->\n";
		echo '<script type="application/ld+json">' . "\n";
		echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "\n";
		echo '</script>' . "\n";

	} elseif ( is_front_page() || is_home() ) {
		// Website schema for homepage
		$schema = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebSite',
			'name'        => get_bloginfo( 'name' ),
			'description' => get_bloginfo( 'description' ),
			'url'         => home_url( '/' ),
			'potentialAction' => array(
				'@type'       => 'SearchAction',
				'target'      => home_url( '/?s={search_term_string}' ),
				'query-input' => 'required name=search_term_string',
			),
		);

		echo "\n<!-- JSON-LD Structured Data -->\n";
		echo '<script type="application/ld+json">' . "\n";
		echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "\n";
		echo '</script>' . "\n";
	}
}
add_action( 'wp_head', 'almothafar_add_structured_data', 3 );

/***************************************************************
 * Open Graph Meta Tags for Social Sharing
 **************************************************************/
function almothafar_add_opengraph_tags() {
	if ( is_singular() ) {
		// No setup_postdata() here: on a singular request the main query has
		// already set the loop up before wp_head fires, so the call achieves
		// nothing but clobbering $authordata, $page, $pages and $multipage.
		global $post;

		$og_title       = get_the_title();
		$og_description = almothafar_plain_text_summary( get_the_excerpt() );
		$og_url         = get_permalink();
		$og_image       = false;

		// Featured image, taken at the size that is actually linked so the
		// dimensions describe the file the URL points at.
		if ( has_post_thumbnail() ) {
			$og_image = almothafar_get_sized_image( get_post_thumbnail_id( $post->ID ), 'large' );
		}

		// No featured image: the first image in the content. Its real size is
		// unknown -- it may be remote, or a crop this site never generated -- so
		// no dimensions are sent. Facebook, LinkedIn and Slack lay the card out
		// from those numbers and letterbox or crop the image when they are wrong,
		// which is worse than omitting them and letting the crawler measure it.
		if ( ! $og_image ) {
			preg_match( '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $post->post_content, $matches );
			if ( isset( $matches[1] ) ) {
				$og_image = array(
					'url'    => $matches[1],
					'width'  => 0,
					'height' => 0,
				);
			}
		}

		// Last resort: the site logo, again at a known size.
		if ( ! $og_image && has_custom_logo() ) {
			$og_image = almothafar_get_sized_image( get_theme_mod( 'custom_logo' ), 'full' );
		}

		// Clean up description
		if ( '' === $og_description ) {
			$og_description = wp_trim_words( almothafar_plain_text_summary( $post->post_content ), 30, '...' );
		}

		echo "\n<!-- Open Graph Meta Tags by Abdeljalil Theme -->\n";
		echo '<meta property="og:type" content="article" />' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $og_description ) . '" />' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $og_url ) . '" />' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";

		if ( $og_image ) {
			echo '<meta property="og:image" content="' . esc_url( $og_image['url'] ) . '" />' . "\n";

			if ( $og_image['width'] && $og_image['height'] ) {
				echo '<meta property="og:image:width" content="' . esc_attr( $og_image['width'] ) . '" />' . "\n";
				echo '<meta property="og:image:height" content="' . esc_attr( $og_image['height'] ) . '" />' . "\n";
			}
		}

		// Twitter Card tags
		echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr( $og_description ) . '" />' . "\n";

		if ( $og_image ) {
			echo '<meta name="twitter:image" content="' . esc_url( $og_image['url'] ) . '" />' . "\n";
		}

		echo "<!-- / Open Graph Meta Tags -->\n\n";
	}
}
add_action( 'wp_head', 'almothafar_add_opengraph_tags' );

/***************************************************************
 * Robots Directives
 **************************************************************/
// Core has emitted the robots meta tag through wp_robots() -- hooked to
// wp_head at priority 1 -- since WordPress 5.7. Add to the directives it
// collects rather than printing a second, competing tag.
//
// wp_robots_no_robots() is core's own helper for this case: it sets noindex
// and pairs it with follow or nofollow according to blog_public. Setting
// noindex by hand reimplements half of it and drops the follow.
function almothafar_robots_noindex_thin_pages( $robots ) {
	// Author archives, date archives and search results carry nothing a
	// category or the front page does not already cover. Core's
	// wp_robots_noindex_search() covers the search case as well; keeping it
	// here is belt-and-braces, per the note on issue #2.
	if ( is_author() || is_date() || is_search() ) {
		return wp_robots_no_robots( $robots );
	}

	return $robots;
}
add_filter( 'wp_robots', 'almothafar_robots_noindex_thin_pages' );

/***************************************************************
 * Security Enhancements
 **************************************************************/
// Remove WordPress version from head
remove_action( 'wp_head', 'wp_generator' );

// Remove WordPress version from RSS feeds
function abdeljalil_remove_version() {
	return '';
}
add_filter( 'the_generator', 'abdeljalil_remove_version' );

/***************************************************************
 * Content Width
 **************************************************************/
if ( ! isset( $content_width ) ) {
	$content_width = ALMOTHAFAR_CONTENT_WIDTH;
}


/***************************************************************
 * Custom Comment Template
 **************************************************************/
function abdeljalil_comment( $comment, $args, $depth ) {
	// The number badge counts top-level comments only, continuing across comment
	// pages. A single counter over every rendered comment numbered the first reply
	// to comment 1 as comment 2, and restarted from 1 on page 2. Replies carry no
	// number: they are nested under the comment they answer.
	//
	// The page and its size come from $args because wp_list_comments() has already
	// resolved them -- including the page "Comments page displayed by default"
	// opens on -- before handing them to the walker, and zeroes both when comment
	// paging is off, which makes the offset 0 there.
	//
	// Assumes the default comment order, oldest first. Switch Discussion settings
	// to show newer comments at the top of each page and a page's numbers run
	// backwards -- the price of not issuing a second query to count the post's
	// top-level comments.
	static $top_level_counter = 0;
	$number = 0;

	if ( 1 === $depth ) {
		$page     = isset( $args['page'] ) ? (int) $args['page'] : 0;
		$per_page = isset( $args['per_page'] ) ? (int) $args['per_page'] : 0;

		$top_level_counter++;
		$number = $top_level_counter + ( ( $page - 1 ) * $per_page );
	}

	// The badge marks the author of *this post*, not whoever happens to be user 1.
	$post_author_id = (int) get_post_field( 'post_author', $comment->comment_post_ID );
	$is_post_author = 0 !== (int) $comment->user_id && (int) $comment->user_id === $post_author_id;
	$comment_class  = $is_post_author ? 'author-comment' : 'comment';
	?>
	<li <?php comment_class( $comment_class ); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-head">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 50 ); ?>
			</div>
			<div class="comment-data">
				<div class="author"><?php comment_author_link(); ?></div>
				<div class="comment-time">
					<?php
					printf(
						'%s | الساعة %s',
						esc_html( get_comment_date( 'l j F Y' ) ),
						esc_html( get_comment_time() )
					);
					?>
				</div>
			</div>
			<?php if ( $number ) : ?>
				<div class="comment-num"><?php echo esc_html( $number ); ?></div>
			<?php endif; ?>
		</div>
		<div class="comment-entry">
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<div class="red"><em>تعليقك ينتظر موافقة الإدارة.</em></div>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>
		<div class="a-comment">
			<?php
			edit_comment_link( 'تحرير هذا التعليق', '', '' );
			?>
			<a class="comment-link" href="#comment-<?php comment_ID(); ?>" title="الرابط المباشر لهذا التعليق">رابط التعليق</a>
			<?php
			comment_reply_link( array_merge( $args, array(
				'reply_text' => 'إقتباس',
				'depth'      => $depth,
				'max_depth'  => $args['max_depth'],
			) ) );
			?>
		</div>
	<?php
}

/***************************************************************
 * Translate the Akismet Comment-Form Privacy Notice
 **************************************************************/
// Akismet ships no Arabic translation of the privacy notice under the comment
// form, so it renders in English on an otherwise Arabic page. This supplies one.
//
// The filter runs on every translated string on the site, so it bails on the
// domain first -- one string comparison for the thousands of core and plugin
// strings that are not Akismet's. Matching on $original, the untranslated
// source, rather than substring-replacing $translated, is what keeps it from
// rewriting unrelated strings that happen to share a word.
function almothafar_translate_akismet_privacy_notice( $translated, $original, $domain ) {
	if ( 'akismet' !== $domain ) {
		return $translated;
	}

	// Matched on the phrase rather than the whole source string: the wording has
	// been stable across Akismet releases, the link's rel attribute has not.
	if ( false === strpos( $original, 'Learn how your comment data is processed' ) ) {
		return $translated;
	}

	// Akismet sprintf()s its privacy-policy URL into this string, so the
	// replacement has to carry the one %s, in the href, and nowhere else.
	return __(
		/* translators: %s: URL of the Akismet privacy policy. */
		'يستخدم هذا الموقع أكيسمت للحد من التعليقات المزعجة. <a href="%s" target="_blank" rel="nofollow noopener">تعرف على كيفية معالجة بيانات تعليقك.</a>',
		'abdeljalil'
	);
}
add_filter( 'gettext', 'almothafar_translate_akismet_privacy_notice', 20, 3 );

// No closing tag: trailing whitespace after it would be sent as output.
