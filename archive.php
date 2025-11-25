<?php get_header(); ?>

<main class="site-container" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="archive-header post">
			<div class="entry">
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
            </div>
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
