<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Famulus
 */

if ( ! is_active_sidebar( 'famulus-sidebar-additional' ) ) {
	return;
}
?>

<div class="col-12 col-lg-3 col-md-6 famulus-blog--sidebar-additional-wrapper">
    <div class="famulus-blog--sidebar">
		<?php dynamic_sidebar( 'famulus-sidebar-additional' ); ?>
    </div>
</div>

