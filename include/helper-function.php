<?php

require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Create custom html structure for comments
 */
if ( !function_exists('famulus_comment') ) {
	function famulus_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ):
			case 'pingback':
			case 'trackback': ?>
				<div class="pinback">
				<span class="pin-title"><?php esc_html_e('Pingback: ', 'famulus'); ?></span><?php comment_author_link(); ?>
				<?php edit_comment_link(esc_html__('(Edit)', 'famulus'), '<span class="edit-link">', '</span>'); ?>

				<?php
				break;
			default:
				// generate comments
				?>
			<div <?php comment_class('famulus-blog--single__comments-item'); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="famulus-blog--single__comments-item-wrap">
					<div class="famulus-blog--single__comments-content">
						<div class="famulus-blog--single__comments-left">
                        <span class="person-img">
							<?php echo get_avatar($comment, '80', '', '', array('class' => 'img-person')); ?>

                        </span>
							<?php comment_reply_link(
								array_merge($args,
									array(
										'reply_text' => esc_html__('Reply', 'famulus'),
										'after'      => '',
										'depth'      => $depth,
										'max_depth'  => $args['max_depth']
									)
								)
							); ?>
						</div>
						<div class="comment-content">
							<div class="author-wrap">
								<h5 class="author">
									<?php comment_author(); ?>
								</h5>
								<div class="comment-date">

									<?php echo human_time_diff(get_comment_date('U'), current_time('timestamp')) . ' ago'; ?>
								</div>
							</div>

							<div class="comment-text">
								<?php comment_text(); ?>
							</div>


						</div>
					</div>
				</div>
				<?php
				break;
		endswitch;
	}
}


/**
 * Filter for excerpt more string
 */

if ( !function_exists('famulus_excerpt_more') ) {
	function famulus_excerpt_more() {
		return ' ...';
	}

	add_filter('excerpt_more', 'famulus_excerpt_more');
}



/**
 * Header template
 */

if ( !function_exists('famulus_main_header_html') ) {
	function famulus_main_header_html() {

		$active_plugin = function_exists('aheto') ? true : false;
		if($active_plugin == true){
			get_template_part('template-parts/aheto-header');
		}else{
			get_template_part('template-parts/theme-header');
		}

	}
}

add_action('famulus_main_header', 'famulus_main_header_html');


/**
 * Footer template
 */

if ( !function_exists('famulus_main_footer_html') ) {
	function famulus_main_footer_html() {

		$active_plugin = function_exists('aheto') ? true : false;
		if($active_plugin == true){
			get_template_part('template-parts/aheto-footer');
		}else{
			get_template_part('template-parts/theme-footer');
		}

	}
}


add_action('famulus_main_footer', 'famulus_main_footer_html');
