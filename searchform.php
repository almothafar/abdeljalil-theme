<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div>
	<input type="submit" id="searchsubmit" value="" class="searchbtn" title="إبحث !" TABINDEX="2" />
	<input type="text" value="إبحث.." name="s" id="s" class="searchbox" onclick="clear_value(s)" onblur="set_value(s)" TABINDEX="1" />
</div>
</form>