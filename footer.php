<?php if ( ! is_page_template( 'templates/glamping.php' ) ) : ?>
<?php endif; ?>
<?php if ( is_home() || ( is_single() && 'post' == get_post_type() ) ):
	crb_render_fragment( 'blog/subscribe' );
endif ?>
<?php
dynamic_sidebar('TikTok Widget Area');
?>
        <div class="footer">
			<div class="shell">
				<div class="footer__inner">
					<div class="footer__content">
						<?php
						crb_render_fragment( 'common/nav-primary' );
						crb_render_fragment( 'common/nav-secondary' );
						?>
					</div><!-- /.footer__content -->

					<aside class="footer__aside">
						<?php
						crb_render_fragment( 'common/logo', array(
							'is_footer' => true
						) );
						//crb_render_fragment( 'common/socials-secondary' );
						dynamic_sidebar('Footer Socials Widget Area');
						crb_render_fragment( 'common/copyright' );
						?>
					</aside><!-- /.footer__aside -->
				</div><!-- /.footer__inner -->

				<div class="footer__bottom-text">
					<?php if ( is_page_template( 'templates/glamping.php' ) ) : ?>
						<p class="copyright">© Copyright 2021 - All Rights Reserved</p>
					<?php endif; ?>

					<a style="color:black;" href="https://stayminty.com/privacy-policy/">Privacy Policy</a> | <a style="color:black;" href="https://stayminty.com/copyright-notice/">Copyright Notice</a>
				</div>
			</div><!-- /.shell -->
		</div><!-- /.footer -->

		<?php wp_footer(); ?>
	</div><!-- /.wrapper -->
</body>
</html>
