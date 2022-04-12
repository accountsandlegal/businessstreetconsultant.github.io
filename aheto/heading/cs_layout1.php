<?php
/**
 * The Heading Shortcode.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */
extract($atts);
wp_enqueue_script('typed');

$this->generate_css();

// Wrapper.
$this->add_render_attribute('wrapper', 'id', $element_id);
$this->add_render_attribute('wrapper', 'class', 'aheto-heading');
if ( $cs_white_text == true ) {
	$this->add_render_attribute('wrapper', 'class', 'aheto-heading__white-text');
}
if ( $cs_white_add_text == true ) {
	$this->add_render_attribute('wrapper', 'class', 'aheto-heading__white-add-text');
}
if ( $cs_use_descr_typo == true ) {
	$decs = 'aheto-heading__desc-def';
}else{
	$decs = ' ';
}
$this->add_render_attribute('wrapper', 'class', 'aheto-heading--famulus__simple');
$this->add_render_attribute('wrapper', 'class', $alignment);
$this->add_render_attribute('wrapper', 'class', $this->the_custom_classes());
$animation = isset( $title_animation ) && !empty( $title_animation );

/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/heading/';
wp_enqueue_style('famulus-heading-simple', $sc_dir . 'assets/css/cs_layout1.css', null, null);

?>

<div <?php $this->render_attribute_string('wrapper'); ?>>

	<?php
	// Heading.
	$heading = $this->get_heading();

	if ( !empty($cs_subtitle )) {
		echo '<' . $cs_subtitle_tag . ' class="aheto-heading__subtitle">' . esc_html($cs_subtitle) . '</' . $cs_subtitle_tag . '>';
	}

	if ( !empty($heading )) {
		echo '<' . $text_tag . ' class="aheto-heading__title">' . $this->highlight_text($heading, $animation) . '</' . $text_tag . '>';
	}

	if ( !empty($description )) {
		echo '<p class="aheto-heading__desc  ' . $decs . '">' . wp_kses($description, 'post') . '</p>';
	}
	if (!empty( $cs_link_title )) {
		echo '<a href="' . esc_url($cs_link_url) . '" class="aheto-heading__link">' . wp_kses($cs_link_title, 'post');
		if ( $cs_link_arrow == true ) {
			echo '<i class="icon"></i>';
		};
		echo '</a>';
	}

	foreach ( $cs_socials_links as $item ):
		if ( $item['cs_socials'] == true ):?>
			<div class="aheto-heading__socials">
				<?php $networks = \Aheto\Helper::choices_social_network();
				$html           = '';
				$template       = '<a class="aheto-heading__soc-link" href="%1$s" target="_blank"><i class="ion-social-%2$s"></i>%3$s</a>';
				$prefix         = 'cs_soc_link';
				foreach ( $networks as $key => $name ) {
					$social = $prefix . $key;
					if ( !empty($item) ) {
						if ( empty($item[$social]) ) {
							continue;
						}
						$html .= sprintf($template, esc_url($item[$social]), strtolower($name), strtoupper($name));
					} else {
						if ( empty($item[$social]) ) {
							continue;
						}
						$html .= sprintf($template, esc_url($social), strtolower($name), strtoupper($name));
					}
				}
				echo wp_kses($html, 'post'); ?>
			</div>
		<?php endif;
	endforeach; ?>
</div>
