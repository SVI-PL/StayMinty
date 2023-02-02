<?php get_header(); ?>
<div class="main main--default main--default-template">
	<div class="shell">
		<div class="main--default-inner">
			<?php while ( have_posts() ) : the_post(); ?>
				<div <?php post_class( 'page' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="page__image">
							<?php the_post_thumbnail(); ?>
						</div><!-- /.page__image -->
					<?php endif; ?>

					<?php crb_the_title( '<h1 class="page__title pagetitle">', '</h1>' ); ?>

					<div class="page__entry">
						<?php
						the_content();

						carbon_pagination( 'custom' );

						edit_post_link( __( 'Edit this entry.', 'crb' ), '<p>', '</p>' );
						?>
					</div><!-- /.page__entry -->
				</div><!-- /.page -->
			<?php endwhile; ?>
		</div><!-- /.main-/-default-inner -->
	</div><!-- /.shell -->
</div><!-- /.main -->

<?php get_footer(); ?>