<?php
/**
 * Comments Template
 *
 * @package Abdeljalil
 */

if ( post_password_required() ) {
	return;
}
?>

<div class="comments-section comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				printf( _x( 'تعليق واحد على &ldquo;%s&rdquo;', 'comments title', 'abdeljalil' ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s تعليق على &ldquo;%2$s&rdquo;',
						'%1$s تعليق على &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'abdeljalil'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h3>

		<?php get_template_part( 'template-parts/comment-navigation' ); ?>

		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 50,
				'callback'    => 'abdeljalil_comment',
			) );
			?>
		</ul>

		<?php get_template_part( 'template-parts/comment-navigation' ); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php _e( 'التعليقات مغلقة.', 'abdeljalil' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form( array(
		'title_reply'          => __( 'أكتب تعليقك', 'abdeljalil' ),
		'title_reply_to'       => __( 'الرد على %s', 'abdeljalil' ),
		'cancel_reply_link'    => __( 'إلغاء الرد', 'abdeljalil' ),
		'label_submit'         => __( 'إرسال التعليق', 'abdeljalil' ),
		'comment_field'        => '<p class="comment-form-field"><label for="comment">' . _x( 'التعليق', 'noun', 'abdeljalil' ) . '</label><textarea class="comment-input" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'fields'               => array(
			'author' => '<p class="comment-form-field"><label for="author">' . __( 'الاسم', 'abdeljalil' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input class="comment-input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
			'email'  => '<p class="comment-form-field"><label for="email">' . __( 'البريد الإلكتروني', 'abdeljalil' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input class="comment-input" id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',
			'url'    => '<p class="comment-form-field"><label for="url">' . __( 'الموقع', 'abdeljalil' ) . '</label><input class="comment-input" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		),
		'class_submit'         => 'comment-submit',
		'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
	) );
	?>
</div>
