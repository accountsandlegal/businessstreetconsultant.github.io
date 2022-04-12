<?php
/**
 * Time Schedule default templates.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$this->generate_css();

$cs_fixed_menu = isset($cs_fixed_menu) && $cs_fixed_menu ? 'fixed-additional' : '';

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-navbar');
$this->add_render_attribute('wrapper', 'class', 'aheto-navbar--famulus-links');
$this->add_render_attribute('wrapper', 'class', $cs_fixed_menu);


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/navbar/';
wp_enqueue_style('famulus-navbar-links', $sc_dir . 'assets/css/cs_layout3.css', null, null);
wp_enqueue_script('famulus-navbar-additional-js', $sc_dir . 'assets/js/cs_layout2.js', array('jquery'), null); ?>

<div <?php $this->render_attribute_string('wrapper'); ?>>
	<div class="aheto-navbar--inner">
		<?php if (!empty($cs_title)):
		$cs_title = str_replace(']]', '</span>', $cs_title);
		$cs_title = str_replace('[[', '<span>', $cs_title);
		?>
		<<?php echo esc_attr($cs_title_tag); ?> class="aheto-navbar__title">
		<?php echo wp_kses($cs_title, 'post'); ?>
	</<?php echo esc_attr($cs_title_tag); ?>>
	<?php endif; ?>

	<?php foreach ( $cs_links as $cs_link ) {
		if ( !empty($cs_link['cs_link_title']) && !empty($cs_link['cs_link_url']) ) {
			?>
			<a href="<?php echo esc_url($cs_link['cs_link_url']) ?>"
			   title="<?php echo esc_attr($cs_link['cs_link_title']); ?>"
			   class="aheto-navbar__links">
				<span></span>
				<?php echo esc_html($cs_link['cs_link_title']); ?>
			</a>
		<?php }
	} ?>

	<?php
	if ( !empty($cs_link_title_main) && !empty($cs_link_url_main) ) {
		?>
		<a href="<?php echo esc_url($cs_link_url_main) ?>"
		   title="<?php echo esc_attr($cs_link_title_main); ?>"
		   class="aheto-navbar__main-link">
			<?php echo esc_html($cs_link_title_main); ?>
			<span></span>
		</a>
	<?php }
	?>
</div>
</div>

