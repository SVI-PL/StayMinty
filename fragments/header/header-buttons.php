<?php
if ( is_page_template( 'templates/glamping.php' ) ) {
	$primary_button_text = carbon_get_theme_option( 'crb_header_glamping_primary_button_text' );
	$primary_button_url = carbon_get_theme_option( 'crb_header_glamping_primary_button_url' );
	$primary_button_tab = carbon_get_theme_option( 'crb_header_glamping_primary_button_tab' );
	$primary_button_text_color = carbon_get_theme_option( 'crb_header_glamping_primary_button_color' );
	$primary_button_background_color = carbon_get_theme_option( 'crb_header_glamping_primary_button_background_color' );
	$primary_button_border_color = carbon_get_theme_option( 'crb_header_glamping_primary_button_border_color' );

	$secondary_button_text = carbon_get_theme_option( 'crb_header_glamping_secondary_button_text' );
	$secondary_button_url = carbon_get_theme_option( 'crb_header_glamping_secondary_button_url' );
	$secondary_button_tab = carbon_get_theme_option( 'crb_header_glamping_secondary_button_tab' );
	$secondary_button_text_color = carbon_get_theme_option( 'crb_header_glamping_secondary_button_color' );
	$secondary_button_background_color = carbon_get_theme_option( 'crb_header_glamping_secondary_button_background_color' );
	$secondary_button_border_color = carbon_get_theme_option( 'crb_header_glamping_secondary_button_border_color' );
} else {
	$primary_button_text = carbon_get_theme_option( 'crb_header_primary_button_text' );
	$primary_button_url = carbon_get_theme_option( 'crb_header_primary_button_url' );
	$primary_button_tab = carbon_get_theme_option( 'crb_header_primary_button_tab' );
	$primary_button_text_color = carbon_get_theme_option( 'crb_header_primary_button_color' );
	$primary_button_background_color = carbon_get_theme_option( 'crb_header_primary_button_background_color' );
	$primary_button_border_color = carbon_get_theme_option( 'crb_header_primary_button_border_color' );

	$secondary_button_text = carbon_get_theme_option( 'crb_header_secondary_button_text' );
	$secondary_button_url = carbon_get_theme_option( 'crb_header_secondary_button_url' );
	$secondary_button_tab = carbon_get_theme_option( 'crb_header_secondary_button_tab' );
	$secondary_button_text_color = carbon_get_theme_option( 'crb_header_secondary_button_color' );
	$secondary_button_background_color = carbon_get_theme_option( 'crb_header_secondary_button_background_color' );
	$secondary_button_border_color = carbon_get_theme_option( 'crb_header_secondary_button_border_color' );
}

if ( empty( $primary_button_text ) && empty( $primary_button_url ) && empty( $secondary_button_text ) && empty( $secondary_button_url ) ) {
	return;
}

$primary_btn_styles_array = array();
if ( ! empty( $primary_button_text_color ) ) {
	$primary_btn_styles_array[] = 'color: ' . $primary_button_text_color . ';';
}
if ( ! empty( $primary_button_background_color ) ) {
	$primary_btn_styles_array[] = 'background-color: ' . $primary_button_background_color . ';';
}
if ( ! empty( $primary_button_border_color ) ) {
	$primary_btn_styles_array[] = 'border-color: ' . $primary_button_border_color . ';';
}

$secondary_btn_styles_array = array();
if ( ! empty( $secondary_button_text_color ) ) {
	$secondary_btn_styles_array[] = 'color: ' . $secondary_button_text_color . ';';
}
if ( ! empty( $secondary_button_background_color ) ) {
	$secondary_btn_styles_array[] = 'background-color: ' . $secondary_button_background_color . ';';
}
if ( ! empty( $secondary_button_border_color ) ) {
	$secondary_btn_styles_array[] = 'border-color: ' . $secondary_button_border_color . ';';
}

if ( get_page_template_slug() === 'templates/partners-page.php' ) {
	$hide_primary_button = carbon_get_the_post_meta( 'crb_partners_hide_primary_button' ) ? true : false;
	$hide_secondary_button = carbon_get_the_post_meta( 'crb_partners_hide_secondary_button' ) ? true : false;
}

if ( isset( $hide_primary_button ) && $hide_primary_button ) {
	$additional_primary_class = 'hidden';
} else {
	$additional_primary_class = '';
}

if ( isset( $hide_secondary_button ) && $hide_secondary_button ) {
	$additional_secondary_class = 'hidden';
} else {
	$additional_secondary_class = '';
}
?>

<nav class="nav-actions">
	<ul>
		<?php if ( ! empty( $primary_button_text ) && ! empty( $primary_button_url ) ) :
		$btn_behavior = '';
		if ( $primary_button_tab ) {
			$btn_behavior = ' target="_blank"';
		}
		?>
		<li>
			<a href="<?php echo esc_url( $primary_button_url ); ?>" class="btn btn--primary <?php echo $additional_primary_class; ?>"
				<?php if ( ! empty( $primary_btn_styles_array ) ) : ?>
					style="<?php echo implode( ' ', $primary_btn_styles_array ); ?>"
				<?php endif; ?>
				<?php echo $btn_behavior; ?>>
				<?php esc_html_e( $primary_button_text ); ?>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $secondary_button_text ) && ! empty( $secondary_button_url ) ) :
	$btn_behavior = '';
	if ( $secondary_button_tab ) {
		$btn_behavior = ' target="_blank"';
	}
	?>
	<li>
		<a href="<?php echo esc_url( $secondary_button_url ); ?>" class="btn btn--secondary btn--sm <?php echo $additional_secondary_class; ?>"
			<?php if ( ! empty( $secondary_btn_styles_array ) ) : ?>
				style="<?php echo implode( ' ', $secondary_btn_styles_array ); ?>"
			<?php endif; ?>
			<?php echo $btn_behavior; ?>>
			<?php esc_html_e( $secondary_button_text ); ?>
		</a>
	</li>
<?php endif; ?>
</ul>
</nav><!-- /.nav-actions -->