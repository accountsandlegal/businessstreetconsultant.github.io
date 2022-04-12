<?php
/**
 * The Banner Slider Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

use Aheto\Helper;

extract($atts);

$banners = $this->parse_group($banners);

if ( empty($banners) ) {
	return '';
}

if ( !$custom_options ) {
	$speed  = 1000;
	$effect = 'fade';
	$loop   = false;
}

$this->generate_css();
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$this->add_render_attribute('wrapper', 'class', 'aheto-banner-wrap');
$this->add_render_attribute('wrapper', 'class', 'aheto-banner-wrap--style-1');


/**
 * Set carousel params
 */
$carousel_default_params = [
	'speed' => 1000,
]; // will use when not chosen option 'Change slider params'

$carousel_params = Helper::get_carousel_params($atts, 'cs_swiper_simple_', $carousel_default_params);


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/banner-slider/';
wp_enqueue_style('famulus-banner-simple', $sc_dir . 'assets/css/cs_layout2.css', null, null);

?>
<div <?php $this->render_attribute_string('wrapper'); ?>>
	<div class="swiper">
		<div class="swiper-container" <?php echo esc_attr($carousel_params); ?>>
			<div class="swiper-wrapper">
				<?php foreach ( $banners as $banner ) :
					$banner = wp_parse_args($banner, [
						'image'         => '',
						'video_class'   => 'aheto-banner__video-btn',
						'title'         => '',
						'cs_title_tag'  => '',
						'desc'          => '',
						'align'         => '',
						'cs_btn_direction' => '',
						'cs_overlay' => ''
					]);
					extract($banner);

					if ( !$image ) {
						continue;
					}
					$lazy_class = $lazy ? ' swiper-lazy' : '';
					$background_image = Helper::get_background_attachment($image, 'full', $atts, '', $lazy);

					?>
					<div class="swiper-slide">
						<div class="aheto-banner aheto-banner--style-1 <?php echo esc_attr($align); ?>" <?php echo esc_attr($background_image); ?>>
							<?php if($cs_overlay == true):?>
								<div class="aheto-banner__dark-overlay"></div>
							<?php endif;?>

							<div class="aheto-banner__content <?php if ( $cs_overlay_img == true ) echo 'aheto-banner__content-to-top'?>">
								<?php
								if ( !empty($title) ) {
									$title = str_replace(']]', '</span>', $title);
									$title = str_replace('[[', '<span>', $title);
									?>
									<<?php echo esc_attr($cs_title_tag);?> class="aheto-banner__title"><?php echo wp_kses($title, 'post'); ?></<?php echo esc_attr($cs_title_tag);?>>
								<?php }

								if ( !empty($desc )) { ?>
									<p class="aheto-banner__desc"><?php echo wp_kses($desc, 'post'); ?></p>
								<?php }

								if ( !empty($main_add_button) || !empty($add_add_button) || !empty($cs_video) ) { ?>
									<div class="aheto-banner__links <?php echo esc_attr($cs_btn_direction) ? 'aheto-banner__links-col' : '';?>">
										<?php
										if ( !empty($cs_video_link) ) { ?>
											<a href="<?php echo esc_url($cs_video_link); ?>"
											   class="js-video-btn aheto-banner__video <?php echo esc_attr($cs_video_style); ?>">
												<i></i>
												<?php if ( !empty($cs_video_title) ): ?>
													<?php echo esc_html($cs_video_title); ?>
													<span></span>
												<?php endif; ?>
											</a>
										<?php }
										echo Helper::get_button($this, $banner, 'main_');
										echo esc_attr($cs_btn_direction) ? '<br>' : '';
										echo Helper::get_button($this, $banner, 'add_'); ?>
									</div>
								<?php } ?>

							</div>
							<?php if ( $cs_overlay_img == true ): ?>
								<?php if ( !empty($cs_image_overlay) ): ?>
									<div class="aheto-banner__overlay-img">
										<?php echo Helper::get_attachment($cs_image_overlay, ['class' => 'js-bg']); ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php $this->swiper_arrow('cs_swiper_simple_'); ?>
	</div>
</div>
