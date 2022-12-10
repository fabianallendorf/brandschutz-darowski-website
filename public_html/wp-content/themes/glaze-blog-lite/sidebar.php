<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glaze_Blog_Lite
 */

if ( ! is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {
	return;
}
?>
<div class="<?php glaze_blog_lite_sidebar_class(); ?>">
	<aside id="secondary" class="secondary-widget-area">
		<?php dynamic_sidebar( 'glaze-blog-lite-sidebar' ); ?>
	</aside><!-- #secondary -->
</div>
