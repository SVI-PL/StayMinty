<?php
$image_sm = $entry['image_left'];
$image_lg = $entry['image_right'];

if ( ! $image_sm || ! $image_lg ) {
	return;
}

$reverse = $entry['reverse'];

$classes = array(
	'section-two-images'
);

if ( $reverse ) {
	$classes[] = 'section-two-images--reversed';
}

?>
<div class="<?php echo join( ' ', $classes ); ?>">
	<div class="section__container">
		<div class="">
			<div class="section__inner">
				<?php if ( $image_sm ) : ?>
					<div class="section__image">
						<?php echo wp_get_attachment_image( $image_sm, 'image-sm', false, '' ); ?>
					</div><!-- /.section__image -->
				<?php endif; ?>

				<?php if ( $image_lg ) : ?>
					<div class="section__content">
						<?php echo wp_get_attachment_image( $image_lg, 'full', false, '' ); ?>
					</div><!-- /.section__content -->
				<?php endif; ?>
			</div><!-- /.section-inner -->
		</div><!-- /.shell -->
	</div><!-- /.section__container -->
</div><!-- /.section-cols -->