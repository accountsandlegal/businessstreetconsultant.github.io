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
$cs_simple_link = $this->parse_group($cs_simple_link);

if ( empty($cs_simple_link) ) {
	return '';
}
$this->generate_css();
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-contents');
$this->add_render_attribute('wrapper', 'class', 'aheto-contents--famulus-simple-link');


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/contents/';
wp_enqueue_style('famulus-content-simple-link', $sc_dir . 'assets/css/cs_layout6.css', null, null);

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<?php foreach ( $cs_simple_link as $item ) : ?>
		<div class="aheto-contents__text-wrap">
			<?php if ( !empty($item['cs_title_simple']) ):
				echo '<' . $item['cs_title_tag_simple'] . ' class="aheto-contents__title">' .
					$item['cs_title_simple']
					. '</' . $item['cs_title_tag_simple'] . '>';
			endif; ?>
			<div class="aheto-contents__text">
				<?php if ( !empty($item['cs_text']) ): ?>
					<p class="aheto-contents__desc">
						<?php echo esc_html($item['cs_text']) ?>
					</p>
				<?php endif; ?>
				<?php if ( !empty($item['cs_link_title_simple']) ): ?>
					<a href="<?php echo esc_url($item['cs_link_url_simple']);?>"
					   class="aheto-contents__link">
						<?php echo esc_html($item['cs_link_title_simple']) ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
