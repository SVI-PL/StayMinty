<?php
/**
 * Template Name: Glamping
 */
?>

<?php get_header(); ?>
    
    asdas



<div class="main main--alt">
	<?php crb_render_fragment( 'glamping/intro' ); ?>

	<?php crb_render_fragment( 'glamping/form' ); ?>

	<?php crb_section_builder( 'glamping' ); ?>
</div><!-- /.main -->
<?php get_footer(); ?>