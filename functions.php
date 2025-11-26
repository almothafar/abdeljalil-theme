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
	set_post_thumbnail_size( 1200, 400, true );

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
		'default-text-color' => '2d2d2d',
		'default-image'      => get_template_directory_uri() . '/images/headers/plane.jpg',
		'width'              => 1200,
		'height'             => 190,
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

	// Set content width
	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}
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
		'label'       => __( 'X (Twitter)', 'abdeljalil' ),
		'section'     => 'almothafar_social_section',
		'type'        => 'text',
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: twitter.com/almothafar', 'abdeljalil' ),
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
		'description' => __( 'اسم المستخدم فقط (مثال: almothafar) - يصبح الرابط: facebook.com/almothafar', 'abdeljalil' ),
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
}
add_action( 'customize_register', 'almothafar_customize_register' );

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

	// Enqueue Font Awesome 7.0.1 (latest available on CDNJS) for social icons
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', array(), '7.0.7' );

	// Enqueue WordPress bundled jQuery (modern version)
	wp_enqueue_script( 'jquery' );

	// Enqueue comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'abdeljalil_scripts' );

/***************************************************************
 * Social Sharing Buttons
 **************************************************************/
function abdeljalil_social_sharing_buttons() {
	if ( ! is_single() ) {
		return;
	}

	$post_url   = urlencode( get_permalink() );
	$post_title = urlencode( get_the_title() );

	?>
	<div class="social-share-buttons">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank" rel="noopener noreferrer" class="share-button facebook" title="شارك على فيسبوك">
			<i class="fab fa-facebook-f"></i>
			<span>Facebook</span>
		</a>
		<a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" rel="noopener noreferrer" class="share-button twitter" title="شارك على X (تويتر)">
			<i class="fab fa-x-twitter"></i>
			<span>X</span>
		</a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>" target="_blank" rel="noopener noreferrer" class="share-button linkedin" title="شارك على لينكد إن">
			<i class="fab fa-linkedin-in"></i>
			<span>LinkedIn</span>
		</a>
		<a href="https://telegram.me/share/url?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" rel="noopener noreferrer" class="share-button telegram" title="شارك على تيليجرام">
			<i class="fab fa-telegram-plane"></i>
			<span>Telegram</span>
		</a>
		<a href="https://wa.me/?text=<?php echo $post_title; ?>%20<?php echo $post_url; ?>" target="_blank" rel="noopener noreferrer" class="share-button whatsapp" title="شارك على واتساب">
			<i class="fab fa-whatsapp"></i>
			<span>WhatsApp</span>
		</a>
	</div>
	<?php
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
				$description = wp_trim_words( strip_tags( $post->post_content ), 30, '...' );
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
		$description = wp_strip_all_tags( $description );
		$description = str_replace( array( "\r", "\n", "\t" ), ' ', $description );
		$description = trim( preg_replace( '/\s+/', ' ', $description ) );
		echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
	}
}
add_action( 'wp_head', 'almothafar_add_meta_description', 1 );

/***************************************************************
 * Canonical URL
 **************************************************************/
function almothafar_add_canonical_url() {
	$canonical_url = '';

	if ( is_singular() ) {
		// Single post/page
		$canonical_url = get_permalink();
	} elseif ( is_category() ) {
		// Category archive
		$canonical_url = get_category_link( get_queried_object_id() );
	} elseif ( is_tag() ) {
		// Tag archive
		$canonical_url = get_tag_link( get_queried_object_id() );
	} elseif ( is_author() ) {
		// Author archive
		$canonical_url = get_author_posts_url( get_queried_object_id() );
	} elseif ( is_home() || is_front_page() ) {
		// Homepage
		$canonical_url = home_url( '/' );
	} elseif ( is_search() ) {
		// Search results
		$canonical_url = get_search_link();
	}

	// Add pagination if exists
	if ( $canonical_url ) {
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		if ( $paged > 1 ) {
			$canonical_url = trailingslashit( $canonical_url ) . 'page/' . $paged . '/';
		}

		echo '<link rel="canonical" href="' . esc_url( $canonical_url ) . '" />' . "\n";
	}
}
add_action( 'wp_head', 'almothafar_add_canonical_url', 2 );

/***************************************************************
 * JSON-LD Structured Data (Schema.org)
 **************************************************************/
function almothafar_add_structured_data() {
	if ( is_singular( 'post' ) ) {
		global $post;
		setup_postdata( $post );

		$author_id = $post->post_author;
		$schema = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'Article',
			'headline'      => get_the_title(),
			'description'   => has_excerpt() ? get_the_excerpt() : wp_trim_words( strip_tags( $post->post_content ), 30 ),
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

		// Add image if available
		if ( has_post_thumbnail() ) {
			$image_url = get_the_post_thumbnail_url( $post->ID, 'large' );
			$image_meta = wp_get_attachment_metadata( get_post_thumbnail_id( $post->ID ) );
			$schema['image'] = array(
				'@type'  => 'ImageObject',
				'url'    => $image_url,
				'width'  => isset( $image_meta['width'] ) ? $image_meta['width'] : 1200,
				'height' => isset( $image_meta['height'] ) ? $image_meta['height'] : 630,
			);
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

		wp_reset_postdata();
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
		global $post;
		setup_postdata( $post );

		$og_title       = get_the_title();
		$og_description = get_the_excerpt();
		$og_url         = get_permalink();
		$og_image       = '';

		// Get featured image
		if ( has_post_thumbnail() ) {
			$og_image = get_the_post_thumbnail_url( $post->ID, 'large' );
		}

		// If no featured image, try to get first image from content
		if ( ! $og_image ) {
			$content = $post->post_content;
			preg_match( '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $content, $matches );
			if ( isset( $matches[1] ) ) {
				$og_image = $matches[1];
			}
		}

		// Fallback to site logo or default image
		if ( ! $og_image && has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$og_image       = wp_get_attachment_image_url( $custom_logo_id, 'full' );
		}

		// Clean up description
		if ( ! $og_description ) {
			$og_description = wp_trim_words( strip_tags( $post->post_content ), 30, '...' );
		}

		echo "\n<!-- Open Graph Meta Tags by Abdeljalil Theme -->\n";
		echo '<meta property="og:type" content="article" />' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $og_description ) . '" />' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $og_url ) . '" />' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";

		if ( $og_image ) {
			echo '<meta property="og:image" content="' . esc_url( $og_image ) . '" />' . "\n";
			echo '<meta property="og:image:width" content="1200" />' . "\n";
			echo '<meta property="og:image:height" content="630" />' . "\n";
		}

		// Twitter Card tags
		echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr( $og_description ) . '" />' . "\n";

		if ( $og_image ) {
			echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '" />' . "\n";
		}

		echo "<!-- / Open Graph Meta Tags -->\n\n";

		wp_reset_postdata();
	}
}
add_action( 'wp_head', 'almothafar_add_opengraph_tags' );

/***************************************************************
 * XML Sitemap Enhancement
 **************************************************************/
// Enable WordPress core sitemaps (enabled by default since WP 5.5, but ensure it's active)
add_filter( 'wp_sitemaps_enabled', '__return_true' );

// Increase number of URLs per sitemap
function almothafar_sitemap_entries() {
	return 2000; // Default is 2000, but explicitly set it
}
add_filter( 'wp_sitemaps_max_urls', 'almothafar_sitemap_entries' );

// Add custom post types to sitemap (if any are registered later)
function almothafar_add_sitemap_post_types( $post_types ) {
	// Posts and pages are included by default
	// Add any custom post types here if needed
	return $post_types;
}
add_filter( 'wp_sitemaps_post_types', 'almothafar_add_sitemap_post_types' );

/***************************************************************
 * Robots.txt Enhancement
 **************************************************************/
function almothafar_custom_robots_txt( $output, $public ) {
	// Only customize if site is public
	if ( '0' === $public ) {
		return $output;
	}

	$output = "# Robots.txt for " . get_bloginfo( 'name' ) . "\n";
	$output .= "# Generated by Abdeljalil Theme\n\n";

	$output .= "User-agent: *\n";
	$output .= "Allow: /wp-content/uploads/\n";
	$output .= "Disallow: /wp-admin/\n";
	$output .= "Disallow: /wp-includes/\n";
	$output .= "Disallow: /wp-content/plugins/\n";
	$output .= "Disallow: /wp-content/themes/\n";
	$output .= "Disallow: /trackback/\n";
	$output .= "Disallow: /feed/\n";
	$output .= "Disallow: /comments/\n";
	$output .= "Disallow: /category/*/*\n";
	$output .= "Disallow: */trackback\n";
	$output .= "Disallow: */feed\n";
	$output .= "Disallow: */comments\n";
	$output .= "Disallow: /*?*\n";
	$output .= "Disallow: /*?\n\n";

	$output .= "# Google-specific rules\n";
	$output .= "User-agent: Googlebot\n";
	$output .= "Allow: /*.css\n";
	$output .= "Allow: /*.js\n\n";

	$output .= "User-agent: Googlebot-Image\n";
	$output .= "Allow: /wp-content/uploads/\n\n";

	// Add sitemap reference
	$output .= "# Sitemap location\n";
	$output .= "Sitemap: " . home_url( '/wp-sitemap.xml' ) . "\n";

	return $output;
}
add_filter( 'robots_txt', 'almothafar_custom_robots_txt', 10, 2 );

/***************************************************************
 * Robots Meta Tags for Specific Pages
 **************************************************************/
function almothafar_add_robots_meta() {
	// Don't index author archives, date archives, and search results
	if ( is_author() || is_date() || is_search() ) {
		echo '<meta name="robots" content="noindex, follow" />' . "\n";
	}

	// Don't index paginated pages beyond page 1
	if ( is_paged() && get_query_var( 'paged' ) > 1 ) {
		echo '<meta name="robots" content="noindex, follow" />' . "\n";
	}
}
add_action( 'wp_head', 'almothafar_add_robots_meta', 1 );

/***************************************************************
 * Security Enhancements
 **************************************************************/
// Remove WordPress version from head
remove_action( 'wp_head', 'wp_generator' );

// Disable XML-RPC if not needed (prevents brute force attacks)
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove WordPress version from RSS feeds
function abdeljalil_remove_version() {
	return '';
}
add_filter( 'the_generator', 'abdeljalil_remove_version' );

/***************************************************************
 * Content Width
 **************************************************************/
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
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
 * Fix Akismet Privacy Notice - Replace English "processed" with Arabic
 **************************************************************/
function almothafar_fix_akismet_text( $translated, $original, $domain ) {
	// Fix Akismet's mixed Arabic/English text
	if ( 'akismet' === $domain || 'default' === $domain ) {
		// Replace "processed" with Arabic equivalent
		$translated = str_replace( 'processed', 'تتم معالجتها', $translated );
	}
	return $translated;
}
add_filter( 'gettext', 'almothafar_fix_akismet_text', 20, 3 );

//End of Functions

?>
