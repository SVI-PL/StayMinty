<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'post_meta', __( 'Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'listing' )
	->add_fields( array(
		Field::make( 'text', 'crb_listing_short_description', __( 'Short Description', 'crb' ) )
	) );
