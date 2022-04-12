<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Famulus
 */

add_action( 'tgmpa_register', 'famulus_include_required_plugins' );
add_action( 'widgets_init', 'famulus_widgets_init' );
add_action( 'after_setup_theme', 'famulus_content_width', 0 );
add_action( 'wp_enqueue_scripts', 'famulus_enqueue_scripts' );
add_action( 'enqueue_block_editor_assets', 'famulus_add_gutenberg_assets' );
add_action('famulus_search', 'famulus_search_popup', 10);


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function famulus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'famulus-page';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'famulus-enable-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter( 'body_class', 'famulus_body_classes' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function famulus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'famulus_content_width', 1200 );
}


/**
 * Register widget area.
 */
function famulus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'famulus' ),
		'id'            => 'famulus-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'famulus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );


}


/**
 * Register Fonts
 */
if ( ! function_exists( 'famulus_fonts_url' ) ) {
	function famulus_fonts_url() {
		$font_url = '';

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'famulus' ) ) {
			$fonts = array(
				'Raleway:300,300i,400,400i,500,500i,600,600i,700,700i',
				'Playfair Display:300,300i,400,400i,500,500i,600,600i,700,700i',
				'Muli:300,300i,400,400i,500,500i,600,600i,700,700i',
			);

			$font_url = add_query_arg( 'family',
				urlencode( implode( '|', $fonts ) . "&subset=latin,latin-ext" ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}
}

/*
Enqueue scripts and styles.
*/
if ( ! function_exists( 'famulus_font_scripts' ) ) {
	function famulus_font_scripts() {
		wp_enqueue_style( 'famulus-fonts', famulus_fonts_url(), array(), '1.0.0' );
	}
}

/**
 * Enqueue scripts and styles.
 */
function famulus_enqueue_scripts() {

	// general settings
	if ( ( is_admin() ) ) {
		return;
	}

	if ( is_page() || is_home() ) {
		$post_id = get_queried_object_id();
	} else {
		$post_id = get_the_ID();
	}

	$include_scripts = true;
	$page_template = get_page_template_slug( $post_id );
	if ( ! empty( $page_template ) ) {
		$page_template_array = explode( "_", $page_template );
		$include_scripts = $page_template_array[0] == 'aheto' ? false : true;
	}

	if($include_scripts){
		wp_enqueue_style( 'famulus-fonts', famulus_fonts_url(), array(), '1.0.0' );
		wp_enqueue_style( 'ionicons', FAMULUS_T_URI . '/assets/css/lib/ionicons.css' );
		wp_enqueue_style( 'bootstrap', FAMULUS_T_URI . '/assets/css/lib/bootstrap.css' );
	}

	wp_enqueue_style( 'famulus-general', FAMULUS_T_URI . '/assets/css/general.css' );


	wp_enqueue_style( 'famulus-shop', FAMULUS_T_URI . '/assets/css/shop.css' );

	if ( is_404() ) {
		wp_enqueue_style( 'famulus-error-page', FAMULUS_T_URI . '/assets/css/error-page.css' );
	}

	if($include_scripts) {
		wp_enqueue_style( 'famulus-main-style', FAMULUS_T_URI . '/assets/css/style.css' );
	}

	wp_enqueue_style( 'famulus-style', FAMULUS_T_URI . '/style.css' );

	// add TinyMCE style
	add_editor_style();

	// including jQuery plugins
	wp_localize_script( 'famulus-script', 'get',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'siteurl' => get_template_directory_uri(),
		)
	);

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$active_plugin = function_exists( 'aheto' ) ? true : false;
	if($include_scripts) {
		wp_enqueue_script( 'famulus-navigation', FAMULUS_T_URI . '/assets/js/navigation.min.js', array(), '', true );
		wp_enqueue_script( 'famulus-skip-link-focus-fix', FAMULUS_T_URI . '/assets/js/lib/skip-link-focus-fix.js', array(), '', true );
		wp_enqueue_script( 'fitvids', FAMULUS_T_URI . '/assets/js/lib/fitvids.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'isotope', FAMULUS_T_URI . '/assets/js/lib/isotope.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'famulus-script', FAMULUS_T_URI . '/assets/js/script.js', array( 'jquery' ), '', true );
	}elseif($active_plugin && (is_archive() || is_author() || is_category() || is_home() || is_tag())){
		wp_enqueue_script( 'isotope', FAMULUS_T_URI . '/assets/js/lib/isotope.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fitvids', FAMULUS_T_URI . '/assets/js/lib/fitvids.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'famulus-script', FAMULUS_T_URI . '/assets/js/script.js', array( 'jquery' ), '', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Include plugins
 */
if ( ! function_exists( 'famulus_include_required_plugins' ) ) {
	function famulus_include_required_plugins() {

		$plugins = array(
			array(
				'name'               => esc_html__( 'Elementor', 'famulus' ),
				// The plugin name
				'slug'               => 'elementor',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Aheto', 'famulus' ),
				// The plugin name
				'slug'               => 'aheto',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( 'https://import.getaheto.com/plugins/aheto.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Contact Form 7', 'famulus' ),
				// The plugin name
				'slug'               => 'contact-form-7',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Qodeblock', 'famulus' ),
				// The plugin name
				'slug'               => 'qodeblock',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'WP Datepicker', 'famulus' ),
				// The plugin name
				'slug'               => 'wp-datepicker',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'WooCommerce', 'famulus' ),
				// The plugin name
				'slug'               => 'woocommerce',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__('Product & Site Reviews by Wiremo', 'famulus'), // The plugin name
				'slug'               => 'woo-reviews-by-wiremo', // The plugin slug (typically the folder name)
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
		);

		// Change this to your theme text domain, used for internationalising strings

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       => 'famulus',                    // Text domain - likely want to be the same as your theme.
			'default_path' => '',                            // Default absolute path to pre-packaged plugins
			'menu'         => 'tgmpa-install-plugins',    // Menu slug
			'has_notices'  => true,                        // Show admin notices or not
			'is_automatic' => true,                        // Automatically activate plugins after installation or not
			'message'      => '',                            // Message to output right before the plugins table
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'famulus' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'famulus' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'famulus' ),
				// %1$s = plugin name
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'famulus' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'famulus' ),
				// %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'famulus' ),
				// %1$s = plugin name(s)
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'famulus' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'famulus' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'famulus' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'famulus' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'famulus' ),
				// %1$s = dashboard link
				'nag_type'                        => 'updated'
				// Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );
	}
}


/**
 * Password form
 */
if ( ! function_exists( 'famulus_password_form' ) ) {
	function famulus_password_form( $post_id ) {
		$form = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="form">
					<h3>' . esc_html__( 'Enter password below:', 'famulus' ) . '</h3>
  				  	<input placeholder="' . esc_attr__( "Password:", 'famulus' ) . '" name="post_password" type="password" size="20" maxlength="20" />
  				  	<input type="submit" name="' . esc_attr__( 'Submit', 'famulus' ) . '" value="' . esc_attr__( 'Accept', 'famulus' ) . '" />
				  </form>';

		return $form;
	}
}
add_filter( 'the_password_form', 'famulus_password_form' );



/**
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) || version_compare( PHP_VERSION, '5.3', '<' ) ) {
	if ( ! function_exists( 'famulus_requirements_notice' ) ) {
		function famulus_requirements_notice() {
			$message = sprintf( esc_html__( 'Famulus theme needs minimal WordPress version 4.3 and PHP 5.6<br>You are running version WordPress - %s, PHP - %s.<br>Please upgrade need module and try again.', 'famulus' ), $GLOBALS['wp_version'], PHP_VERSION );
			printf( '<div class="notice-warning notice"><p><strong>%s</strong></p></div>', $message );
		}
	}
	add_action( 'admin_notices', 'famulus_requirements_notice' );
}



/**
 * Add backend styles for Gutenberg.
 */
if ( ! function_exists( 'famulus_add_gutenberg_assets' ) ) {
	function famulus_add_gutenberg_assets() {
		$active_plugin = function_exists( 'aheto' ) ? true : false;
		if( $active_plugin ){
			$layout = \Aheto\Helper::get_settings( 'general.single_template', 'theme' );
			if ( 'theme' == $layout ) {
				// Load the theme styles within Gutenberg.
				wp_enqueue_style( 'famulus-fonts', famulus_fonts_url(), array(), '1.0.0' );
				wp_enqueue_style( 'famulus-gutenberg', FAMULUS_T_URI . '/assets/css/gutenberg.css' );
			}
		}else{
			// Load the theme styles within Gutenberg.
			wp_enqueue_style( 'famulus-fonts', famulus_fonts_url(), array(), '1.0.0' );
			wp_enqueue_style( 'famulus-gutenberg', FAMULUS_T_URI . '/assets/css/gutenberg.css' );
		}
	}
}




/**
 * Search popup
 */

if ( !function_exists('famulus_search_popup') ) {
	function famulus_search_popup() { ?>
		<div class="famulus-header--search" id="search-box-<?php echo esc_attr(rand()); ?>">
			<div class="famulus-header--search__form-container">
				<form role="search" method="get" class="famulus-header--search__form" action="<?php echo esc_url(home_url('/')); ?>">
					<div class="input-group">
						<input type="search" value="<?php echo get_search_query() ?>" name="s"
						       class="search-field"
						       placeholder="<?php esc_attr_e('Search..', 'famulus'); ?>"
						       required>
						<button><i class="ion-ios-search-strong open-search"></i></button>
					</div>
				</form>
			</div>
		</div>
	<?php }
}
