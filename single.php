<?php
/**
 * Single post
 */

get_header();

while ( have_posts() ) :
	the_post();

	$post_id = get_the_ID();


	get_template_part( 'template-parts/blog', 'single' );
	wp_enqueue_style('famulus-blog-single', FAMULUS_T_URI . '/assets/css/blog/blog-single.css');

endwhile;

wp_reset_postdata();

get_footer();


