<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/ccc5faa998b41bf3e2ea58f55/e3f90550b34d3723f0f302e24.js");</script>

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://use.typekit.net/cfo5ain.css">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

jQuery(function($){

	$( ".listing-wrap" ).each(function() {
		var price = $(this).find(".listing-widget-thumb .listing-thumb-meta");
		var newprice = $(this).find(".listing-widget-details .listing-overview");
		$(price).insertAfter(newprice);
	});
	//$('.listing-property-type').text('Average Rate: ');

});

</script>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<aside class="mobile-menu">
			<div class="mobile-menu__head">
				<?php crb_render_fragment( 'common/logo' ); ?>

				<a href="#" class="nav-trigger nav-trigger--active">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div><!-- /.mobile-menu__head -->

			<div class="mobile-menu--body">
				<?php
				crb_render_fragment( 'common/nav-secondary' );
				crb_render_fragment( 'common/nav-primary' );
				?>

			</div><!-- /.mobile-menu-/-body -->

			<div class="mobile-menu__foot">
				<?php //crb_render_fragment( 'common/socials-secondary' ); ?>
				<?php dynamic_sidebar('Mobile Socials Widget Area'); ?>
			</div><!-- /.mobile-menu__foot -->

			<?php echo crb_render_fragment( 'common/copyright' ); ?>
		</aside>

		<div class="overlay"></div><!-- /.overlay -->

		<header class="header">

			<div id="dabar" class="hide_on_mobile">Check out our new <a href="https://squareup.com/gift/MLHGVJZ4EJ9VF/order">Gift Cards</a></div>
			<div class="shell">
				<div class="header__inner">
					<div class="logo-wraper">
                    <a href="#" class="nav-trigger">
						<span></span>
						<span></span>
						<span></span>
					</a>

					<?php crb_render_fragment( 'common/logo' ); ?>
</div>
					<aside class="header__aside">
						<?php
						crb_render_fragment( 'header/header-buttons' );
						//crb_render_fragment( 'header/socials' );
						dynamic_sidebar('Header Socials Widget Area');
						?>
					</aside><!-- /.header__aside -->
				</div><!-- /.header__inner -->
			</div><!-- /.shell -->
		</header><!-- /.header -->