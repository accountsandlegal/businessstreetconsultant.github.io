<?php
/**
 * The Clients Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$clients = $this->parse_group($clients);
if ( empty($clients) ) {
	return '';
}

$this->generate_css();

$item_per_row = isset($item_per_row) && !empty($item_per_row) ? $item_per_row : 2;

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'aheto-clients');
$this->add_render_attribute('wrapper', 'class', 'aheto-clients--classic');
$this->add_render_attribute('wrapper', 'class', 'aheto-clients--' . $item_per_row . '-in-row');
$this->add_render_attribute('wrapper', 'class', $hover_style);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/clients/';
wp_enqueue_style('famulus-clients-modern', $sc_dir . 'assets/css/cs_layout1.css', null, null);

?>

<div <?php $this->render_attribute_string('wrapper'); ?>>

	<div class="aheto-clients__wrapper">
		<?php
		foreach ( $clients as $item ) :
			if ( $item['image'] ) :
				$button = $this->get_link_attributes($item['link_url']); ?>

				<div class="aheto-clients__holder">

					<?php
					if ( isset($button['href']) && !empty($button['href']) ) :
						if($item['link_url']['is_external'] == 'on'){
							$target = '_blank';
						}else{
							$target = '_self';
						};
						$this->add_render_attribute('button', $button); ?>
						<a href="<?php echo esc_url($item['link_url']['url']); ?>"
						   target="<?php echo esc_attr($target); ?>">
							<?php echo Helper::get_attachment($item['image']); ?>
						</a>
					<?php else :
						echo Helper::get_attachment($item['image']);
					endif; ?>

				</div>

			<?php endif; ?>

		<?php endforeach; ?>
	</div>

</div>

