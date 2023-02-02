<?php
if ( ! is_page_template( 'templates/glamping.php' ) && ! has_nav_menu( 'secondary-menu' ) ) {
	return;
}

if ( is_page_template( 'templates/glamping.php' ) && ! has_nav_menu( 'secondary-menu-glamping' ) ) {
	return;
}

if ( is_page_template( 'templates/glamping.php' ) ) {
	$theme_loc = 'secondary-menu-glamping';
	$wrap_html = '<h5>'. esc_html( 'Featured Properties' ) . '</h5> <ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>';
} else {
	$theme_loc = 'secondary-menu';
	$wrap_html = '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>';
}

wp_nav_menu( array(
	'theme_location'  => $theme_loc,
	'container'       => 'nav',
	'container_class' => 'nav nav--secondary',
	'items_wrap'=> $wrap_html
) );
