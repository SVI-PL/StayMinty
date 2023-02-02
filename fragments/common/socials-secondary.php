<?php

if ( is_singular( 'crb_city' ) ) {
	$custom_facebook_icon = carbon_get_the_post_meta( 'crb_city_facebook_icon');
	$custom_youtube_icon = carbon_get_the_post_meta( 'crb_city_youtube_icon' );

	$facebook_link  = carbon_get_the_post_meta( 'crb_city_facebook_link');
	$youtube_link   = carbon_get_the_post_meta( 'crb_city_youtube_link' );
	$instagram_link = carbon_get_theme_option( 'crb_instagram_link' );
	$email          = carbon_get_theme_option( 'crb_socials_email' );

} elseif( is_page_template( 'templates/glamping.php' ) ) {
	$facebook_link  = carbon_get_theme_option( 'crb_glambing_facebook_link' );
	$youtube_link   = carbon_get_theme_option( 'crb_glambing_youtube_link' );
	$instagram_link = carbon_get_theme_option( 'crb_glambing_instagram_link' );
	$email          = carbon_get_theme_option( 'crb_glambing_socials_email' );
} else {
	$custom_facebook_icon = carbon_get_theme_option( 'crb_facebook_custom_icon_footer' );
	$custom_youtube_icon  = carbon_get_theme_option( 'crb_youtube_custom_icon_footer' );

	$facebook_link       = carbon_get_theme_option( 'crb_facebook_link' );
	$youtube_link        = carbon_get_theme_option( 'crb_youtube_link' );
	$instagram_link      = carbon_get_theme_option( 'crb_instagram_link' );
	$email               = carbon_get_theme_option( 'crb_socials_email' );
}


if ( $facebook_link && ! $youtube_link && ! $instagram_link && ! $email ) {
	return;
}
?>

<ul class="socials socials--secondary">
	<?php if ( ! empty( $facebook_link ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank">
				<?php if ( empty( $custom_facebook_icon ) ) : ?>
					<svg aria-hidden="true" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path></svg>
					<?php
				else :
					echo wp_get_attachment_image( $custom_facebook_icon, 'small' );
				endif;
				?>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $youtube_link ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank">
				<?php if ( empty( $custom_youtube_icon ) ) : ?>
					<svg aria-hidden="true" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
					<?php
				else :
					echo wp_get_attachment_image( $custom_youtube_icon, 'small' );
				endif;
				?>
			</a>
		</li>
	<?php endif; ?>
	
	<?php if ( $instagram_link ) : ?>
		<li>
			<a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"><img src="https://stayminty.com/wp-content/uploads/2019/04/instagram.svg" style="vertical-align: baseline;"></a>
		</li>
	<?php endif; ?>
	
	<?php if ( $email ) : ?>
		<li>
			<a href="mailto:<?php echo antispambot( $email, 0 ); ?>" target="_blank"><img src="https://stayminty.com/wp-content/uploads/2020/08/stay-minty-mail-icon-2.svg" style="vertical-align: baseline;"></a>
		</li>
	<?php endif; ?>
</ul><!-- /.socials -->