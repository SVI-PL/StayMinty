<?php if ($options['wp_listings_force_sidebar'] == 1): ?>
<?php $intro_image = carbon_get_theme_option( 'crb_tc_listing_intro_image' ); ?>
			<div class="intro-inner intro-inner--listing book" id="book">
				<?php echo do_shortcode('[smartslider3 slider="10"]'); ?>

			</div>




			<div class="shell">
				<div class="search-wrapper">
					<div class="sidebar--listing">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('track_connect')) :
						endif; ?>
					</div>
					<div class="content--listing">
					<?php else: ?>
					<div>
						<?php endif; ?>
						<?php
							crb_listings()
						?>
					</div>
				</div><!-- /.search-wrapper -->
			</div><!-- /.shell -->
