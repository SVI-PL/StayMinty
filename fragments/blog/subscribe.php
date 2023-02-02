<?php
$title = carbon_get_theme_option( 'crb_blog_subscribe_title' );
$logo = carbon_get_theme_option( 'crb_blog_subscribe_logo' );
$form_id = carbon_get_theme_option( 'crb_blog_subscribe_form_id' );

if ( empty( $title ) && empty( $logo ) && empty( $form_id ) ) {
	return;
}
?>

<div class="section section--subscribe">
	<div class="shell">
		<div class="section__head">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 style="text-align: center;"><?php esc_html_e( $title ); ?></h1>
			<?php endif; ?>

			<?php
			if ( ! empty( $logo ) ) {
				echo wp_get_attachment_image( $logo, 'large' );
			}
			?>
		</div><!-- /.section__head -->

		<?php if ( ! empty( $form_id ) ) : ?>
			<div class="section__body">
				<div class="form-subscribe">
					<?php crb_render_gform( $form_id, true ); ?>
				</div><!-- /.form-subscribe -->
			</div><!-- /.section__body -->
		<?php endif; ?>
	</div><!-- /.shell -->
</div><!-- /.section -->
