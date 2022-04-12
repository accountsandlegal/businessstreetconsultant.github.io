<?php
/**
 * Custom Page Template
 */

get_header();

$protected = '';

if ( post_password_required() ) {
	$protected = 'protected-page';
}

while ( have_posts() ) : the_post();

	wp_enqueue_style( 'famulus-blog-single', FAMULUS_T_URI . '/assets/css/blog/blog-single.css' ); ?>

    <div class="famulus-blog--single-wrapper <?php echo esc_attr( $protected ); ?>">

	<?php if (function_exists('is_woocommerce') && (is_cart() || is_checkout() || is_account_page())) {

		$famulus_img = '';
		$famulus_background_image = '';

		if (function_exists('aheto')) {
			$famulus_shop_image = Aheto\Helper::get_settings('theme-options.famulus_shop_image');
			$famulus_background_image = isset($famulus_shop_image) && !empty($famulus_shop_image) ? "style=background-image:url(" . $famulus_shop_image . ")" : '';
			$famulus_img = isset($famulus_shop_image) && !empty($famulus_shop_image) ? 'with-image' : '';
		} ?>

        <div class="famulus-shop-banner <?php echo esc_attr($famulus_img); ?> " <?php echo esc_attr($famulus_background_image); ?>>
            <h1 class="title"><?php the_title(); ?></h1>
        </div>

	<?php } else { ?>
        <div class="famulus-blog--single__top-content" style="background-image: url('<?php echo get_the_post_thumbnail_url()?>')">

            <div class="container">
                <div class="row">
                    <div class="col-12">

						<?php the_title( '<h1 class="famulus-blog--single__title text-center">', '</h1>' ); ?>

                    </div>
                </div>
            </div>

        </div>
<?php } ?>
        <div class="container famulus-blog--single__post-content">
            <div class="row">
                <div class="col-12">

                    <div class="famulus-blog--single__content-wrapper page">

						<?php the_content();
						wp_link_pages( 'link_before=<span class="famulus-blog--single__pages">&link_after=</span>&before=<div class="famulus-blog--single__post-nav"> <span>' . esc_html__( "Page:", 'famulus' ) . ' </span> &after=</div>' ); ?>

                    </div>

					<?php if ( comments_open() || '0' != get_comments_number() && wp_count_comments( $get_id ) ) { ?>
                        <div class="famulus-blog--single__comments page">
							<?php comments_template( '', true ); ?>
                        </div>
					<?php } ?>

                </div>
            </div>
        </div>
    </div>


<?php
endwhile;

get_footer();
