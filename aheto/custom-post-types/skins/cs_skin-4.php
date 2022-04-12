<?php
/**
 * Skin 1.
 *
 * @since      1.0.0
 * @package    Aheto
 * @subpackage Aheto\Shortcodes
 * @author     Upqode <info@upqode.com>
 */

$ID = get_the_ID();

$classes   = [];
$classes[] = 'aheto-cpt-article';
$classes[] = 'aheto-cpt-article--' . $atts['layout'];
$classes[] = $this->getAdditionalItemClasses($atts['layout'], false);
$classes[] = 'aheto-cpt-article--' . $atts['skin'];
$img_class = $atts['layout'] === 'slider' || $atts['layout'] === 'grid' ? 'js-bg' : '';

$terms_list = get_the_terms(get_the_ID(), $atts['terms']);
if ( $terms_list ) {
	foreach ( $terms_list as $term ) {
		$classes[] = 'filter-' . $term->slug;
	}
}


/**
 * Set dependent style
 */
$sc_dir = FAMULUS_T_URI . '/aheto/custom-post-types/';
wp_enqueue_style('famulus-skin-4', $sc_dir . 'assets/css/cs_skin-4.css', null, null);

$format = $this->get_post_format();

?>

<article class="<?php echo esc_attr(implode(' ', $classes)); ?>">
	<div class="aheto-cpt-article__inner">
		<?php 	if ( has_post_thumbnail($ID) ) {
			$isHasThumb = $this->getImage($img_class, '', $atts['cpt_image_size'], true, true, $atts,  'cpt_');
		} ?>
		<div class="aheto-cpt-article__content">
			<?php
			$terms_class = !has_post_thumbnail($ID) ? 'aheto-cpt-article__terms--static' : '';
			?>
			<h6 class="aheto-cpt-article__date">
				<i class=""></i>
				<?php the_time(get_option('date_format')); ?> <?php _e('in World', 'famulus'); ?>
			</h6>
			<?php
			$this->getTitle();
			?>
			<p class="aheto-cpt-article__excerpt">
				<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
			</p>
			<h6 class="aheto-cpt-article__author">

				<?php
				$author_id = get_the_author_meta('ID');
				$name = esc_html__('user', 'famulus');

				echo get_avatar($author_id, 30,  array('alt' => $name), $name);
				echo esc_html__('by ', 'famulus') . esc_html(get_the_author()); ?>
			</h6>
		</div>
	</div>
</article>

