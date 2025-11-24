<form role="search" method="get" class="search-form-modern" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'البحث عن:', 'abdeljalil' ); ?></span>
		<input type="search" class="search-input" placeholder="<?php echo esc_attr_x( 'إبحث...', 'placeholder', 'abdeljalil' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-button">
		<i class="fas fa-search"></i>
		<span class="screen-reader-text"><?php _e( 'بحث', 'abdeljalil' ); ?></span>
	</button>
</form>
