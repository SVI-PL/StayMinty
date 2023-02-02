<?php
$title = carbon_get_the_post_meta( 'crb_intro_intro_title' );
$subtitle = carbon_get_the_post_meta( 'crb_intro_intro_subtitle' );
$image = carbon_get_the_post_meta( 'crb_intro_intro_image' );
$button_label = carbon_get_the_post_meta( 'crb_intro_intro_form_btn_text' );

$section_id = carbon_get_the_post_meta( 'crb_intro_intro_section_id' );
?>
<div class="intro-inner <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
	<?php if ( ! empty( $image ) ) : ?>
		<?php $image_src = crb_get_image_thumbnail( $image, 1400, 591 ); ?>
		<figure class="intro__background" style="background-image: url(<?php echo $image_src; ?>);"></figure><!-- /.intro__background -->
	<?php endif; ?>

	<div class="intro__inner">
		<div class="shell">
			<div class="intro__body">
				<?php if ( ! empty( $title ) ) : ?>
					<h6><?php echo esc_html( $title ); ?></h6>
				<?php endif; ?>

				<?php if ( ! empty( $subtitle ) ) : ?>
					<h1><?php echo esc_html( $subtitle ); ?></h1>
				<?php endif; ?>
			</div><!-- /.intro__body -->

			<?php crb_render_fragment( 'inner/form' ); ?>
		</div><!-- /.shell -->
	</div><!-- /.intro__inner -->
</div>