<?php
$id = get_the_ID();
$top_title = carbon_get_post_meta( $id, 'crb_home_text_sections_top_title' );
$top_text = carbon_get_post_meta( $id, 'crb_home_text_sections_top_text' );

$bottom_title = carbon_get_post_meta( $id, 'crb_home_text_sections_bottom_title' );
$bottom_text = carbon_get_post_meta( $id, 'crb_home_text_sections_bottom_text' );
$slides = carbon_get_post_meta( $id, 'crb_home_text_sections_bottom_slides' );

if ( empty( $top_title ) && empty( $top_text ) && empty( $bottom_title ) && empty( $bottom_text ) && empty( $slides ) ) {
	return;
}
?>

<div class="section section--posts section--posts--secondary">
	<div class="shell">
		<?php if ( ! empty( $top_title ) || ! empty( $top_text ) ) : ?>
			<div class="section__head section__head--icon">
				<?php if ( ! empty( $top_title ) ) : ?>
					<h2 class="title"><?php esc_html_e( $top_title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $top_text ) ) : ?>
					<p><?php _e( $top_text ); ?></p>
				<?php endif; ?>

				<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/logo_x.svg" alt="" />
			</div><!-- /.section__head -->
		<?php endif; ?>

		<?php if ( ! empty( $bottom_title ) || ! empty( $bottom_text ) || ! empty( $slides ) ) : ?>
			<div class="section__body">
				<div class="post">
					<?php if ( ! empty( $bottom_title ) || ! empty( $bottom_text ) ) : ?>
						<div class="post__content">
							<?php if ( ! empty( $bottom_title ) ) : ?>
								<h4 style="color: #75baa0;"><?php esc_html_e( $bottom_title ); ?></h4>
							<?php endif; ?>

							<?php if ( ! empty( $bottom_text ) ) : ?>
								<p><?php esc_html_e( $bottom_text ); ?></p>
							<?php endif; ?>
						</div><!-- /.post__content -->
					<?php endif; ?>

					<?php if ( ! empty( $slides ) ) : ?>
						<aside class="post__aside">
							<div class="slider-images-secondary">
								<?php foreach ( $slides as $slide ) : ?>
									<div class="slider__slide">
										<div class="slider__slide-image">
											<?php echo wp_get_attachment_image( $slide, 'large-retina' ); ?>
										</div><!-- /.slider__slide-image -->
									</div><!-- /.slider__slide -->
								<?php endforeach; ?>
							</div><!-- /.slider-images -->
						</aside><!-- /.post__aside -->
					<?php endif; ?>
				</div><!-- /.post -->
			</div><!-- /.section__body -->
		<?php endif; ?>
	</div><!-- /.shell -->

<div style="margin-top: 60px;">
<?php
echo do_shortcode('[smartslider3 slider="3"]');
?>
</div>

</div><!-- /.section -->

<div class="shell" style="margin:auto;padding-top: 40px; padding-bottom: 40px;">
<?php do_action( 'wprev_pro_plugin_action', 1 );?>
</div>