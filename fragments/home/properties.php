<?php
$id = get_the_ID();
if ( ! $properties = carbon_get_post_meta( $id, 'crb_home_properties' ) ) {
	return;
}
$section_title = carbon_get_post_meta( $id, 'crb_home_properties_section_title' );
$description = carbon_get_post_meta( $id, 'crb_home_properties_description' );
$btn_text = carbon_get_post_meta( $id, 'crb_home_properties_button_text' );
$btn_url = carbon_get_post_meta( $id, 'crb_home_properties_button_url' );
$btn_tab = carbon_get_post_meta( $id, 'crb_home_properties_button_tab' );
?>

<div class="section section--properties">
	<div class="shell">
		<div class="section__head section__head--icon">
			<?php if ( ! empty( $section_title ) ) : ?>
				<h2 class="title"><?php esc_html_e( $section_title ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $description ) ) : ?>
				<p><?php echo nl2br( esc_html( $description ) ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $btn_text ) && ! empty( $btn_url ) ) :
				$btn_behavior = '';
				if ( $btn_tab ) {
					$btn_behavior = ' target="_blank"';
				}
			?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn--secondary btn--md"<?php echo $btn_behavior; ?>><?php esc_html_e( $btn_text ); ?></a>
			<?php endif; ?>

			
		</div><!-- /.section__head -->

		<?php if ( ! empty( $properties ) ) : ?>
			<div class="section__body">
				<ul class="list-properties">
					<?php foreach ( $properties as $property ) :
						$property_link_behavior = '';
						if ( $property['property_tab'] ) {
							$property_link_behavior = ' target="_blank"';
						}
					?>
						<li class="list__item">
							<div class="property"
							<?php if ( ! empty( $property['background'] ) ) : ?>
								style="background-image: url(<?php echo wp_get_attachment_image_url( $property['background'], 'large' ); ?>);"
							<?php endif; ?>
							>
								<?php if ( empty( $property['property_url'] ) ) : ?>
									<a href="<?php echo esc_url( $property['property_url'] ); ?>" class="property__link"<?php echo $property_link_behavior; ?>></a>
								<?php endif; ?>

								<?php if ( ! empty( $property['name'] ) || ! empty( $property['coming_soon'] ) ) : ?>
									<div class="property__entry">
										<?php if ( ! empty( $property['name'] ) ) : ?>
											<h6>
												<a href="<?php echo esc_url( $property['property_url'] ); ?>"<?php echo $property_link_behavior; ?>>
													<?php esc_html_e( $property['name'] ); ?>
												</a>
											</h6>
										<?php endif; ?>

										<?php if ( $property['coming_soon'] ) : ?>
											<p>
												<span><?php _e( 'coming soon', 'crb' ); ?></span>
											</p>
										<?php endif; ?>
									</div><!-- /.property__entry -->
								<?php endif; ?>
							</div><!-- /.property -->
						</li><!-- /.list__item -->
					<?php endforeach; ?>
				</ul><!-- /.list-properties -->

				<?php if ( ! empty( $properties ) ) : ?>
					<ul class="list-properties list-properties--slider owl-carousel">
						<?php foreach ( $properties as $property ) :
							$property_link_behavior = '';
							if ( $property['property_tab'] ) {
								$property_link_behavior = ' target="_blank"';
							}
						?>
							<li class="list__item">
								<div class="property"
								<?php if ( ! empty( $property['background'] ) ) : ?>
									style="background-image: url(<?php echo wp_get_attachment_image_url( $property['background'], 'large' ); ?>);"
								<?php endif; ?>
								>
									<?php if ( ! empty( $property['property_url'] ) ) : ?>
										<a href="<?php echo esc_url( $property['property_url'] ); ?>" class="property__link"<?php echo $property_link_behavior; ?>></a>
									<?php endif; ?>

									<?php if ( ! empty( $property['name'] ) ) : ?>
										<div class="property__entry">
											<h6>
												<a href="<?php echo esc_url( $property['property_url'] ); ?>"><?php esc_html_e( $property['name'] ); ?></a>
											</h6>
										</div><!-- /.property__entry -->
									<?php endif; ?>
								</div><!-- /.property -->
							</li><!-- /.list__item -->
						<?php endforeach; ?>
					</ul><!-- /.list-properties -->
				<?php endif; ?>
			</div><!-- /.section__body -->
		<?php endif; ?>
	</div><!-- /.shell -->
</div><!-- /.section -->