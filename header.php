<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Famulus
 */

?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<!-- MAIN_WRAPPER -->

<?php

do_action('famulus_main_header'); ?>