<?php
$image = carbon_get_post_meta( get_the_ID(), 'crb_home_full_width_section_image' );

if ( empty( $image ) ) {
	return;
}
?>

<div class="section-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $image, 'full-width-retina' ); ?>);"></div><!--
	/.section-image -->
