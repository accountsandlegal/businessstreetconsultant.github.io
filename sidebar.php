<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Famulus
 */

if ( ! is_active_sidebar( 'famulus-sidebar' ) ) {
	return;
}
?>

<div class="col-12 col-lg-4 col-md-12 famulus-blog--sidebar-wrapper">
    <div class="famulus-blog--sidebar">
		<?php dynamic_sidebar( 'famulus-sidebar' ); ?>
    </div>
</div>

