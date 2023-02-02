<?php
$section_id = carbon_get_the_post_meta( 'crb_three_columns_section_id' );
$title = carbon_get_the_post_meta( 'crb_three_columns_section_title' );
$subtitle = carbon_get_the_post_meta( 'crb_three_columns_section_subtitle' );
?>
<section class="section-features-secondary" id="<?php echo $section_id; ?>">
	<div class="shell">
		<header class="section__head">

			<?php
			if ( ! empty( $title ) ) {
				echo $title;

			}

			if ( ! empty( $subtitle ) ) {
				echo $subtitle;
			}

			?>
		</header><!-- /.section__head -->

		<?php if ( $features = carbon_get_the_post_meta( 'crb_three_columns_section_features' ) ) : ?>
			<div class="section__body">
				<ul class="list-features-secondary">
					<?php foreach ( $features as $feature ) : ?>
						<li class="list__item">
							<div class="list-item__inner">
								<?php if ( $image = $feature['image'] ) : ?>
									<figure class="list__item-image">
										<?php $image_src = crb_get_image_thumbnail( $image, 120, 77 ); ?>
										<img src="<?php echo $image_src; ?>" alt="" />
									</figure><!-- /.list__item-image -->
								<?php endif; ?>

								<div class="list__item-entry">
									<?php if ( $title = $feature['title'] ) : ?>
										<h6><?php echo esc_html( $title ); ?></h6>
									<?php endif; ?>

									<?php
									if ( $content = $feature['content'] ) {
										echo wpautop( $content );
									}

									?>
								</div><!-- /.list__item-entry -->

								<?php
								$button_label = $feature['button_label'];
								$url = $feature['button_url'];
								$target = $feature['button_target'];

								$is_link_valid = ! empty( $button_label ) && ! empty( $url );
								?>

								<?php if ( $is_link_valid ) : ?>
									<div class="list__item-actions">
										<a href="<?php echo esc_url( $url ); ?>" class="link-more" target="<?php echo crb_get_button_target( $target ); ?>"><?php echo esc_html( $button_label ); ?> ></a>
									</div><!-- /.list__item-actions -->
								<?php endif; ?>
							</div><!-- /.list-item__inner -->
						</li><!-- /.list__item -->
					<?php endforeach; ?>
				</ul><!-- /.list-features -->
				
<div class="video-container" style="margin-top: 40px;">
<?php
echo do_shortcode('[smartslider3 slider="5"]');
?>
</div>
<div class="video-container-orlando" style="margin-top: 40px;">
<?php
echo do_shortcode('[smartslider3 slider="6"]');
?>
</div>

			</div><!-- /.section__body -->
		<?php endif; ?>
	</div><!-- /.shell -->
</section>