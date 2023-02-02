<?php
$facebook_link = carbon_get_theme_option( 'crb_facebook_link' );
$custom_facebook_icon = carbon_get_theme_option( 'crb_facebook_custom_icon_header' );

$youtube_link = carbon_get_theme_option( 'crb_youtube_link' );
$custom_youtube_icon = carbon_get_theme_option( 'crb_youtube_custom_icon_header' );

if ( empty( $facebook_link ) && empty( $youtube_link ) ) {
	return;
}
?>

<ul class="socials">
	<?php if ( ! empty( $facebook_link ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank">
				<?php if ( empty( $custom_facebook_icon ) ) : ?>
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 120 120" style="enable-background:new 0 0 120 120;" xml:space="preserve">
						<g>
							<path style="fill:#3CD3AF;" d="M52.7,114.4h13.6V62h18.1L85,48.3H66.2V31.9c0-5.4,1.1-10.9,9.7-10.9c3.4,0,6.7,0,8.8,0l0.3-12.7
								c-2.1-0.2-5.6-0.5-9.8-0.5c-16.6,0-22.5,11.2-22.5,21.7v18.7H39.9V62h12.7L52.7,114.4L52.7,114.4z"/>
							<g>
								<g>
									<defs>
										<rect id="SVGID_15_" x="29.3" y="1.7" width="59.6" height="117.8"/>
									</defs>
									<clipPath id="SVGID_2_">
										<use xlink:href="#SVGID_15_"  style="overflow:visible;"/>
									</clipPath>
									<path style="clip-path:url(#SVGID_2_);" d="M68.3,119.1H43.1V66.6H29.3V42.6h13.9V29c0-12.4,7.8-26.9,29.7-26.9
										c7.7,0,13.4,0.7,13.6,0.8l2.3,0.3l-0.6,22.5l-2.6,0c0,0-5.8-0.1-12-0.1c-4.7,0-5.3,1.2-5.3,5.7v11.2h20.6l-1.1,24.1H68.3
										L68.3,119.1L68.3,119.1z M48.3,113.9h14.8V61.4h19.7l0.7-13.7H63.1V31.4c0-5.4,1.2-10.9,10.5-10.9c3.7,0,7.2,0,9.5,0l0.3-12.7
										c-2.3-0.2-6.1-0.5-10.6-0.5c-18,0-24.5,11.2-24.5,21.7v18.7H34.5v13.7h13.9L48.3,113.9L48.3,113.9z M48.3,113.9"/>
								</g>
							</g>
						</g>
					</svg>
				<?php
				else :
					echo wp_get_attachment_image( $custom_facebook_icon );
				endif;
				?>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $youtube_link ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank">
				<?php if( empty( $custom_youtube_icon ) ) : ?>
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 225.64 161.36">
					<defs>
						<style>.cls-1{fill:#aaffd5;}.cls-2{fill:#9041b7;}</style>
					</defs>
					<path class="cls-1" d="M247.89,95q2.61,10.71,3.74,32.53l.37,19.84-.37,19.84q-1.12,22.22-3.74,32.93a28.06,28.06,0,0,1-6.73,11.9,25.67,25.67,0,0,1-11.59,7.15q-9.72,2.78-45.6,4l-34,.4-34-.4q-35.89-1.18-45.6-4A25.67,25.67,0,0,1,58.75,212,28,28,0,0,1,52,200.09q-2.62-10.71-3.74-32.93l-.37-19.84q0-8.73.37-19.84Q49.41,105.66,52,95a27.78,27.78,0,0,1,6.73-12.3A25.67,25.67,0,0,1,70.34,75.5q9.7-2.77,45.6-4l34-.4,34,.4q35.88,1.18,45.6,4a25.67,25.67,0,0,1,11.59,7.15A27.87,27.87,0,0,1,247.89,95Z" transform="translate(-30.41 -63.64)"/>

					<path class="cls-2" d="M113.51,176.9V115.5L167.38,146Zm7-49.4v37.31L153.24,146Z" transform="translate(-30.41 -63.64)"/>

					<path d="M143.28,225l-36.21-.4c-26.07-.81-42.25-2.16-49.53-4.12A32.7,32.7,0,0,1,35,198.36l0-.14c-2-7.5-3.29-18.57-4.11-33.82v-.15l-.39-19.84c0-5.95.13-12.67.4-20.09.82-15.07,2.16-26,4.11-33.5A32.18,32.18,0,0,1,57.51,68.17C64.83,66.2,81,64.85,107,64l36.2-.4,36.2.4c26.08.81,42.25,2.16,49.53,4.12a32.23,32.23,0,0,1,22.61,22.58l0,.08c1.94,7.5,3.29,18.43,4.1,33.42v.15l.4,19.93-.41,20.08c-.81,15.25-2.16,26.32-4.1,33.82l0,.14a32.69,32.69,0,0,1-22.56,22.11c-7.31,2-23.48,3.32-49.47,4.13ZM43.61,195.89a23,23,0,0,0,6,9.92,22.78,22.78,0,0,0,10.32,6c6.47,1.74,22.41,3,47.34,3.81l36,.39,36-.4c24.84-.77,40.78-2.06,47.29-3.81a22.84,22.84,0,0,0,10.29-6,23.09,23.09,0,0,0,6-9.92c1.76-6.81,3-17.54,3.81-31.9l.39-19.67-.39-19.67c-.77-14.12-2.05-24.73-3.81-31.54a23.25,23.25,0,0,0-16.31-16.27c-6.47-1.74-22.41-3-47.34-3.81l-36-.39-36,.39c-24.84.78-40.78,2.07-47.29,3.82a23.26,23.26,0,0,0-16.27,16.3c-1.75,6.74-3,17.39-3.81,31.58-.26,7.22-.39,13.84-.39,19.59L39.8,164C40.57,178.35,41.85,189.08,43.61,195.89Zm72.9-11.27V104.46l70.32,39.84Zm9-64.72v49.19l43.15-24.75Z" transform="translate(-30.41 -63.64)"/>
				</svg>
				<?php
				else :
					echo wp_get_attachment_image( $custom_youtube_icon );
				endif;
				?>
			</a>
		</li>
	<?php endif; ?>
	<li>
		<a href="https://www.instagram.com/staymintyxo/" target="_blank"><img src="https://stayminty.com/wp-content/uploads/2019/04/stay-minty-instagram-icon.svg" style="vertical-align: baseline;"></a>
	</li>
</ul><!-- /.socials -->