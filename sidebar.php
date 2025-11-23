<div id="sidebar">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
	
	<div class="%2$s column" id="%1$s">
		<div class="sidebox">
			<div class="widgettitle">القائمة الجانبية</div>	
			<div class="list-content">لاضافة مربعات القائمة الجانبية، توجه إلى <a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php">المظهر > مربعات القائمة الجانبية</a>، ثم اسحب المربعات الى "السايدبار".
			</div>
		</div>
	</div>
		<?php endif; ?>
</div>