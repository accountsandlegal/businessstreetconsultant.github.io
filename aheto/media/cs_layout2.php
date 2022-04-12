<?php
/**
 * The Media Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

if ( empty($cs_image_video) ) {

	return '';
}
$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'aheto-media-video');
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
if( $cs_high_video == true){
	$this->add_render_attribute('wrapper', 'class', 'aheto-media-video-higher');

}
/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/media/';
wp_enqueue_style('famulus-media-video', $sc_dir . 'assets/css/cs_layout2.css', null, null);
wp_enqueue_script('magnific');

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<?php if ( !empty($cs_image_video) ):
		$background_image = Helper::get_background_attachment($cs_image_video, $image_size, $atts);
		?>
		<div class="aheto-media-video__container" <?php echo esc_attr($background_image); ?>>
			<?php if ( !empty($cs_video_link )) { ?>
				<a href="<?php echo esc_url($cs_video_link); ?>"
				   class="js-video-btn aheto-media-video__link ">
					<i></i>
				</a>
			<?php }?>
		</div>
	<?php endif; ?>
</div>
