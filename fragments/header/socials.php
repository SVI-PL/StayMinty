<?php
$custom_facebook_icon = carbon_get_theme_option( 'crb_facebook_custom_icon_header' );
$custom_youtube_icon = carbon_get_theme_option( 'crb_youtube_custom_icon_header' );

if ( is_page_template( 'templates/glamping.php' ) ) {
	$facebook_link  = carbon_get_theme_option( 'crb_glambing_facebook_link' );
	$youtube_link   = carbon_get_theme_option( 'crb_glambing_youtube_link' );
	$instagram_link = carbon_get_theme_option( 'crb_glambing_instagram_link' );
	$email          = carbon_get_theme_option( 'crb_glambing_socials_email' );
} else {
	$youtube_link   = carbon_get_theme_option( 'crb_youtube_link' );
	$facebook_link  = carbon_get_theme_option( 'crb_facebook_link' );
	$instagram_link = carbon_get_theme_option( 'crb_instagram_link' );
	$email          = carbon_get_theme_option( 'crb_socials_email' );
}

if ( ! $facebook_link && ! $youtube_link && ! $instagram_link && ! $email ) {
	return;
}
?>

<ul class="socials">
	<?php if ( $facebook_link ) : ?>
		<li>
			<a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"><img src="https://stayminty.com/wp-content/themes/stay-minty/resources/images/stay-minty-facebook-icon.svg" style="vertical-align: baseline;"></a>
		</li>
	<?php endif; ?>

	<?php if ( $youtube_link ) : ?>
		<li>
			<a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank"><img src="https://stayminty.com/wp-content/themes/stay-minty/resources/images/stay-minty-youtube-icon.svg" style="vertical-align: baseline;"></a>
		</li>
	<?php endif; ?>

	<?php if ( $instagram_link ) : ?>
		<li>
			<a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/instagram.png" style="vertical-align: baseline;"></a>
		</li>
	<?php endif; ?>

	<?php if ( $email ) : ?>
		<li>
			<a href="mailto:<?php echo antispambot( $email, 0 ) ?>" target="_blank"><img src="https://stayminty.com/wp-content/uploads/2020/08/stay-minty-mail-icon.svg" style="vertical-align: baseline;"></a>
		</li>
	<?php endif; ?>
</ul><!-- /.socials -->