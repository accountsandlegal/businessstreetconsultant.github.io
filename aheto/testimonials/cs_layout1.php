<?php
/**
 * The Testimonials Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$cs_testimonials_simple_item = $this->parse_group($cs_testimonials_simple_item);
if ( empty($cs_testimonials_simple_item) ) {
	return '';
}

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
if( $cs_white_text == true){
	$this->add_render_attribute('wrapper', 'class', 'aheto-tm-wrapper--white-text');
}
$this->add_render_attribute('wrapper', 'class', 'aheto-tm-wrapper');
$this->add_render_attribute('wrapper', 'class', 'aheto-tm-wrapper--modern');

// Swiper.
if ( !$custom_options ) {
	$speed  = 500;
	$space  = 30;
	$slides = 3;
	$large  = 3;
	$medium = 2;
	$small  = 1;
}

/**
 * Set carousel params
 */
$carousel_default_params = [
	'speed'    => 1500,
	'autoplay' => 1,
	'simulate_touch' => 1,
	'loop'  => 1,
	'initial_slide' => 0,
	'spaces'   => 25,
	'slides'   => 3,
]; // will use when not chosen option 'Change slider params'

$carousel_params = Helper::get_carousel_params($atts, 'cs_swiper_', $carousel_default_params);


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/testimonials/';
wp_enqueue_style( 'famulus-testimonials-modern', $sc_dir . 'assets/css/cs_layout1.css', null, null );


?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<div class="swiper">
		<div class="swiper-container" <?php echo esc_attr($carousel_params); ?>>
			<div class="swiper-wrapper">
				<?php foreach ( $cs_testimonials_simple_item as $item ) : ?>
					<div class="swiper-slide">
						<div class="aheto-tm aheto-tm__modern">
							<div class="aheto-tm__content">
								<?php
								// Testimonial.
								if ( isset($item['cs_testimonial']) ) {
									echo '<p class="aheto-tm__blockquote">' . wp_kses($item['cs_testimonial'], 'post') . '</p>';
								} ?>
							</div>
							<div class="aheto-tm__author">
								<?php if ( !empty($item['cs_image']) ) :
									$background_image = Helper::get_background_attachment($item['cs_image'], 'thumbnail', $atts);
									?>
									<div class="aheto-tm__avatar" <?php echo esc_attr($background_image); ?>>
									</div>
								<?php endif; ?>
								<div class="aheto-tm__info">
									<?php
									// Name.
									if ( isset($item['cs_name']) ) {
										echo '<h5 class="aheto-tm__name">' . wp_kses($item['cs_name'], 'post') . '</h5>';
									}
									// Company.
									if ( isset($item['cs_company']) ) {
										echo '<h6 class="aheto-tm__position">' . wp_kses($item['cs_company'], 'post') . '</h6>';
									}
									?>
								</div>

							</div>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<?php $this->swiper_pagination('cs_swiper_'); ?>

		</div>

		<?php $this->swiper_arrow('cs_swiper_'); ?>

	</div>

</div>
