<?php
/**
 * The Pricing Tables Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

extract( $atts );
$this->generate_css();

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-pricing--famulus-simple');
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
if( $cs_active == true){
	$this->add_render_attribute( 'wrapper', 'class', 'aheto-pricing--famulus-active');
}
// Button Link.
$link = $this->get_button_attributes( 'link' );


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/pricing-tables/';
wp_enqueue_style('famulus-pricing-tables', $sc_dir . 'assets/css/cs_layout1.css', null, null);

?>
<div <?php $this->render_attribute_string( 'wrapper' ); ?>>

	<div class="aheto-pricing aheto-pricing--tableColumn js-pricing-height">
		<div class="aheto-pricing__header js-pricing-items" data-height-key="header">

			<?php
			// Heading.
			if ( $heading ) {
				$heading = str_replace(']]', '</span>', $heading);
				$heading = str_replace('[[', '<span>', $heading);
				echo '<h5 class="aheto-pricing__title">' . wp_kses_post( $heading ) . '</h5>';
			}
			?>

			<div class="aheto-pricing__cost">
				<?php
				// Price.
				if ( $price ) {
					echo esc_html( $price );
				}
				?>
			</div>

		</div>

		<div class="aheto-pricing__content">
			<?php if ( $cs_subtitle ) {?>
				<div  class="aheto-pricing__subtitle"><?php echo esc_html( $cs_subtitle );?></div>
			<?php }?>
			<?php
			$features = $this->parse_group( $features );
			if ( ! empty( $features ) ) {

				echo '<div class="aheto-pricing__list">';

				foreach ( $features as $key => $item ) {
					$classes = empty($item['feature']) ? 'is-empty' : '';
//					js-pricing-items ------ class ↓
					echo '<div class="aheto-pricing__list-item  ' . $classes . '" data-height-key="key-' . esc_attr($key) . '">';
					echo '<p>';
					echo '[ok]' === $item['feature'] ? '<i class="ion-checkmark aheto-pricing__list-ico-ok"></i>' : wp_kses_post( $item['feature'] );
					echo '</p>';
					echo '</div>';
				}

				echo '</div>';
			}

			// Button Link.
			if ( isset( $link['href'] ) && ! empty( $link['title'] ) ) {
				$this->add_render_attribute( 'button', $link );
				$this->add_render_attribute( 'button', 'class', 'aheto-btn aheto-pricing__btn aheto-btn--small' );
				printf(
					'<a %s>%s</a>',
					$this->get_render_attribute_string( 'button' ),
					esc_html( $link['title'] )
				);
			}
			?>

		</div>
	</div>

</div>
