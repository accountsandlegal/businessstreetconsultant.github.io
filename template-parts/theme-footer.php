<?php

$footer_text = get_bloginfo( 'name' ) . ' ' . esc_html__( ' &copy;', 'famulus' ) . date( 'Y' );

?>

</div><!-- #content -->

<footer id="footer" class="famulus-footer">
	<div class="famulus-footer--copyright"><?php echo wp_kses_post($footer_text); ?></div>
</footer>