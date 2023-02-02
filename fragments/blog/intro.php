<?php

$title = carbon_get_theme_option( 'crb_blog_intro_title' );
$image = carbon_get_theme_option( 'crb_blog_intro_image' );

if ( empty( $title ) && empty( $image ) ) {
	return;
}

?>

<section class="section-blog-intro">
	<div class="shell">
		<div class="section__inner">
			<?php if ( $image ): ?>
				<div class="section__image">
					<?php echo wp_get_attachment_image( $image, 'full' ); ?>			
				</div><!-- /.section__image -->
			<?php endif ?>

			<div class="section__title">
				<?php if ( $title ): ?>
					<h1><?php echo nl2br( esc_html( $title ) ); ?> <span></span></h1>
				<?php endif ?>

				<div class="section__title-icon" style="background-image: url(<?php echo bloginfo('stylesheet_directory') . '/resources/images/temp/xoxo.png' ?>);"></div><!-- /.section__title-icon -->
			</div><!-- /.section__title -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-blog -->
