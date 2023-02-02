<?php

$args = array(
	'post_type' => 'post',
	'post__in'  => $ids,
	'posts_per_page' => 3,
);

$featured_posts = new WP_Query( $args );

if ( ! $featured_posts->have_posts() ) {
	return;
}

?>

<div class="boxes boxes--alt">
	<ul>
		<?php while( $featured_posts->have_posts() ) : $featured_posts->the_post(); 
			$categories = get_the_category();
		?>
			<li>
				<div class="box">
					<a href="<?php the_permalink(); ?>">
						<div class="box__image" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium-large' ); ?>);"></div><!-- /.box__image -->
					</a>
					
					<p class="box__meta"><?php echo esc_html( $categories[0]->name ); ?></p><!-- /.box__meta -->

					<h2>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
				</div><!-- /.box -->
			</li>
		<?php endwhile;

		// Restore original Post Data
		wp_reset_postdata();
		?>
	</ul>
</div><!-- /.boxes -->
