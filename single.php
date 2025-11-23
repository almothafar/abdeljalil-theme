<?php get_header(); ?>

<main id="container" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-head">
					<div class="post-time"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></div>
					<div class="post-cat">التصنيف : <?php the_category( '، ' ); ?></div>
					<div class="post-author">الكاتب : <?php the_author_posts_link(); ?></div>
					<div class="post-comment">
						<?php comments_popup_link( 'لا تعليقات', 'التعليقات : 1', 'التعليقات : %', '', 'التعليقات مغلقة لهذه التدوينة' ); ?>
					</div>
					<?php if ( function_exists( 'the_views' ) ) : ?>
						<div class="post-view"><?php the_views(); ?></div>
					<?php endif; ?>
				</div>
				<div class="entry">
					<div class="post-title">
						<h1><?php the_title(); ?></h1>
					</div>
					<?php
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'الصفحات:', 'abdeljalil' ),
						'after'  => '</div>',
					) );
					?>
				</div>

				<?php
				// Display social sharing buttons
				if ( function_exists( 'abdeljalil_social_sharing_buttons' ) ) {
					abdeljalil_social_sharing_buttons();
				}
				?>

				<div class="post-foot">
					<div class="post-tags"><?php the_tags( 'وسوم: ', '، ', '<br />' ); ?></div>
				</div>
			</article>

			<nav class="navigation" role="navigation">
				<div class="right-nav"><?php previous_post_link( '&laquo; %link' ); ?></div>
				<div class="left-nav"><?php next_post_link( '%link &raquo;' ); ?></div>
			</nav>

			<div class="comments-template">
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>

		<?php endwhile; ?>

	<?php else : ?>
		<article class="post">
			<h1><?php _e( 'لا توجد حالياً أية تدوينات', 'abdeljalil' ); ?></h1>
		</article>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
