<?php get_header(); ?>

<main id="container" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			</article>

			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>

		<?php endwhile; ?>

	<?php else : ?>
		<article class="post">
			<h1><?php _e( 'الصفحة التي تبحث عنها غير موجودة', 'abdeljalil' ); ?></h1>
		</article>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
