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
