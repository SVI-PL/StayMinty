<?php
$sections = carbon_get_the_post_meta( 'crb_inner_sections' );
if ( empty( $sections ) ) {
	return;
}

$section_id = carbon_get_the_post_meta( 'crb_inner_sections_section_id' );

?>
<?php foreach ( $sections as $index=>$section ) : ?>
	<?php if ( $section['position'] === 'right' ) : ?>
		<section class="section-text-image section-text-image--reversed" id="<?php echo $section_id; ?>">
	<?php else : ?>
		<section class="section-text-image" id="<?php echo $section_id; ?>">
	<?php endif; ?>
		<div class="shell">

			<div class="section__inner">
				<div class="section__entry richtext-entry">
					<?php
					if ( $title = $section['title'] ) {
						echo $title;
					}

					if ( $subtitle = $section['subtitle'] ) {
						echo $subtitle;
					}

					if ( $content = $section['content'] ) {
						echo $content;
					}

					$button_label = $section['button_label'];
					$url = $section['button_url'];
					$target = $section['button_target'];

					$is_link_valid = ! empty( $button_label ) && ! empty( $url );
					?>

					<?php if ( $is_link_valid ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" class="btn" target="<?php echo crb_get_button_target( $target ); ?>"><?php echo esc_html( $button_label ); ?></a>
					<?php endif; ?>
				</div><!-- /.section__entry -->

				<?php if ( $image = $section['image'] ) : ?>
					<?php $image_src = crb_get_image_thumbnail( $image, 602, 433 ); ?>
					<figure class="section__image" style="background-image: url(<?php echo $image_src; ?>);"></figure><!-- /.section__image -->
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	</section><!-- /.section -->
<?php endforeach; ?>
