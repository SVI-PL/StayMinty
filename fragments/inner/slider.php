<?php
if ( ! $slider = carbon_get_the_post_meta( 'crb_inner_slider' ) ) {
	return;
}

$section_id = carbon_get_the_post_meta( 'crb_inner_slider_section_id' );

?>
<section class="section-slider-boxes" id="<?php echo $section_id; ?>">
	<div class="shell">
		<div class="slider-boxes">
			<div class="slider__clip swiper-container">
				<div class="slider__slides swiper-wrapper">
					<?php foreach ( $slider as $slide ) : ?>
						<?php if ( $image = $slide['image'] ) : ?>
							<?php $image_src = crb_get_image_thumbnail( $image, 398, 290 ); ?>
							<div class="slider__slide swiper-slide">
								<div class="slider__slide-inner" style="background-image: url(<?php echo $image_src; ?>);">
									<a href="<?php echo $image_src; ?>" class="slider__slide-link"></a>

									<div class="slider__slide-entry">
										<?php if ( $hover_icon = $slide['hover_image' ] ) : ?>
											<?php $icon_src = crb_get_image_thumbnail( $hover_icon, 96, 96 ); ?>
											<img class="ico-expand" src="<?php echo $icon_src; ?>" alt="" />
										<?php endif; ?>

										<?php if ( $title = $slide['title'] ) : ?>
											<h6><?php echo esc_html( $title ); ?></h6>
										<?php endif; ?>
									</div><!-- /.slider__slide-entry -->
								</div><!-- /.slider__slide-inner -->
							</div><!-- /.slider__slide -->
						<?php endif; ?>
					<?php endforeach; ?>
				</div><!-- /.slider__slides -->
			</div><!-- /.slider__clip -->

			<div class="slider__pagination swiper-pagination"></div><!-- /.slider__pagination -->
		</div><!-- /.slider -->
	</div><!-- /.shell -->
</section>