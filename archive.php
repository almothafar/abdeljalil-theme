<?php get_header(); ?>

<main class="site-container" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title">
				<?php
				if ( is_category() ) {
					single_cat_title();
				} elseif ( is_tag() ) {
					single_tag_title();
				} elseif ( is_author() ) {
					the_post();
					printf( __( 'المؤلف: %s', 'abdeljalil' ), '<span class="vcard">' . get_the_author() . '</span>' );
					rewind_posts();
				} elseif ( is_day() ) {
					printf( __( 'يومي: %s', 'abdeljalil' ), '<span>' . get_the_date() . '</span>' );
				} elseif ( is_month() ) {
					printf( __( 'شهري: %s', 'abdeljalil' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'abdeljalil' ) ) . '</span>' );
				} elseif ( is_year() ) {
					printf( __( 'سنوي: %s', 'abdeljalil' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'abdeljalil' ) ) . '</span>' );
				} else {
					_e( 'الأرشيف', 'abdeljalil' );
				}
				?>
			</h1>
			<?php
			if ( is_category() || is_tag() ) {
				the_archive_description( '<div class="archive-description">', '</div>' );
			}
			?>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-head">
					<div class="post-head-stat post-time"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></div>
					<div class="post-head-stat post-cat"><?php the_category( '، ' ); ?></div>
					<div class="post-head-stat post-author"><?php the_author_posts_link(); ?></div>
					<div class="post-head-stat post-comment">
						<?php comments_popup_link( 'لا تعليقات', 'التعليقات : 1', 'التعليقات : %', '', 'التعليقات مغلقة لهذه التدوينة' ); ?>
					</div>
					<?php if ( function_exists( 'the_views' ) ) : ?>
						<div class="post-head-stat post-view"><?php the_views(); ?></div>
					<?php endif; ?>
				</div>
				<div class="entry">
					<div class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</div>
					<?php
					the_content( '<br /><span class="read-more">أكمل قراءة بقية الموضوع ←</span>' );
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'الصفحات:', 'abdeljalil' ),
						'after'  => '</div>',
					) );
					?>
				</div>
				<div class="post-foot">
					<div class="post-tags"><?php the_tags( 'وسوم: ', '، ', '<br />' ); ?></div>
				</div>
			</article>
		<?php endwhile; ?>

		<nav class="navigation" role="navigation">
			<?php
			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( '&laquo; السابق', 'abdeljalil' ),
				'next_text' => __( 'التالي &raquo;', 'abdeljalil' ),
			) );
			?>
		</nav>

	<?php else : ?>
		<article class="post">
			<h1><?php _e( 'لا توجد حالياً أية تدوينات', 'abdeljalil' ); ?></h1>
		</article>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
