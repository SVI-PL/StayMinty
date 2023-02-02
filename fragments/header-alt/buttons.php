<?php 
$primary_btn_label = carbon_get_the_post_meta( 'crb_city_btn_primary_label' );
$primary_url = carbon_get_the_post_meta( 'crb_city_btn_primary_url' );
$primary_target = carbon_get_the_post_meta( 'crb_city_btn_primary_target' );
$is_primary_btn_valid = ! empty( $primary_url ) && ! empty( $primary_btn_label );

$secondary_btn_label = carbon_get_the_post_meta( 'crb_city_btn_secondary_label' );
$secondary_url = carbon_get_the_post_meta( 'crb_city_btn_secondary_url' );
$secondary_target = carbon_get_the_post_meta( 'crb_city_btn_secondary_target' );
$is_secondary_btn_valid = ! empty( $secondary_url ) && ! empty( $secondary_btn_label );
?>

<nav class="nav-actions">
	<ul>
		<?php if ( $is_primary_btn_valid ) : ?>
			<li>
				<a href="<?php echo esc_url( $primary_url ); ?>" class="btn btn--primary" target="<?php echo crb_get_button_target( $primary_target ); ?>"><?php echo esc_html( $primary_btn_label ); ?></a>
			</li>
		<?php endif; ?>

		<?php if ( $is_secondary_btn_valid ) : ?>
			<li>
				<a href="<?php echo esc_url( $secondary_url ); ?>" class="btn btn--secondary btn--sm" target="<?php echo crb_get_button_target( $secondary_target ); ?>"><?php echo esc_html( $secondary_btn_label ); ?></a>
			</li>
		<?php endif; ?>
	</ul>
</nav>