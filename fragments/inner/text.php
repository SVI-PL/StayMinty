<?php
if ( ! $content = carbon_get_the_post_meta( 'crb_inner_content_section_content' ) ) {
	return;
}
$section_id = carbon_get_the_post_meta( 'crb_inner_content_section_id' );
$title = carbon_get_the_post_meta( 'crb_inner_content_section_title' );
$subtitle = carbon_get_the_post_meta( 'crb_inner_content_section_subtitle' );
$image = carbon_get_the_post_meta( 'crb_inner_content_section_image' );
?>
<section class="section-text" id="<?php echo $section_id; ?>">
	<div class="shell">
		<?php if ( ! empty( $image ) ) : ?>
			<?php $image_src = crb_get_image_thumbnail( $image, 169, 162 ); ?>
			<figure class="section__icon">
				<img src="<?php echo $image_src; ?>" alt="" />
			</figure>
		<?php endif; ?>

		<div class="section__entry richtext-entry">
			<?php
			if ( ! empty( $title ) ) {
				echo $title;
			}
			?>

			<?php
			if ( ! empty( $subtitle ) ) {
				echo $subtitle;
			}
			?>

			<?php
			if ( ! empty( $content ) ) {
				echo $content;
			}
			?>
		</div><!-- /.section__entry -->
	</div><!-- /.shell -->
</section>