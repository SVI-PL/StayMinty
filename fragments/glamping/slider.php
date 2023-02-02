<?php
$title     = $entry['title'];
$shortcode = $entry['shortcode'];
$content   = $entry['content'];
$btn_title = $entry['btn_text'];
$btn_url   = $entry['btn_url'];
$btn_tab   = $entry['btn_tab'] ? '_blank' : '_self';
$figure    = $entry['add_figure'];

$classes = array(
	'section-slider'
);

if ( $figure ) {
	$classes[] = 'section-slider--alt';
}
?>
<div class="<?php echo join( ' ', $classes ); ?>">
	<?php if ( $title ) : ?>
		<div class="shell">
			<div class="section__inner">
				<h2><?php echo esc_html( $title ); ?></h2>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	<?php endif; ?>

	<?php if ( $shortcode ) : ?>
		<div class="slider__container">
			<?php echo crb_content( $shortcode ); ?>
		</div><!-- /.slider__container -->
	<?php endif; ?>

	<?php if ( $content || ( $btn_title && $btn_url ) ) : ?>
		<div class="shell">
			<div class="section__content">
				<?php
				if ( $content ) {
					echo crb_content( $content );
				}
				?>

				<?php if ( $btn_title && $btn_url ) : ?>
					<a class="link-more" href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo $btn_tab; ?>"><?php echo esc_html( $btn_title ); ?></a>
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	<?php endif; ?>
</div><!-- /.section-slider -->