<?php
/**
 * The Bg Text Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */
extract($atts);
wp_enqueue_script('typed');

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'aheto-heading');
$this->add_render_attribute('wrapper', 'class', 'aheto-heading--famulus__in-one-line');
$this->add_render_attribute('wrapper', 'class', $alignment);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
if ( $cs_white_text == true ) {
	$this->add_render_attribute('wrapper', 'class', 'aheto-heading__white-text');
}
if ( $cs_white_add_text == true ) {
	$this->add_render_attribute('wrapper', 'class', 'aheto-heading__white-highlight-text');
}
$animation = isset( $title_animation ) && !empty( $title_animation );

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/heading/';
wp_enqueue_style('famulus-heading-one-line', $sc_dir . 'assets/css/cs_layout2.css', null, null);

?>

<div <?php $this->render_attribute_string('wrapper'); ?>>

	<?php if (!empty($heading)) { ?>
	<<?php echo esc_attr($text_tag); ?> class="aheto-heading__title">
	<?php echo wp_kses($this->highlight_text($heading, $animation), 'post'); ?>
</<?php echo esc_attr($text_tag); ?>>
<?php } ?>
<?php if ( !empty($cs_link_title )&& !empty($cs_link_url )) { ?>
	<?php if ( $cs_hide_line == false ) { ?>
		<div class="aheto-heading__line"></div>
	<?php } ?>
	<a href="<?php echo esc_url($cs_link_url); ?>"
	   class="aheto-heading__link <?php echo esc_attr($cs_link_arrow) == true ? 'aheto-heading__link-arrow' : ''; ?>">
		<?php echo esc_html($cs_link_title); ?>
	</a>
<?php } ?>

</div>