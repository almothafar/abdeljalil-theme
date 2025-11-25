<?php get_header(); ?>

<main class="site-container" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php get_template_part( 'template-parts/post-meta' ); ?>
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

				<?php get_template_part( 'template-parts/post-tags' ); ?>
			</article>

			<nav class="navigation" role="navigation">
				<div class="nav-previous"><?php previous_post_link( '&laquo; %link' ); ?></div>
				<div class="nav-next"><?php next_post_link( '%link &raquo;' ); ?></div>
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
		<?php get_template_part( 'template-parts/no-posts' ); ?>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
