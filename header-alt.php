<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<aside class="mobile-menu mobile-menu--alt">
			<div class="mobile-menu__head">
				<?php crb_render_fragment( 'common/logo' ); ?>

				<a href="#" class="nav-trigger nav-trigger--active">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div><!-- /.mobile-menu__head -->

			<div class="mobile-menu--body">

				<?php crb_render_fragment( 'header-alt/menu' ); ?>


				<?php crb_render_fragment( 'header-alt/buttons' ); ?>
			</div><!-- /.mobile-menu-/-body -->

			<div class="mobile-menu__foot">
				<?php crb_render_fragment( 'common/socials-secondary' ); ?>
				
			</div><!-- /.mobile-menu__foot -->

			<?php echo crb_render_fragment( 'common/copyright' ); ?>
		</aside>

		<div class="overlay"></div><!-- /.overlay -->

		<header class="header header--alt">
			<div class="shell">
				<div class="header__inner">
					<a href="#" class="nav-trigger">
						<span></span>
						<span></span>
						<span></span>
					</a>

					<?php crb_render_fragment( 'common/logo' ); ?>

					<div class="header__content">
						<nav class="nav-main">
							<?php if ( $menu = carbon_get_the_post_meta( 'crb_city_header_menu' ) ) : ?>
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
							<?php endif; ?>
						</nav>

					</div><!-- /.header__content -->

					<aside class="header__aside">
						<?php crb_render_fragment( 'header-alt/buttons' ); ?>

						<?php
						// crb_render_fragment( 'header/header-buttons' );
						crb_render_fragment( 'header/socials' );
						?>
					</aside><!-- /.header__aside -->
				</div><!-- /.header__inner -->
			</div><!-- /.shell -->
		</header><!-- /.header -->
