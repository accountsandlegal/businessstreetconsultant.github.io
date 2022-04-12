<?php
/**
 * Contact Info default templates.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);
$cs_info = $this->parse_group($cs_info);

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'widget widget_aheto__contact_info--famulus-simple');
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());


$sc_dir = FAMULUS_T_URI . '/aheto/contact-info/';
wp_enqueue_style('famulus-contact-simple-css', $sc_dir . 'assets/css/cs_layout2.css', null, null);

?>

<div <?php $this->render_attribute_string('wrapper'); ?>>
	<?php foreach ( $cs_info as $item ) : ?>
		<div class="widget_aheto__infos">
			<?php if ( !empty($item['icon_font']) ): ?>
				<div class="widget_aheto__icon">
					<?php
					$icon = $item['icon_font'];

					if ( $icon == 'ionicons' ) { ?>
						<i class="<?php echo wp_kses($item['icon_ionicons'], 'post'); ?>"></i>
					<?php } else { ?>
						<i class="<?php echo wp_kses($item['icon_font-awesome'], 'post'); ?>"></i>
					<?php } ?>
				</div>
			<?php endif; ?>
			<div class="widget_aheto__text-block">

				<?php if ( $item['cs_title'] ) { ?>
					<div class="widget_aheto__title">
						<?php echo wp_kses($item['cs_title'], 'post') ?>
					</div>
				<?php } ?>
				<?php if ( !empty($item['cs_desc']) ): ?>
					<p class="widget_aheto__desc">
						<?php echo wp_kses($item['cs_desc'], 'post') ?>
					</p>
				<?php endif; ?>
				<?php if ( !empty($item['cs_location']) ): ?>
					<p class="widget_aheto__link">
						<i class="ion-android-home"></i>
						<?php echo wp_kses($item['cs_location'], 'post') ?>
					</p>
				<?php endif; ?>
				<?php if ( !empty($item['cs_phone']) ): ?>
					<p class="widget_aheto__link">
						<i class="ion-android-call"></i>
						<a href="tel:<?php echo esc_attr( str_replace(" ","", $item['cs_phone']) ); ?>">
							<?php _e('Phone:', 'famulus') ?>
							<?php echo wp_kses($item['cs_phone'], 'post') ?></a>
					</p>
				<?php endif; ?>
				<?php if ( !empty($item['cs_email']) ): ?>
					<p class="widget_aheto__link">
						<i class="ion-android-mail"></i>
						<a href="mailto:<?php echo esc_html($item['cs_email']) ?>">
							<?php _e('Email:', 'famulus') ?>
							<?php echo wp_kses($item['cs_email'], 'post') ?></a>
					</p>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
