<?php
if ( ! is_page_template( 'templates/glamping.php' ) && ! has_nav_menu( 'main-menu' ) ) {
	return;
}

if ( is_page_template( 'templates/glamping.php' ) && ! has_nav_menu( 'main-menu-glamping' ) ) {
	return;
}

$theme_loc = is_page_template( 'templates/glamping.php' ) ? 'main-menu-glamping' : 'main-menu';

wp_nav_menu( array(
	'theme_location'  => $theme_loc,
	'container'       => 'nav',
	'container_class' => 'nav',
) );
