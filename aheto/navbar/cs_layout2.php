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

extract( $atts );

$this->generate_css();

$cs_fixed_menu = isset($cs_fixed_menu) && $cs_fixed_menu ? 'fixed-additional' : '';

// Wrapper.
$this->add_render_attribute( 'wrapper', 'id', $element_id );
$this->add_render_attribute( 'wrapper', 'class', $this->the_custom_classes() );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-navbar' );
$this->add_render_attribute( 'wrapper', 'class', 'aheto-navbar--famulus-additional-row' );
$this->add_render_attribute( 'wrapper', 'class', $cs_fixed_menu );


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/navbar/';
wp_enqueue_style('famulus-navbar-additional', $sc_dir . 'assets/css/cs_layout2.css', null, null);
wp_enqueue_script( 'famulus-navbar-additional-js', $sc_dir . 'assets/js/cs_layout2.js', array( 'jquery' ), null ); ?>

<div <?php $this->render_attribute_string( 'wrapper' ); ?>>
	<div class="aheto-navbar--inner">

		<?php if(!empty($cs_title)):?>
		<h5 class="aheto-navbar__title">
			<?php echo esc_html($cs_title);?>
		</h5>
		<?php endif;?>
		<?php wp_nav_menu([
			'container'       => 'div',
			'items_wrap'      => '<ul id="%1$s" class="%2$s widget-nav-menu__menu">%3$s</ul>',
			'container_class' => 'aheto-navbar--famulus-menu-additional ',
			'menu_class'      => 'menu',
			'menu'            => $cs_menus,
		]); ?>

	</div>
</div>

