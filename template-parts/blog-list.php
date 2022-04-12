<?php
//BLOG LIST
$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
$term  = get_query_var('s');

$args = array(
	'post_type' => 'post',
	'paged'     => $paged,
);

if ( is_search() ) {
	$args['s'] = $term;
}

$posts = new WP_Query($args);

$active_plugin        = function_exists('aheto') ? true : false;
$content_size_class   = is_active_sidebar('famulus-sidebar') && !$active_plugin ? 'col-12 col-lg-8' : 'col-12';
$container_size_class = is_active_sidebar('famulus-sidebar') && !$active_plugin ? 'container' : 'container';
$post_size_class      = is_active_sidebar('famulus-sidebar') && !$active_plugin ? 6 : 4; ?>

<div class="famulus-blog--wrapper">
	<div class="<?php echo esc_attr($container_size_class); ?>">
		<div class="row">
			<div class="famulus-blog--posts <?php echo esc_attr($content_size_class); ?>">
				<div class="famulus-blog--isotope row">
					<?php while ( $posts->have_posts() ) :
						$posts->the_post();

						$post_id   = get_the_ID();
						$no_image  = !has_post_thumbnail() ? ' no-image' : '';
						$image_id  = get_post_thumbnail_id($post_id);
						$author_id = get_the_author_meta('ID');
						$format    = get_post_format($post_id) ? get_post_format($post_id) : 'image'; ?>
						<div <?php post_class('famulus-blog--post col-xs-12 col-sm-6 col-lg-' . esc_attr($post_size_class . ' famulus--post-format-' . $format)); ?>>
							<div class="famulus-blog--post__item">
								<?php if ( !empty($image_id) ) {
									$image     = wp_get_attachment_image_url($image_id, 'large');
									$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); ?>
									<div class="famulus-blog--post__media">
										<img src="<?php echo esc_url($image); ?>"
											 alt="<?php echo esc_attr($image_alt); ?>" class="js-bg">
									</div>
								<?php } ?>

								<div class="famulus-blog--post__info-wrap">
									<div class="famulus-blog--post__info-wrap-date">
										<a href="<?php the_permalink(); ?>">
											<i class="ion-clock"></i>
											<?php the_time(get_option('date_format')); ?>
										</a>
									</div>
									<a href="<?php the_permalink(); ?>"
									   class="famulus-blog--post__title"><?php the_title(); ?></a>
									<div class="famulus-blog--post__text"><?php the_excerpt(); ?></div>
									<div class="famulus-blog--post__author">

										<?php echo get_avatar($author_id, 30);
										esc_html_e('by ', 'famulus');
										echo esc_html(get_the_author()); ?>
									</div>


								</div>
							</div>
						</div>

					<?php endwhile;
					wp_reset_postdata(); ?>

				</div>
				<?php if ( $posts->max_num_pages > 1 ) { ?>
					<div class="famulus-blog--pagination">
						<?php echo paginate_links(
							array(
								'prev_text' => __('Previous', 'famulus'),
								'next_text' => __('Next', 'famulus'),
							)
						); ?>
					</div>
				<?php } ?>
			</div>
			<?php if ( is_active_sidebar('famulus-sidebar') && !$active_plugin ) {

				wp_enqueue_style('famulus-sidebar', get_template_directory_uri() . '/assets/css/blog/sidebar.css');


				get_sidebar('famulus-sidebar');


			} ?>
		</div>
	</div>
</div>