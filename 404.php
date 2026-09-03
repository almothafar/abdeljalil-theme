<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Abdeljalil
 * @since 2.0
 */

get_header();
?>

<main class="site-container">
	<article class="post error-404">
		<div class="entry">
			<div class="post-title">
				<h1><?php _e( '404 - الصفحة غير موجودة', 'abdeljalil' ); ?></h1>
			</div>

			<p class="error-message">
				<?php _e( 'عذراً، الصفحة التي تبحث عنها غير موجودة. ربما تم حذفها، أو تغير عنوانها، أو أنها غير متوفرة مؤقتاً.', 'abdeljalil' ); ?>
			</p>
		</div>
	</article>

	<article class="post search-404">
		<div class="entry">
			<h3><?php _e( '🔍 البحث في الموقع', 'abdeljalil' ); ?></h3>
			<?php get_search_form(); ?>
		</div>
	</article>

	<article class="post recent-posts-404">
		<div class="entry">
			<h3><?php _e( '📝 أحدث المقالات', 'abdeljalil' ); ?></h3>
			<?php
			// get_posts() forces no_found_rows, so this skips the SQL_CALC_FOUND_ROWS
			// pass that wp_get_recent_posts() pays for a count nothing here uses.
			$recent_posts = get_posts( array(
				'numberposts' => 5,
				'post_status' => 'publish',
			) );

			if ( $recent_posts ) :
				?>
				<ul class="recent-posts-list">
					<?php
					foreach ( $recent_posts as $recent ) :
						?>
						<li>
							<a href="<?php echo esc_url( get_permalink( $recent->ID ) ); ?>">
								<?php echo esc_html( get_the_title( $recent ) ); ?>
							</a>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			<?php
			else :
				?>
				<p><?php _e( 'لا توجد مقالات متاحة حالياً', 'abdeljalil' ); ?></p>
			<?php
			endif;
			?>
		</div>
	</article>

	<?php
	$categories = get_categories( array(
		'orderby'    => 'count',
		'order'      => 'DESC',
		'number'     => 10,
		'hide_empty' => true,
	) );

	if ( $categories ) :
		?>
		<article class="post categories-404">
			<div class="entry">
				<h3><?php _e( '🗂️ تصفح حسب التصنيف', 'abdeljalil' ); ?></h3>
				<ul class="categories-list">
					<?php
					foreach ( $categories as $category ) :
						?>
						<li>
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
								<?php echo esc_html( $category->name ); ?>
								<span class="category-count">(<?php echo esc_html( $category->count ); ?>)</span>
							</a>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>
		</article>
	<?php endif; ?>

	<article class="post back-home-404">
		<div class="entry entry-centered">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button-home">
				<?php _e( '🏠 العودة للصفحة الرئيسية', 'abdeljalil' ); ?>
			</a>
		</div>
	</article>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
