<?php
$title   = $entry['title'];
$content = $entry['content'];
$image   = $entry['image'];

if ( ! $content || ! $image ) {
	return;
}

$btn_title = $entry['btn_text'];
$btn_url   = $entry['btn_url'];
$btn_tab   = $entry['btn_tab'] ? '_blank' : '_self';
$reverse   = $entry['reverse'];

$classes = array(
	'section-large-content'
);

if ( $reverse ) {
	$classes[] = 'section-large-content--reversed';
}
?>
<div class="<?php echo join( ' ', $classes ); ?>">
	<?php if ( $title ) : ?>
		<div class="shell">
			<h2><?php echo esc_html( $title ); ?></h2>
		</div><!-- /.shell -->
	<?php endif; ?>

	<div class="section__container">
		<div class="section__inner">
			<div class="section__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $image, 'full', false ); ?>)">
			</div><!-- /.section__image -->

			<div class="section__content">
				<div class="section__content-inner">
					<?php echo crb_content( $content ); ?>

					<?php if ( $btn_title && $btn_url ) : ?>
						<a class="link-more" href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo $btn_tab; ?>"><?php echo esc_html( $btn_title ); ?></a>
					<?php endif; ?>
				</div><!-- /.section__content-inner -->
			</div><!-- /.section__content -->
		</div><!-- /.section-inner -->
	</div><!-- /.section__container -->
</div><!-- /.section-cols -->