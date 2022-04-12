<?php
/**
 * The Contents Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);
$cs_icon = $this->parse_group($cs_icon);

if ( empty($cs_icon) ) {
	return '';
}
$this->generate_css();
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-contents');
$this->add_render_attribute('wrapper', 'class', 'aheto-contents--famulus-icon-simple');


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/contents/';
wp_enqueue_style('famulus-content-icon-simple', $sc_dir . 'assets/css/cs_layout5.css', null, null);

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<?php foreach ( $cs_icon as $item ) : ?>
		<div class="aheto-contents__icon-wrap">
			<?php if ( !empty($item['icon_font']) ): ?>
				<?php
				$icon = $item['icon_font'];

				if ( $icon == 'ionicons' ) { ?>
					<i class="<?php echo wp_kses($item['icon_ionicons'], 'post'); ?>"></i>
				<?php } else { ?>
					<i class="<?php echo wp_kses($item['icon_font-awesome'], 'post'); ?>"></i>
				<?php } ?>
			<?php endif; ?>
			<?php if ( !empty($item['cs_item_title']) ): ?>
				<p class="aheto-contents__title"><?php echo esc_html($item['cs_item_title']); ?></p>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
