<aside class="site-sidebar">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>
		<?php // Setup hint for editors only; it names an admin URL and is of no use to visitors. ?>
		<div class="sidebox">
			<div class="widgettitle"><?php esc_html_e( 'القائمة الجانبية', 'abdeljalil' ); ?></div>
			<div class="list-content">
				<p>لإضافة مربعات القائمة الجانبية، توجه إلى <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">المظهر &gt; مربعات القائمة الجانبية</a>، ثم اسحب المربعات إلى "السايدبار".</p>
			</div>
		</div>
	<?php endif; ?>
</aside>
