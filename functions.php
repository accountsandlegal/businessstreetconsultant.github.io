<?php
/**
 * Famulus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Famulus
 */

defined( 'FAMULUS_T_URI' ) or define( 'FAMULUS_T_URI', get_template_directory_uri() );
defined( 'FAMULUS_T_PATH' ) or define( 'FAMULUS_T_PATH', get_template_directory() );

require_once FAMULUS_T_PATH . '/include/class-tgm-plugin-activation.php';
require_once FAMULUS_T_PATH . '/include/custom-header.php';
require_once FAMULUS_T_PATH . '/include/actions-config.php';
require_once FAMULUS_T_PATH . '/include/helper-function.php';
require_once FAMULUS_T_PATH . '/include/aheto-shortcodes.php';
require_once FAMULUS_T_PATH . '/include/customizer.php';

require FAMULUS_T_PATH . '/vendor/autoload.php';

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_famulus() {

	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once FAMULUS_T_PATH . '/vendor/appsero/client/src/Client.php';
	}

	$client = new \Appsero\Client( '4884c152-99ed-416f-8aa4-d36e2e538f41', 'Famulus', __FILE__ );

	// Active insights
	$client->insights()->init();

	// Active automatic updater
	$client->updater();

}

appsero_init_tracker_famulus();



if ( ! function_exists( 'famulus_setup' ) ) :

	function famulus_setup() {

		register_nav_menus( array( 'primary-menu' => esc_html__( 'Primary menu', 'famulus' ) ) );
		load_theme_textdomain( 'famulus', get_template_directory() . '/languages' );


		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		add_theme_support( 'woocommerce' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'famulus_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;

add_action( 'after_setup_theme', 'famulus_setup' );

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);



add_action('wp_ajax_AjaxVid', 'AjaxVid');
add_action('wp_ajax_nopriv_AjaxVid', 'AjaxVid');



add_filter( 'aheto_template_kit_category', function () {
	return 'famulus';
} );


// Hide unused layouts


add_filter('aheto_shortcodes_data', function ( $data ){
	unset($data['call-to-action'], $data['features-slider'], $data['instagram'], $data['time-schedule'], $data['list'], $data['features-tabs'], $data['contacts'], $data['title-bar']);
	return $data;
}, 10, 1);
if ( ! function_exists( 'famulus_deactivate_layouts' ) ) :
	function famulus_deactivate_layouts() {
		$current_options = Array(
			'aheto_heading' => Array(
				'layout1',
				'layout2',
			),
			'aheto_banner-slider' => Array(
				'layout1'
			),
			'aheto_features-single' => Array(
				'layout1',
				'layout2',
				'layout3',
				'layout4',
				'layout5',
				'layout6',
				'layout7',
			),
			'aheto_contents' => Array(
				'layout1'
			),
			'aheto_progress-bar' => Array(
				'layout1',
				'layout2',
				'layout3',
				'layout4',
			),
			'aheto_testimonials' => Array(
				'layout1'
			),
			'aheto_team' => Array(
				'layout1',
				'layout2',
			),
			'aheto_contact-forms' => Array(
				'layout1',
				'layout2',
				'layout3',
				'layout4',
				'layout5',
			),
			'aheto_clients' => Array(
				'layout1',
			),
			'aheto_features-timeline' => Array(
				'layout1',
			),
			'aheto_media' => Array(
				'layout1',
				'layout4',
			),
			'aheto_navbar' => Array(
				'layout1',
				'layout2',
			),
			'aheto_blockquote' => Array(
				'layout1',
			),
			'aheto_contact-info' => Array(
				'layout1',
				'layout2',
			),
			'aheto_portfolio-nav' => Array(
				'layout1',
			),
			'aheto_social-networks' => Array(
				'layout1',
			),
			'aheto_recent-posts' => Array(
				'layout1',
			),
			'aheto_team-member' => Array(
				'layout1',
				'layout2',
			),
			'aheto_navigation' => Array(
				'layout1',
				'layout2',
				'layout3',
				'layout4',
				'layout5',
				'layout6',
				'layout7',
				'layout8',
			),
			'aheto_pricing-tables' => Array(
				'layout1',
				'layout2',
				'layout3',
				'layout4',
			),
		);
		return $current_options;
	}
endif;
add_filter( 'aheto_active_leyouts', 'famulus_deactivate_layouts', 10 );

function famulus_export_data() {
	if ( class_exists( 'Aheto\Template_Kit\API' ) ) {

		$aheto_api = new Aheto\Template_Kit\API;

		$endpoint = '/aheto/v1/getThemeTemplate/3030';


		$response = $aheto_api->get_demodata( $endpoint, false, false );
		return $response;
	}
}

add_filter( 'export_data', 'famulus_export_data', 10 );

if ( ! function_exists( 'famulus_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function famulus_woocommerce_template_loop_product_title() {
		echo '<h4 class="woocommerce-loop-product--title">' . get_the_title() . '</h4>';
	}
}

add_action( 'woocommerce_shop_loop_item_title', 'famulus_woocommerce_template_loop_product_title', 20 );


if ( function_exists( 'aheto' ) ) {
	function famulus_theme_options( $theme_tabs ) {

		$theme_tabs = [
			'famulus_shop' => [
				'icon'  => 'dashicons dashicons-admin-generic pink-color',
				'title' => esc_html__( 'Shop Options', 'aheto' ),
				'desc'  => esc_html__( 'This tab contains the theme shop options.', 'aheto' ),
				'file'  => FAMULUS_T_PATH . '/include/shop-options.php',
			],
			'famulus_blog' => [
				'icon'  => 'dashicons dashicons-admin-generic yellow-color',
				'title' => esc_html__( 'Blog Options', 'aheto' ),
				'desc'  => esc_html__( 'This tab contains the theme blog options.', 'aheto' ),
				'file'  => FAMULUS_T_PATH . '/include/blog-options.php',
			],
		];

		return $theme_tabs;
	}
}

add_filter( 'aheto_theme_options', 'famulus_theme_options', 10, 2 );


add_filter( 'aheto_wizard', function () {
	return true;
} );