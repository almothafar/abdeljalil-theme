<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('عذراً، لا تفتح هذه الصفحة مباشرة !');
if (!empty($post->post_password)) {
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
?>
<h1>تدوينة محمية بكلمة مرور</h1>
<p>أدخل كلمة المرور لرؤية التعليقات.</p>
<?php return;
	}
}
$oddcomment = '';
?>

<!-- يمكنك بدأ التعديل من هنا -->
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('لا توجد تعليقات ', 'عدد التعليقات : 1 ', 'عدد التعليقات : %' );?> | <a href="#respond">أكتب تعليقك</a></h3>
	<div class="navigation">
		<div class="right-nav"><?php previous_comments_link() ?></div>
		<div class="left-nav"><?php next_comments_link() ?></div>
	</div>
<ul class="commentlist">
<?php $counter = 0; ?>
<?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'Abdeljalil_comment' ) ); ?>

</ul>

<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
<p class="nocomments">التعليقات مغلقة.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
		<br />
<div id="respond">
		<div class="add-comment-head"><?php comment_form_title( 'أكتب تعليقك', 'إقتباس مشاركة :  %s' ); ?></div>
<?php if ( function_exists(cs_print_smilies) ) {cs_print_smilies();}?>
		<div class="entry">

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link('إضغط هنا لإلغاء الإقتباس.'); ?></small>
</div>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>



<p>يجب أن <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">تسجل دخولك</a> لترك التعليقات.</p>



<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" name="commentform">

<?php if ( $user_ID ) : ?>


<p>دخولك مسجل بإسم <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="تسجيل الخروج من هذا الحساب">تسجيل الخروج &raquo;</a></p>



<?php else : ?>

<p><input class="add-comment-input" type="text" name="author" id="author" value="" size="40" tabindex="1" onclick="clear_value(author)" onblur="set_value(author)" />


<label for="author">الإسم <?php if ($req) echo "( مطلوب )"; ?></label></p>


<p><input class="add-comment-input" type="text" name="email" id="email" value="" size="40" tabindex="2" onclick="clear_value(email)" onblur="set_value(email)" />


<label for="email">البريد الإلكتروني ( لن ينشر ) <?php if ($req) echo "( مطلوب )"; ?></label></p>


<p><input class="add-comment-input" type="text" name="url" id="url" value="" size="40" tabindex="3" onclick="clear_value(url)" onblur="set_value(url)" />


<label for="url">الموقع ( إختياري ) </label></p>
<?php endif; ?>
<?php 
/****** Math Comment Spam Protection Plugin ******/
if ( function_exists('math_comment_spam_protection') && !$user_ID ) { 
	$mcsp_info = math_comment_spam_protection();
?> 	<p><input type="text" name="mcspvalue" id="mcspvalue" value="" size="22" tabindex="4" />
	<label for="mcspvalue"><small>كم مجموع <?php echo $mcsp_info['operand1'] . ' + ' . $mcsp_info['operand2'] . ' ?' ?> (مطلوب) </small></label>
	<input type="hidden" name="mcspinfo" value="<?php echo $mcsp_info['result']; ?>" />
</p>
<?php } // if function_exists... ?>
<p><textarea class="add-comment-input" name="comment" id="comment" rows="" cols="" tabindex="4"></textarea></p>
<p><input name="submit" type="submit" id="submit" value="" tabindex="5" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
</div>
</div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>