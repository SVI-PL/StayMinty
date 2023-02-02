<?php
$id = get_the_ID();
$background_image = carbon_get_post_meta( $id, 'crb_home_cards_background' );
$cards = carbon_get_post_meta( $id, 'crb_home_cards' );

if ( empty( $background_image ) && empty( $cards ) ) {
	return;
}
?>

<div class="section section--cards">
	<?php if ( ! empty( $background_image ) ) : ?>
		<div class="section__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $background_image, 'full-width-retina' ); ?>);"></div><!-- /.section__image -->
	<?php endif; ?>

	<?php if ( ! empty( $cards ) ) : ?>
		<div class="section__body">
			<div class="shell">
				<div class="section__content">
					<ul class="list-cards">
						<?php foreach ( $cards as $card ) : ?>
							<li class="list__item">
								<div class="<?php echo $card['background_color']; ?>">
									<?php if ( ! empty( $card['title'] ) ) : ?>
										<h5 style="text-align: center;"><?php esc_html_e( $card['title'] ); ?></h5>
									<?php endif; ?>

									<?php if ( ! empty( $card['features'] ) ) : ?>
										<div class="card__entry">
											<div class="list-info">
												<ul>
													<?php foreach ( $card['features'] as $feature ) : ?>
														<li>
															<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/logo_x.svg" alt="" /><?php esc_html_e( $feature['feature'] ); ?>
														</li>
													<?php endforeach; ?>
												</ul><!-- /.list-info -->
											</div><!-- /.list-info -->
										</div><!-- /.card__entry -->
									<?php endif; ?>
								</div><!-- /.card -->
							</li><!-- /.card -->
						<?php endforeach; ?>
					</ul><!-- /.list-cards -->
				</div><!-- /.section__content -->
			</div><!-- /.shell -->
		</div><!-- /.section__body -->
	<?php endif; ?>
</div><!-- /.section -->