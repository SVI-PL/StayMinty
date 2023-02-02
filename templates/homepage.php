<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<div class="main">
	<?php
	crb_render_fragment( 'home/intro' );
	
	crb_render_fragment( 'home/properties' );
	crb_render_fragment( 'home/features' );
	crb_render_fragment( 'home/image-sections' );
	crb_render_fragment( 'home/slider' );
	crb_render_fragment( 'home/cards' );
	crb_render_fragment( 'home/text-sections' );
    crb_render_fragment( 'home/full-width-image' );
	crb_render_fragment( 'home/subscribe' );
	crb_render_fragment( 'home/bottom-full-width-image' ); 
	?>
</div><!-- /.main -->
<?php get_footer(); ?>