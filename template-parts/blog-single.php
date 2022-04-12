<?php
/*
 * Single post
 */


$protected = '';

if ( post_password_required() ) {
	$protected = 'protected-page';
}

$get_id    = get_the_ID();
$author_id = get_the_author_meta('ID');

if ( (is_active_sidebar('famulus-sidebar')) ) {
	$content_size_class = 'col-12 col-lg-8';
} else {
	$content_size_class = 'col-12';
} ?>

<div class="famulus-blog--single-wrapper <?php echo esc_attr($protected); ?>">

	<div class="famulus-blog--single__top-content">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="famulus-blog--single__columns">
						<div class="famulus-blog--single__top-content-left">

							<div class="famulus-blog--single__categories">
								<?php the_category(' '); ?>
							</div>

							<?php the_title('<h1 class="famulus-blog--single__title">', '</h1>'); ?>

							<div class="famulus-blog--single__date"><?php the_time(get_option('date_format')); ?></div>

						</div>

						<div class="famulus-blog--single__top-content-right">

							<div class="famulus-blog--single__author">

								<?php echo get_avatar($author_id, 50);
								echo esc_html(get_the_author()); ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="container famulus-blog--single__post-content">
		<div class="row">
			<div class="col-12 <?php echo esc_attr($content_size_class); ?> famulus-blog--single__single-content">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="famulus-blog--single__banner">
						<?php $image_url = get_the_post_thumbnail_url($get_id, 'full');
						$image_id        = get_post_thumbnail_id($get_id);
						$image_alt       = get_post_meta($image_id, '_wp_attachment_image_alt', true); ?>

						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">

					</div>
				<?php } ?>

				<div class="famulus-blog--single__content-wrapper">

					<?php the_content();
					wp_link_pages('link_before=<span class="famulus-blog--single__pages">&link_after=</span>&before=<div class="famulus-blog--single__post-nav"> <span>' . esc_html__("Page:", 'famulus') . ' </span> &after=</div>'); ?>
					<?php $active_plugin = function_exists('aheto') ? true : false;
					if ( $active_plugin == true ) {
						?>
						<div class="famulus-blog--single__tag-like">
							<?php the_tags(
								'<div class="famulus-blog--single__tags">
						<span class="famulus-blog--single__tag-title">Tags  </span>',
								', ',
								'</div>'); ?>

							<?php $likes = get_post_meta(get_the_ID(), 'aheto_post_likes', true); ?>
							<a href="#" class="famulus-blog--single__likes">
								<i class="fa fa-heart"></i> <?php echo esc_attr($likes) ? $likes : 0; ?> <?php esc_html_e('Likes', 'famulus'); ?>
							</a>
						</div>
					<?php } ?>
				</div>
				<?php $active_plugin = function_exists('aheto') ? true : false;
				if ( $active_plugin == true ) {
					?>
					<div class="famulus-blog--single__soc-wrapper">
						<a class="famulus-blog--single__share-link" href="#"
						   data-share="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
						   target="_blank">
							<i class="famulus-blog--single__socials-share-icon icon ion-social-facebook"></i>
						</a>
						<a class="famulus-blog--single__share-link" href="#"
						   data-share="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
						   target="_blank">
							<i class="famulus-blog--single__socials-share-icon icon ion-social-twitter"></i>
						</a>
						<a class="famulus-blog--single__share-link" href="#"
						   data-share="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
						   target="_blank">
							<i class="famulus-blog--single__socials-share--icon icon ion-social-linkedin"></i>
						</a>
					</div>
				<?php } ?>
				<?php if ( comments_open() || '0' != get_comments_number() && wp_count_comments($get_id) ) { ?>
					<div class="famulus-blog--single__comments">
						<?php comments_template('', true); ?>
					</div>
				<?php } ?>

				<div class="famulus-blog--single__pagination">
					<div class="famulus-blog--single__pagination-prev">
						<?php $prev_post     = get_previous_post();
						if ( !empty($prev_post) ) :
							$prev_thumbnail = get_the_post_thumbnail_url($prev_post->ID, 'thumbnail');
							$prev_post_title = !empty(get_the_title($prev_post)) ? get_the_title($prev_post) : esc_html__('No title', 'famulus');
							$prev_link       = get_permalink($prev_post); ?>


							<?php if ( !empty($prev_thumbnail) ) { ?>
							<a href="<?php echo esc_url($prev_link); ?>" class="img-wrap">
								<img src="<?php echo esc_url($prev_thumbnail); ?>"
									 alt="<?php echo esc_attr($prev_post_title); ?>">
							</a>
						<?php } ?>
							<span>
                                <a href="<?php echo esc_url($prev_link); ?>" class="content">
                                       <span><?php esc_html_e('Prev post', 'famulus'); ?></span>
                                        <?php echo wp_kses_post($prev_post_title); ?>
                                </a>
                            </span>

						<?php endif; ?>
					</div>

					<?php $next_post = get_next_post(); ?>
					<div class="famulus-blog--single__pagination-next">
						<?php if ( !empty($next_post) ) :
							$next_thumbnail = get_the_post_thumbnail_url($next_post->ID, 'thumbnail');
							$next_post_title = !empty(get_the_title($next_post)) ? get_the_title($next_post) : esc_html__('No title', 'famulus');
							$next_link = get_permalink($next_post); ?>


							<span>
                                <a href="<?php echo esc_url($next_link); ?>" class="content">
                                    <span><?php esc_html_e('Next post', 'famulus'); ?></span>
									<?php echo wp_kses_post($next_post_title); ?>
                                </a>
                            </span>
							<?php if ( !empty($next_thumbnail) ) { ?>
							<a href="<?php echo esc_url($next_link); ?>" class="img-wrap">
								<img src="<?php echo esc_url($next_thumbnail); ?>"
									 alt="<?php echo esc_attr($next_post_title); ?>">
							</a>
						<?php } ?>

						<?php endif; ?>
					</div>
				</div>

			</div>
			<?php if ( is_active_sidebar('famulus-sidebar') ) {

				wp_enqueue_style('famulus-sidebar', FAMULUS_T_URI . '/assets/css/blog/sidebar.css');

				get_sidebar('famulus-sidebar');

			} ?>
		</div>
	</div>
</div>