<?php
/**
 * The Team Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-team-member');
$this->add_render_attribute('wrapper', 'class', 'aheto-team-member--simple');
$this->add_render_attribute('wrapper', 'class', $align);

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/team-member/';
wp_enqueue_style( 'famulus-team-member-simple', $sc_dir . 'assets/css/cs_layout1.css', null, null );

// parse networks
$networks = $this->parse_group($networks);
?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<?php if ( !empty($image )) : ?>
		<div class="aheto-team-member__img-holder">
			<?php echo Helper::get_attachment($image, ['class' => 'aheto-team-member__img'], $image_size); ?>
		</div>
	<?php endif; ?>

	<div class="aheto-team-member__text">
		<?php
		// Name.
		if ( !empty($name )) {
			echo '<h5 class="aheto-team-member__name">' . wp_kses($name, 'post') . '</h5>';
		}

		// Designation.
		if (!empty( $designation) ) {
			echo '<p class="aheto-team-member__position">' . esc_html($designation) . '</p>';
		}

		// Field Values Decode.
		if ( !empty($networks) ) { ?>
			<div class="aheto-team-member__contact">
				<?php echo Helper::get_social_networks($networks, '<a class="aheto-team-member__link" href="%1$s" target="_blank"><i class="ion-social-%2$s"></i></a>'); ?>
			</div>
		<?php } ?>
	</div>
</div>
