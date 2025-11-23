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
	set_post_thumbnail_size( 990, 400, true );

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
		'width'              => 990,
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
		$content_width = 990;
	}
}
add_action( 'after_setup_theme', 'abdeljalil_theme_setup' );

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
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

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
 * Open Graph Meta Tags for Social Sharing
 **************************************************************/
function abdeljalil_add_opengraph_tags() {
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
add_action( 'wp_head', 'abdeljalil_add_opengraph_tags' );

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
	$content_width = 990;
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

//End of Functions

?>