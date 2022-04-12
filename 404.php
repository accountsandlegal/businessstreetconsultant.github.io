<?php
/**
 * 404 Page
 */

get_header(); ?>

    <div class="famulus-error--wrap">

        <div class="famulus-error--big-title"><?php esc_html_e( 'OOPS!', 'famulus' ); ?></div>

        <div class="famulus-error--small-title"><?php esc_html_e( '404', 'famulus' ); ?></div>

        <h1 class="famulus-error--title"><?php esc_html_e( 'Page not found', 'famulus' ); ?></h1>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="famulus-error--button"><?php esc_html_e( 'Go home', 'famulus' ); ?></a>

    </div>

<?php get_footer();
