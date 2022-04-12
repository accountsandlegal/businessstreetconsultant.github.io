<?php
/**
 * Category Template
 */
$count = isset( $posts->found_posts ) && ! empty( $posts->found_posts ) ? $posts->found_posts : '0';
$count_text = $count == '1' ? esc_html__( 'result found', 'famulus' ) : esc_html__( 'results found', 'famulus' );

$famulus_img = '';
$famulus_background_image = '';

if (function_exists('aheto')) {
	$famulus_shop_image = Aheto\Helper::get_settings('theme-options.famulus_blog_image');
	$famulus_background_image = isset($famulus_shop_image) && !empty($famulus_shop_image) ? "style=background-image:url(" . $famulus_shop_image . ")" : '';
	$famulus_img = isset($famulus_shop_image) && !empty($famulus_shop_image) ? 'with-image' : '';
}

get_header(); ?>
    <div class="famulus-blog--banner <?php echo esc_attr($famulus_img); ?>" <?php echo esc_attr($famulus_background_image); ?>>
		<?php if ( is_search() ) { ?>
            <div class="famulus-blog--banner__title-wrap">
                <h1 class="famulus-blog--banner__title"><?php esc_html_e( 'Showing results for ', 'famulus' ); ?>
                    <span>"<?php echo esc_html( $term ); ?>"</span></h1>
                <div class="famulus-blog--banner__count-results"><?php echo esc_html( $count . ' ' . $count_text ); ?></div>
            </div>
		<?php } else { ?>
            <div class="famulus-blog--banner__title-wrap">
                <h1 class="famulus-blog--banner__title"><?php esc_html_e( 'Blog', 'famulus' ); ?></h1>
            </div>
		<?php } ?>
    </div>

<?php

if ( have_posts() ) :
	get_template_part( 'template-parts/blog', 'list-category' );
	wp_enqueue_style( 'famulus-blog-list', FAMULUS_T_URI . '/assets/css/blog/blog-list.css' );

else : ?>
    <div class="famulus-blog--search-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="famulus-blog--search-page__title"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'famulus' ); ?></h3>
                    <div class="famulus-blog--search-page__search-form">
						<?php get_search_form( true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;

get_footer();