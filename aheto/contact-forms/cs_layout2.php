<?php
/**
 * Contact Forms default templates.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract( $atts );

$this->generate_css();

$full_width_button = isset($full_width_button) && $full_width_button ? 'full_width_button' : '';

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', 'widget widget_aheto__cf--famulus-classic-form' );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
$this->add_render_attribute( 'wrapper', 'class', $full_width_button );

if( $cs_hide_border == true){
	$this->add_render_attribute( 'wrapper', 'class', 'widget widget_aheto__cf--famulus-hide-form' );
}

$this->add_render_attribute( 'form', 'class', 'widget_aheto__form text-' . $button_align . ' count-' . $count_input );

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/contact-forms/';
wp_enqueue_style('famulus-cf-classic-form', $sc_dir . 'assets/css/cs_layout2.css', null, null);
wp_enqueue_script( 'famulus-cf-classic-form-js', $sc_dir . 'assets/js/cs_layout2.min.js', array( 'jquery' ), null ); ?>


<div <?php $this->render_attribute_string( 'wrapper' ); ?>>

	<?php if ( !empty( $title ) ) :

		echo '<' .  $cs_title_tag . ' class="widget_aheto__title">' . wp_kses_post( $title ). '</'.  $cs_title_tag . '>';

	 endif; ?>

	<div <?php $this->render_attribute_string( 'form' ); ?>>

		<?php if ( !empty( $contact_form ) ) : ?>
			<div class="<?php echo Helper::get_button($this, $atts, 'form_', true); ?>">
				<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $contact_form ) . '"]' ); ?>
			</div>
		<?php endif; ?>

	</div>

</div>
