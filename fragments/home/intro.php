<?php
$id = get_the_ID();
$title = carbon_get_post_meta( $id, 'crb_home_intro_title' );
$image = carbon_get_post_meta( $id, 'crb_home_intro_image' );
$properties_label = carbon_get_post_meta( $id, 'crb_home_intro_form_properties_label' );
$dates_label = carbon_get_post_meta( $id, 'crb_home_intro_form_dates_label' );
$btn_text = carbon_get_post_meta( $id, 'crb_home_intro_form_btn_text' );
if ( empty( $btn_text ) ) {
	$btn_text = __( 'Search', 'crb' );
}
$bottom_image = carbon_get_post_meta( $id, 'crb_home_intro_form_bottom_image' );
?>

<div class="intro">
	<div class="shell">
		<div class="intro__inner">
			<div class="intro__content">
				<?php if ( ! empty( $title ) ) : ?>
					<h1 style="color: #75baa0;"><?php esc_html_e( $title ); ?></h1>
				<?php endif; ?>

				<div class="form-book">
					<?php dynamic_sidebar( 'track_connect'); ?>
				</div><!-- /.form-book -->

				<?php if ( ! empty( $bottom_image ) ) : ?>
					<div class="intro__content-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $bottom_image, 'large-retina' ); ?>);"></div><!-- /.intro__content-image -->
				<?php endif; ?>
			</div><!-- /.intro__content -->

			<?php if ( ! empty( $image ) ) : ?>
				<div class="intro__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $image, 'large' ); ?>); border-color: #75baa0"></div><!-- /.intro__image -->
			<?php endif; ?>
		</div><!-- /.intro__inner -->
	</div><!-- /.shell -->
</div><!-- /.intro -->
