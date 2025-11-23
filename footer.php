</div><!-- #wrapper -->

<footer id="footer" role="contentinfo">
	<div id="right">
		جميع الحقوق محفوظة &copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		|
		<a href="https://almothafar.com" target="_blank" rel="noopener noreferrer">Al-Mothafar Al-Hasan</a>
		<?php
		printf(
			' | ' . __( 'قالب %1$s، مُحدّث بواسطة %2$s', 'abdeljalil' ),
			'<a href="https://github.com/almothafar/abdeljalil-theme" target="_blank" rel="noopener">Abdeljalil Theme v2.0</a>',
			'<a href="https://almothafar.com" target="_blank" rel="noopener">Al-Mothafar</a>'
		);
		?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
