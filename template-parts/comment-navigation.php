<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="navigation comment-navigation" role="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( '&rarr; تعليقات أقدم', 'abdeljalil' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'تعليقات أحدث &larr;', 'abdeljalil' ) ); ?></div>
	</nav>
<?php endif; ?>
