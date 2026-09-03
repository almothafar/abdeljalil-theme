<?php
// Nothing to render: no widgets, and the setup hint below is for editors only.
// Returning early keeps an empty aside out of the flex row -- see the
// .site-container:only-child rule in style.css.
if ( ! is_active_sidebar( 'sidebar-1' ) && ! current_user_can( 'edit_theme_options' ) ) {
	return;
}
?>
<aside class="site-sidebar">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<?php // Setup hint for editors only; it names an admin URL and is of no use to visitors. ?>
		<div class="sidebox">
			<div class="widgettitle"><?php esc_html_e( 'القائمة الجانبية', 'abdeljalil' ); ?></div>
			<div class="list-content">
				<p>
					<?php
					printf(
						/* translators: %s: link to the Widgets admin screen. */
						esc_html__( 'لإضافة مربعات القائمة الجانبية، توجه إلى %s، ثم اسحب المربعات إلى "السايدبار".', 'abdeljalil' ),
						'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">'
							. esc_html__( 'المظهر > مربعات القائمة الجانبية', 'abdeljalil' )
							. '</a>'
					);
					?>
				</p>
			</div>
		</div>
	<?php endif; ?>
</aside>
