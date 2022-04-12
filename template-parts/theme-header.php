<div class="famulus-preloader"></div>

<div class="famulus-main-wrapper">
    <header class="famulus-header--wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- HEADER -->
                    <div class="famulus-header">

                        <!-- NAVIGATION -->
                        <nav id="topmenu" class="famulus-header--topmenu">

                            <div class="famulus-header--logo-wrap">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="famulus-header--logo">
                                    <span><?php echo get_option( 'blogname' ); ?></span>
                                </a>
                            </div>

                            <div class="famulus-header--menu-wrapper">
								<?php if ( has_nav_menu( 'primary-menu' ) ) {

									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'primary-menu';
									wp_nav_menu( $args );

								} else {

									echo '<span class="no-menu primary-no-menu">' . esc_html__( 'Please register Top Navigation from', 'famulus' ) . ' <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance &gt; Menus', 'famulus' ) . '</a></span>';

								} ?>

                            </div>

                            <!-- SEARCH -->
                            <div class="famulus-header--search-wrap">
								<?php do_action( 'famulus_search' ); ?>
                            </div>

                            <!-- MOB MENU ICON -->
                            <div class="famulus-header--mob-nav">
                                <a href="#" class="famulus-header--mob-nav__hamburger">
                                    <span></span>
                                </a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </header>

