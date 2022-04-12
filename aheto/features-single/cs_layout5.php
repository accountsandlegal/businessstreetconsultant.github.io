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
$this->add_render_attribute('wrapper', 'class', 'aheto-content-block');
$this->add_render_attribute('wrapper', 'class', 'aheto-content-block--icon-text-simple');
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
if( $cs_full_width == true){
	$this->add_render_attribute('wrapper', 'class', 'aheto-content-block--full-width');
}
$after_text_class = '';
if( $cs_number_fs == true){
	$after_text_class =  'aheto-content-block__num-after--default';
}
/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/features-single/';
wp_enqueue_style('famulus-features-simple-with-icon', $sc_dir . 'assets/css/cs_layout5.css', null, null);


?>

<div <?php $this->render_attribute_string('wrapper'); ?>>
	<div class="aheto-content-block__info">
	<div class="aheto-content-block__img-num-wrap">
		<?php
		// Icon.
		if ( !empty($s_image) ) {?>
		<div class="aheto-content-block__img-wrap">
			<?php echo '<img src="'.$s_image['url'].'" alt="'.$link_title.'">';?>
		</div>
		<?php }?>
		<div class="aheto-content-block__num-wrap">
			<?php if ( !empty($cs_before_num) ) {?>
				<div class="aheto-content-block__num-before">
					<?php echo esc_html($cs_before_num);?>
				</div>
			<?php }?>
			<?php if ( !empty($cs_num) ) {?>
				<div class="aheto-content-block__num">
					<?php echo esc_html($cs_num);?>
				</div>
			<?php }?>
			<?php if ( !empty($cs_after_num) ) {?>
				<div class="aheto-content-block__num-after <?php echo esc_attr($after_text_class);?>">
					<?php echo esc_html($cs_after_num);?>
				</div>
			<?php }?>
		</div>
		</div>
		<div class="aheto-content-block__info-wrap">

			<?php if ( !empty($s_description )) : ?>
				<p class="aheto-content-block__info-text ">
					<?php echo wp_kses_post($this->highlight_text($s_description)); ?>
				</p>
			<?php endif; ?>
			<?php if ( !empty( $link_title )) : ?>
				<a href="<?php echo esc_url($link_url['url']); ?>" class="aheto-content-block__link-text ">
					<?php echo wp_kses_post($link_title); ?>
					<?php if( $cs_link_arrow == true):?>
					<span></span>
					<?php endif;?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>
