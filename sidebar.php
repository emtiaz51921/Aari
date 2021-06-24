<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aari
 */
if ( ! is_active_sidebar( 'default-sidebar' ) ) {
	return;
}
?>

<!-- Side Bar -->
<div class="col-lg-4">
	<div id="sidebar" class="sidebar light-sidebar">
		<div class="sidebar__inner">
			<div class="sidbar_w">
				<?php
				dynamic_sidebar( 'default-sidebar' );
				?>
			</div>
		</div>
	</div>
</div>
<!-- End Side Bar -->
