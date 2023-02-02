<?php
$homepage_url = home_url( '/' );
$result = add_query_arg( array(
	'?s' => '',
	'post_type' => 'listing',
), $homepage_url );


?>
<div class="section-form">
	<?php dynamic_sidebar( 'track_connect'); ?>
</div><!-- /.section-form -->
