<?php
define( 'CRB_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'crb_enqueue_assets' );
function crb_enqueue_assets() {
	$template_dir = get_template_directory_uri();

	# Enqueue Custom JS files
	wp_enqueue_script(
		'theme-js-bundle',
		$template_dir . crb_assets_bundle( 'js/bundle.js' ),
		array( 'jquery' ), // deps
		null, // version -- this is handled by the bundle manifest
		true // in footer
	);

	wp_enqueue_script(
		'theme-js-myvr-sdk',
		'//static.myvr.com/public/myvrjs/v1/myvr.js',
		array(), // deps
		null, // version -- this is handled by the bundle manifest
		false // in footer
	);

	$google_map = crb_get_google_maps_api_key();
	wp_enqueue_script( 'google-api', "//maps.googleapis.com/maps/api/js?key=$google_map" );

	# Enqueue MyVR Key Script
	// wp_enqueue_script('theme-js-myvr-public-key',
	// 	$template_dir . '/resources/js/main.js'
	// );

	# Localize MyVR Public API Key
	wp_localize_script(
		'theme-js-bundle',
		'crb',
		array(
			'api_key' => crb_get_myvr_public_key(),
		));

	# Enqueue Custom CSS files
	wp_enqueue_style(
		'theme-css-bundle',
		$template_dir . crb_assets_bundle( 'css/bundle.css' ),
		array( 'slippry', 'slideshow' )
	);

	# The theme style.css file may contain overrides for the bundled styles
	crb_enqueue_style( 'theme-styles', $template_dir . '/style.css' );

	# Enqueue Comments JS file
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* wp_enqueue_style('listing-ccustomization', $template_dir . '/dist/css/listing-customization.css', null, null);
	wp_enqueue_script('listing-jcustomization', $template_dir . '/dist/js/listing-customization.js', array( 'jquery' ), false, true); */
}

# Enqueue JS and CSS assets on admin pages
add_action( 'admin_enqueue_scripts', 'crb_admin_enqueue_scripts' );
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	# crb_enqueue_script( 'theme-admin-functions', $template_dir . '/js/admin-functions.js', array( 'jquery' ) );

	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	# crb_enqueue_style( 'theme-admin-styles', $template_dir . '/css/admin-style.css' );

	# Editor Styles
	# add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'login_enqueue_scripts', 'crb_login_enqueue' );
function crb_login_enqueue() {
	# crb_enqueue_style( 'theme-login-styles', get_template_directory_uri() . '/css/login-style.css' );
}

# Attach Custom Post Types and Custom Taxonomies
add_action( 'init', 'crb_attach_post_types_and_taxonomies', 0 );
function crb_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once( CRB_THEME_DIR . 'options/post-types.php' );

	# Attach Custom Taxonomies
	include_once( CRB_THEME_DIR . 'options/taxonomies.php' );
}

add_action( 'after_setup_theme', 'crb_setup_theme' );

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'crb_setup_theme' ) ) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Autoload dependencies
		$autoload_dir = CRB_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'crb' ) );
		}
		include_once( $autoload_dir );
		\Carbon_Fields\Carbon_Fields::boot();

		# Additional libraries and includes
		include_once( CRB_THEME_DIR . 'includes/admin-login.php' );
		include_once( CRB_THEME_DIR . 'includes/comments.php' );
		include_once( CRB_THEME_DIR . 'includes/title.php' );
		include_once( CRB_THEME_DIR . 'includes/gravity-forms.php' );
		include_once( CRB_THEME_DIR . 'includes/helpers.php' );
		include_once( CRB_THEME_DIR . 'includes/track-connect-functions.php' );

		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations

		register_nav_menus( array(
			'main-menu'      => __( 'Main Menu', 'crb' ),
			'main-menu-glamping' => __( 'Main Menu - Glamping', 'crb' ),
			'secondary-menu' => __( 'Secondary Menu', 'crb' ),
			'secondary-menu-glamping' => __( 'Secondary Menu - Glamping', 'crb' ),
			'header-menu-inner' => __( 'Header Menu - Inner template', 'crb' ),
			'footer-menu-inner' => __( 'Footer Menu - Inner Template', 'crb' ),
			'footer-menu-locations-inner' => __( 'Featured Locations', 'crb' ),
			'footer-menu-properties-inner' => __( 'Nashville Properties', 'crb' ),

		) );


		# Attach custom widgets
		include_once( CRB_THEME_DIR . 'options/widgets.php' );

		# Attach custom shortcodes
		include_once( CRB_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'crb_widgets_init' );
		add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

		# Add Filters
		add_filter( 'excerpt_more', 'crb_excerpt_more' );
		add_filter( 'excerpt_length', 'crb_excerpt_length', 999 );
		add_filter( 'crb_theme_favicon_uri', function() {
			return get_template_directory_uri() . '/dist/images/favicon.ico';
		} );
		add_filter( 'carbon_fields_map_field_api_key', 'crb_get_google_maps_api_key' );

		# Add Image Sizes
		add_image_size( 'full-width', 1920, 0 );
		add_image_size( 'full-width-retina', 3840, 0 );
		add_image_size( 'large-retina', 2048, 2048 );
		add_image_size( 'feature', 200, 200 );
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge( crb_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'crb' ),
		'id'   => 'default-sidebar',
	) );

	unregister_widget( 'WP_Nav_Menu_Widget' );

	register_sidebar( $sidebar_options );
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

function crb_attach_theme_options() {
	# Attach fields
	include_once( CRB_THEME_DIR . 'options/theme-options.php' );
	include_once( CRB_THEME_DIR . 'options/post-meta.php' );
	include_once( CRB_THEME_DIR . 'options/track-connect-post-meta.php' );
}

function crb_excerpt_more() {
	return '...';
}

function crb_excerpt_length() {
	return 55;
}

/**
 * Returns the Google Maps API Key set in Theme Options.
 *
 * @return string
 */
function crb_get_google_maps_api_key() {
	return carbon_get_theme_option( 'crb_google_maps_api_key' );
}

/**
 * Get the path to a versioned bundle relative to the theme directory.
 *
 * @param  string $path
 * @return string
 */
function crb_assets_bundle( $path ) {
	static $manifest = null;

	if ( is_null( $manifest ) ) {
		$manifest_path = CRB_THEME_DIR . 'dist/manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}
	}

	$path = isset( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return '/dist/' . $path;
}

add_filter( 'upload_mimes', 'crb_mime_types' );
function crb_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'crb_check_filetype', 10, 4 );
function crb_check_filetype( $data, $file, $filename, $mimes ) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}

add_action( 'init', 'crb_hide_editor_and_featured_image' );
function crb_hide_editor_and_featured_image() {
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		if ( ! isset( $post_id ) ) {
			return;
		}
		$template_file = get_post_meta($post_id, '_wp_page_template', true);
		$exclusion_array = array(
			'templates/homepage.php',
		);
		if ( in_array( $template_file, $exclusion_array ) ) {
			remove_post_type_support('page', 'thumbnail');
			remove_post_type_support('page', 'editor');
		}
	}
}

function crb_get_myvr_public_key() {
	$key = carbon_get_theme_option( 'crb_myvr_api_public_key' );

	return $key;
}

add_filter('acf/settings/remove_wp_meta_box', '__return_false');



register_sidebar( array(
        'name'          => 'Header Socials Widget Area',
        'id'            => 'header-socials-widget-area-id',
        'before_widget' => '<div class="header-socials-widget-area-class">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="header-socials-widget-area-title">',
        'after_title'   => '</h2>',
    ) );

register_sidebar( array(
        'name'          => 'Footer Socials Widget Area',
        'id'            => 'footer-socials-widget-area-id',
        'before_widget' => '<div class="footer-socials-widget-area-class">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-socials-widget-area-title">',
        'after_title'   => '</h2>',
    ) );
register_sidebar( array(
        'name'          => 'Mobile Socials Widget Area',
        'id'            => 'mobile-socials-widget-area-id',
        'before_widget' => '<div class="mobile-socials-widget-area-class">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="mobile-socials-widget-area-title">',
        'after_title'   => '</h2>',
    ) );

register_sidebar( array(
        'name'          => 'TikTok Widget Area',
        'id'            => 'tiktok-widget-area-id',
        'before_widget' => '<div class="titok-widget-area-class">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="tiktok-widget-area-title">',
        'after_title'   => '</h2>',
    ) );

function w3_disable_htaccess_wepb(){
	return 1;
}
function w3speedup_customize_critical_css($critical_css){
	$critical_css = str_replace(array("@font-face{font-family:League Spartan;","@font-face{font-family:libre baskerville;","@font-face{font-family:muli;","@font-face{font-family:rubik;","@font-face{font-family:work sans;",'@font-face{font-family:league spartan bold;','@font-face {  font-family:Font Awesome\ 5 Free;','@font-face {  font-family:Font Awesome\ 5 Brands;','@font-face {  font-family:League Spartan;',"@font-face {  font-family:'League Spartan Bold';","@font-face { font-family:'Work Sans';","@font-face { font-family:'Libre Baskerville';","@font-face { font-family:'Muli';","@font-face { font-family:'Rubik';"),array("","","","","",'','','','',"","","","",""),$critical_css);	
	return $critical_css;
}

function w3_create_separate_critical_css_of_post_type(){
    return array('page','post','listing','blog');
}


function w3speedup_before_start_optimization($html){
	$html = str_replace(array('//static.myvr.com/public/myvrjs/v1/myvr.js'),array('https://static.myvr.com/public/myvrjs/v1/myvr.js'),$html);
    return $html;
}