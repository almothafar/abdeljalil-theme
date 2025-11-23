<?php get_header(); ?>

<main id="container" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">
				<?php
				printf(
					__( 'نتائج البحث عن: %s', 'abdeljalil' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		</header>

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
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</div>
					<?php
					the_excerpt();
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
			<div class="no-result">
				<h1><?php _e( 'لا توجد نتائج، لما لا تجرب كلمات أخرى؟', 'abdeljalil' ); ?></h1>
				<div style="margin-bottom: 20px;">
					<?php get_search_form(); ?>
				</div>
			</div>
		</article>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
