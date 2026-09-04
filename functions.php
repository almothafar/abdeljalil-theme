<?php
/**
 * Abdeljalil Theme Functions
 *
 * Modernized for WordPress 6.8+ and PHP 8.4+
 *
 * @package Abdeljalil
 * @version 2.0
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
		'before_widget' => '<div class="%2$s sidebox" id="%1$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widgettitle">',
		'after_title'   => '</div><div class="list-content">',
	) );
}
add_action( 'widgets_init', 'abdeljalil_widgets_init' );


/***************************************************************
 * Enqueue Scripts and Styles
 **************************************************************/
function abdeljalil_scripts() {
	// Enqueue main stylesheet
	wp_enqueue_style( 'abdeljalil-style', get_stylesheet_uri(), array(), '2.0' );

	// Enqueue Font Awesome for social icons
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css', array(), '7.3.1' );

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
			<i class="fab fa-facebook-f"></i>
			<span>Facebook</span>
		</a>
		<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button twitter" title="<?php esc_attr_e( 'شارك على X (تويتر)', 'abdeljalil' ); ?>">
			<i class="fab fa-x-twitter"></i>
			<span>X</span>
		</a>
		<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button linkedin" title="<?php esc_attr_e( 'شارك على لينكد إن', 'abdeljalil' ); ?>">
			<i class="fab fa-linkedin-in"></i>
			<span>LinkedIn</span>
		</a>
		<a href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button telegram" title="<?php esc_attr_e( 'شارك على تيليجرام', 'abdeljalil' ); ?>">
			<i class="fab fa-telegram-plane"></i>
			<span>Telegram</span>
		</a>
		<a href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer" class="share-button whatsapp" title="<?php esc_attr_e( 'شارك على واتساب', 'abdeljalil' ); ?>">
			<i class="fab fa-whatsapp"></i>
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

		// Add image if available. wp_get_attachment_image_src() returns the URL and
		// the dimensions of one and the same size, so the two cannot disagree; the
		// metadata this used to read describes the original upload, not the 'large'
		// file the URL points at.
		if ( has_post_thumbnail() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			if ( $image ) {
				$schema['image'] = array(
					'@type'  => 'ImageObject',
					'url'    => $image[0],
					'width'  => $image[1],
					'height' => $image[2],
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
		$og_image       = '';
		$og_width       = 0;
		$og_height      = 0;

		// Featured image, taken at the size that is actually linked so the
		// dimensions describe the file the URL points at.
		if ( has_post_thumbnail() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			if ( $image ) {
				$og_image  = $image[0];
				$og_width  = $image[1];
				$og_height = $image[2];
			}
		}

		// No featured image: the first image in the content. Its real size is
		// unknown -- it may be remote, or a crop this site never generated -- so
		// no dimensions are sent. Facebook, LinkedIn and Slack lay the card out
		// from those numbers and letterbox or crop the image when they are wrong,
		// which is worse than omitting them and letting the crawler measure it.
		if ( ! $og_image ) {
			preg_match( '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $post->post_content, $matches );
			if ( isset( $matches[1] ) ) {
				$og_image = $matches[1];
			}
		}

		// Last resort: the site logo, again at a known size.
		if ( ! $og_image && has_custom_logo() ) {
			$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
			if ( $image ) {
				$og_image  = $image[0];
				$og_width  = $image[1];
				$og_height = $image[2];
			}
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
			echo '<meta property="og:image" content="' . esc_url( $og_image ) . '" />' . "\n";

			if ( $og_width && $og_height ) {
				echo '<meta property="og:image:width" content="' . esc_attr( $og_width ) . '" />' . "\n";
				echo '<meta property="og:image:height" content="' . esc_attr( $og_height ) . '" />' . "\n";
			}
		}

		// Twitter Card tags
		echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr( $og_description ) . '" />' . "\n";

		if ( $og_image ) {
			echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '" />' . "\n";
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
	static $comment_counter = 0;
	$comment_counter++;

	$GLOBALS['comment'] = $comment;
	$comment_class = ( 1 == $comment->user_id ) ? 'author-comment' : 'comment';
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
			<div class="comment-num"><?php echo esc_html( $comment_counter ); ?></div>
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
function almothafar_fix_akismet_text( $translated, $original, $domain ) {
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
		'يستخدم هذا الموقع أكيسمت للحد من التعليقات المزعجة. <a href="%s" target="_blank" rel="nofollow noopener">تعرف على كيفية معالجة بيانات تعليقك</a>.',
		'abdeljalil'
	);
}
add_filter( 'gettext', 'almothafar_fix_akismet_text', 20, 3 );

// No closing tag: trailing whitespace after it would be sent as output.
