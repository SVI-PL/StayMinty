<?php
if ( ! $slider = carbon_get_the_post_meta( 'crb_partners_slider' ) ) {
	return;
}
?>
<div class="section section--slider">
	<div class="slider-images owl-carousel">
		<?php foreach ( $slider as $slide ) : ?>
			<?php
			$background = $slide['background_image'];
			$title      = $slide['title'];
			$subtitle   = $slide['subtitle'];
			$img_src = $background ? crb_get_image_thumbnail( $background, 1400, 444 ) : '';

			$btn_label     = $slide['button_label'];
			$url           = $slide['button_url'];
			$target        = $slide['button_target'];
			$is_link_valid = ! empty( $btn_label ) && ! empty( $url );
			?>

			<div class="slider__slide" style="background-image: url(<?php echo $img_src; ?>);">
				<div class="shell">
					<div class="slider__content">
						<?php if ( ! empty( $title ) ) : ?>
							<h2><?php echo esc_html( $title ); ?></h2>
						<?php endif; ?>

						<?php
						if ( ! empty( $subtitle ) ) {
							echo crb_content( $subtitle);
						}
						?>

						<?php if ( $is_link_valid ) : ?>
							<a href="<?php echo esc_url( $url ); ?>" class="btn btn--primary" target="<?php echo crb_get_button_target( $target ); ?>"><?php echo esc_html( $btn_label ); ?></a>
						<?php endif; ?>
					</div><!-- /.slider__content -->
				</div><!-- /.shell -->
			</div><!-- /.slider__slide -->
		<?php endforeach; ?>
	</div><!-- /.slider-images -->
</div>