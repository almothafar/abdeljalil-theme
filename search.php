<?php get_header(); ?>

<main class="site-container" role="main">
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
				<?php get_template_part( 'template-parts/post-meta' ); ?>
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
				<?php get_template_part( 'template-parts/post-tags' ); ?>
			</article>
		<?php endwhile; ?>

		<?php get_template_part( 'template-parts/pagination' ); ?>

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
