<?php
/**
 * Template Name: Partners Page
 */

get_header();

the_post();
?>

<div class="main">
	<?php
	crb_render_fragment( 'partners/hero' );

	crb_render_fragment( 'partners/slider' );

	crb_render_fragment( 'partners/partners' );

	crb_render_fragment( 'inner/text-with-image-sections' );

	crb_render_fragment( 'partners/cta' );
	?>
</div><!-- /.main -->

<?php
get_footer();
