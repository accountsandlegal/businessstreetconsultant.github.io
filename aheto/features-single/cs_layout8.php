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
$this->add_render_attribute('block_wrapper', 'class', 'aheto-content--famulus-no-image');

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/features-single/';
wp_enqueue_style('famulus-features-no-image', $sc_dir . 'assets/css/cs_layout8.css', null, null);

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>

	<div <?php $this->render_attribute_string('block_wrapper'); ?>>
	<div class="aheto-content-block__heading">
		<?php if ( !empty($s_heading) ) : ?>
			<h2 class="aheto-content-block__title "><?php echo wp_kses_post($this->highlight_text($s_heading)); ?>
				<?php if (!empty( $cs_after_title) ) : ?>
					<span class="aheto-content-block__after-title "><?php echo wp_kses_post($cs_after_title); ?></span>
				<?php endif; ?>
			</h2>
		<?php endif; ?>

	</div>
		<?php if ( !empty($cs_subtitle )) : ?>
			<h6 class="aheto-content-block__subtitle "><?php echo wp_kses_post($this->highlight_text($cs_subtitle)); ?></h6>
		<?php endif; ?>
		<?php if ( !empty($s_description )) : ?>
			<p class="aheto-content-block__info-text ">
				<?php echo wp_kses_post($s_description); ?>
			</p>
		<?php endif; ?>
	</div>
</div>
