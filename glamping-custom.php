<?php
/**
 * Template Name: Glamping-custom
 */
?>

<?php get_header(); ?>



<div class="main main--alt">
	<?php crb_render_fragment( 'glamping/intro' ); ?>

	<?php crb_render_fragment( 'glamping/form' ); ?>

	<?php crb_section_builder( 'glamping' ); ?>
</div><!-- /.main -->
<?php get_footer(); ?>