<?php while ( have_posts() ) : the_post(); ?>
	<div class="section-article">
		<div class="article-single">
			<header class="article__head <?php echo has_post_thumbnail() ? '' : 'article__head--no-image' ?>">
				<div class="shell">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="article__image">
							<?php the_post_thumbnail( 'large' ); ?>
						</div><!-- /.article__image -->
					<?php endif; ?>
			
					<div class="article__date">
						<span><?php the_time( 'F jS, Y ' ); ?></span>
					</div><!-- /.article__date -->
			
					<h1 class="article__title"><?php the_title() ?></h1><!-- /.article__title -->
			
					<div class="article__meta">
						<p><?php _e( 'author', 'crb' ) ?> <i><?php echo get_the_author(); ?></i>  | <?php _e( 'filed in: ', 'crb' ); ?>  <i><?php the_category( ', ' ); ?></i></p>
					</div><!-- /.article__meta -->
				</div><!-- /.shell -->
			</header><!-- /.article__head -->

			<div class="article__body">
				<div class="shell">
					<div class="article__entry richtext-entry">
						<?php the_content(); ?>
					</div><!-- /.article__entry -->
				</div><!-- /.shell -->
			</div><!-- /.article__body -->
		</div>
	</div>

	<footer class="section-paging">
		<div class="shell">
			<?php carbon_pagination( 'post', [
				'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( 'previous post', 'crb' ) . '</a>',
				'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'next post', 'crb' ) . '</a>',
			] ); ?>
			<!-- <a href="" class="paging__prev">previous post</a>
			
			<a href="" class="paging__next">next post</a> -->
		</div><!-- /.shell -->
	</footer><!-- /.section-paging -->
<?php endwhile; ?>
