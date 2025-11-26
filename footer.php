</div><!-- .site-wrapper -->

<footer class="site-footer" role="contentinfo">
	<div class="footer-navigation">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'footer-menu',
			'container'      => false,
			'fallback_cb'    => 'wp_page_menu',
		) );
		?>
	</div>
	<div class="footer-copyright">
		جميع الحقوق محفوظة &copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		<?php
		printf(
			' | ' . __( 'قالب %1$s، مُحدّث بواسطة %2$s', 'abdeljalil' ),
			'<a href="https://github.com/almothafar/abdeljalil-theme" target="_blank" rel="noopener">Abdeljalil Theme</a>',
			'<a href="https://almothafar.com" target="_blank" rel="noopener">Al-Mothafar</a>'
		);
		?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
