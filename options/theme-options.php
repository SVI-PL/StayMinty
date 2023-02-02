<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->set_page_file( 'crbn-theme-options.php' )
	->add_tab( __( 'Header', 'crb' ), array(
		Field::make( 'image', 'crb_header_logo', __( 'Logo', 'crb' ) )
			->set_required( true ),
		Field::make( 'separator', 'crb_header_sp_primary', __( 'Primary Button', 'crb' ) ),
		Field::make( 'text', 'crb_header_primary_button_text', __( 'Button Text', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_header_primary_button_url', __( 'Button Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_header_primary_button_tab', __( 'Open link in a new tab', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_primary_button_color', __( 'Button Text Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_primary_button_background_color', __( 'Button Background Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_primary_button_border_color', __( 'Button Border Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'separator', 'crb_header_sp_secondary', __( 'Secondary Button', 'crb' ) ),
		Field::make( 'text', 'crb_header_secondary_button_text', __( 'Button Text', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_header_secondary_button_url', __( 'Button Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_header_secondary_button_tab', __( 'Open link in a new tab', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_secondary_button_color', __( 'Button Text Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_secondary_button_background_color', __( 'Button Background Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_secondary_button_border_color', __( 'Button Border Color', 'crb' ) )
			->set_width( 33 ),
	) )
	->add_tab( __( 'Header - Glamping', 'crb' ), array(
		Field::make( 'image', 'crb_header_glamping_logo', __( 'Logo', 'crb' ) )
			->set_required( true ),
		Field::make( 'image', 'crb_footer_glamping_logo', __( 'Alternative Logo', 'crb' ) )
			->help_text( 'This image will be used in the footer area for the glamping page' ),
		Field::make( 'separator', 'crb_header_glamping_sp_primary', __( 'Primary Button', 'crb' ) ),
		Field::make( 'text', 'crb_header_glamping_primary_button_text', __( 'Button Text', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_header_glamping_primary_button_url', __( 'Button Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_header_glamping_primary_button_tab', __( 'Open link in a new tab', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_glamping_primary_button_color', __( 'Button Text Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_glamping_primary_button_background_color', __( 'Button Background Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_glamping_primary_button_border_color', __( 'Button Border Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'separator', 'crb_header_glamping_sp_secondary', __( 'Secondary Button', 'crb' ) ),
		Field::make( 'text', 'crb_header_glamping_secondary_button_text', __( 'Button Text', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_header_glamping_secondary_button_url', __( 'Button Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_header_glamping_secondary_button_tab', __( 'Open link in a new tab', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_glamping_secondary_button_color', __( 'Button Text Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_glamping_secondary_button_background_color', __( 'Button Background Color', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'color', 'crb_header_glamping_secondary_button_border_color', __( 'Button Border Color', 'crb' ) )
			->set_width( 33 ),
	) )
	// Track Connect plugin
	->add_tab( __( 'Track Connect', 'crb' ), array(
		Field::make( 'image', 'crb_tc_listing_intro_image', __( 'Listing Intro Image Attachment', 'crb' ) )
			->set_width( 30 ),
		Field::make( 'rich_text', 'crb_tc_listing_intro_text', __( 'Listing Intro Text', 'crb' ) )
			->help_text( __( 'Recommendation: Use "H6" heading for the upper title and "H1" heading for the title.', 'crb' ) )
			->set_width( 70 ),
		Field::make( 'separator', 'crb_tc_widget_sep', __( 'Widget', 'crb' ) ),
		Field::make( 'checkbox', 'crb_tc_widget_hide_locations', __( 'Hide Locations', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'checkbox', 'crb_tc_widget_hide_proeprty_types', __( 'Hide Property Types', 'crb' ) )
			->set_width( 50 ),
	) )
	// Blog
	->add_tab( __( 'Blog Page Settings', 'crb' ), array(
		Field::make( 'image', 'crb_blog_intro_image', __( 'Blog Intro Image', 'crb' ) )
			->set_width( 30 ),
		Field::make( 'textarea', 'crb_blog_intro_title', __( 'Blog Intro Title', 'crb' ) )
			->set_width( 70 ),
		Field::make( 'association', 'crb_blog_featured_large', __( 'Blog Featured Posts Large', 'crb' ) )
			->help_text( __( 'Choose up to two posts to appear in the two large boxes after the navigation.', 'crb' ) )
			->set_max( 2 )
			->set_types( array(
				array(
					'type'      => 'post',
            		'post_type' => 'post',
				)
			) ),
		Field::make( 'association', 'crb_blog_featured_small', __( 'Blog Featured Posts Medium', 'crb' ) )
			->help_text( __( 'Choose up to three posts to appear in three columns after the large boxes.', 'crb' ) )
			->set_max( 3 )
			->set_types( array(
				array(
					'type'      => 'post',
            		'post_type' => 'post',
				)
			) ),
		Field::make( 'separator', 'crb_blog_separator', __( 'Subscribe Section', 'crb' ) ),
		Field::make( 'text', 'crb_blog_subscribe_title', __( 'Section Subscribe Title', 'crb' ) ),
		Field::make( 'image', 'crb_blog_subscribe_logo', __( 'Section Subscribe Logo', 'crb' ) ),
		Field::make( 'gravity_form', 'crb_blog_subscribe_form_id', __( 'Section Subscribe Form', 'crb' ) ),
	) )
	->add_tab( __( 'Social Links', 'crb' ), array(
		Field::make( 'text', 'crb_facebook_link', __( 'Facebook', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'image', 'crb_facebook_custom_icon_header', __( 'Facebook Custom Header Icon', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'image', 'crb_facebook_custom_icon_footer', __( 'Facebook Custom Footer/Mobile Menu Icon', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_youtube_link', __( 'YouTube', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'image', 'crb_youtube_custom_icon_header', __( 'YouTube Custom Header Icon', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'image', 'crb_youtube_custom_icon_footer', __( 'YouTube Custom Footer/Mobile Menu Icon', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_instagram_link', __( 'Instagram', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_socials_email', __( 'Email', 'crb' ) )
			->set_width( 50 ),
	) )
	->add_tab( __( 'Social Links - Glamping', 'crb' ), array(
		Field::make( 'text', 'crb_glambing_facebook_link', __( 'Facebook', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_glambing_youtube_link', __( 'YouTube', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_glambing_instagram_link', __( 'Instagram', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_glambing_socials_email', __( 'Email', 'crb' ) )
			->set_width( 50 ),
	) )
	->add_tab( __( 'Copyright', 'crb' ), array(
		Field::make( 'textarea', 'crb_copyright', '' )
			->set_rows( 2 ),
	) )
	->add_tab( __( 'MyVR', 'crb' ), array(
		Field::make( 'text', 'crb_myvr_api_public_key', __( 'MyVR Public Key (MyVR.js)', 'crb' ) )
			->set_help_text( __( 'The MyVR Public Key can be acquired by logging into your MyVR Dashboard and navigating to Setup > API & Data Access > API Access. The key can be found in the field labeled "Public Key (MyVR.js)".', 'crb' ) ),
	) )
	->add_tab( __( 'Scripts', 'crb' ), array(
		Field::make( 'text', 'crb_google_maps_api_key', __( 'Google Maps API Key', 'crb' ) )
			->help_text( sprintf(
				__( 'You can generate your own key, by visiting %s and clicking on the "GET A KEY" button there.', 'crb' ),
				sprintf(
					'<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">%s</a>',
					_x( 'Get API Key', 'Google Maps Docs', 'crb' )
				)
			) ),
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'crb' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'crb' ) ),
	) );
