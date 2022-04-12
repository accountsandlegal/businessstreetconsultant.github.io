<?php
/**
 * The Blockquote Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

extract( $atts );

if ( empty( $quote ) ) {
	return '';
}

$this->generate_css();

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
$this->add_render_attribute( 'blockqoute', 'class', 'aheto-quote' );
$this->add_render_attribute( 'blockqoute', 'class', 'aheto-quote--famulus-simple' );

if (isset($icon_position) && $icon_position) {
	$this->add_render_attribute('blockqoute', 'class', $icon_position);
	$this->add_render_attribute('blockqoute', 'class', $icon_size);
}


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/blockquote/';
wp_enqueue_style('famulus-blockquote-simple', $sc_dir . 'assets/css/cs_layout1.css', null, null);

?>
<div <?php $this->render_attribute_string( 'wrapper' ); ?>>
	<blockquote <?php $this->render_attribute_string( 'blockqoute' ); ?>>

		<?php
		// Author.
		if ( isset( $author ) ) {
			echo '<h4 class="aheto-quote__author">' . wp_kses( $author , 'post') . '</h4>';
		}
		// Qoute.
		$qoute_tag = isset($qoute_tag) && !empty($qoute_tag) ? $qoute_tag : 'h1';
		echo '<' . $qoute_tag . '>' . wp_kses( $quote , 'post') . '</' . $qoute_tag . '>';

		if ( isset( $cs_date ) ) {
			echo '<span class="aheto-quote__date">' . wp_kses( $cs_date, 'post' ) . '</span>';
		}
		?>

	</blockquote>
</div>
