<?php
$classes = array(
	'logo'
);

if ( is_page_template( 'templates/inner.php' ) ) {
	$logo = carbon_get_theme_option( 'crb_header_inner_logo' );
} elseif( is_page_template( 'templates/glamping.php' ) ) {

	if ( isset( $is_footer ) && $is_footer ) {
		$logo = carbon_get_theme_option( 'crb_footer_glamping_logo' ) ? carbon_get_theme_option( 'crb_footer_glamping_logo' ) : carbon_get_theme_option( 'crb_header_glamping_logo' );
	} else {
		$logo = carbon_get_theme_option( 'crb_header_glamping_logo' );
	}

	$classes[] = 'logo--large';
} else {
	$logo = carbon_get_theme_option( 'crb_header_logo' );
}
if ( empty( $logo ) ) {
	return;
}



?>

<a href="<?php echo home_url( '/' ); ?>" class="<?php echo join( ' ', $classes ); ?>" style="background-image: url(<?php echo wp_get_attachment_image_url( $logo, 'large' ); ?>);"><?php echo bloginfo( 'name' ); ?></a>