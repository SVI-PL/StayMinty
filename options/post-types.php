<?php

register_post_type( 'crb_city', array(
	'labels' => array(
		'name' => __( 'Cities', 'crb' ),
		'singular_name' => __( 'City', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new City', 'crb' ),
		'view_item' => __( 'View City', 'crb' ),
		'edit_item' => __( 'Edit City', 'crb' ),
		'new_item' => __( 'New City', 'crb' ),
		'view_item' => __( 'View City', 'crb' ),
		'search_items' => __( 'Search Cities', 'crb' ),
		'not_found' =>  __( 'No Cities found', 'crb' ),
		'not_found_in_trash' => __( 'No Cities found in trash', 'crb' ),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'cities',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-buddicons-buddypress-logo',
	'supports' => array( 'title', 'editor', 'page-attributes' ),
) );

