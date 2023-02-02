<?php 
$content = carbon_get_the_post_meta( 'crb_glamping_intro_shortcode' );

if ( ! $content ) {
	return;
}
?>
<div class="section-intro">
	<?php echo do_shortcode( $content ); ?>
</div><!-- /.section-intro -->