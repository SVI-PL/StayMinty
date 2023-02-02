<?php

$args = array(
	'post_type' => 'post',
	'post__in'  => $ids,
	'posts_per_page' => 2,
);

$featured_posts = new WP_Query( $args );

if ( ! $featured_posts->have_posts() ) {
	return;
}

?>

<div class="boxes">
	<ul>
		<?php 
		$count = 0;
		while( $featured_posts->have_posts() ) : $featured_posts->the_post(); 
		$count++;
		?>
		<li>
			<div class="box-primary <?php echo $count%2 == 0 ? 'box-primary--alt' : ''; ?>">
				<div class="box__inner">
					<div class="box__image" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium-large' ); ?>);"></div><!-- /.box__image -->
				
					<h2><?php the_title(); ?></h2>

					<?php if ( $count%2 == 0 ): 
						$categories = get_the_category();
					?>
						<p class="box__meta"><?php echo esc_html( $categories[0]->name ); ?></p><!-- /.box__meta -->
					<?php endif ?>
				</div><!-- /.box__inner -->
				
				<a href="<?php the_permalink(); ?>" class="box__link"></a>
			</div><!-- /.box -->
		</li>

		<?php endwhile;

		// Restore original Post Data
		wp_reset_postdata();
		?>
	</ul>
</div><!-- /.boxes -->
