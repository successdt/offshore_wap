<div class="sidebar">
	<h2><?php //_e('Search'); ?>Tìm kiếm</h2>
	<form action="<?php bloginfo('url'); ?>/" method="GET">
		<input type="text" value="Nhập từ khóa cần tìm..." name="s" id="ls" class="searchfield" onfocus="if (this.value == 'Nhập từ khóa cần tìm...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Nhập từ khóa cần tìm...';}" />
		<input type="submit" value="Search!" class="searchbutton" />
	</form>
</div>