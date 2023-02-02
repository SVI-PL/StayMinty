<?php if ( $menu = carbon_get_the_post_meta( 'crb_city_header_menu' ) ) : ?>
	<nav class="nav-main">
		<ul>
			<?php foreach ( $menu as $link ) : ?>
				<?php
				$title = $link['title'];
				$url = $link['url'];

				$is_link_valid = ! empty( $title ) && ! empty( $url );
				?>

				<?php if ( $is_link_valid ) : ?>
					<li>
						<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $title ); ?></a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</nav><!-- /.nav -->
<?php endif;