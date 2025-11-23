<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'البحث عن:', 'abdeljalil' ); ?></span>
		<input type="search" class="searchbox" placeholder="<?php echo esc_attr_x( 'إبحث...', 'placeholder', 'abdeljalil' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="searchbtn">
		<span class="screen-reader-text"><?php _e( 'بحث', 'abdeljalil' ); ?></span>
	</button>
</form>
