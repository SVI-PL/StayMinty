<?php
/**
 * Change the login header logo href attribute to open the homepage
 * instead of the default https://wordpress.org/.
 *
 * @link https://developer.wordpress.org/reference/hooks/login_headerurl/
 *
 * @param  string $login_header_url Login header logo URL.
 * @return string Homepage URL.
 */
function crb_change_login_header_url( $login_header_url ) {
	return home_url();
}
add_filter( 'login_headerurl', 'crb_change_login_header_url' );

/**
 * Change the login header logo title attribute to display the Site Title
 * instead of the default "Powered by WordPress".
 *
 * @link https://developer.wordpress.org/reference/hooks/login_headertitle/
 *
 * @param  string $login_header_title Login header logo URL.
 * @return string Site Title.
 */
function crb_change_login_header_title( $login_header_title ) {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'crb_change_login_header_title' );

function login_logo() { ?>
	<style type="text/css">
		body.login { background: #fff; }
		#login h1 a, .login h1 a { background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/images/temp/logo.svg); width:320px;	height:180px; background-size: 320px 180px;	background-repeat: no-repeat; background-size: contain; background-position: center center; }
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );
