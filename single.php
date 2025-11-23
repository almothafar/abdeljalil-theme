<?php get_header(); ?>
<div id="container">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-head">
				<div class="post-time"><?php the_time('j F Y'); ?></div>
				<div class="post-cat">التصنيف : <?php the_category('، ') ?></div>
				<div class="post-author">الكاتب : <?php the_author_link(); ?></div>
				<div class="post-comment"><?php comments_popup_link('لا تعليقات', 'التعليقات : 1', 'التعليقات : %', '', 'التعليقات مغلقة لهذه التدوينة'); ?></div>
				<div class="post-view"><?php if(function_exists('the_views')) { the_views(); } ?></div>
			</div>
			<div class="entry">
				<div class="post-title"><h1><?php the_title(); ?></h1></div>
				<div class="social-network-shares">
					<div class="snbutton"><div class="g-plusone" data-size="medium"></div></div>
					<div class="snbutton">
<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) {return;}  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><div class="fb-like" data-send="true" data-layout="button_count" data-width="130" data-show-faces="false" data-font="tahoma"></div>
					</div>
				</div>
				<?php the_content(); ?>
			</div>
			<div class="post-foot">
<div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Blog ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1244440343559843"
     data-ad-slot="2915820308"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>

				<div class="post-tags"><?php the_tags('وسوم: ','، ','<br />'); ?></div>
			</div>
		</div>
			<div class="navigation">
				<div class="right-nav"><?php previous_post_link('&laquo; %link') ?></div>
				<div class="left-nav"><?php next_post_link(' %link &raquo;') ?></div>
			</div>
	<br />
			<div class="comments-template">
				<?php comments_template(); ?>
			</div>
	<?php endwhile; ?>
	<?php else : ?>
	
	<div class="post">
		<h1>لا توجد حالياً أية تدوينات</h1>
	</div>
	
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>