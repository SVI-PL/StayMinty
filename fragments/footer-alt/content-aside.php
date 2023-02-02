<?php
$logo = carbon_get_the_post_meta( 'crb_footer_inner_template_image' );
$content = carbon_get_the_post_meta( 'crb_footer_inner_template_content' );
?>

<aside class="footer__aside">
	<?php if ( ! empty( $logo ) ) : ?>
		<a href="<?php echo home_url( '/' ); ?>" class="logo" style="background-image: url(<?php echo wp_get_attachment_image_url( $logo, 'large' ); ?>);"><?php echo bloginfo( 'name' ); ?></a>
	<?php endif; ?>

	<?php
	if ( ! empty( $content ) ) {
		echo wpautop( $content );
	}
	?>
</aside>