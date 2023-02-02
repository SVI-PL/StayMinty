<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'post_meta', __( 'Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/homepage.php' )
	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'text', 'crb_home_intro_title', __( 'Title', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'image', 'crb_home_intro_image', __( 'Image', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'separator', 'crb_home_intro_form_settings_sp', __( 'Form Settings', 'crb' ) ),
		Field::make( 'text', 'crb_home_intro_form_properties_label', __( 'Properties Label', 'crb' ) ),
		Field::make( 'text', 'crb_home_intro_form_dates_label', __( 'Dates Label', 'crb' ) ),
		Field::make( 'text', 'crb_home_intro_form_btn_text', __( 'Button Text', 'crb' ) )
			->set_help_text( __( 'If left empty, "Search" will be used.', 'crb' ) ),
		Field::make( 'image', 'crb_home_intro_form_bottom_image', __( 'Bottom Image', 'crb' ) ),
	) )
	->add_tab( __( 'Features', 'crb' ), array(
		Field::make( 'text', 'crb_home_features_section_title', __( 'Section Title', 'crb' ) ),
		Field::make( 'textarea', 'crb_home_features_section_description', __( 'Section Description', 'crb' ) )
			->set_rows( 2 ),
		Field::make( 'complex', 'crb_home_features', __( 'Features', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'image', 'icon', __( 'Icon', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'subtitle', __( 'Subtitle', 'crb' ) )
					->set_rows( 2 ),
			) ),
		Field::make( 'text', 'crb_home_features_button_text', __( 'Button Text', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_home_features_button_url', __( 'Button Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_home_features_button_tab', __( 'Open link in a new tab', 'crb' ) )
			->set_width( 33 ),
	) )
	->add_tab( __( 'Slider', 'crb' ), array(
		Field::make( 'complex', 'crb_home_slider_slides', __( 'Slides', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'image', 'background', __( 'Background Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'description', __( 'Description', 'crb' ) ),
				Field::make( 'text', 'btn_text', __( 'Button Text', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'text', 'btn_url', __( 'Button Link', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'checkbox', 'btn_tab', __( 'Open link in a new tab', 'crb' ) )
					->set_width( 33 ),
			) )
	) )
	->add_tab( __( 'Image Sections', 'crb' ), array(
		Field::make( 'textarea', 'crb_home_image_sections_title', __( 'Section Title', 'crb' ) ),
		Field::make( 'complex', 'crb_home_image_sections', __( 'Sections', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->add_fields( array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'features', __( 'Features', 'crb' ) )
					->set_layout( 'tabbed-vertical' )
					->add_fields( array(
						Field::make( 'textarea', 'feature', '' )
							->set_rows( 3 ),
					) )
					->set_width( 50 ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width( 50 ),
			) )
			->set_header_template( '<% print( title ) %>' )
	) )
	->add_tab( __( 'Properties', 'crb' ), array(
		Field::make( 'text', 'crb_home_properties_section_title', __( 'Section Title', 'crb' ) ),
		Field::make( 'textarea', 'crb_home_properties_description', __( 'Description', 'crb' ) ),
		Field::make( 'text', 'crb_home_properties_button_text', __( 'Button Text', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_home_properties_button_url', __( 'Button Link', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'checkbox', 'crb_home_properties_button_tab', __( 'Open link in a new tab', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'complex', 'crb_home_properties', __( 'Properties', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'image', 'background', __( 'Background Image', 'crb' ) ),
				Field::make( 'text', 'name', __( 'Name', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'checkbox', 'coming_soon', __( 'Add Coming Soon Subtitle', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'property_url', __( 'Link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'checkbox', 'property_tab', __( 'Open link in a new tab', 'crb' ) )
					->set_width( 50 ),
			) )
			->set_header_template( '<% print( name ) %>' )
	) )
	->add_tab( __( 'Cards', 'crb' ), array(
		Field::make( 'image', 'crb_home_cards_background', __( 'Top Background Image', 'crb' ) ),
		Field::make( 'complex', 'crb_home_cards', __( 'Cards', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'radio', 'background_color', __( 'Background Color', 'crb' ) )
					->add_options( array(
						'card'                 => __( 'White', 'crb' ),
						'card card--secondary' => __( 'Green', 'crb' ),
					) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'features', __( 'Features', 'crb' ) )
					->set_layout( 'tabbed-vertical' )
					->add_fields( array(
						Field::make( 'textarea', 'feature', '' )
							->set_rows( 2 ),
					) ),
			) )
	) )
	->add_tab( __( 'Text Sections', 'crb' ), array(
		Field::make( 'separator', 'crb_home_text_sections_top_sp', __( 'Top Section', 'crb' ) ),
		Field::make( 'text', 'crb_home_text_sections_top_title', __( 'Title', 'crb' ) ),
		Field::make( 'textarea', 'crb_home_text_sections_top_text', __( 'Text', 'crb' ) ),
		Field::make( 'separator', 'crb_home_text_sections_bottom_sp', __( 'Bottom Section', 'crb' ) ),
		Field::make( 'text', 'crb_home_text_sections_bottom_title', __( 'Title', 'crb' ) ),
		Field::make( 'textarea', 'crb_home_text_sections_bottom_text', __( 'Text', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'media_gallery', 'crb_home_text_sections_bottom_slides', __( 'Slides', 'crb' ) )
			->set_width( 50 ),
	) )
	->add_tab( __( 'Full-width Image', 'crb' ), array(
		Field::make( 'image', 'crb_home_full_width_section_image', __( 'Image', 'crb' ) ),
	) )
	->add_tab( __( 'Subscribe', 'crb' ), array(
		Field::make( 'text', 'crb_home_subscribe_title', __( 'Section Title', 'crb' ) ),
		Field::make( 'image', 'crb_home_subscribe_logo', __( 'Logo', 'crb' ) ),
		Field::make( 'gravity_form', 'crb_home_subscribe_form_id', __( 'Form', 'crb' ) ),
	) )
	->add_tab( __( 'Bottom Full-width Image', 'crb' ), array(
		Field::make( 'image', 'crb_home_bottom_full_width_section_image', __( 'Image', 'crb' ) ),
	) );

Container::make( 'post_meta', __( 'Page Settings', 'crb' ) )
	->where( 'post_template', '=', 'templates/inner.php' )
	->or_where( 'post_type', '=', 'crb_city')
	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'text', 'crb_intro_intro_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'text', 'crb_intro_intro_form_url', __( 'Form Action Link', 'crb' ) )
			->help_text( 'Enter the link you want this form to redirect to' ),
		Field::make( 'text', 'crb_intro_intro_title', __( 'Title', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_intro_intro_subtitle', __( 'Subitle', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'image', 'crb_intro_intro_image', __( 'Image', 'crb' ) )
			->set_width( 33 ),
		Field::make( 'text', 'crb_intro_intro_form_btn_text', __( 'Button Text', 'crb' ) ),
	) )
	->add_tab( __( 'Text', 'crb'), array(
		Field::make( 'text', 'crb_inner_content_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'rich_text', 'crb_inner_content_section_title', __( 'Title', 'crb' ) ),
		Field::make( 'rich_text', 'crb_inner_content_section_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'rich_text', 'crb_inner_content_section_content', __( 'Content', 'crb' ) ),
		Field::make( 'image', 'crb_inner_content_section_image', __( 'Image', 'crb' ) )
	) )
	->add_tab( __( 'Text With Image Sections', 'crb' ), array(
		Field::make( 'text', 'crb_inner_sections_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'complex', 'crb_inner_sections', __( 'Sections', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->add_fields( array(
				Field::make( 'select', 'position', __( 'Text Position', 'crb') )
					->add_options( array(
						'right' => 'Right',
						'left' => 'Left',
					) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'rich_text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'subtitle', __( 'Subtitle', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'separator', 'inner_sections_sep', __( 'Button', 'crb' ) ),
				Field::make( 'text', 'button_label', __( 'Label', 'crb ' ) )
					->set_width(33),
				Field::make( 'text', 'button_url', __( 'Link', 'crb ' ) )
					->set_width(33),
				Field::make( 'checkbox', 'button_target', __( 'Open in New Tab?', 'crb ' ) )
					->set_width(33),
			) )
	) )
	->add_tab( __( '3 Columns Content', 'crb'), array(
		Field::make( 'text', 'crb_three_columns_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'rich_text', 'crb_three_columns_section_title', __( 'Title', 'crb' ) ),
		Field::make( 'rich_text', 'crb_three_columns_section_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'complex', 'crb_three_columns_section_features', __( 'Features', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->add_fields( array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'textarea', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'separator', 'three_columns_section_sep', __( 'Button', 'crb' ) ),
				Field::make( 'text', 'button_label', __( 'Label', 'crb ' ) )
					->set_width(33),
				Field::make( 'text', 'button_url', __( 'Link', 'crb ' ) )
					->set_width(33),
				Field::make( 'checkbox', 'button_target', __( 'Open in New Tab?', 'crb ' ) )
					->set_width(33),
			) )
	) )
	->add_tab( __( 'Slider', 'crb' ), array(
		Field::make( 'text', 'crb_inner_slider_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'complex', 'crb_inner_slider', __( 'Slider', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->add_fields( array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width(33),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
					->set_width(33),
				Field::make( 'image', 'hover_image', __( 'Hover Icon', 'crb' ) )
					->set_width(33)
			) )
	) )
	->add_tab( __( 'Text With Image - Single', 'crb' ), array(
		Field::make( 'text', 'crb_text_with_image_single_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'rich_text', 'crb_text_with_image_single_title', __( 'Title', 'crb' ) ),
		Field::make( 'rich_text', 'crb_text_with_image_single_content', __( 'Content', 'crb' ) ),
		Field::make( 'image', 'crb_text_with_image_single_image', __( 'Image', 'crb' ) ),
		Field::make( 'separator', 'crb_text_with_image_single_sep', __( 'Button', 'crb' ) ),
		Field::make( 'text', 'crb_text_with_image_single_button_label', __( 'Label', 'crb ' ) )
			->set_width(33),
		Field::make( 'text', 'crb_text_with_image_single_button_url', __( 'Link', 'crb ' ) )
			->set_width(33),
		Field::make( 'checkbox', 'crb_text_with_image_single_button_target', __( 'Open in New Tab?', 'crb ' ) )
			->set_width(33),
	) )
	->add_tab( __( 'Header', 'crb' ), array(
		Field::make( 'complex', 'crb_city_header_menu', __( 'Menu', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
					->set_width(50),
				Field::make( 'text', 'url', __( 'Link', 'crb' ) )
					->set_width(50),
			) )
			->set_header_template( '
				<% if (title) { %>
					<%- title %>
				<% } %>
			' ),
			Field::make( 'separator', 'crb_city_btn_p_sep', __( 'Primary Button', 'crb' ) ),
			Field::make( 'text', 'crb_city_btn_primary_label', __( 'Text', 'crb' ) )
				->set_width(33),
			Field::make( 'text', 'crb_city_btn_primary_url', __( 'Link', 'crb' ) )
				->set_width(33),
			Field::make( 'checkbox', 'crb_city_btn_primary_target', __( 'Open link in a new tab', 'crb' ) )
				->set_width(33),
			Field::make( 'separator', 'crb_city_btn_s_sep', __( 'Secondary Button', 'crb' ) ),
			Field::make( 'text', 'crb_city_btn_secondary_label', __( 'Text', 'crb' ) )
				->set_width(33),
			Field::make( 'text', 'crb_city_btn_secondary_url', __( 'Link', 'crb' ) )
				->set_width(33),
			Field::make( 'checkbox', 'crb_city_btn_secondary_target', __( 'Open link in a new tab', 'crb' ) )
				->set_width(33),
	) )
	->add_tab( __( 'Footer Content', 'crb' ), array(
		Field::make( 'sidebar', 'crb_menu_sidebar_option', __( 'Menu Sidebar' ) )
			->set_width(25),
		Field::make( 'sidebar', 'crb_columns_menu_sidebar_option', __( 'Columns Menu' ) )
			->set_width(25),
		Field::make( 'image', 'crb_footer_inner_template_image', __( 'Image', 'crb' ) )
			->set_width(25),
		Field::make( 'textarea', 'crb_footer_inner_template_content', __( 'Content', 'crb' ) )
			->set_width(25),
		Field::make( 'textarea', 'crb_meta_copyright_single', __( 'Copyright', 'crb' ) )
			->help_text( 'If you leave this field empty, the content from theme option will be displayed ')

	) )
	->add_tab( __( 'Socials', 'crb' ), array(
		Field::make( 'text', 'crb_city_facebook_link', __( 'Facebook', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'image', 'crb_city_facebook_icon', __( 'Facebook Icon', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_city_youtube_link', __( 'Youtube', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'image', 'crb_city_youtube_icon', __( 'Youtube Icon', 'crb' ) )
			->set_width( 50 ),
	) );

Container::make( 'post_meta', __( 'Page Settings', 'crb' ) )
	->where( 'post_template', '=', 'templates/partners-page.php' )
	->add_tab( __( 'Navigation', 'crb' ), array(
		Field::make( 'checkbox', 'crb_partners_hide_primary_button', __( 'Hide Primary Button?', 'crb' ) ),
		Field::make( 'checkbox', 'crb_partners_hide_secondary_button', __( 'Hide Secondary Button?', 'crb' ) ),
	) )
	->add_tab( __( 'Hero Section', 'crb' ), array(
		Field::make( 'image', 'crb_partners_image_aside', __( 'Aside Image', 'crb' ) ),
		Field::make( 'text', 'crb_partners_heading', __( 'Heading', 'crb' ) ),
		Field::make( 'rich_text', 'crb_partners_hero_title', __( 'Title', 'crb' ) ),
		Field::make( 'rich_text', 'crb_partners_hero_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'rich_text', 'crb_partners_hero_content', __( 'Content', 'crb' ) ),
		Field::make( 'separator', 'crb_partners_hero_sep', __( 'Button', 'crb' ) ),
		Field::make( 'text', 'crb_partners_hero_button_label', __( 'Label', 'crb' ) )
			->set_width(33),
		Field::make( 'text', 'crb_partners_hero_button_url', __( 'Link', 'crb' ) )
			->set_width(33),
		Field::make( 'checkbox', 'crb_partners_hero_button_target', __( 'Open in New Tab?', 'crb' ) )
			->set_width(33),
	) )
	->add_tab( __( 'Slider', 'crb' ), array(
		Field::make( 'complex', 'crb_partners_slider', __( 'Slider', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'image', 'background_image', __( 'Background Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'subtitle', __( 'Subtitle', 'crb' ) ),
				Field::make( 'separator', 'crb_partners_cta_sep', __( 'Button', 'crb' ) ),
				Field::make( 'text', 'button_label', __( 'Label', 'crb' ) )
					->set_width(33),
				Field::make( 'text', 'button_url', __( 'Link', 'crb' ) )
					->set_width(33),
				Field::make( 'checkbox', 'button_target', __( 'Open in New Tab?', 'crb' ) )
					->set_width(33),
			) )
	) )
	->add_tab( __( 'Partners', 'crb' ), array(
		Field::make( 'text', 'crb_partners_title', __( 'Title', 'crb' ) ),
		Field::make( 'text', 'crb_partners_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'complex', 'crb_partners', __( 'Partners', 'crb' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'checkbox', 'use_logo', __( 'Use Logo as Title', 'crb' ) ),
				Field::make( 'textarea', 'title', __( 'Title', 'crb') )
					->set_conditional_logic( array(
						array(
							'field' => 'use_logo',
							'value' => false,
						)
					) ),
				Field::make( 'image', 'logo', __( 'Logo', 'crb') )
					->set_conditional_logic( array(
						array(
							'field' => 'use_logo',
							'value' => true,
						)
					) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb') ),
				Field::make( 'text', 'button_label', __( 'Label', 'crb' ) )
					->set_width(33),
				Field::make( 'text', 'button_url', __( 'Link', 'crb' ) )
					->set_width(33),
				Field::make( 'checkbox', 'button_target', __( 'Open in New Tab?', 'crb' ) )
					->set_width(33),
			) )
	) )
->add_tab( __( 'Text With Image Sections', 'crb' ), array(
		Field::make( 'text', 'crb_inner_sections_section_id', __( 'Section ID', 'crb' ) ),
		Field::make( 'complex', 'crb_inner_sections', __( 'Sections', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->add_fields( array(
				Field::make( 'select', 'position', __( 'Text Position', 'crb') )
					->add_options( array(
						'right' => 'Right',
						'left' => 'Left',
					) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'rich_text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'subtitle', __( 'Subtitle', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'separator', 'inner_sections_sep', __( 'Button', 'crb' ) ),
				Field::make( 'text', 'button_label', __( 'Label', 'crb ' ) )
					->set_width(33),
				Field::make( 'text', 'button_url', __( 'Link', 'crb ' ) )
					->set_width(33),
				Field::make( 'checkbox', 'button_target', __( 'Open in New Tab?', 'crb ' ) )
					->set_width(33),
			) )
	) )
	->add_tab( __( 'CTA', 'crb' ), array(
		Field::make( 'textarea', 'crb_partners_cta_title', __( 'Title', 'crb' ) )
			->set_width(50),
		Field::make( 'textarea', 'crb_partners_cta_content', __( 'Content', 'crb' ) ),
		Field::make( 'separator', 'crb_partners_cta_sep', __( 'Button', 'crb' ) ),
		Field::make( 'text', 'crb_partners_cta_button_label', __( 'Label', 'crb' ) )
			->set_width(33),
		Field::make( 'text', 'crb_partners_cta_button_url', __( 'Link', 'crb' ) )
			->set_width(33),
		Field::make( 'checkbox', 'crb_partners_cta_button_target', __( 'Open in New Tab?', 'crb' ) )
			->set_width(33),
	) );

Container::make( 'post_meta', __( 'Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/glamping.php' )
	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'text', 'crb_glamping_intro_shortcode', __( 'Shortcode', 'crb' ) )
	) )

	->add_tab( __( 'Sections', 'crb' ), array(
		Field::make( 'complex', 'crb_sections_glamping', __( 'Entries', 'crb' ) )
			->set_layout( 'tabbed-vertical' )
			->set_duplicate_groups_allowed( true )
			->add_fields( 'large-image-content', __( 'Large Image with Content', 'crb' ), array(
				Field::make( 'checkbox', 'reverse', __( 'Reverse Columns', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_width(50)
					->set_required(true),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					->set_width(50)
					->set_required(true),
				Field::make( 'text', 'btn_text', __( 'Button Text', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'text', 'btn_url', __( 'Button Link', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'checkbox', 'btn_tab', __( 'Open link in a new tab', 'crb' ) )
					->set_width( 33 ),
			) )

			->add_fields( 'two-images', __( 'Two Images', 'crb' ), array(
				Field::make( 'checkbox', 'reverse', __( 'Reverse Columns', 'crb' ) ),
				Field::make( 'image', 'image_left', __( 'Image - 1/3', 'crb' ) )
					->set_width(30),
				Field::make( 'image', 'image_right', __( 'Image - 2/3', 'crb' ) )
					->set_width(70),
			) )

			->add_fields( 'features', __( 'Features', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'features', __( 'Features', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( array(
						Field::make( 'textarea', 'title', __( 'Title', 'crb' ) )
							->set_required(true)
							->set_width(50)
							->set_rows(2),
						Field::make( 'image', 'image', __( 'Image', 'crb' ) )
							->set_required(true)
							->set_width(50),
						Field::make( 'textarea', 'subtitle', __( 'Subtitle', 'crb' ) )
							->set_rows(2),
					) )
					->set_header_template( '
						<% if (title) { %>
							<%- title %>
						<% } %>
					' ),
					Field::make( 'text', 'btn_text', __( 'Button Text', 'crb' ) )
						->set_width( 33 ),
					Field::make( 'text', 'btn_url', __( 'Button Link', 'crb' ) )
						->set_width( 33 ),
					Field::make( 'checkbox', 'btn_tab', __( 'Open link in a new tab', 'crb' ) )
						->set_width( 33 ),
			) )

			->add_fields( 'slider', __( 'Slider', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'shortcode', __( 'Shortcode', 'crb' ) ),
				Field::make( 'checkbox', 'add_figure', __( 'Add Figure', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'btn_text', __( 'Button Text', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'text', 'btn_url', __( 'Button Link', 'crb' ) )
					->set_width( 33 ),
				Field::make( 'checkbox', 'btn_tab', __( 'Open link in a new tab', 'crb' ) )
					->set_width( 33 ),
			) )

			->add_fields( 'two-columns-boxes', __( 'Boxes - 2 columns', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'boxes', __( 'Boxes', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( array(
						Field::make( 'image', 'thumbnail', __( 'Thumbnail', 'crb' ) )
							->set_required(true),
						Field::make( 'textarea', 'title', __( 'Title', 'crb' ) )
							->set_rows(2),
						Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
						Field::make( 'text', 'btn_text', __( 'Button Text', 'crb' ) )
							->set_width( 33 ),
						Field::make( 'text', 'btn_url', __( 'Button Link', 'crb' ) )
							->set_width( 33 ),
						Field::make( 'checkbox', 'btn_tab', __( 'Open link in a new tab', 'crb' ) )
							->set_width( 33 ),
					) )
			) )

			->add_fields( 'three-columns-boxes', __( 'Boxes - 3 columns', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'boxes', __( 'Boxes', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( array(
						Field::make( 'image', 'thumbnail', __( 'Thumbnail', 'crb' ) )
							->set_required(true),
						Field::make( 'textarea', 'title', __( 'Title', 'crb' ) )
							->set_rows(2),
						Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
						Field::make( 'text', 'btn_text', __( 'Button Text', 'crb' ) )
							->set_width( 33 ),
						Field::make( 'text', 'btn_url', __( 'Button Link', 'crb' ) )
							->set_width( 33 ),
						Field::make( 'checkbox', 'btn_tab', __( 'Open link in a new tab', 'crb' ) )
							->set_width( 33 ),
					) )
			) )
	) );