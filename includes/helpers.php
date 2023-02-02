<?php

function crb_get_button_target( $value ) {
	$target = '_self';

	if ( $value ) {
		$target = '_blank';
	}

	return $target;
}

function crb_section_builder( $prefix ) {
	$data = carbon_get_the_post_meta( 'crb_sections_' . $prefix );

	if ( empty( $data ) ) {
		return;
	}

	$available_layouts = array(
		'large-image-content',
		'two-images',
		'features',
		'slider',
		'two-columns-boxes',
		'three-columns-boxes'
	);

	foreach ( $data as $entry ) {
		$layout = $entry['_type'];

		if ( ! in_array( $layout, $available_layouts ) ) {
			continue;
		}

		crb_render_fragment( $prefix . '/' . $layout, array(
			'entry' => $entry
		) );
	}
}

// function to get lat and lng by address
function crb_get_lat_lng( $address ){
	$data_obj = array();
	$api_key  = crb_get_google_maps_api_key();
	$address  = str_replace( ' ', '+', $address );
	$json     = file_get_contents( 'https://maps.googleapis.com/maps/api/geocode/json?address=' . rawurlencode( $address ) . '&key=' . $api_key ) ;
	$json     = json_decode($json);

	if ( empty( $json ) ) {
		return $data_obj;
	}

	$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	$lng = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

	if ( $lat && $lng ) {
		$data_obj = array(
			'lat' => $lat,
			'lng' => $lng
		);
	}

	return $data_obj;
}