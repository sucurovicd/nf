<?php

function main_nav_menu(){
    return wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse ',
            'container_id'      => 'main_nav_menu',
            'menu_class'        => 'nav navbar-nav pull-left',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
            );
}
register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'CCtheme' ),
) );