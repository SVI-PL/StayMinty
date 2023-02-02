<?php

if ( is_page_template( 'templates/glamping.php' ) ) {
	return;
}

if ( is_singular( 'crb_city' ) ) {
	$copyright = carbon_get_the_post_meta( 'crb_meta_copyright_single');

	if ( empty( $copyright ) ) {
		$copyright = carbon_get_theme_option( 'crb_copyright' );
	}
} else {
	$copyright = carbon_get_theme_option( 'crb_copyright' );
}


if ( empty( $copyright ) ) {
	return;
}
?>

<p class="copyright"><?php echo do_shortcode( esc_html( $copyright ) ); ?></p><!-- /.copyright -->