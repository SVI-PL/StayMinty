<?php
$slides = carbon_get_post_meta( get_the_ID(), 'crb_home_slider_slides' );

if ( empty( $slides ) ) {
	return;
}
?>

<div class="section section--slider">
	<div class="slider-images owl-carousel">
		<?php foreach ( $slides as $slide ) : ?>
			<div class="slider__slide"
			<?php if ( ! empty( $slide['background'] ) ) : ?>
				style="background-image: url(<?php echo wp_get_attachment_image_url( $slide['background'], 'full-width-retina' ); ?>);"
			<?php endif; ?>
			>
				<div class="shell">
					<div class="slider__content">
						<?php if ( ! empty( $slide['title'] ) ) : ?>
							<h3 style="color: #fff;"><?php esc_html_e( $slide['title'] ); ?></h3>
						<?php endif; ?>

						<?php if ( ! empty( $slide['description'] ) ) : ?>
							<p style="color: #fff;"><?php echo nl2br( esc_html( $slide['description'] ) ); ?></p>
						<?php endif; ?>

						<?php if ( ! empty( $slide['btn_text'] ) && ! empty( $slide['btn_url'] ) ) :
							$btn_behavior = '';
							if ( $slide['btn_tab'] ) {
								$btn_behavior = ' target="_blank"';
							}
						?>
							<a href="<?php echo esc_url( $slide['btn_url'] ); ?>" class="btn btn--primary"<?php echo $btn_behavior; ?>><?php esc_html_e( $slide['btn_text'] ); ?></a>
						<?php endif; ?>
					</div><!-- /.slider__content -->
				</div><!-- /.shell -->
			</div><!-- /.slider__slide -->
		<?php endforeach; ?>
	</div><!-- /.slider-images -->
</div><!-- /.section -->