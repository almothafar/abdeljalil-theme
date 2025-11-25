<?php get_header(); ?>

<main class="site-container" role="main">
	<?php if ( have_posts() ) : ?>
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
					the_content( '<br /><span class="read-more">أكمل قراءة بقية الموضوع ←</span>' );
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'الصفحات:', 'abdeljalil' ),
						'after'  => '</div>',
					) );
					?>
				</div>
				<?php get_template_part( 'template-parts/post-tags' ); ?>
			</article>
		<?php endwhile; ?>

		<?php get_template_part( 'template-parts/pagination' ); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/no-posts' ); ?>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
