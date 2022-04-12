<?php
/**
 * The Features Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

extract($atts);

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'widget widget_aheto');
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());

// Block Wrapper.
$this->add_render_attribute('block_wrapper', 'class', 'aheto-content--famulus-with-image');

$use_dot = isset($use_dot) && !empty($use_dot) ? 'famulus-dot' : '';
$link_url = isset($link_url) && !empty($link_url) ? $link_url : '#';
/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/features-single/';
wp_enqueue_style('famulus-features-single-with-image', $sc_dir . 'assets/css/cs_layout3.css', null, null);
wp_enqueue_script( 'famulus-feature-single-js', $sc_dir . 'assets/js/cs_layout3.min.js', array( 'jquery' ), null );

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>

	<div <?php $this->render_attribute_string('block_wrapper'); ?>>
		<div class="aheto-content-block__wrap">
			<?php if (!empty( $s_image) ) : ?>
				<div class="aheto-content-block__image"
					<?php echo
					\Aheto\Helper::get_background_attachment($s_image, 'full', $atts); ?>>
				</div>
			<?php endif; ?>

			<div class="aheto-content-block__inner">

				<div class="aheto-content-block__content">

					<?php if (!empty( $s_heading )) : ?>
						<h4 class="aheto-content-block__title <?php echo esc_attr($use_dot); ?>"><?php echo esc_html($s_heading); ?></h4>
					<?php endif; ?>

					<div class="aheto-content-block__info">
						<?php if ( !empty($s_description )) : ?>
							<p class="aheto-content-block__info-text ">
								<?php echo wp_kses_post($s_description); ?>
							</p>
						<?php endif; ?>
					</div>
					<div class="aheto-content-block__link-wrap">
						<?php if (  !empty($link_title)) : ?>
							<a href="<?php echo esc_url($link_url['url']); ?>" class="aheto-content-block__link-text ">
								<?php echo wp_kses_post($link_title); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
