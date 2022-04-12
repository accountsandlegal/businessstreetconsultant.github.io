<?php
/**
 * The Contents Shortcode.
 */
use Aheto\Helper;
$this->generate_css();

extract( $atts );

$slides = $this->parse_group( $cs_creative_items );

if ( empty( $slides ) ) {
	return '';
}

if ( ! $cs_swiper_custom_options ) {
	$speed  = 1000;
	$effect = 'fade';
	$loop   = false;
}



$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-contents' );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-contents--famulus-creative-slider' );


/**
 * Set carousel params
 */
$carousel_default_params = [
	'speed' => 1000,
]; // will use when not chosen option 'Change slider params'

$carousel_params = \Aheto\Helper::get_carousel_params( $atts, 'cs_swiper_', $carousel_default_params );

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/contents/';
wp_enqueue_style( 'famulus-contents-creative-slider', $sc_dir . 'assets/css/cs_layout2.css', null, null );
wp_enqueue_script( 'famulus-contents-creative-slider-js', $sc_dir . 'assets/js/cs_layout2.min.js', array( 'jquery' ), null );

?>

<div <?php $this->render_attribute_string( 'wrapper' ); ?>>
    <div class="aheto-contents--shape"></div>
    <div class="swiper">

        <div class="swiper-container aheto-contents-swiper-left" <?php echo esc_attr( $carousel_params ); ?>>
            <div class="swiper-wrapper">
				<?php foreach ( $slides as $slide_left ) :
					$slide_left = wp_parse_args($slide_left, [
						'cs_item_image'         => '',
						'cs_item_image_size'    => '',
					]);
					extract($slide_left);

					if ( !$cs_item_image ) {
						continue;
					}
					$lazy_class = $cs_swiper_lazy ? ' swiper-lazy' : '';
					$background_image = \Aheto\Helper::get_background_attachment($cs_item_image, $cs_content_imgimage_size, $atts, 'cs_content_img', $cs_swiper_lazy);
					?>
                    <div class="swiper-slide">
                        <div class="aheto-contents-slider-wrap " <?php echo esc_attr($background_image); ?>>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
        <div class="swiper-container aheto-contents-swiper-right" <?php echo esc_attr( $carousel_params ); ?> data-thumbs="1">
            <div class="swiper-wrapper">
				<?php foreach ( $slides as $slide_right ) :
					$slide_right = wp_parse_args($slide_right, [
						'cs_item_title'         => '',
						'cs_item_desc'          => '',
						'cs_item_btn_direction' => ''
					]);
					extract($slide_right);
					?>
                    <div class="swiper-slide">
                        <div class="aheto-contents-slider-wrap">

                            <div class="aheto-contents-slider__content">
                            <div class="aheto-contents-slider__content-bg">
								<?php if ( $cs_item_title ) {
									$cs_item_title = str_replace( ']]', '</span>', $cs_item_title );
									$cs_item_title = str_replace( '[[', '<span>', $cs_item_title );
									?>
                                    <h2 class="aheto-contents__title"><?php echo  wp_kses($cs_item_title, 'post'); ?></h2>
								<?php }

								if ( $cs_item_desc ) { ?>
                                    <p class="aheto-contents__desc"><?php echo wp_kses( $cs_item_desc , 'post'); ?></p>
								<?php }

								if ( $cs_main_add_button || $cs_add_add_button ) { ?>
                                    <div class="aheto-contents__links  <?php echo esc_attr($cs_item_btn_direction) == 'space_between' ? 'space_between' : '';?>">
										<?php
										echo \Aheto\Helper::get_button( $this, $slide_right, 'cs_main_' );
										echo esc_attr($cs_item_btn_direction) == 'is-vertical' ? '<br>' : '';
										echo \Aheto\Helper::get_button( $this, $slide_right, 'cs_add_' ); ?>
                                    </div>
								<?php } ?>
                            </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
		<?php $this->swiper_arrow( 'cs_swiper_' ); ?>
    </div>

</div>
