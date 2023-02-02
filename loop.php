<?php
if ( is_home() || is_category() ): 

$uncat = get_category_by_slug( 'uncategorized' );

$featured_large = carbon_get_theme_option( 'crb_blog_featured_large' );
$featured_large_ids = wp_list_pluck( $featured_large, 'id' );

$featured_small = carbon_get_theme_option( 'crb_blog_featured_small' );
$featured_small_ids = wp_list_pluck( $featured_small, 'id' );

crb_render_fragment( 'blog/intro' ); ?>

<section class="section-boxes">
	<div class="shell">
		<header class="section__head">
			<nav>
				<ul>
					<?php wp_list_categories( array(
						'title_li' => '',
						'exclude'  => array( $uncat->term_id ),
					) ); ?>
				</ul>
			</nav><!-- /.nav -->

			<?php
			crb_render_fragment( 'blog/searchform' );
			?>
		</header><!-- /.section__head -->
		
		<?php if ( is_home() ): ?>
			<div class="section__body">
				<?php
				crb_render_fragment( 'blog/featured-large', array(
					'ids' => $featured_large_ids,
				) );
				crb_render_fragment( 'blog/featured-small', array(
					'ids' => $featured_small_ids,
				) );
				?>
			</div><!-- /.section__body -->
		<?php endif ?>
	</div><!-- /.shell -->
</section><!-- /.section-blog section-blog-/-listing -->

<?php
crb_render_fragment( 'blog/loop', array(
	'exclude' => array_merge( $featured_large_ids, $featured_small_ids ),
) );
?>

<?php else: ?>
	<div class="main main--default">
		<div class="shell">
			<div class="main--default-inner">
				<div class="content">
					<?php crb_the_title( '<h2 class="pagetitle">', '</h2>' ); ?>

					<?php if ( have_posts() ) : ?>
						<div class="articles">
							<?php while ( have_posts() ) : the_post(); ?>
								<div <?php post_class( 'article' ); ?>>
									<header class="article__head">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="article__image">
												<?php the_post_thumbnail( 'large' ); ?>
											</div><!-- /.article__image -->
										<?php endif; ?>

										<h4 class="article__title">
											<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'crb' ), get_the_title() ) ); ?>">
												<?php the_title(); ?>
											</a>
										</h4><!-- /.article__title -->

										<?php get_template_part( 'fragments/post-meta' ); ?>
									</header><!-- /.article__head -->

									<div class="article__body">
										<div class="article__entry">
											<?php the_excerpt( __( 'Read the rest of this entry &raquo;', 'crb' ) ); ?>
										</div><!-- /.article__entry -->
									</div><!-- /.article__body -->
								</div><!-- /.article -->
							<?php endwhile; ?>
						 </div><!-- /.articles -->

						<?php
						carbon_pagination( 'posts', [
							'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entries', 'crb' ) . '</a>',
							'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entries »', 'crb' ) . '</a>',
							'first_html'        => '<a href="{URL}" class="paging__first"></a>',
							'last_html'         => '<a href="{URL}" class="paging__last"></a>',
							'limiter_html'      => '<li class="paging__spacer">...</li>',
							'current_page_html' => '<span class="paging__label">Page {CURRENT_PAGE} of {TOTAL_PAGES}</span>',
						] );
						?>
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
				</div><!-- /.content -->

				<?php get_sidebar(); ?>
			</div><!-- /.main-/-default-inner -->
		</div><!-- /.shell -->
	</div><!-- /.main -->
<?php endif ?>
