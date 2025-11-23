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

	// Enqueue scripts
	wp_enqueue_script( 'jquery' );

	// Enqueue custom scripts
	wp_enqueue_script( 'abdeljalil-qtip', get_template_directory_uri() . '/files/qTip.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'abdeljalil-scroll', get_template_directory_uri() . '/files/scroll.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'abdeljalil-main', get_template_directory_uri() . '/files/Abdeljalil.js', array( 'jquery' ), '1.0', true );

	// Enqueue comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'abdeljalil_scripts' );

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