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
$contact = $this->parse_group($contact);

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'widget widget_aheto__contact_info--modern-famulus');
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());

$underline   = isset($underline) && $underline ? 'underline' : '';
$title_space = isset($title_space) && $title_space ? 'smaller-space' : '';

$this->add_render_attribute('title', 'class', 'widget_aheto__title');
$this->add_render_attribute('title', 'class', $underline);
$this->add_render_attribute('title', 'class', $title_space);



$sc_dir = FAMULUS_T_URI . '/aheto/contact-info/';
wp_enqueue_style('famulus-contact-css', $sc_dir . 'assets/css/cs_layout1.css', null, null);

?>

<div <?php $this->render_attribute_string('wrapper'); ?>>

	<?php if ( !empty($text_logo) && $type_logo == 'text' ) { ?>
		<div class="widget_aheto__logo">
			<h2><?php echo esc_html($text_logo); ?></h2>
		</div>
	<?php } elseif ( is_array($logo) && !empty($logo['url']) || !is_array($logo) && !empty($logo) ) { ?>

		<div class="widget_aheto__logo">
			<?php echo Helper::get_attachment($logo, ['class' => 'aheto-clients__img']); ?>
		</div>

	<?php } ?>

	<div class="widget_aheto__infos">

		<?php foreach ( $contact as $item ) : ?>
			<?php if ( !empty($item['add']) ): ?>
				<p class="widget_aheto__address">
					<?php echo wp_kses($item['add'], 'post') ?>
				</p>
			<?php endif;
			if ( $item['footer_social'] ) { ?>
			<div class="widget_aheto__contact">
				<?php
				echo Helper::get_social_networks_list('<a class="widget_aheto__link" href="%1$s"><i class="ion-social-%2$s"></i></a>', '', $item);
				?>
			</div>
			<?php } ?>
			<?php if ( !empty($item['copyright']) ): ?>
				<p class="widget_aheto__copyright">
					© <?php echo ' '.get_the_date('Y').' ';?><?php echo wp_kses($item['copyright'], 'post') ?>
				</p>
			<?php endif; ?>

		<?php endforeach; ?>

	</div>

</div>
