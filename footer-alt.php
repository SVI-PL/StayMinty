		<div class="footer-alt">
			<div class="shell">
				<div class="footer__inner">
					<div class="footer__content">
						<?php if ( $menu_sidebar = carbon_get_the_post_meta( 'crb_menu_sidebar_option' ) ) : ?>
							<?php dynamic_sidebar( $menu_sidebar ); ?>
						<?php endif; ?>

						<?php
						if ( $columns_sidebar = carbon_get_the_post_meta( 'crb_columns_menu_sidebar_option' ) ) {
							dynamic_sidebar( $columns_sidebar );
						}
						?>
					</div><!-- /.footer__content -->

					<?php crb_render_fragment( 'footer-alt/content-aside' ); ?>
				</div><!-- /.footer__inner -->

				<div class="footer__bar">
					<?php
					crb_render_fragment( 'common/copyright' );
					crb_render_fragment( 'common/socials-secondary' );
					//~ dynamic_sidebar('Footer Socials Widget Area');
					?>
				</div><!-- /.footer__bar -->
			</div><!-- /.shell -->

			<div style="text-align:center;font-size:12px;padding-top:20px;"><a style="color:black;" href="https://stayminty.com/privacy-policy/">Privacy Policy</a></div>
			
		</div><!-- /.footer -->

		<?php wp_footer(); ?>
	</div><!-- /.wrapper -->
</body>
</html>
