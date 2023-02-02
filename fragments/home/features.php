<?php
$id = get_the_ID();
$section_title = carbon_get_post_meta( $id, 'crb_home_features_section_title' );
$description = carbon_get_post_meta( $id, 'crb_home_features_section_description' );
$features = carbon_get_post_meta( $id, 'crb_home_features' );
$btn_text = carbon_get_post_meta( $id, 'crb_home_features_button_text' );
$btn_url = carbon_get_post_meta( $id, 'crb_home_features_button_url' );
$btn_tab = carbon_get_post_meta( $id, 'crb_home_features_button_tab' );
?>

<div class="section section--features">
	<div class="shell">
		<?php if ( ! empty( $section_title ) || ! empty( $description ) ) : ?>
			<div class="section__head section__head--icon">
				<?php if ( ! empty( $section_title ) ) : ?>
					<h2 class="title"><?php esc_html_e( $section_title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $description ) ) : ?>
					<p><?php echo nl2br( esc_html( $description ) ); ?></p>
				<?php endif; ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/logo_x.svg" alt="" />
			</div><!-- /.section__head -->
		<?php endif; ?>

		<?php if ( ! empty( $features ) ) : ?>
			<div class="section__body">
				<ul class="list-features">
					<?php foreach ( $features as $feature ) : ?>
						<li class="list__item">
							<div class="feature">
								<?php if ( ! empty( $feature['icon'] ) ) : ?>
								<div class="feature__image">
									<img src="<?php echo wp_get_attachment_image_url( $feature['icon'], 'medium_large' ); ?>" alt="" />
								</div><!-- /.feature__image -->
								<?php endif; ?>

								<?php if ( ! empty( $feature['title'] ) || ! empty( $feature['subtitle'] ) ) : ?>
									<div class="feature__body">
										<?php if ( ! empty( $feature['title'] ) ) : ?>
											<h6><?php esc_html_e( $feature['title'] ); ?></h6>
										<?php endif; ?>

										<?php if ( ! empty( $feature['subtitle'] ) ) : ?>
											<p><?php esc_html_e( $feature['subtitle'] ); ?></p>
										<?php endif; ?>
									</div><!-- /.feature__body -->
								<?php endif; ?>
							</div><!-- /.feature -->
						</li><!-- /.list__item -->
					<?php endforeach; ?>
				</ul><!-- /.list-features -->
			</div><!-- /.section__body -->
		<?php endif; ?>

		<?php if ( ! empty( $btn_text ) && ! empty( $btn_url ) ) :
			$btn_behavior = '';
			if ( $btn_tab ) {
				$btn_behavior = ' target="_blank"';
			}
		?>
			<div class="section__actions">
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn--secondary btn--md"<?php echo $btn_behavior; ?>><?php esc_html_e( $btn_text ); ?></a>
			</div><!-- /.section__actions -->
		<?php endif; ?>
	</div><!-- /.shell -->
</div><!-- /.section -->