<?php
/**
 * The Progress Bar Shortcode.
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
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute( 'wrapper', 'class', 'aheto-progress--famulus-line' );


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/progress-bar/';
wp_enqueue_style( 'famulus-progress-bar', $sc_dir . 'assets/css/cs_layout2.css', null, null );

?>

<div <?php $this->render_attribute_string('wrapper'); ?>>

	<div class="aheto-progress aheto-progress--bar">

		<?php
		// Heading.
		if ( $heading ) {
			echo '<h5 class="aheto-progress__title">' . wp_kses($heading, 'post') . '</h5>';
		}
		?>

		<div class="aheto-progress__bar prog-bar">
			<div class="aheto-progress__bar-holder prog-bar-hldr">
				<span class="aheto-progress__bar-perc prog-bar-perc t-medium"><?php echo absint($percentage); ?></span>%
			</div>
			<div class="aheto-progress__bar-val prog-bar-val"></div>
		</div>

	</div>

</div>
