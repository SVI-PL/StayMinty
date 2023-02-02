<?php
$features = $entry['features'];

if ( empty( $features ) ) {
	return;
}

$section_title = $entry['title'];
$btn_title      = $entry['btn_text'];
$btn_url        = $entry['btn_url'];
$btn_tab        = $entry['btn_tab'] ? '_blank' : '_self';
?>
<div class="section-features">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $section_title ) : ?>
				<h2><?php echo esc_html( $section_title ); ?></h2>
			<?php endif; ?>

			<div class="features">
				<?php foreach ( $features as $feature ) : ?>
					<?php
					$feature_title    = $feature['title'];
					$feature_image    = $feature['image'];
					$feature_subtitle = $feature['subtitle'];

					if ( ! $feature_image || ! $feature_title ) {
						continue;
					}
					?>
					<div class="feature">
						<div class="feature__image">
							<?php echo wp_get_attachment_image( $feature_image, 'feature' ) ?>
						</div><!-- /.feature__image -->

						<div class="feature__title">
							<p><span><?php echo nl2br( $feature_title ); ?></span></p>
						</div><!-- /.feature__title -->

						<?php if ( $feature_subtitle ) : ?>
							<div class="feature__content">
								<span><?php echo nl2br( $feature_subtitle ); ?></span>
							</div><!-- /.feautre__content -->
						<?php endif; ?>
					</div><!-- /.feature -->
				<?php endforeach; ?>
			</div><!-- /.feautres -->

			<?php if ( $btn_title && $btn_url ) : ?>
				<a class="btn btn--primary" href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo $btn_tab; ?>"><?php echo esc_html( $btn_title ); ?></a>
			<?php endif; ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</div><!-- /.section-features -->
