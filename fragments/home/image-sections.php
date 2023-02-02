<?php
$id = get_the_ID();
$section_title = carbon_get_post_meta( $id, 'crb_home_image_sections_title' );
$sections = carbon_get_post_meta( $id, 'crb_home_image_sections' );

if ( empty( $section_title ) && empty( $sections ) ) {
	return;
}
?>

<div class="section section--posts">
	<div class="shell">
		<?php if ( ! empty( $section_title ) ) : ?>
			<div class="section__head">
				<h4 class="title title--line"><?php echo nl2br( esc_html( $section_title ) ); ?></h4>
			</div><!-- /.section__head -->
		<?php endif; ?>

		<div class="section__body">
			<?php foreach ( $sections as $section_index => $section ) :
				$post_classes = array( 'post' );
				if ( $section_index % 2 != 0 ) {
					$post_classes[] = 'post--reversed';
				}
			?>
				<div class="<?php echo implode( ' ', $post_classes ); ?>">
					<div class="post__content">
						<?php if ( ! empty( $section['title'] ) ) : ?>
							<h4 style="color: #75baa0;"><?php esc_html_e( $section['title'] ); ?></h4>
						<?php endif; ?>

						<?php if ( ! empty( $section['features'] ) ) : ?>
							<div class="list-info">
								<ul>
									<?php foreach ( $section['features'] as $feature ) : ?>
										<li>
											<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/logo_x.svg" alt="" /><?php esc_html_e( $feature['feature'] ); ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div><!-- /.list-info -->
						<?php endif; ?>
					</div><!-- /.post__content -->

					<?php if ( ! empty( $section['image'] ) ) : ?>
						<aside class="post__aside">
							<?php echo wp_get_attachment_image( $section['image'], 'large-retina' ); ?>
						</aside><!-- /.post__aside -->
					<?php endif; ?>
				</div><!-- /.post -->
			<?php endforeach; ?>
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</div><!-- /.section -->