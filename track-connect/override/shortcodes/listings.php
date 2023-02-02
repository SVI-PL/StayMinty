<?php

$firstImage = get_post_meta( $post->ID, '_listing_first_image', true );
$title = get_the_title();
$data = sprintf( '<p class="listing-information">%s BR / %s BA / %s PPL - %s, %s</p>', get_post_meta( $post->ID, '_listing_bedrooms', true ), get_post_meta( $post->ID, '_listing_bathrooms', true ), get_post_meta( $post->ID, '_listing_occupancy', true ),  get_post_meta( $post->ID, '_listing_city', true ), get_post_meta( $post->ID, '_listing_state', true ) );
?>
<article class="listing entry listing-box">
	<div class="listing-wrap">
		<div class="listing-widget-thumb">
			<?php if ( $firstImage ) : ?>
				<a href="<?php the_permalink(); ?>" class="listing-image-link">
					<img src="https://d2epyxaxvaz7xr.cloudfront.net/305x208/<?php echo get_post_meta( $post->ID, '_listing_first_image', true ) ?>">
				</a>
			<?php endif; ?>

		</div>
	</div>

	<div class="listing-widget-details">
		<h3 class="listing-title">
			<a href="<?php the_permalink(); ?>"><?php echo esc_html( $title ); ?></a>
		</h3>

		<?php echo $data; ?>

		<p class="listing-overview"<?php echo get_post_meta( $post->ID, '_listing_overview', true ); ?>></p>
	</div>

</article>