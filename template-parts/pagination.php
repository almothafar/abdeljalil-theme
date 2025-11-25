<nav class="navigation" role="navigation">
	<?php
	the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => __( '&laquo; السابق', 'abdeljalil' ),
		'next_text' => __( 'التالي &raquo;', 'abdeljalil' ),
	) );
	?>
</nav>
