<?php
$image         = carbon_get_the_post_meta( 'crb_partners_image_aside' );
$heading       = carbon_get_the_post_meta( 'crb_partners_heading' );
$title         = carbon_get_the_post_meta( 'crb_partners_hero_title' );
$subtitle      = carbon_get_the_post_meta( 'crb_partners_hero_subtitle' );
$content       = carbon_get_the_post_meta( 'crb_partners_hero_content' );

$button_label  = carbon_get_the_post_meta( 'crb_partners_hero_button_label' );
$url           = carbon_get_the_post_meta( 'crb_partners_hero_button_url' );
$target        = crb_get_button_target( carbon_get_the_post_meta( 'crb_partners_hero_button_target' ) );
$is_link_valid = ! empty( $url ) && ! empty( $button_label );

if ( ! $content  && ! $is_link_valid && ! $title && ! $subtitle ) {
	return;
}
?>
<section class="section-text" id="text">
	<div class="shell">
		<?php if ( ! empty( $image ) ) : ?>
			<?php $image_src = crb_get_image_thumbnail( $image, 169, 162 ); ?>

			<figure class="section__icon">
				<img src="<?php echo $image_src; ?>" alt="">
			</figure>
		<?php endif; ?>

		<div class="section__entry richtext-entry">
			<?php if ( ! empty( $heading ) ) : ?>
				<h5 style="text-align: center;">
					<span><?php echo esc_html( $heading ); ?></span>
				</h5>
			<?php endif; ?>

			<?php
			if ( ! empty( $title ) ) {
				echo $title;
			}

			if ( ! empty( $subtitle ) ) {
				echo $subtitle;
			}

			if ( ! empty( $content ) ) {
				echo $content;
			}
			?>

			<?php if ( $is_link_valid ) : ?>
				<div class="list__item-actions" style="text-align: center;">
					<a class="link-more" href="<?php echo esc_url( $url ); ?>" target="<?php echo $target; ?>"><?php echo esc_html( $button_label ); ?>></a>
				</div>
			<?php endif; ?>
		</div>
	</div><!-- /.shell -->
</section>