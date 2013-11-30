<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<input type="text" name="s" id="s" value="<?php _e('Search here..', 'boothemes'); ?>" onfocus='if (this.value == "Search here..") { this.value = ""; }' onblur='if (this.value == "") { this.value = "Search here.."; }' />
</form>