<?php
$section_id = carbon_get_the_post_meta( 'crb_text_with_image_single_section_id' );
$button_label = carbon_get_the_post_meta( 'crb_text_with_image_single_button_label' );
$url = carbon_get_the_post_meta( 'crb_text_with_image_single_button_url' );
$target = carbon_get_the_post_meta( 'crb_text_with_image_single_button_target' );
$is_link_valid = ! empty( $button_label ) && ! empty( $url );
?>
<section id="<?php echo $section_id; ?>" class="section-text-image section-text-image--reversed no-border">
	<div class="shell">
		<div class="section__inner">
			<div class="section__entry richtext-entry">
				<?php
				if ( $title = carbon_get_the_post_meta( 'crb_text_with_image_single_title' ) ) {
					echo $title;
				}

				if ( $content = carbon_get_the_post_meta( 'crb_text_with_image_single_content' ) ) {
					echo $content;
				}
				?>

				<?php if ( $is_link_valid ) : ?>
					<a href="<?php echo esc_url( $url ); ?>" class="btn" target="<?php echo crb_get_button_target( $target ); ?>"><?php echo esc_html( $button_label ); ?></a>
				<?php endif; ?>
			</div><!-- /.section__entry -->

			<?php if ( $image = carbon_get_the_post_meta( 'crb_text_with_image_single_image' ) ) : ?>
				<?php $image_src = crb_get_image_thumbnail( $image, 575, 433 ); ?>
				<figure class="section__image" style="background-image: url(<?php echo $image_src; ?>);"></figure><!-- /.section__image -->
			<?php endif; ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section>