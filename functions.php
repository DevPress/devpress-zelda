<?php
/**
 * Zelda functions and definitions
 *
 * @package Zelda
 */

/**
 * The current version of the theme.
 */
define( 'ZELDA_VERSION', '1.1.3' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'zelda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zelda_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Zelda, use a find and replace
	 * to change 'zelda' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zelda', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add excerpt field to pages
	add_post_type_support( 'page', 'excerpt' );

	// Registers menu above the site title
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zelda' ),
		'footer' => __( 'Footer Menu', 'zelda' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'gallery', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'zelda_custom_background_args', array(
		'default-color' => '322222',
		'default-image' => '',
	) ) );

	// Theme layouts
	add_theme_support(
		'theme-layouts',
		array(
			'single-column' => __( 'Single Column', 'zelda' ),
			'sidebar-right' => __( '2 Columns: Content / Sidebar', 'zelda' ),
			'sidebar-left' => __( '2 Columns: Sidebar / Content', 'zelda' )
		),
		array( 'default' => 'sidebar-right' )
	);

}
endif; // zelda_setup
add_action( 'after_setup_theme', 'zelda_setup' );

if ( ! function_exists( 'zelda_register_image_sizes' ) ) :
/*
 * Enables support for Post Thumbnails on posts and pages.
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
function zelda_register_image_sizes() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 780, 1200 );
	add_image_size( 'zelda-showcase', 480, 480, true );
	add_image_size( 'zelda-showcase-large', 780, 580, true );
}
add_action( 'after_setup_theme', 'zelda_register_image_sizes' );
endif;


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if ( ! function_exists( 'zelda_widgets_init' ) ) :
function zelda_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'zelda' ),
		'id'            => 'primary',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget module %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
endif;
add_action( 'widgets_init', 'zelda_widgets_init' );

/**
 * Enqueue web fonts.
 */
if ( ! function_exists( 'zelda_body_fonts' ) ) :
function zelda_body_fonts() {

	// Font options
	$fonts = array();

	$fonts[1] = get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) );
	$fonts[2] = get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) );
	$fonts[3] = get_theme_mod( 'tertiary-font', customizer_library_get_default( 'tertiary-font' ) );

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'zelda-body-fonts', $font_uri, array(), null, 'screen' );

}
endif;
add_action( 'wp_enqueue_scripts', 'zelda_body_fonts' );

/**
 * Enqueue icon font.
 */
if ( ! function_exists( 'zelda_icon_fonts' ) ) :
function zelda_icon_fonts() {

	// Icon Font
	wp_enqueue_style( 'zelda-icons', get_template_directory_uri() . '/fonts/zelda-icons.css', array(), '1.0.0' );

}
endif;
add_action( 'wp_enqueue_scripts', 'zelda_icon_fonts' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'zelda_scripts' ) ) :
function zelda_scripts() {

	wp_enqueue_style(
		'zelda-style',
		get_stylesheet_uri(),
		array(),
		ZELDA_VERSION
	);

	// Use style-rtl.css for RTL layouts
	wp_style_add_data(
		'zelda-style',
		'rtl',
		'replace'
	);

	if ( SCRIPT_DEBUG || WP_DEBUG ) :

		wp_enqueue_script(
			'zelda-fast-click',
			get_template_directory_uri() . '/js/jquery.fastclick.js',
			array(),
			ZELDA_VERSION,
			true
		);

		wp_enqueue_script(
			'zelda-skip-link-focus-fix',
			get_template_directory_uri() . '/js/skip-link-focus-fix.js',
			array(),
			ZELDA_VERSION,
			true
		);

		wp_enqueue_script(
			'zelda-fitvids',
			get_template_directory_uri() . '/js/jquery.fitvids.js',
			array( 'jquery' ),
			ZELDA_VERSION,
			true
		);

		wp_enqueue_script(
			'zelda-theme',
			get_template_directory_uri() . '/js/theme.js',
			array( 'jquery', 'zelda-fitvids' ),
			ZELDA_VERSION,
			true
		);

	else :

		wp_enqueue_script(
			'zelda-scripts',
			get_template_directory_uri() . '/js/zelda.min.js',
			array( 'jquery' ),
			ZELDA_VERSION,
			true
		);

	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'zelda_scripts' );

/**
 * Load placeholder polyfill for IE9 and older
 */
function zelda_placeholder_polyfill() {
    echo '<!--[if lte IE 9]><script src="' . get_template_directory_uri() . '/js/jquery-placeholder.js"></script><![endif]-->'. "\n";
}
add_action( 'wp_head', 'zelda_placeholder_polyfill' );


// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Theme Layouts
require get_template_directory() . '/inc/theme-layouts.php';

// Color utility functions.
if ( ! class_exists( 'Jetpack_Color' ) ) {
	require get_template_directory() . '/inc/jetpack.class.color.php';
}

// Helper library for the theme customizer.
require get_template_directory() . '/inc/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/inc/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/inc/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/inc/mods.php';

// Adds post meta
require get_template_directory() . '/inc/meta.php';

// Theme Updater
function zelda_theme_updater() {
	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'zelda_theme_updater' );
