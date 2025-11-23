<aside id="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<div class="sidebox">
			<div class="widgettitle">القائمة الجانبية</div>
			<div class="list-content">
				<p>لإضافة مربعات القائمة الجانبية، توجه إلى <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">المظهر > مربعات القائمة الجانبية</a>، ثم اسحب المربعات إلى "السايدبار".</p>
			</div>
		</div>
	<?php endif; ?>
</aside>
