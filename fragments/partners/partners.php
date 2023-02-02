<?php
if ( ! $partners = carbon_get_the_post_meta( 'crb_partners' ) ) {
	return;
}

$title    = carbon_get_the_post_meta( 'crb_partners_title' );
$subtitle = carbon_get_the_post_meta( 'crb_partners_subtitle' );
?>
<div id="partners">
<section class="section-partners">
	
	<div class="shell">
		<header class="section__head">
			<?php if ( ! empty( $title ) ) : ?>
				<h5><?php echo esc_html( $title ); ?></h5>
			<?php endif; ?>

			<?php
			if ( ! empty( $subtitle ) ) {
				echo crb_content( $subtitle );
			}
			?>
		</header><!-- /.section__head -->

		<div class="section__body">
			<div class="cols">
				<?php foreach ( $partners as $partner ) : ?>
					<?php
					$image         = $partner['image'];
					$image_src     = $image ? crb_get_image_thumbnail( $image, 2350, 1556 ) : '';
					$content       = $partner['content'];

					$btn_label     = $partner['button_label'];
					$url           = $partner['button_url'];
					$target        = $partner['button_target'];
					$is_link_valid = ! empty( $btn_label ) && ! empty( $url );

					$use_logo  = $partner['use_logo'];

					if ( $use_logo ) {
						$logo     = $partner['logo'];
						$logo_src = $logo ? crb_get_image_thumbnail( $logo, 1338, 280 ) : '';
					} else {
						$partner_title = $partner['title'];
					}
					?>
					<div class="col col--1of3">
						<div class="section__image" style="background-image: url(<?php echo $image_src; ?>);"></div><!-- /.section__image -->

						<?php if ( $use_logo && ! empty( $logo_src ) ) : ?>
							<div class="section__logo">
								<img src="<?php echo $logo_src; ?>" alt="">
							</div><!-- /.section__logo -->
						<?php endif; ?>

						<div class="section__entry">
							<?php if ( ! $use_logo && ! empty( $partner_title ) ) : ?>
								<h6><?php echo nl2br( $partner_title ); ?></h6>
							<?php endif; ?>
							<?php if ( ! empty( $content ) ) : ?>
								<?php echo crb_content( $content ); ?>
							<?php endif; ?>
						</div><!-- /.section__entry <-->

						<?php if ( $is_link_valid ) : ?>
							<div class="section__actions">
								<a href="<?php echo esc_url( $url ); ?>" class="link-more" target="<?php echo crb_get_button_target( $target ); ?>"><?php echo esc_html( $btn_label ); ?> ></a>
							</div><!-- /.section__actions -->
						<?php endif; ?>
					</div><!-- /.col col-/-1of3 -->
				<?php endforeach; ?>
			</div><!-- /.cols -->
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-partners -->
</div>