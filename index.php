<?php get_header(); ?>

<?php
if ( is_single() ) {
	get_template_part( 'loop', 'single' );
} else {
	get_template_part( 'loop' );
}
?>

<?php get_footer(); ?>
