<?php


add_action('aheto_before_aheto_heading_register', 'famulus_heading_shortcode');
add_action('aheto_before_aheto_contact-forms_register', 'famulus_contact_forms_shortcode');
add_action('aheto_before_aheto_progress-bar_register', 'famulus_progress_shortcode');
add_action('aheto_before_aheto_clients_register', 'famulus_clients_shortcode');
add_action('aheto_before_aheto_navigation_register', 'famulus_navigation_shortcode');
add_action('aheto_before_aheto_features-timeline_register', 'famulus_features_timeline_shortcode');
add_action('aheto_before_aheto_navbar_register', 'famulus_navbar_shortcode');
add_action('aheto_before_aheto_recent-posts_register', 'famulus_recent_posts_shortcode');
add_action('aheto_before_aheto_title-bar_register', 'famulus_title_bar_shortcode');
add_action('aheto_before_aheto_testimonials_register', 'famulus_testimonials_shortcode');
add_action('aheto_before_aheto_team_register', 'famulus_team_shortcode');
add_action('aheto_before_aheto_custom-post-types_register', 'famulus_custom_post_types_shortcode');
add_action('aheto_before_aheto_features-single_register', 'famulus_features_single_shortcode');
add_action('aheto_before_aheto_banner-slider_register', 'famulus_banner_slider_shortcode');
add_action('aheto_before_aheto_team-member_register', 'famulus_team_member_shortcode');
add_action('aheto_before_aheto_features-tabs_register', 'famulus_features_tabs_shortcode');
add_action('aheto_before_aheto_media_register', 'famulus_gallery_shortcode');
add_action('aheto_before_aheto_social-networks_register', 'famulus_social_networks_shortcode');
add_action('aheto_before_aheto_contents_register', 'famulus_contents_shortcode');
add_action('aheto_before_aheto_contact-info_register', 'famulus_contact_info_shortcode');
add_action('aheto_before_aheto_blockquote_register', 'famulus_blockquote_shortcode');
add_action('aheto_before_aheto_pricing-tables_register', 'famulus_pricing_tables_shortcode');
add_action('aheto_before_aheto_portfolio-nav_register', 'famulus_portfolio_nav_shortcode');


/**
 * Heading Shortcode
 */
function famulus_heading_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/heading/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);

	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Title Link', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);


	$shortcode->add_dependecy('cs_text_typo', 'cs_use_text_typo', 'true');
	$shortcode->add_dependecy('cs_use_descr_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_descr_typo', 'cs_use_descr_typo', 'true');
	$shortcode->add_dependecy('cs_add_desc_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_desc_typo', 'cs_add_desc_use_typo', 'true');
	$shortcode->add_dependecy('cs_add_subtitle_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_subtitle_typo', 'cs_add_subtitle_use_typo', 'true');
	$shortcode->add_dependecy('cs_add_link_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_link_typo', 'cs_add_link_use_typo', 'true');

	famulus_add_dependency( ['title_animation', 'heading', 'alignment', 'source', 'text_tag', 'text_typo', 'use_typo', 'use_typo_hightlight', 'text_typo_hightlight', 'description'], [ 'cs_layout1' ], $shortcode );

	$shortcode->add_dependecy('cs_subtitle', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_subtitle_tag', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_link_title', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_link_url', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_link_arrow', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_white_text', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_white_add_text', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_socials_links', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_soc_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_soc_typo', 'cs_soc_use_typo', 'true');

	famulus_add_dependency( ['text_tag', 'use_typo', 'use_typo_hightlight', 'text_typo_hightlight', 'text_typo', 'title_animation', 'heading'], [ 'cs_layout2' ], $shortcode );

	$shortcode->add_dependecy('cs_link_title', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_link_url', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_link_arrow', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_white_text', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_white_add_text', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_hide_line', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_add_link_use_typo', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_add_link_typo', 'cs_add_link_use_typo', 'true');

	$shortcode->add_params([
		'cs_subtitle'              => [
			'type'    => 'text',
			'heading' => esc_html__('Subitle', 'famulus'),
			'grid'    => 12,
		],
		'cs_subtitle_tag'          => [
			'type'    => 'select',
			'heading' => esc_html__('Element tag for Subtitle', 'famulus'),
			'options' => [
				'h1'  => 'h1',
				'h2'  => 'h2',
				'h3'  => 'h3',
				'h4'  => 'h4',
				'h5'  => 'h5',
				'h6'  => 'h6',
				'p'   => 'p',
				'div' => 'div',
			],
			'default' => 'p',
			'grid'    => 5,
		],
		'cs_use_descr_typo'        => [
			'type'    => 'switch',
			'heading' => esc_html__('Use default font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_subtitle_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Subtitle?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_subtitle_typo'     => [
			'type'     => 'typography',
			'group'    => 'Subtitle Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-heading__subtitle',
		],
		'cs_soc_use_typo'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  Socials?', 'famulus'),
			'grid'    => 3,
		],
		'cs_soc_typo' => [
			'type'     => 'typography',
			'group'    => 'Social Links Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-heading__soc-link',
		],
		'cs_add_desc_use_typo'     => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_desc_typo'         => [
			'type'     => 'typography',
			'group'    => 'Description Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-heading__desc',
		],
		'cs_add_link_use_typo'     => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_link_typo'         => [
			'type'     => 'typography',
			'group'    => 'Link Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-heading__link',
		],
		'cs_white_text'            => [
			'type'        => 'switch',
			'heading'     => esc_html__('White Text', 'famulus'),
			'grid'        => 3,
			'description' => esc_html__('It will work if not used custom options. It will colorize all the content in the shortcode except Highlight ', 'famulus'),

		],
		'cs_white_add_text'        => [
			'type'        => 'switch',
			'heading'     => esc_html__('White Highlight Text', 'famulus'),
			'grid'        => 3,
			'description' => esc_html__('It will work if not used custom options', 'famulus'),
		],
		'cs_hide_line'             => [
			'type'    => 'switch',
			'heading' => esc_html__('Hide Line?', 'famulus'),
			'grid'    => 3,
		],

		'cs_link_title' => [
			'type'    => 'text',
			'heading' => esc_html__('Link Title', 'famulus'),
			'grid'    => 12,
		],
		'cs_link_url'   => [
			'type'    => 'text',
			'heading' => esc_html__('Link Url', 'famulus'),
			'grid'    => 12,
		],
		'cs_link_arrow' => [
			'type'    => 'switch',
			'heading' => esc_html__('Add arrow to link?', 'famulus'),
			'grid'    => 3,
		],

		'cs_socials_links' => [
			'type'    => 'group',
			'heading' => esc_html__('Choose social links', 'famulus'),
			'params'  => [
				'cs_socials' => [
					'type'    => 'switch',
					'heading' => esc_html__('Add social links?', 'famulus'),
					'grid'    => 3,
				],
			]
		]
	]);

	\Aheto\Params::add_networks_params($shortcode, [
		'prefix'     => 'cs_soc_link',
		'dependency' => ['cs_socials', 'true']
	], 'cs_socials_links');

}

function famulus_heading_shortcode_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_add_subtitle_use_typo']) && !empty($shortcode->atts['cs_add_subtitle_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-heading__subtitle'], $shortcode->parse_typography($shortcode->atts['cs_add_subtitle_typo']));
	}
	if ( !empty($shortcode->atts['cs_add_link_use_typo']) && !empty($shortcode->atts['cs_add_link_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-heading__link'], $shortcode->parse_typography($shortcode->atts['cs_add_link_typo']));
	}
	if ( !empty($shortcode->atts['cs_use_text_typo']) && !empty($shortcode->atts['cs_text_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-heading__bg-title'], $shortcode->parse_typography($shortcode->atts['cs_text_typo']));
	}
	if ( !empty($shortcode->atts['use_typo_hightlight']) && !empty($shortcode->atts['text_typo_hightlight']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-heading__title span'], $shortcode->parse_typography($shortcode->atts['text_typo_hightlight']));
	}
	if ( !empty($shortcode->atts['cs_add_desc_use_typo']) && !empty($shortcode->atts['cs_add_desc_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-heading__desc'], $shortcode->parse_typography($shortcode->atts['cs_add_desc_typo']));
	}
	if ( !empty($shortcode->atts['cs_soc_use_typo']) && !empty($shortcode->atts['cs_soc_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-heading__soc-link'], $shortcode->parse_typography($shortcode->atts['cs_soc_typo']));
	}

	return $css;
}

add_filter('aheto_dynamic_css_heading', 'famulus_heading_shortcode_dynamic_css', 10, 2);


/**
 * Contact forms Shortcode
 */

function famulus_contact_forms_shortcode($shortcode) {

	$theme_dir = FAMULUS_T_URI . '/aheto/contact-forms/previews/';


	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Classic', 'famulus'),
		'image' => $theme_dir . 'cs_layout2.jpg',
	]);

	$shortcode->add_dependecy('bg_color_fields', 'template', ['cs_layout1', 'cs_layout2']);
	$shortcode->add_dependecy('title', 'template', 'cs_layout2');
	$shortcode->add_dependecy('use_title_typo', 'template', 'cs_layout2');
	$shortcode->add_dependecy('count_input', 'template', 'cs_layout2');
	$shortcode->add_dependecy('button_align', 'template', 'cs_layout2');
	$shortcode->add_dependecy('full_width_button', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_title_tag', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_hide_border', 'template', 'cs_layout2');

	$shortcode->add_params([

		'cs_title_tag'   => [
			'type'    => 'select',
			'heading' => esc_html__('Element tag for Title', 'famulus'),
			'options' => [
				'h1'  => 'h1',
				'h2'  => 'h2',
				'h3'  => 'h3',
				'h4'  => 'h4',
				'h5'  => 'h5',
				'h6'  => 'h6',
				'p'   => 'p',
				'div' => 'div',
			],
			'default' => 'h3',
			'grid'    => 5,
		],
		'cs_hide_border' => [
			'type'    => 'switch',
			'heading' => esc_html__('Hide Border', 'famulus'),
			'grid'    => 3,
		],
	]);
}

function famulus_contact_forms_shortcode_button($form_button) {

	$form_button['dependency'][1][] = 'cs_layout1';
	$form_button['dependency'][1][] = 'cs_layout2';

	return $form_button;
}

add_filter('aheto_button_contact-forms', 'famulus_contact_forms_shortcode_button', 10, 2);





/**
 * Recent Post Shortcode
 */

function famulus_recent_posts_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/recent-posts/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Creative', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Portfolio Modern', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);
	$shortcode->depedency['limit']['template'][] = 'cs_layout2';
}


/**
 * Title Bar Shortcode
 */

function famulus_title_bar_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/title-bar/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Title With Search', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);

	famulus_add_dependency( ['source', 'title_tag', 'title', 'use_title_typo', 'title_typo', 'searchform', 'sf_button', 'sf_placeholder', 'title'], [ 'cs_layout1' ], $shortcode );


}

/**
 * Progress Bar Shortcode
 */

function famulus_progress_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/progress-bar/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Line', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);

	famulus_add_dependency( ['percentage', 'heading', 'description'], [ 'cs_layout1' ], $shortcode );

	$shortcode->add_dependecy('white_text', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_chart_symbol_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_chart_symbol_typo', 'cs_add_chart_symbol_use_typo', 'true');
	$shortcode->add_dependecy('cs_add_chart_per_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_chart_per_typo', 'cs_add_chart_symbol_use_typo', 'true');
	$shortcode->add_dependecy('cs_add_title_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_title_typo', 'cs_add_title_use_typo', 'true');
	$shortcode->add_dependecy('cs_add_desc_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_desc_typo', 'cs_add_desc_use_typo', 'true');



	$shortcode->add_dependecy('cs_num_use_typo', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_num_typo', 'cs_num_use_typo', 'true');
	$shortcode->depedency['percentage']['template'][] = 'cs_layout2';
	$shortcode->depedency['heading']['template'][]    = 'cs_layout2';


	$shortcode->add_params([
		'white_text' => [
			'type'    => 'switch',
			'heading' => esc_html__('White Text', 'famulus'),
			'grid'    => 12,
		],
		'cs_add_chart_symbol_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for chart symbol?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_chart_symbol_typo'     => [
			'type'     => 'typography',
			'group'    => 'Chart symbol Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-progress__chart-symbol',
		],
		'cs_add_chart_per_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for chart percent?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_chart_per_typo'     => [
			'type'     => 'typography',
			'group'    => 'Chart percent Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-progress__chart-symbol i',
		],
		'cs_add_title_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Title?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_title_typo'     => [
			'type'     => 'typography',
			'group'    => 'Title Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-progress__title',
		],
		'cs_add_desc_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_add_desc_typo'     => [
			'type'     => 'typography',
			'group'    => 'Description Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-progress__desc',
		],
		'cs_num_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Number?', 'famulus'),
			'grid'    => 3,
		],
		'cs_num_typo'        => [
			'type'     => 'typography',
			'group'    => 'Number Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-progress__bar-holder',
		],
	]);
}
function famulus_progress_bar_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_add_chart_symbol_use_typo']) && !empty($shortcode->atts['cs_add_chart_symbol_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-progress__chart-symbol'], $shortcode->parse_typography($shortcode->atts['cs_add_chart_symbol_typo']));
	}
	if ( !empty($shortcode->atts['cs_add_chart_per_use_typo']) && !empty($shortcode->atts['cs_add_chart_per_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-progress__chart-symbol i'], $shortcode->parse_typography($shortcode->atts['cs_add_chart_per_typo']));
	}
	if ( !empty($shortcode->atts['cs_add_title_use_typo']) && !empty($shortcode->atts['cs_add_title_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-progress__title'], $shortcode->parse_typography($shortcode->atts['cs_add_title_typo']));
	}
	if ( !empty($shortcode->atts['cs_add_desc_use_typo']) && !empty($shortcode->atts['cs_add_desc_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-progress__desc'], $shortcode->parse_typography($shortcode->atts['cs_add_desc_typo']));
	}
	if ( !empty($shortcode->atts['cs_num_use_typo']) && !empty($shortcode->atts['cs_num_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-progress__bar-holder'], $shortcode->parse_typography($shortcode->atts['cs_num_typo']));
	}
	return $css;
}

add_filter('aheto_progress_bar_dynamic_css', 'famulus_progress_bar_layout1_dynamic_css', 10, 2);

/**
 * Clients Shortcode
 */

function famulus_clients_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/clients/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Modern', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);

	$shortcode->add_dependecy('max_width', 'template', 'cs_layout1');

	famulus_add_dependency( ['hover_style', 'clients', 'item_per_row', 'advanced'], [ 'cs_layout1' ], $shortcode );

	$shortcode->add_params([
		'max_width' => [
			'type'      => 'slider',
			'heading'   => esc_html__('Max width for image section', 'famulus'),
			'grid'      => 12,
			'range'     => [
				'px' => [
					'min'  => 0,
					'max'  => 3000,
					'step' => 5,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .aheto-clients__wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		],

	]);
}


/**
 * Testimonial Shortcode
 */

function famulus_testimonials_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/testimonials/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Slider Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);


	$shortcode->add_dependecy('cs_bg_text', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_dark_version', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_testimonials_creative_item', 'template', 'cs_layout2');

	$shortcode->add_dependecy('cs_testimonials_simple_item', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_white_text', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo', 'cs_text_use_typo', 'true');
	$shortcode->add_dependecy('cs_position_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_position_typo', 'cs_position_use_typo', 'true');
	$shortcode->add_dependecy('cs_author_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_author_typo', 'cs_author_use_typo', 'true');
	$shortcode->add_params([

		'cs_testimonials_creative_item' => [
			'type'    => 'group',
			'heading' => esc_html__('Modern Testimonials Items', 'famulus'),
			'params'  => [
				'cs_image'       => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Display Image', 'famulus'),
				],
				'cs_name'        => [
					'type'    => 'text',
					'heading' => esc_html__('Name', 'famulus'),
					'default' => esc_html__('Author name', 'famulus'),
				],
				'cs_company'     => [
					'type'    => 'text',
					'heading' => esc_html__('Position', 'famulus'),
					'default' => esc_html__('Author position', 'famulus'),
				],
				'cs_title'       => [
					'type'    => 'textarea',
					'heading' => esc_html__('Testimonial title', 'famulus'),
					'default' => esc_html__('Just Wow!', 'famulus'),
				],
				'cs_testimonial' => [
					'type'    => 'textarea',
					'heading' => esc_html__('Testimonial', 'famulus'),
					'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'famulus'),
				],
			],
		],
		'cs_testimonials_simple_item'   => [
			'type'    => 'group',
			'heading' => esc_html__('Modern Testimonials Items', 'famulus'),
			'params'  => [
				'cs_image'       => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Display Image', 'famulus'),
				],
				'cs_name'        => [
					'type'    => 'text',
					'heading' => esc_html__('Name', 'famulus'),
					'default' => esc_html__('Author name', 'famulus'),
				],
				'cs_company'     => [
					'type'    => 'text',
					'heading' => esc_html__('Position', 'famulus'),
					'default' => esc_html__('Author position', 'famulus'),
				],
				'cs_testimonial' => [
					'type'    => 'textarea',
					'heading' => esc_html__('Testimonial', 'famulus'),
					'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'famulus'),
				],
			],
		],
		'cs_white_text'                 => [
			'type'        => 'switch',
			'heading'     => esc_html__('Use White Text?', 'famulus'),
			'grid'        => 3,
			'description' => esc_html__('Works only for Name and Position', 'famulus'),

		],
		'cs_text_use_typo'              => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Testimonials?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo'                  => [
			'type'     => 'typography',
			'group'    => 'Testimonials Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-tm__blockquote',
		],
		'cs_position_use_typo'          => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Position?', 'famulus'),
			'grid'    => 3,
		],
		'cs_position_typo'              => [
			'type'     => 'typography',
			'group'    => 'Position Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-tm__position',
		],
		'cs_author_use_typo'          => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Author?', 'famulus'),
			'grid'    => 3,
		],
		'cs_author_typo'              => [
			'type'     => 'typography',
			'group'    => 'Author Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-tm__name',
		],
	]);

	\Aheto\Params::add_carousel_params($shortcode, [
		'custom_options' => true,
		'prefix'         => 'cs_swiper_',
		'include'        => ['pagination', 'speed', 'loop', 'autoplay', 'arrows', 'spaces', 'slides', 'simulate_touch'],
		'dependency'     => ['template', ['cs_layout1', 'cs_layout2']]
	]);

}

function famulus_testimonials_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_text_use_typo']) && !empty($shortcode->atts['cs_text_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-tm__blockquote'], $shortcode->parse_typography($shortcode->atts['cs_text_typo']));
	}
	if ( !empty($shortcode->atts['cs_position_use_typo']) && !empty($shortcode->atts['cs_position_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-tm__position'], $shortcode->parse_typography($shortcode->atts['cs_position_typo']));
	}
	if ( !empty($shortcode->atts['cs_author_use_typo']) && !empty($shortcode->atts['cs_author_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-tm__name'], $shortcode->parse_typography($shortcode->atts['cs_author_typo']));
	}

	return $css;
}


function famulus_navbar_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/navbar/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Navbar 1', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Navbar 2', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);

	$shortcode->add_layout('cs_layout3', [
		'title' => esc_html__('Famulus Links', 'famulus'),
		'image' => $dir . 'cs_layout3.jpg',
	]);


	famulus_add_dependency( ['transparent', 'columns', 'left_links', 'right_links', 'right_hide_mobile'], [ 'cs_layout1' ], $shortcode );

	$shortcode->add_dependecy('cs_item_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_item_typo', 'cs_item_use_typo', 'true');
	$shortcode->add_dependecy('cs_item_label_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_item_label_typo', 'cs_item_label_use_typo', 'true');


	$shortcode->add_dependecy('cs_menus', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_title', 'template', 'cs_layout2');

	$shortcode->depedency['cs_links']['template'][] = 'cs_layout3';
	$shortcode->add_dependecy('cs_title', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_title_tag', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_link_title_main', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_link_url_main', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_title_use_typo', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_title_typo', 'cs_title_use_typo', 'true');
	$shortcode->add_dependecy('cs_highlight_use_typo', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_highlight_typo', 'cs_highlight_use_typo', 'true');
	$shortcode->add_dependecy('cs_links_all_use_typo', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_links_all_typo', 'cs_links_all_use_typo', 'true');
	$shortcode->add_dependecy('cs_link_main_use_typo', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_link_main_typo', 'cs_link_main_use_typo', 'true');

	$shortcode->add_params([
		'cs_menus'               => [
			'type'        => 'select',
			'heading'     => esc_html__('Menu', 'famulus'),
			'options'     => \Aheto\Helper::choices_nav_menu(),
			'description' => esc_html__('Use menu with one level items', 'famulus'),
		],
		'cs_title'               => [
			'type'    => 'text',
			'heading' => esc_html__('Menu Title', 'famulus'),
		],
		'cs_title_tag'           => [
			'type'    => 'select',
			'heading' => esc_html__('Title tag', 'famulus'),
			'options' => [
				'h1'  => 'h1',
				'h2'  => 'h2',
				'h3'  => 'h3',
				'h4'  => 'h4',
				'h5'  => 'h5',
				'h6'  => 'h6',
				'p'   => 'p',
				'div' => 'div',
			],
			'default' => 'h4',
			'grid'    => 2,
		],
		'cs_links'               => [
			'type'    => 'group',
			'heading' => esc_html__('Links', 'famulus'),
			'params'  => [
				'cs_link_title' => [
					'type'    => 'text',
					'heading' => esc_html__('Link Title', 'famulus'),
				],
				'cs_link_url'   => [
					'type'    => 'text',
					'heading' => esc_html__('Link Url', 'famulus'),
					'default' => esc_html__('#', 'famulus'),
				],
			]
		],
		'cs_link_title_main'     => [
			'type'    => 'text',
			'heading' => esc_html__('Main Link Title', 'famulus'),
		],
		'cs_link_url_main'       => [
			'type'    => 'text',
			'heading' => esc_html__('Main Link Url', 'famulus'),
			'default' => esc_html__('#', 'famulus'),
		],
		'cs_item_use_typo'       => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Text?', 'famulus'),
			'grid'    => 3,
		],
		'cs_item_typo'           => [
			'type'     => 'typography',
			'group'    => 'Text Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-navbar--item',
		],
		'cs_item_label_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Label?', 'famulus'),
			'grid'    => 3,
		],
		'cs_item_label_typo'     => [
			'type'     => 'typography',
			'group'    => 'Label Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-navbar--item-label',
		],
		'cs_title_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Title?', 'famulus'),
			'grid'    => 3,
		],
		'cs_title_typo'     => [
			'type'     => 'typography',
			'group'    => 'Title Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-navbar__title',
		],
		'cs_highlight_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for highlight?', 'famulus'),
			'grid'    => 3,
		],
		'cs_highlight_typo'     => [
			'type'     => 'typography',
			'group'    => 'Highlight Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-navbar__title span',
		],
		'cs_links_all_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for links?', 'famulus'),
			'grid'    => 3,
		],
		'cs_links_all_typo'     => [
			'type'     => 'typography',
			'group'    => 'Famulus Links Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-navbar__links',
		],
		'cs_link_main_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for main link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_main_typo'     => [
			'type'     => 'typography',
			'group'    => 'Famulus Link Main Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-navbar__main-link',
		],
	]);
}

function famulus_navbar_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_item_label_use_typo']) && !empty($shortcode->atts['cs_item_label_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-navbar--item'], $shortcode->parse_typography($shortcode->atts['cs_item_label_typo']));
	}
	if ( !empty($shortcode->atts['cs_item_use_typo']) && !empty($shortcode->atts['cs_item_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-navbar--item-label'], $shortcode->parse_typography($shortcode->atts['cs_item_typo']));
	}

	if ( !empty($shortcode->atts['cs_title_use_typo']) && !empty($shortcode->atts['cs_title_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-navbar__title'], $shortcode->parse_typography($shortcode->atts['cs_title_typo']));
	}
	if ( !empty($shortcode->atts['cs_highlight_use_typo']) && !empty($shortcode->atts['cs_highlight_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-navbar__title span'], $shortcode->parse_typography($shortcode->atts['cs_highlight_typo']));
	}
	if ( !empty($shortcode->atts['cs_links_all_use_typo']) && !empty($shortcode->atts['cs_links_all_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-navbar__links'], $shortcode->parse_typography($shortcode->atts['cs_links_all_typo']));
	}
	if ( !empty($shortcode->atts['cs_link_main_use_typo']) && !empty($shortcode->atts['cs_link_main_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-navbar__main-link'], $shortcode->parse_typography($shortcode->atts['cs_link_main_typo']));
	}
	return $css;
}

add_filter('aheto_navbar_dynamic_css', 'famulus_navbar_layout1_dynamic_css', 10, 2);


function famulus_navigation_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/navigation/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Navigation', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);


	$shortcode->depedency['mob_logo']['type_logo']             = ['image'];
	famulus_add_dependency( ['type_logo','logo', 'text_logo', 'add_scroll_logo', 'transparent', 'mob_logo', 'add_mob_scroll_logo', 'scroll_mob_logo', 'scroll_logo'], [ 'cs_layout1' ], $shortcode );


	$shortcode->add_dependecy('cs_progressbar', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_logo_use_typo', 'type_logo', 'text');
	$shortcode->add_dependecy('cs_logo_typo', 'cs_logo_use_typo', 'true');
	$shortcode->add_dependecy('cs_link_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_link_typo', 'cs_link_use_typo', 'true');
	$shortcode->add_params([
		'cs_progressbar'   => [
			'type'    => 'switch',
			'heading' => esc_html__('Add progressbar?', 'famulus'),
			'grid'    => 3,
		],
		'cs_logo_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Logo Text?', 'famulus'),
			'grid'    => 3,
		],
		'cs_logo_typo'     => [
			'type'     => 'typography',
			'group'    => 'Logo Text Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .main-header__logo span',
		],
		'cs_link_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_typo'     => [
			'type'     => 'typography',
			'group'    => 'Link Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .main-header--classic ul li a',
		],
	]);

	\Aheto\Params::add_button_params($shortcode, [
		'prefix'     => 'main_',
		'group'      => 'Desktop buttons',
		'icons'      => true,
		'dependency' => ['template', ['cs_layout1']]
	]);

	\Aheto\Params::add_button_params($shortcode, [
		'add_label'  => esc_html__('Add additional button?', 'famulus'),
		'prefix'     => 'add_',
		'group'      => 'Desktop buttons',
		'icons'      => true,
		'dependency' => ['template', ['cs_layout1']]
	]);

	\Aheto\Params::add_button_params($shortcode, [
		'prefix'     => 'main_mob_',
		'group'      => 'Mobile Buttons',
		'icons'      => true,
		'dependency' => ['template', ['cs_layout1']]
	]);

	\Aheto\Params::add_button_params($shortcode, [
		'add_label'  => esc_html__('Add additional button?', 'famulus'),
		'prefix'     => 'add_mob_',
		'group'      => 'Mobile Buttons',
		'icons'      => true,
		'dependency' => ['template', ['cs_layout1']]
	]);
}

function famulus_navigation_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_logo_use_typo']) && !empty($shortcode->atts['cs_logo_typo']) ) {
		\aheto_add_props($css['global']['%1$s .main-header__logo span'], $shortcode->parse_typography($shortcode->atts['cs_logo_typo']));
	}
	if ( !empty($shortcode->atts['cs_link_use_typo']) && !empty($shortcode->atts['cs_link_typo']) ) {
		\aheto_add_props($css['global']['%1$s .main-header--classic ul li a'], $shortcode->parse_typography($shortcode->atts['cs_link_typo']));
	}

	return $css;
}

add_filter('aheto_navigation_dynamic_css', 'famulus_navigation_layout1_dynamic_css', 10, 2);



/**
 * Custom Post Type Shortcode
 */

function famulus_custom_post_types_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/custom-post-types/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Slider', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);

	famulus_add_dependency( ['skin'], [ 'cs_layout2' ], $shortcode );

	famulus_add_dependency( ['skin','image_size', 'use_term', 'use_heading', 't_heading', 't_term'], [ 'cs_layout1' ], $shortcode );

	$shortcode->add_dependecy('cs_single_title', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_title', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_add_url', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_date_use_typo', 'skin', ['cs_skin-2', 'cs_skin-3', 'cs_skin-4', 'cs_skin-7']);
	$shortcode->add_dependecy('cs_date_typo', 'cs_date_use_typo', 'true');
	$shortcode->add_dependecy('cs_desc_use_typo', 'skin', ['cs_skin-2', 'cs_skin-3', 'cs_skin-7']);
	$shortcode->add_dependecy('cs_desc_typo', 'cs_desc_use_typo', 'true');
	$shortcode->add_dependecy('cs_author_use_typo', 'skin', ['cs_skin-2', 'cs_skin-3', 'cs_skin-4', 'cs_skin-7']);
	$shortcode->add_dependecy('cs_author_typo', 'cs_author_use_typo', 'true');
	$shortcode->add_dependecy('cs_highlight_use_typo', 'skin', ['cs_skin-7']);
	$shortcode->add_dependecy('cs_highlight_typo', 'cs_highlight_use_typo', 'true');
	$shortcode->add_dependecy('cs_link_use_typo', 'skin', ['cs_skin-7']);
	$shortcode->add_dependecy('cs_link_typo', 'cs_link_use_typo', 'true');
	$shortcode->add_dependecy('cs_quote_use_typo', 'skin', ['cs_skin-7']);
	$shortcode->add_dependecy('cs_quote_typo', 'cs_quote_use_typo', 'true');
	$shortcode->add_dependecy('cs_quote_author_use_typo', 'skin', ['cs_skin-7']);
	$shortcode->add_dependecy('cs_quote_author_typo', 'cs_quote_author_use_typo', 'true');
	$shortcode->add_dependecy('cs_arrow_use_typo', 'skin', ['cs_skin-7']);
	$shortcode->add_dependecy('cs_arrow_typo', 'cs_arrow_use_typo', 'true');
	$shortcode->add_dependecy('cs_blockq_use_typo', 'skin', ['cs_skin-7']);
	$shortcode->add_dependecy('cs_blockq_typo', 'cs_blockq_use_typo', 'true');


	$shortcode->add_params([
		'cs_single_title' => [
			'type'    => 'text',
			'heading' => esc_html__('Single Button Title', 'famulus'),
		],
		'cs_add_title'    => [
			'type'    => 'text',
			'heading' => esc_html__('Additional Button Title', 'famulus'),
		],
		'cs_add_url'      => [
			'type'    => 'text',
			'heading' => esc_html__('Additional Button Url', 'famulus'),
		],
		'cs_date_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Date?', 'famulus'),
			'grid'    => 3,
		],
		'cs_date_typo'     => [
			'type'     => 'typography',
			'group'    => 'Date Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__date',
		],
		'cs_desc_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_desc_typo'     => [
			'type'     => 'typography',
			'group'    => 'Description Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__excerpt',
		],
		'cs_author_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Author?', 'famulus'),
			'grid'    => 3,
		],
		'cs_author_typo'     => [
			'type'     => 'typography',
			'group'    => 'Author Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__author',
		],
		'cs_highlight_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for highlight?', 'famulus'),
			'grid'    => 3,
		],
		'cs_highlight_typo'     => [
			'type'     => 'typography',
			'group'    => 'Highlight Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__title  span',
		],
		'cs_link_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_typo'     => [
			'type'     => 'typography',
			'group'    => 'Link Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__btn',
		],
		'cs_quote_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for quote?', 'famulus'),
			'grid'    => 3,
		],
		'cs_quote_typo'     => [
			'type'     => 'typography',
			'group'    => 'Quote Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__quote',
		],
		'cs_quote_author_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for quote author?', 'famulus'),
			'grid'    => 3,
		],
		'cs_quote_author_typo'     => [
			'type'     => 'typography',
			'group'    => 'Quote Author Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__quote cite',
		],
		'cs_arrow_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for arrow?', 'famulus'),
			'grid'    => 3,
		],
		'cs_arrow_typo'     => [
			'type'     => 'typography',
			'group'    => 'Arrow Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__slider .swiper-button-prev, {{WRAPPER}} .aheto-cpt-article__slider .swiper-button-next',
		],
		'cs_blockq_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Symbol?', 'famulus'),
			'grid'    => 3,
		],
		'cs_blockq_typo'     => [
			'type'     => 'typography',
			'group'    => 'Symbol Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-cpt-article__quote::before',
		],
	]);


	// Custom skins

	$aheto_skins   = $shortcode->params['skin']['options'];
	$famulus_skins = array(
		'cs_skin-2' => 'Famulus modern skin',
		'cs_skin-3' => 'Famulus modern light date skin',
		'cs_skin-4' => 'Famulus light skin',
		'cs_skin-5' => 'Famulus light skin category',
		'cs_skin-6' => 'Famulus modern skin category',
		'cs_skin-7' => 'Famulus centered',
	);

	$all_skins                            = array_merge($aheto_skins, $famulus_skins);
	$shortcode->params['skin']['options'] = $all_skins;

	\Aheto\Params::add_carousel_params($shortcode, [
		'custom_options' => true,
		'prefix'         => 'cs_swiper_',
		'include'        => ['pagination', 'speed', 'loop', 'autoplay', 'arrows', 'spaces', 'slides', 'simulate_touch'],
		'dependency'     => ['template', ['cs_layout1']]
	]);

}
function famulus_cpt_skin_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_date_use_typo']) && !empty($shortcode->atts['cs_date_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__date'], $shortcode->parse_typography($shortcode->atts['cs_date_typo']));
	}
	if ( !empty($shortcode->atts['cs_desc_use_typo']) && !empty($shortcode->atts['cs_desc_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__excerpt'], $shortcode->parse_typography($shortcode->atts['cs_desc_typo']));
	}
	if ( !empty($shortcode->atts['cs_author_use_typo']) && !empty($shortcode->atts['cs_author_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__author'], $shortcode->parse_typography($shortcode->atts['cs_author_typo']));
	}
	if ( !empty($shortcode->atts['cs_highlight_use_typo']) && !empty($shortcode->atts['cs_highlight_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__title  span'], $shortcode->parse_typography($shortcode->atts['cs_highlight_typo']));
	}
	if ( !empty($shortcode->atts['cs_link_use_typo']) && !empty($shortcode->atts['cs_link_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__btn'], $shortcode->parse_typography($shortcode->atts['cs_link_typo']));
	}
	if ( !empty($shortcode->atts['cs_quote_use_typo']) && !empty($shortcode->atts['cs_quote_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__quote'], $shortcode->parse_typography($shortcode->atts['cs_quote_typo']));
	}
	if ( !empty($shortcode->atts['cs_quote_author_use_typo']) && !empty($shortcode->atts['cs_quote_author_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__quote cite'], $shortcode->parse_typography($shortcode->atts['cs_quote_author_typo']));
	}
	if ( !empty($shortcode->atts['cs_arrow_use_typo']) && !empty($shortcode->atts['cs_arrow_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__slider .swiper-button-prev, %1$s .aheto-cpt-article__slider .swiper-button-next'], $shortcode->parse_typography($shortcode->atts['cs_arrow_typo']));
	}
	if ( !empty($shortcode->atts['cs_blockq_use_typo']) && !empty($shortcode->atts['cs_blockq_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-cpt-article__quote::before'], $shortcode->parse_typography($shortcode->atts['cs_blockq_typo']));
	}

	return $css;
}

add_filter('aheto_cpt_skin_dynamic_css', 'famulus_cpt_skin_layout1_dynamic_css', 10, 2);
/**
 * Features Single Shortcode
 */

function famulus_features_single_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/features-single/previews/';

	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Creative', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);
	$shortcode->add_layout('cs_layout3', [
		'title' => esc_html__('Famulus With Image', 'famulus'),
		'image' => $dir . 'cs_layout3.jpg',
	]);
	$shortcode->add_layout('cs_layout4', [
		'title' => esc_html__('Famulus With Icon', 'famulus'),
		'image' => $dir . 'cs_layout4.jpg',
	]);
	$shortcode->add_layout('cs_layout5', [
		'title' => esc_html__('Modern Famulus With Icon and Number', 'famulus'),
		'image' => $dir . 'cs_layout5.jpg',
	]);

	$shortcode->add_layout('cs_layout6', [
		'title' => esc_html__('Famulus With Image Modern', 'famulus'),
		'image' => $dir . 'cs_layout6.jpg',
	]);

	$shortcode->add_layout('cs_layout7', [
		'title' => esc_html__('Famulus With Logo', 'famulus'),
		'image' => $dir . 'cs_layout7.jpg',
	]);
	$shortcode->add_layout('cs_layout8', [
		'title' => esc_html__('Famulus Without Image', 'famulus'),
		'image' => $dir . 'cs_layout8.jpg',
	]);

	famulus_add_dependency( ['s_image','s_heading', 's_description', 'use_heading', 't_heading', 'use_description', 't_description'], [ 'cs_layout2' ], $shortcode );
	famulus_add_dependency( ['s_image','s_heading', 'use_heading', 't_heading','s_description', 'use_description', 't_description', 'link_url', 'link_title'], [ 'cs_layout3' ], $shortcode );
	famulus_add_dependency( ['s_image','s_heading', 'use_heading', 't_heading','s_description', 'use_description', 't_description'], [ 'cs_layout4' ], $shortcode );
	famulus_add_dependency( ['s_image', 's_description', 'link_url', 'link_title'], [ 'cs_layout5' ], $shortcode );
	famulus_add_dependency( ['s_image', 's_heading', 's_description', 'link_url', 'link_title'], [ 'cs_layout6' ], $shortcode );
	famulus_add_dependency( ['s_image', 's_heading', 's_description'], [ 'cs_layout7' ], $shortcode );
	famulus_add_dependency( ['s_heading', 's_description'], [ 'cs_layout8' ], $shortcode );



	$shortcode->add_dependecy('align', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_link_use_typo', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_link_typo', 'cs_link_use_typo', 'true');
	$shortcode->add_dependecy('cs_before_num', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_num', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_after_num', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_full_width', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_link_arrow', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_number_fs', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_title_use_typo', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_title_typo', 'cs_title_use_typo', 'true');
	$shortcode->add_dependecy('cs_desc_h_use_typo', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_desc_h_typo', 'cs_desc_h_use_typo', 'true');
	$shortcode->add_dependecy('cs_link_use_typo', 'template', 'cs_layout5');
	$shortcode->add_dependecy('cs_link_typo', 'cs_link_use_typo', 'true');
	$shortcode->add_dependecy('cs_active', 'template', 'cs_layout6');
	$shortcode->add_dependecy('cs_img_full', 'template', 'cs_layout6');
	$shortcode->add_dependecy('align', 'template', 'cs_layout6');
	$shortcode->add_dependecy('cs_title_use_typo', 'template', 'cs_layout6');
	$shortcode->add_dependecy('cs_title_typo', 'cs_title_use_typo', 'true');
	$shortcode->add_dependecy('cs_highlight_use_typo', 'template', 'cs_layout6');
	$shortcode->add_dependecy('cs_highlight_typo', 'cs_highlight_use_typo', 'true');
	$shortcode->add_dependecy('cs_link_use_typo', 'template', 'cs_layout6');
	$shortcode->add_dependecy('cs_link_typo', 'cs_link_use_typo', 'true');
	$shortcode->add_dependecy('cs_logo', 'template', 'cs_layout7');
	$shortcode->add_dependecy('cs_title_use_typo', 'template', 'cs_layout7');
	$shortcode->add_dependecy('cs_title_typo', 'cs_title_use_typo', 'true');
	$shortcode->add_dependecy('cs_desc_use_typo', 'template', 'cs_layout7');
	$shortcode->add_dependecy('cs_desc_typo', 'cs_desc_use_typo', 'true');
	$shortcode->add_dependecy('cs_after_title', 'template', 'cs_layout8');
	$shortcode->add_dependecy('cs_subtitle', 'template', 'cs_layout8');
	$shortcode->add_dependecy('cs_title_use_typo', 'template', 'cs_layout8');
	$shortcode->add_dependecy('cs_title_typo', 'cs_title_use_typo', 'true');
	$shortcode->add_dependecy('cs_subtitle_use_typo', 'template', 'cs_layout8');
	$shortcode->add_dependecy('cs_subtitle_typo', 'cs_subtitle_use_typo', 'true');

	$shortcode->add_params([
		'cs_before_num' => [
			'type'    => 'text',
			'heading' => esc_html__('Before Number', 'famulus'),
		],
		'cs_num'        => [
			'type'    => 'text',
			'heading' => esc_html__('Number', 'famulus'),
		],
		'cs_after_num'  => [
			'type'    => 'text',
			'heading' => esc_html__('After Number', 'famulus'),
		],
		'cs_active'     => [
			'type'    => 'switch',
			'heading' => esc_html__('Enable active item?', 'famulus'),
			'grid'    => 3,
		],
		'cs_img_full'   => [
			'type'        => 'switch',
			'heading'     => esc_html__('Full width image?', 'famulus'),
			'description' => esc_html__('If you use this option, Image size option will not work', 'famulus'),
			'grid'        => 3,
		],

		'align'                => [
			'type'    => 'select',
			'heading' => esc_html__('Align', 'famulus'),
			'options' => \Aheto\Helper::choices_alignment(),
		],
		'cs_logo'              => [
			'type'    => 'attach_image',
			'heading' => esc_html__('Add logo', 'famulus'),
		],
		'cs_full_width'        => [
			'type'    => 'switch',
			'heading' => esc_html__('Item full width?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_arrow'        => [
			'type'    => 'switch',
			'heading' => esc_html__('Add link to arrow?', 'famulus'),
			'grid'    => 3,
		],
		'cs_subtitle'          => [
			'type'    => 'text',
			'heading' => esc_html__('Subtitle', 'famulus'),
		],
		'cs_after_title'       => [
			'type'    => 'text',
			'heading' => esc_html__('After Title', 'famulus'),
		],
		'cs_number_fs'         => [
			'type'    => 'switch',
			'heading' => esc_html__('After Title Default Font Size?', 'famulus'),
			'grid'    => 3,
		],
		'cs_title_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Title?', 'famulus'),
			'grid'    => 3,
		],
		'cs_title_typo'        => [
			'type'     => 'typography',
			'group'    => 'Title Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-content-block__title, .aheto-content-block__num-wrap',
		],
		'cs_highlight_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for highlight?', 'famulus'),
			'grid'    => 3,
		],
		'cs_highlight_typo'        => [
			'type'     => 'typography',
			'group'    => 'Highlight Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-content-block__title span',
		],
		'cs_desc_h_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_desc_h_typo'        => [
			'type'     => 'typography',
			'group'    => 'Description Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-content-block__info-text span',
		],
		'cs_subtitle_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Subtitle?', 'famulus'),
			'grid'    => 3,
		],
		'cs_subtitle_typo'     => [
			'type'     => 'typography',
			'group'    => 'Subtitle Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-content-block__subtitle',
		],
		'cs_link_use_typo'     => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_typo'         => [
			'type'     => 'typography',
			'group'    => 'Link Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-content-block__link-wrap a, .aheto-content-block__link-text ',
		],
		'cs_desc_use_typo'     => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_desc_typo'         => [
			'type'     => 'typography',
			'group'    => 'Famulus Description Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-content-block__info-text'
		],

	]);
	\Aheto\Params::add_image_sizer_params($shortcode, [
		'prefix'     => '',
		'dependency' => ['template', ['cs_layout6', 'cs_layout7']]
	]);

}

function famulus_features_single_shortcode_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_title_use_typo']) && !empty($shortcode->atts['cs_title_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-content-block__title, %1$s .aheto-content-block__num-wrap'], $shortcode->parse_typography($shortcode->atts['cs_title_typo']));
	}
	if ( !empty($shortcode->atts['cs_highlight_use_typo']) && !empty($shortcode->atts['cs_highlight_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-content-block__title span'], $shortcode->parse_typography($shortcode->atts['cs_highlight_typo']));
	}
	if ( !empty($shortcode->atts['cs_desc_h_use_typo']) && !empty($shortcode->atts['cs_desc_h_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-content-block__info-text span'], $shortcode->parse_typography($shortcode->atts['cs_desc_h_typo']));
	}
	if ( !empty($shortcode->atts['cs_subtitle_use_typo']) && !empty($shortcode->atts['cs_subtitle_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-content-block__subtitle'], $shortcode->parse_typography($shortcode->atts['cs_subtitle_typo']));
	}
	if ( !empty($shortcode->atts['cs_desc_use_typo']) && !empty($shortcode->atts['cs_desc_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-content-block__info-text '], $shortcode->parse_typography($shortcode->atts['cs_desc_typo']));
	}
	if ( !empty($shortcode->atts['cs_link_use_typo']) && !empty($shortcode->atts['cs_link_typo']) ) {
		\aheto_add_props($css['global']['%1$s  .aheto-content-block__link-wrap a, .aheto-content-block__link-text '], $shortcode->parse_typography($shortcode->atts['cs_link_typo']));
	}

	return $css;
}

/**
 * Features Timeline Shortcode
 */

function famulus_features_timeline_shortcode($shortcode) {
	$dir = FAMULUS_T_URI . '/aheto/features-timeline/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Modern', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_dependecy('cs_timeline', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_dark_version', 'template', 'cs_layout1');

	$shortcode->add_dependecy('cs_title_h_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_title_h_typo', 'cs_title_h_use_typo', 'true');
	$shortcode->add_params([
		'cs_timeline'     => [
			'type'    => 'group',
			'heading' => esc_html__('Items', 'famulus'),
			'params'  => [
				'cs_timeline_date'    => [
					'type'    => 'text',
					'heading' => esc_html__('Date', 'famulus'),
				],
				'cs_timeline_title'   => [
					'type'        => 'textarea',
					'heading'     => esc_html__('Title', 'famulus'),
					'description' => esc_html__('To Hightlight text insert text between: [[ Your Text Here ]]', 'famulus'),
					'default'     => esc_html__('Title with [[ hightlight ]] text.', 'famulus'),
				],
				'cs_timeline_content' => [
					'type'    => 'textarea',
					'heading' => esc_html__('Content', 'famulus'),
					'default' => esc_html__('Add some text for content', 'famulus'),
				],
				'cs_timeline_image'   => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Add image', 'famulus'),
				],
			],
		],
		'cs_dark_version' => [
			'type'    => 'switch',
			'heading' => esc_html__('Enable dark version?', 'famulus'),
			'grid'    => 3,
		],
		'cs_title_h_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Title Highlight?', 'famulus'),
			'grid'    => 3,
		],
		'cs_title_h_typo'        => [
			'type'     => 'typography',
			'group'    => 'Title Highlight Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-timeline__title span',
		],
	]);
	\Aheto\Params::add_button_params($shortcode, [
		'prefix' => 'cs_',
		'icons'  => true,
	], 'cs_timeline');
}
function famulus_features_timeline_layout1_dynamic_css($css, $shortcode) {
	if ( !empty($shortcode->atts['cs_title_h_use_typo']) && !empty($shortcode->atts['cs_title_h_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-timeline__title span'], $shortcode->parse_typography($shortcode->atts['cs_title_h_typo']));
	}
	return $css;
}

add_filter('aheto_features_timeline_dynamic_css', 'famulus_features_timeline_layout1_dynamic_css', 10, 2);

/**
 * Features Banner Slider
 */

function famulus_banner_slider_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/banner-slider/previews/';


	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);
	$shortcode->add_layout('cs_layout3', [
		'title' => esc_html__('Famulus With Breadcrumbs', 'famulus'),
		'image' => $dir . 'cs_layout3.jpg',
	]);


	famulus_add_dependency( ['use_heading', 't_heading'], [ 'cs_layout2' ], $shortcode );
	famulus_add_dependency( ['use_heading', 't_heading'], [ 'cs_layout1' ], $shortcode );

	$shortcode->depedency['overlay_color']['overlay'][]           = 'true';


	$shortcode->add_dependecy('famulus_modern_banners', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_h_title_use_typo', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_h__title_typo', 'cs_h__title_use_typo', 'true');
	$shortcode->add_dependecy('cs_desc_use_typo', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_desc_typo', 'cs_desc_use_typo', 'true');
	$shortcode->add_dependecy('cs_video_use_typo', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_video_typo', 'cs_video_use_typo', 'true');


	$shortcode->add_dependecy('cs_image_overlay', 'cs_overlay_img', 'true');
	$shortcode->add_dependecy('cs_overlay_img', 'template', 'cs_layout2');
	$shortcode->add_dependecy('banners', 'template', 'cs_layout2');

	$shortcode->add_dependecy('cs_video_title', 'cs_video', 'true');
	$shortcode->add_dependecy('cs_video_link', 'cs_video', 'true');
	$shortcode->add_dependecy('cs_video_style', 'cs_video', 'true');

	$shortcode->add_dependecy('cs_image_bc', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_title_bc', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_img_overlay_bc', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_white_bc', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_links_use_typo', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_links_typo', 'cs_links_use_typo', 'true');

	$shortcode->add_params([
		'banners'                => [
			'type'    => 'group',
			'heading' => esc_html__('Banners', 'famulus'),
			'params'  => [
				'image'            => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Image', 'famulus'),
				],
				'title'            => [
					'type'        => 'textarea',
					'heading'     => esc_html__('Title', 'famulus'),
					'description' => esc_html__('To Hightlight text insert text between: <i> Your Text Here </i>, To Hightlight text with color insert text between: [[ Your Text Here ]], For text in new line use <br> ', 'famulus'),

				],
				'cs_title_tag'     => [
					'type'    => 'select',
					'heading' => esc_html__('Element tag for Title', 'famulus'),
					'options' => [
						'h1'  => 'h1',
						'h2'  => 'h2',
						'h3'  => 'h3',
						'h4'  => 'h4',
						'h5'  => 'h5',
						'h6'  => 'h6',
						'p'   => 'p',
						'div' => 'div',
					],
					'default' => 'h1',
					'grid'    => 5,
				],
				'desc'             => [
					'type'    => 'textarea',
					'heading' => esc_html__('Description', 'famulus'),
				],
				'align'            => [
					'type'    => 'select',
					'heading' => esc_html__('Align', 'famulus'),
					'options' => \Aheto\Helper::choices_alignment(),
				],
				'cs_btn_direction' => [
					'type'    => 'select',
					'heading' => esc_html__('Buttons Direction', 'famulus'),
					'options' => [
						''            => esc_html__('Horizontal', 'famulus'),
						'is-vertical' => esc_html__('Vertical', 'famulus'),
					],
				],
				'cs_video'         => [
					'type'    => 'switch',
					'heading' => esc_html__('Add Video Button?', 'famulus'),
					'grid'    => 12,
				],
				'cs_video_title'   => [
					'type'    => 'text',
					'heading' => esc_html__('Video Title', 'famulus'),
				],
				'cs_video_link'    => [
					'type'    => 'text',
					'heading' => esc_html__('Video Link', 'famulus'),
				],
				'cs_video_style'   => [
					'type'    => 'select',
					'heading' => esc_html__('Buttons Style', 'famulus'),
					'options' => [
						''          => esc_html__('Default', 'famulus'),
						'is-active' => esc_html__('Active', 'famulus'),
					],
					'default' => '',
				],
				'cs_overlay'       => [
					'type'    => 'switch',
					'heading' => esc_html__('Add dark overlay?', 'famulus'),
					'grid'    => 12,
				],
			]
		],
		'famulus_modern_banners' => [
			'type'    => 'group',
			'heading' => esc_html__('Banners', 'famulus'),
			'params'  => [
				'cs_image'         => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Background Image', 'famulus'),
				],
				'cs_overlay'       => [
					'type'    => 'switch',
					'heading' => esc_html__('Enable overlay for background image?', 'famulus'),
					'grid'    => 12,
				],
				'cs_overlay_color' => [
					'type'    => 'colorpicker',
					'heading' => esc_html__('Overlay Color', 'famulus'),
					'grid'    => 12,
					'default' => ''
				],
				'cs_desc'          => [
					'type'    => 'text',
					'heading' => esc_html__('Subtitle', 'famulus'),
				],
				'cs_title'         => [
					'type'    => 'textarea',
					'heading' => esc_html__('Title', 'famulus'),
				],
				'align'            => [
					'type'    => 'select',
					'heading' => esc_html__('Align', 'famulus'),
					'options' => \Aheto\Helper::choices_alignment(),
				],
			]
		],

		'cs_h_title_use_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Highlight?', 'famulus'),
			'grid'    => 3,
		],
		'cs_h_title_typo'     => [
			'type'     => 'typography',
			'group'    => 'Banner Highlight Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-banner__title i, .aheto-banner__title span',
		],
		'cs_desc_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Description?', 'famulus'),
			'grid'    => 3,
		],
		'cs_desc_typo'        => [
			'type'     => 'typography',
			'group'    => 'Banner Description Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-banner__desc',
		],
		'cs_video_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Video Link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_video_typo'        => [
			'type'     => 'typography',
			'group'    => 'Video Link Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-banner__video',
		],
		'cs_overlay_img'      => [
			'type'    => 'switch',
			'heading' => esc_html__('Enable overlay image for slider?', 'famulus'),
			'grid'    => 12,
		],
		'cs_image_overlay'    => [
			'type'    => 'attach_image',
			'heading' => esc_html__('Overlay Image', 'famulus')
		],
		'cs_image_bc'         => [
			'type'    => 'attach_image',
			'heading' => esc_html__('Image', 'famulus'),
		],
		'cs_title_bc'         => [
			'type'    => 'textarea',
			'heading' => esc_html__('Title', 'famulus'),
		],

		'cs_img_overlay_bc' => [
			'type'    => 'switch',
			'heading' => esc_html__('Add overlay to image?', 'famulus'),
			'grid'    => 12,
		],
		'cs_white_bc'       => [
			'type'    => 'switch',
			'heading' => esc_html__('White text?', 'famulus'),
			'grid'    => 12,
		],
		'cs_links_use_typo'    => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Links?', 'famulus'),
			'grid'    => 3,
		],
		'cs_links_typo'        => [
			'type'     => 'typography',
			'group'    => 'Breadcrumbs Links Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-banner-wrap__breadcrumbs li',
		],
	]);
	\Aheto\Params::add_button_params($shortcode, [
		'prefix' => 'main_',
	], 'banners');

	\Aheto\Params::add_button_params($shortcode, [
		'add_label' => esc_html__('Add additional button?', 'famulus'),
		'prefix'    => 'add_',
	], 'banners');
	\Aheto\Params::add_button_params($shortcode, [
		'add_button' => true,
		'prefix'     => 'main_',
	], 'famulus_modern_banners');

	\Aheto\Params::add_carousel_params($shortcode, [
		'custom_options' => true,
		'prefix'         => 'cs_swiper_simple_',
		'include'        => ['effect', 'speed', 'loop', 'autoplay', 'arrows'],
		'dependency'     => ['template', ['cs_layout2']]
	]);


}

function famulus_banner_slider_shortcode_dynamic_css($css, $shortcode) {


	if ( !empty($shortcode->atts['cs_h_title_use_typo']) && !empty($shortcode->atts['cs_h_title_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-banner__title i, .aheto-banner__title span'], $shortcode->parse_typography($shortcode->atts['cs_h_title_typo']));
	}

	if ( !empty($shortcode->atts['cs_desc_use_typo']) && !empty($shortcode->atts['cs_desc_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-banner__desc'], $shortcode->parse_typography($shortcode->atts['cs_desc_typo']));
	}
	if ( !empty($shortcode->atts['cs_links_use_typo']) && !empty($shortcode->atts['cs_links_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-banner-wrap__breadcrumbs li'], $shortcode->parse_typography($shortcode->atts['cs_links_typo']));
	}
	if ( !empty($shortcode->atts['cs_video_use_typo']) && !empty($shortcode->atts['cs_video_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-banner__video'], $shortcode->parse_typography($shortcode->atts['cs_video_typo']));
	}

	return $css;
}

add_filter('aheto_banner_slider_dynamic_css', 'famulus_banner_slider_shortcode_dynamic_css', 10, 2);


function famulus_banner_slider_carousel($carousel_params) {

	$carousel_params['include'][] = 'pagination';

	return $carousel_params;

}

add_filter('aheto_banner_slider_carousel', 'famulus_banner_slider_carousel', 10, 2);


/**
 * Custom Button
 */

function famulus_button_all_layouts($all_layouts) {

	$dir = FAMULUS_T_URI . '/aheto/button/previews/';


	$all_layouts['cs_layout2'] = array(
		'title' => esc_html__('Famulus Modern Simple', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	);

	return $all_layouts;

}

add_filter('aheto_button_all_layouts', 'famulus_button_all_layouts', 10, 2);


/**
 * Aheto dependency
 */

function famulus_add_dependency($id, $args = array(), $shortcode) {

	if ( is_array( $id ) ) {

		foreach ( $id as $slug ) {
			$param = (array)$shortcode->depedency[$slug]['template'];
			$shortcode->depedency[$slug]['template'] = array_merge($args, $param );
		}

	} else {
		$param = (array)$shortcode->depedency[$id]['template'];
		$shortcode->depedency[$id]['template'] = array_merge($args, $param );
	}

	return;
}


/**
 * Team member
 */

function famulus_team_member_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/team-member/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);


	famulus_add_dependency( ['image', 'image_size', 'name', 'designation', 'networks'], [ 'cs_layout1' ], $shortcode );

	$shortcode->add_dependecy('cs_use_link_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_link_typo', 'cs_use_link_typo', 'true');
	$shortcode->add_params([
		'align' => [
			'type'    => 'select',
			'heading' => esc_html__('Align', 'famulus'),
			'options' => \Aheto\Helper::choices_alignment(),
		],
		'cs_use_link_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Links?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_typo'     => [
			'type'     => 'typography',
			'group'    => 'Links Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-team-member__link',
		],
	]);
}

function famulus_team_member_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_use_link_typo']) && !empty($shortcode->atts['cs_link_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-team-member__link'], $shortcode->parse_typography($shortcode->atts['cs_link_typo']));
	}

	return $css;
}

add_filter('aheto_pricing_tables_dynamic_css', 'famulus_team_member_layout1_dynamic_css', 10, 2);


/**
 * Team member
 */

function famulus_gallery_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/media/previews/';


	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Video', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);

	$shortcode->add_dependecy('cs_title_use_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_title_typo', 'cs_use_title_typo', 'true');
	$shortcode->add_dependecy('cs_items', 'template', 'cs_layout1');


	$shortcode->add_dependecy('cs_image_video', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_video_link', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_high_video', 'template', 'cs_layout2');


	$shortcode->add_params([
		'cs_items'       => [
			'type'    => 'group',
			'heading' => esc_html__('Gallery items', 'famulus'),
			'params'  => [
				'cs_image'    => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Gallery item image', 'famulus'),
				],
				'cs_title'    => [
					'type'    => 'textarea',
					'heading' => esc_html__('Gallery item title', 'famulus'),
					'grid'    => 12,
				],
				'cs_subtitle' => [
					'type'    => 'textarea',
					'heading' => esc_html__('Gallery item subtitle', 'famulus'),
					'grid'    => 12,
				],
			],
		],
		'cs_image_video' => [
			'type'    => 'attach_image',
			'heading' => esc_html__('Video image', 'famulus'),
		],
		'cs_video_link'  => [
			'type'    => 'text',
			'heading' => esc_html__('Video Link', 'famulus'),
		],
		'cs_high_video'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Higher Video?', 'famulus'),
			'grid'    => 3,
		],


	]);
	\Aheto\Params::add_image_sizer_params($shortcode, [
		'prefix'     => '',
		'dependency' => ['template', 'cs_layout2']
	]);
}


/**
 * Social Networks
 */

function famulus_social_networks_shortcode($shortcode) {

	$theme_dir = FAMULUS_T_URI . '/aheto/social-networks/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Modern', 'famulus'),
		'image' => $theme_dir . 'cs_layout1.jpg',
	]);

	$shortcode->add_dependecy('networks', 'template', 'cs_layout1');
	$shortcode->add_dependecy('socials_align_mob', 'template', 'cs_layout1');
	$shortcode->add_dependecy('socials_align', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_light_version', 'template', 'cs_layout1');

	$shortcode->add_params([
		//Renaming to dark not working. This light set the dark style
		'cs_light_version' => [
			'type'    => 'switch',
			'heading' => esc_html__('Enable dark version?', 'famulus'),
			'grid'    => 3,
		]
	]);
}


/**
 * Contents shortcode
 */

function famulus_contents_shortcode($shortcode) {

	$theme_dir = FAMULUS_T_URI . '/aheto/contents/previews/';

	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Creative slider', 'famulus'),
		'image' => $theme_dir . 'cs_layout2.jpg',
	]);
	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Accordion', 'famulus'),
		'image' => $theme_dir . 'cs_layout1.jpg',
	]);

	$shortcode->add_layout('cs_layout3', [
		'title' => esc_html__('Famulus Accordion Simple', 'famulus'),
		'image' => $theme_dir . 'cs_layout3.jpg',
	]);

	$shortcode->add_layout('cs_layout5', [
		'title' => esc_html__('Famulus Icon', 'famulus'),
		'image' => $theme_dir . 'cs_layout5.jpg',
	]);
	$shortcode->add_layout('cs_layout4', [
		'title' => esc_html__('Famulus Accordion Modern', 'famulus'),
		'image' => $theme_dir . 'cs_layout4.jpg',
	]);
	$shortcode->add_layout('cs_layout6', [
		'title' => esc_html__('Famulus Simple with link', 'famulus'),
		'image' => $theme_dir . 'cs_layout6.jpg',
	]);


	famulus_add_dependency( ['faqs', 'first_is_opened', 'multi_active', 'title_typo', 'text_typo'], [ 'cs_layout1', 'cs_layout3' ], $shortcode );
	famulus_add_dependency( ['first_is_opened', 'multi_active'], [ 'cs_layout4' ], $shortcode );
	famulus_add_dependency( ['title_typo'], [ 'cs_layout2' ], $shortcode );


	$shortcode->add_dependecy('cs_title', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_title_tag', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_use_typo_hightlight', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_text_typo_hightlight', 'cs_use_typo_hightlight', 'true');
	$shortcode->add_dependecy('cs_use_typo_main_title', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_text_typo_main_title', 'cs_use_typo_main_title', 'true');
	$shortcode->add_dependecy('cs_use_typo_title', 'template', 'cs_layout3');
	$shortcode->add_dependecy('cs_text_typo_title', 'cs_use_typo_title', 'true');
	$shortcode->add_dependecy('cs_faq_modern', 'template', 'cs_layout4');
	$shortcode->add_dependecy('cs_use_typo_type', 'template', 'cs_layout4');
	$shortcode->add_dependecy('cs_text_typo_type', 'cs_use_typo_type', 'true');
	$shortcode->add_dependecy('cs_video_image', 'cs_add_video_button', 'true');
	$shortcode->add_dependecy('cs_image_size', 'cs_add_video_button', 'true');
	$shortcode->add_dependecy('cs_creative_items', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_use_typo_hightlight', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_text_typo_hightlight', 'cs_use_typo_hightlight', 'true');
	$shortcode->add_dependecy('cs_use_link_hightlight', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_link_typo_hightlight', 'cs_use_link_hightlight', 'true');
	$shortcode->add_dependecy('cs_use_link_a', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_link_typo_a', 'cs_use_link_a', 'true');


	$shortcode->add_dependecy('cs_icon', 'template', 'cs_layout5');

	$shortcode->add_dependecy('cs_simple_link', 'template', 'cs_layout6');


	$shortcode->add_params([
		'cs_title'       => [
			'type'    => 'textarea',
			'heading' => esc_html__('Title', 'famulus'),
		],
		'cs_title_tag'   => [
			'type'    => 'select',
			'heading' => esc_html__('Element tag for Title', 'famulus'),
			'options' => [
				'h1'  => 'h1',
				'h2'  => 'h2',
				'h3'  => 'h3',
				'h4'  => 'h4',
				'h5'  => 'h5',
				'h6'  => 'h6',
				'p'   => 'p',
				'div' => 'div',
			],
			'default' => 'h3',
			'grid'    => 5,
		],
		'cs_video_image' => [
			'type'    => 'attach_image',
			'heading' => esc_html__('Preview image for video', 'famulus'),
			'group'   => esc_html__('Video Content', 'famulus'),
		],
		'cs_image_size'  => [
			'type'    => 'select',
			'heading' => 'Image original size',
			'options' => Aheto\Helper::choices_image_size(),
			'grid'    => 12,
			'default' => 'full',
			'group'   => esc_html__('Video Content', 'famulus'),
		],

		'cs_creative_items' => [
			'type'    => 'group',
			'heading' => esc_html__('Slides', 'famulus'),
			'params'  => [
				'cs_item_image' => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Image', 'famulus'),
				],

				'cs_item_title' => [
					'type'        => 'text',
					'heading'     => esc_html__('Title', 'famulus'),
					'description' => esc_html__(' For highlight title use [[ hightlight ]] , for new line use <br>.', 'famulus'),

				],

				'cs_item_desc'          => [
					'type'    => 'textarea',
					'heading' => esc_html__('Description', 'famulus'),
				],
				'cs_item_btn_direction' => [
					'type'    => 'select',
					'heading' => esc_html__('Buttons Direction', 'famulus'),
					'options' => [
						''              => esc_html__('Horizontal', 'famulus'),
						'space_between' => esc_html__('Horizontal Space Between', 'famulus'),
						'is-vertical'   => esc_html__('Vertical', 'famulus'),
					],
				],
			]
		],

		'cs_faq_modern'           => [
			'type'    => 'group',
			'heading' => esc_html__('Faqs', 'famulus'),
			'params'  => [
				'cs_item_title' => [
					'type'    => 'text',
					'heading' => esc_html__('Title', 'famulus'),
				],
				'cs_item_type'  => [
					'type'    => 'text',
					'heading' => esc_html__('Type', 'famulus'),
				],
				'cs_item_desc'  => [
					'type'    => 'textarea',
					'heading' => esc_html__('Description', 'famulus'),
				],
			]
		],
		'cs_icon'                 => [
			'type'    => 'group',
			'heading' => esc_html__('Icons', 'famulus'),
			'params'  => [
				'cs_item_title' => [
					'type'    => 'text',
					'heading' => esc_html__('Title', 'famulus'),
				],
			]
		],
		'cs_simple_link'          => [
			'type'    => 'group',
			'heading' => esc_html__('Item', 'famulus'),
			'params'  => [
				'cs_title_simple'      => [
					'type'    => 'textarea',
					'heading' => esc_html__('Title', 'famulus'),
				],
				'cs_title_tag_simple'  => [
					'type'    => 'select',
					'heading' => esc_html__('Element tag for Title', 'famulus'),
					'options' => [
						'h1'  => 'h1',
						'h2'  => 'h2',
						'h3'  => 'h3',
						'h4'  => 'h4',
						'h5'  => 'h5',
						'h6'  => 'h6',
						'p'   => 'p',
						'div' => 'div',
					],
					'default' => 'h3',
					'grid'    => 5,
				],
				'cs_text'              => [
					'type'    => 'text',
					'heading' => esc_html__('Text', 'famulus'),
				],
				'cs_link_title_simple' => [
					'type'    => 'text',
					'heading' => esc_html__('Link title', 'famulus'),
				],
				'cs_link_url_simple'   => [
					'type'    => 'text',
					'heading' => esc_html__('Link Url', 'famulus'),
				],

			],
		],
		'cs_use_typo_hightlight'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for highlight?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_hightlight' => [
			'type'     => 'typography',
			'group'    => 'Highlight Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-contents__title span, {{WRAPPER}}  .aheto-contents__main-title span',
		],
		'cs_use_typo_main_title'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for main title?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_main_title' => [
			'type'     => 'typography',
			'group'    => 'Main Title Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-contents__main-title',
		],
		'cs_use_typo_title'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  title?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_title' => [
			'type'     => 'typography',
			'group'    => 'Famulus Title Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-contents__title',
		],
		'cs_use_typo_type'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  type?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_type' => [
			'type'     => 'typography',
			'group'    => 'Famulus Type Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-contents__type',
		],
		'cs_use_link_hightlight'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for links?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_typo_hightlight' => [
			'type'     => 'typography',
			'group'    => 'Links Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-contents__links a',
		],
		'cs_use_link_a'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for links arrow?', 'famulus'),
			'grid'    => 3,
		],
		'cs_link_typo_a' => [
			'type'     => 'typography',
			'group'    => 'Links arrow Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} div.swiper-button-prev, {{WRAPPER}} div.swiper-button-next',
		],
	]);
	\Aheto\Params::add_button_params($shortcode, [
		'prefix' => 'cs_faq_btn_',
		'icons'  => true,
	], 'cs_faq_modern');

	\Aheto\Params::add_button_params($shortcode, [
		'prefix' => 'cs_main_',
		'icons'  => true,
	], 'cs_creative_items');
	\Aheto\Params::add_button_params($shortcode, [
		'add_label' => esc_html__('Add additional button?', 'famulus'),
		'prefix'    => 'cs_add_',
		'icons'     => true,
	], 'cs_creative_items');
	\Aheto\Params::add_carousel_params($shortcode, [
		'custom_options' => true,
		'prefix'         => 'cs_swiper_',
		'include'        => ['speed', 'loop', 'autoplay', 'arrows', 'lazy'],
		'dependency'     => ['template', ['cs_layout2']]
	]);
	\Aheto\Params::add_icon_params($shortcode, [
		'add_icon'  => true,
		'add_label' => esc_html__('Add icon?', 'famulus'),
		'exclude'   => ['align', 'color'],
	], 'cs_icon');
	\Aheto\Params::add_image_sizer_params($shortcode, [
		'prefix'     => 'cs_content_img',
		'dependency' => ['template', 'cs_layout2']
	]);
}

function famulus_contents_shortcode_dynamic_css($css, $shortcode) {
	if ( !empty($shortcode->atts['cs_use_typo_hightlight']) && !empty($shortcode->atts['cs_text_typo_hightlight']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-contents__title span, %1$s .aheto-contents__main-title span'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_hightlight']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_main_title']) && !empty($shortcode->atts['cs_text_typo_main_title']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-contents__main_title'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_main_title']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_title']) && !empty($shortcode->atts['cs_text_typo_title']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-contents__title'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_title']));
	}
	if ( !empty($shortcode->atts['cs_use_link_hightlight']) && !empty($shortcode->atts['cs_link_typo_hightlight']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-contents__links a'], $shortcode->parse_typography($shortcode->atts['cs_link_typo_hightlight']));
	}
	if ( !empty($shortcode->atts['cs_use_link_a']) && !empty($shortcode->atts['cs_link_typo_a']) ) {
		\aheto_add_props($css['global']['%1$s div.swiper-button-prev, %1$s div.swiper-button-next'], $shortcode->parse_typography($shortcode->atts['cs_link_typo_a']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_type']) && !empty($shortcode->atts['cs_text_typo_type']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-contents__type'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_type']));
	}
	if ( !empty($shortcode->atts['cs_background']) ) {
		$color                                                              = Sanitize::color($shortcode->atts['cs_background']);
		$css['global']['%1$s .aheto-contents__wrapper']['background-color'] = $color;
	}
	if ( !empty($shortcode->atts['cs_text_color']) ) {
		$color                                                             = Sanitize::color($shortcode->atts['cs_text_color']);
		$css['global']['%1$s .aheto-contents__inner_wrapper > *']['color'] = $color;
	}
	return $css;
}

add_filter('aheto_contents_dynamic_css', 'famulus_contents_shortcode_dynamic_css', 10, 2);




/**
 * Team shortcode
 */

function famulus_team_shortcode($shortcode) {

	$theme_dir = FAMULUS_T_URI . '/aheto/team/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Classic', 'famulus'),
		'image' => $theme_dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $theme_dir . 'cs_layout2.jpg',
	]);
	$shortcode->add_dependecy('teams', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_use_typo_name', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo_name', 'cs_use_typo_name', 'true');
	$shortcode->add_dependecy('cs_use_typo_position', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo_position', 'cs_use_typo_position', 'true');
	$shortcode->add_dependecy('cs_use_typo_link', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo_link', 'cs_use_typo_link', 'true');

	$shortcode->add_dependecy('cs_use_typo_name', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_text_typo_name', 'cs_use_typo_name', 'true');
	$shortcode->add_dependecy('cs_use_typo_position', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_text_typo_position', 'cs_use_typo_position', 'true');

	$shortcode->add_dependecy('teams_simple', 'template', 'cs_layout2');

	$shortcode->add_params([
		'teams'        => [
			'type'    => 'group',
			'heading' => esc_html__('Team', 'famulus'),
			'params'  => [
				'member_image'       => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Display Image', 'famulus'),
				],
				'member_name'        => [
					'type'    => 'text',
					'heading' => esc_html__('Name', 'famulus'),
				],
				'member_designation' => [
					'type'    => 'text',
					'heading' => esc_html__('Designation', 'famulus'),
				],

				'member_social' => [
					'type'    => 'checkbox',
					'heading' => esc_html__('Add socials?', 'famulus'),
				],
			],
		],
		'teams_simple' => [
			'type'    => 'group',
			'heading' => esc_html__('Team', 'famulus'),
			'params'  => [
				'member_image'       => [
					'type'    => 'attach_image',
					'heading' => esc_html__('Display Image', 'famulus'),
				],
				'member_name'        => [
					'type'    => 'text',
					'heading' => esc_html__('Name', 'famulus'),
				],
				'member_designation' => [
					'type'    => 'text',
					'heading' => esc_html__('Designation', 'famulus'),
				],
			],
		],
		'advanced'     => true,
		'cs_use_typo_name' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Name?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_name'     => [
			'type'     => 'typography',
			'group'    => 'Name Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-member__name',
		],
		'cs_use_typo_position' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Position?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_position'     => [
			'type'     => 'typography',
			'group'    => 'Position Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-member__position',
		],
		'cs_use_typo_link' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Link?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_link'     => [
			'type'     => 'typography',
			'group'    => 'Link Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-member__link',
		],
	]);

	\Aheto\Params::add_networks_params($shortcode, [
		'dependency' => ['member_social', 'true']
	], 'teams');

}
function famulus_team_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_use_typo_name']) && !empty($shortcode->atts['cs_text_typo_name']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-member__name'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_name']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_position']) && !empty($shortcode->atts['cs_text_typo_position']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-member__position'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_position']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_link']) && !empty($shortcode->atts['cs_text_typo_link']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-member__link'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_link']));
	}

	return $css;
}

add_filter('aheto_team_dynamic_css', 'famulus_team_layout1_dynamic_css', 10, 2);

/**
 * Contact Info Type Shortcode
 */

function famulus_contact_info_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/contact-info/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Classic', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);


	$shortcode->add_dependecy('contact', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_use_typo_copyright', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo_copyright', 'cs_use_typo_copyright', 'true');

	$shortcode->add_dependecy('cs_info', 'template', 'cs_layout2');

	$shortcode->add_params([
		'contact'  => [
			'type'    => 'group',
			'heading' => esc_html__('Contacts', 'famulus'),
			'params'  => [

				'copyright' => [
					'type'    => 'text',
					'heading' => esc_html__('Copyright', 'famulus'),
				],
				'add'       => [
					'type'    => 'editor',
					'heading' => esc_html__('Address', 'famulus'),
					'grid'    => 12,
				],

				'footer_social' => [
					'type'    => 'checkbox',
					'heading' => esc_html__('Add socials?', 'famulus'),
				],
			],
		],
		'advanced' => true,
		'cs_info'  => [
			'type'    => 'group',
			'heading' => esc_html__('Contacts', 'famulus'),
			'params'  => [
				'cs_title'    => [
					'type'    => 'editor',
					'heading' => esc_html__('Title', 'famulus'),
				],
				'cs_desc'     => [
					'type'    => 'textarea',
					'heading' => esc_html__('Description', 'famulus'),
				],
				'cs_location' => [
					'type'    => 'text',
					'heading' => esc_html__('Location', 'famulus'),
				],
				'cs_phone'    => [
					'type'    => 'text',
					'heading' => esc_html__('Phone', 'famulus'),
				],
				'cs_email'    => [
					'type'    => 'text',
					'heading' => esc_html__('Email', 'famulus'),
				],
			]
		],
		'cs_use_typo_copyright'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  copyright?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_copyright' => [
			'type'     => 'typography',
			'group'    => 'Copyright Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .widget_aheto__copyright',
		],
	]);
	\Aheto\Params::add_icon_params($shortcode, [
		'add_icon'  => true,
		'add_label' => esc_html__('Add icon?', 'famulus'),
		'exclude'   => ['align', 'color'],
	], 'cs_info');
	\Aheto\Params::add_networks_params($shortcode, [
		'dependency' => ['footer_social', 'true']
	], 'contact');


}
function famulus_contact_info_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_use_typo_copyright']) && !empty($shortcode->atts['cs_text_typo_copyright']) ) {
		\aheto_add_props($css['global']['%1$s .widget_aheto__copyright'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_copyright']));
	}

	return $css;
}

add_filter('aheto_blockquote_dynamic_css', 'famulus_contact_info_layout1_dynamic_css', 10, 2);

/**
 * Blockquote Type Shortcode
 */

function famulus_blockquote_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/blockquote/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_layout('cs_layout2', [
		'title' => esc_html__('Famulus Modern', 'famulus'),
		'image' => $dir . 'cs_layout2.jpg',
	]);


	famulus_add_dependency( ['quote', 'use_quote', 't_quote', 'use_author', 'author', 't_author', 'qoute_tag', 'max_width', 'quote_spacing'], [ 'cs_layout1', 'cs_layout2' ], $shortcode );

	$shortcode->add_dependecy('cs_date', 'template', 'cs_layout1');

	$shortcode->add_dependecy('cs_use_typo_position', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_text_typo_position', 'cs_use_typo_position', 'true');

	$shortcode->add_dependecy('cs_position', 'template', 'cs_layout2');
	$shortcode->add_dependecy('cs_use_typo_name', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo_name', 'cs_use_typo_name', 'true');
	$shortcode->add_dependecy('cs_use_typo_date', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_text_typo_date', 'cs_use_typo_date', 'true');

	$shortcode->add_params([
		'advanced'    => true,
		'cs_date'     => [
			'type'    => 'text',
			'heading' => esc_html__('Date', 'famulus'),
		],
		'cs_position' => [
			'type'    => 'text',
			'heading' => esc_html__('Position', 'famulus'),
		],
		'cs_use_typo_name'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  name?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_name' => [
			'type'     => 'typography',
			'group'    => 'Name Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-quote__author',
		],
		'cs_use_typo_date'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  date?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_date' => [
			'type'     => 'typography',
			'group'    => 'Date Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-quote__date',
		],
		'cs_use_typo_position'  => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for  position?', 'famulus'),
			'grid'    => 3,
		],
		'cs_text_typo_position' => [
			'type'     => 'typography',
			'group'    => 'Position Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => false,
			],
			'selector' => '{{WRAPPER}} .aheto-quote__position',
		],
	]);
}
function famulus_blockquote_layout1_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_use_typo_name']) && !empty($shortcode->atts['cs_text_typo_name']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-quote__author'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_name']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_date']) && !empty($shortcode->atts['cs_text_typo_date']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-quote__date'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_date']));
	}
	if ( !empty($shortcode->atts['cs_use_typo_position']) && !empty($shortcode->atts['cs_text_typo_position']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-quote__position'], $shortcode->parse_typography($shortcode->atts['cs_text_typo_position']));
	}

	return $css;
}

add_filter('aheto_blockquote_dynamic_css', 'famulus_blockquote_layout1_dynamic_css', 10, 2);
/**
 * Blockquote Type Shortcode
 */

function famulus_pricing_tables_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/pricing-tables/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Simple', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);

	famulus_add_dependency( ['heading', 'link', 'link_style', 'features', 'price', 'link_url', 'link_title', 'link_color', 'link_color_hover', 'link_bg', 'link_bg_hover', 'link_border', 'link_border_hover' ], [ 'cs_layout1' ], $shortcode );


	$shortcode->add_dependecy('cs_subtitle', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_active', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_use_subtitle_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_subtitle_typo', 'cs_use_subtitle_typo', 'true');
	$shortcode->add_dependecy('cs_use_price_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_price_typo', 'cs_use_price_typo', 'true');

	$shortcode->add_dependecy('cs_use_btn_typo', 'template', 'cs_layout1');
	$shortcode->add_dependecy('cs_btn_typo', 'cs_use_btn_typo', 'true');

	$shortcode->add_params([
		'cs_subtitle'          => [
			'type'    => 'text',
			'heading' => esc_html__('Subtitle', 'famulus'),
		],
		'cs_active'            => [
			'type'    => 'checkbox',
			'heading' => esc_html__('Active Item?', 'famulus'),
		],
		'cs_use_subtitle_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Subtitle?', 'famulus'),
			'grid'    => 3,
		],
		'cs_subtitle_typo'     => [
			'type'     => 'typography',
			'group'    => 'Subtitle Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-pricing__subtitle',
		],
		'cs_use_price_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Price?', 'famulus'),
			'grid'    => 3,
		],
		'cs_price_typo'     => [
			'type'     => 'typography',
			'group'    => 'Price Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-pricing__cost',
		],
		'cs_use_btn_typo' => [
			'type'    => 'switch',
			'heading' => esc_html__('Use custom font for Button?', 'famulus'),
			'grid'    => 3,
		],
		'cs_btn_typo'     => [
			'type'     => 'typography',
			'group'    => 'Button Typography',
			'settings' => [
				'tag'        => false,
				'text_align' => true,
			],
			'selector' => '{{WRAPPER}} .aheto-pricing__btn',
		],
	]);
}

function famulus_pricing_tables_shortcode_dynamic_css($css, $shortcode) {

	if ( !empty($shortcode->atts['cs_use_subtitle_typo']) && !empty($shortcode->atts['cs_subtitle_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-pricing__subtitle'], $shortcode->parse_typography($shortcode->atts['cs_subtitle_typo']));
	}
	if ( !empty($shortcode->atts['cs_use_price_typo']) && !empty($shortcode->atts['cs_price_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-pricing__cost'], $shortcode->parse_typography($shortcode->atts['cs_price_typo']));
	}
	if ( !empty($shortcode->atts['cs_use_btn_typo']) && !empty($shortcode->atts['cs_btn_typo']) ) {
		\aheto_add_props($css['global']['%1$s .aheto-pricing__btn'], $shortcode->parse_typography($shortcode->atts['cs_btn_typo']));
	}

	return $css;
}

add_filter('aheto_dynamic_css_heading', 'famulus_pricing_tables_shortcode_dynamic_css', 10, 2);


/**
 * Portfolio Nav Shortcode
 */

function famulus_portfolio_nav_shortcode($shortcode) {

	$dir = FAMULUS_T_URI . '/aheto/portfolio-nav/previews/';

	$shortcode->add_layout('cs_layout1', [
		'title' => esc_html__('Famulus Prev Next', 'famulus'),
		'image' => $dir . 'cs_layout1.jpg',
	]);
	$shortcode->add_dependecy('cs_prev_next', 'template', 'cs_layout1');

	$shortcode->add_params([
		'cs_prev_next' => [
			'type'    => 'text',
			'heading' => esc_html__('Text near "Prev" "Next" links', 'famulus'),
		],

	]);
}


