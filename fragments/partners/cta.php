<?php
$title         = carbon_get_the_post_meta( 'crb_partners_cta_title' );
$content       = carbon_get_the_post_meta( 'crb_partners_cta_content' );

$button_label  = carbon_get_the_post_meta( 'crb_partners_cta_button_label' );
$url           = carbon_get_the_post_meta( 'crb_partners_cta_button_url' );
$target        = crb_get_button_target( carbon_get_the_post_meta( 'crb_partners_cta_button_target' ) );
$is_link_valid = ! empty( $button_label ) && ! empty( $url );

if ( ! $content && ! $is_link_valid ) {
	return;
}

?>
<section class="section-callout">
	<div class="shell">
		<?php if ( ! empty( $title ) ) : ?>
			<header class="section__head">
				<h5><?php echo esc_html( $title ); ?></h5>
			</header><!-- /.section__head -->
		<?php endif; ?>

		<div class="section__body">
			<?php
			if ( ! empty( $content ) ) {
				echo crb_content( $content );
			}
			?>

			<?php if ( $is_link_valid ) : ?>
				<a class="link-more" href="<?php echo esc_url( $url ); ?>" target="<?php echo $target; ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php endif; ?>
		</div><!-- /.section__body -->
	</div><!-- /.shell -->
</section><!-- /.section-callout -->