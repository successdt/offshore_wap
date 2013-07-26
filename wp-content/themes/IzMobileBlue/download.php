<?php
/*
Template Name: Download
*/
?>
<?php get_header(); ?>
<?php
	$post = get_post(get_query_var('post_id') );
?>
		<div class="iz-box">
			<div class="iz-title">
                <h2 class="h2service"><?php echo 'Tải về ' . strip_shortcodes($post->post_title); ?></h2>
			</div>
	<div class="iz-content">
<?php
	$pattern = get_shortcode_regex();
	preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches );

	if( is_array( $matches ) && array_key_exists( 2, $matches ) && in_array( 'download', $matches[2] ) )
	{
		foreach ($matches[0] as $value) {
			$value = wpautop( $value, true );
			echo do_shortcode($value);
		}
	echo "<a href=" . get_permalink($post->post_id) . ">Đọc thêm về ". strip_shortcodes($post->post_title) . "</a><br />";
	} else {
		// Do Nothing
		echo '<h1>Không tìm thấy</h1>';
	}
?>

		</div>
	</div>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-single') ) : ?>
	<?php endif; ?>
<?php get_footer(); ?>