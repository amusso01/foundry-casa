<?php
/**
 * Services Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

if ( has_nav_menu( 'servicemenu' ) ) :
    wp_nav_menu([
        'theme_location'    => 'servicemenu',
        'menu_id'           => 'menu_service',
        'container'         => 'nav',
        'container_class'   => 'site-header__item site-header__menu primary-menu',
        'depth'             => 1
    ]);
endif;
