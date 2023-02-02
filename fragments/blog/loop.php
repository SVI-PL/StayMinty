<?php

global $wp_query;

$paged = 1;

if ( isset( $_GET['page'] ) && ( $_GET['page'] !== '' ) ) {
	$paged = $_GET['page'];
}

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 20,
	'paged' 		 => $paged,
);

if ( is_home() ) {
	$args['post__not_in'] = $exclude;
}

if ( is_category() ) {
	$args['cat'] = $wp_query->get_queried_object_id();
}

$main_posts = new WP_Query( $args );

?>

<?php if ( $main_posts->have_posts() ): ?>
	<section class="section-articles">
		<div class="shell">
			<div class="articles">
				<ul>
					<?php while( $main_posts->have_posts() ) : $main_posts->the_post(); 
						$categories = get_the_category();
					?>
						<li>
							<article class="article">
								<div class="article__image">
									<?php if ( has_post_thumbnail() ): ?>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'large' ); ?>
										</a>
									<?php endif ?>
								</div><!-- /.article__image -->

								<div class="article__content">
									<p class="article__meta"><?php echo esc_html( $categories[0]->name ); ?></p><!-- /.article__meta -->
									
									<h5 class="article__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h5><!-- /.article__title -->
									
									<div class="article__entry">
										<?php the_excerpt(); ?>
									</div><!-- /.article__entry -->

									<a href="<?php the_permalink(); ?>" class="link-more link-more--alt"><?php echo __( 'read more', 'crb' ); ?></a>
								</div><!-- /.article__content -->
							</article><!-- /.article -->
						</li>
					<?php endwhile; ?>
				</ul>
			</div><!-- /.articles -->

			<?php if ( ( $main_posts->max_num_pages > 1 ) || ( $main_posts->max_num_pages >= $paged ) ) : ?>
				<div class="section__foot">
					<a href="#" class="btn-load js-load-more" data-next="<?php echo $paged + 1; ?>"><?php _e( '<span>load more posts</span><span>loading...</span>', 'crb' ); ?></a>
				</div><!-- /.section__foot -->
			<?php endif; ?>
				
			<?php
			// Restore original Post Data
			wp_reset_postdata();
			?>
		</div><!-- /.shell -->
	</section><!-- /.section-articles -->
<?php else : ?>
	<div class="articles">
		<div class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p>
						<?php
						if ( is_category() ) { // If this is a category archive
							printf( __( "Sorry, but there aren't any posts in the %s category yet.", 'crb' ), single_cat_title( '', false ) );
						} else if ( is_date() ) { // If this is a date archive
							_e( "Sorry, but there aren't any posts with this date.", 'crb' );
						} else if ( is_author() ) { // If this is a category archive
							$userdata = get_user_by( 'id', get_queried_object_id() );
							printf( __( "Sorry, but there aren't any posts by %s yet.", 'crb' ), $userdata->display_name );
						} else if ( is_search() ) { // If this is a search
							_e( 'No posts found. Try a different search?', 'crb' );
						} else {
							_e( 'No posts found.', 'crb' );
						}
						?>
					</p>
				</div><!-- /.article__entry -->
			</div><!-- /.article__body -->
		</div><!-- /.article -->
	</div><!-- /.articles -->
<?php endif; ?>
