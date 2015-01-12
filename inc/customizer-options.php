<?php
/**
 * Theme Customizer
 *
 * @package Zelda
 */

/**
 * Zelda Options
 *
 * @since  1.0.0
 *
 * @return array $options
 */
function zelda_options() {

	// Theme defaults
	$primary_color = '#5bc08c';
	$secondary_color = '#f99868';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Logo
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo', 'zelda' ),
		'priority' => '20'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'zelda' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);

	$options['logo-favicon'] = array(
		'id' => 'logo-favicon',
		'label'   => __( 'Favicon', 'zelda' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description'  => __( 'File must be <strong>.png</strong> format. Optimal dimensions: <strong>32px x 32px</strong>.', 'zelda' ),
	);

	$options['logo-apple-touch'] = array(
		'id' => 'logo-apple-touch',
		'label'   => __( 'Apple Touch Icon', 'zelda' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description'  => __( 'File must be <strong>.png</strong> format. Optimal dimensions: <strong>152px x 152px</strong>.', 'zelda' ),
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'zelda' ),
		'priority' => '80'
	);

	$options['site-title-color'] = array(
		'id' => 'site-title-color',
		'label'   => __( 'Site Title Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
	);

	$options['site-tagline-color'] = array(
		'id' => 'site-tagline-color',
		'label'   => __( 'Site Tagline Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#614D41',
	);

	// Layout
	$section = 'layout';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout', 'zelda' ),
		'priority' => '70'
	);

	$choices = array(
		'sidebar-right' => 'Sidebar Right',
		'sidebar-left' => 'Single Column',
	);

	$options['standard-layout'] = array(
		'id' => 'standard-layout',
		'label'   => __( 'Standard Layout', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'sidebar-right'
	);

	// Typography
	$section = 'typography';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Typography', 'zelda' ),
		'priority' => '75'
	);

	$options['primary-font'] = array(
		'id' => 'primary-font',
		'label'   => __( 'Primary Font', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Crimson Text'
	);

	$options['secondary-font'] = array(
		'id' => 'secondary-font',
		'label'   => __( 'Secondary Font', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Goudy Bookletter 1911'
	);

	$options['tertiary-font'] = array(
		'id' => 'tertiary-font',
		'label'   => __( 'Tertiary Font', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'variants' => array( '900' ),
		'default' => 'Raleway'
	);

	// Archive Settings
	$section = 'archive';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Archive', 'zelda' ),
		'priority' => '80'
	);

	$options['archive-excerpts'] = array(
		'id' => 'archive-excerpts',
		'label'   => __( 'Display Excerpts', 'zelda' ),
		'description'   => __( 'Display excerpts instead of full content.', 'zelda' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['archive-featured-images'] = array(
		'id' => 'archive-featured-images',
		'label'   => __( 'Display Featured Images', 'zelda' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	// Post Settings
	$section = 'post';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Post', 'zelda' ),
		'priority' => '80'
	);

	$options['display-post-dates'] = array(
		'id' => 'display-post-dates',
		'label'   => __( 'Display Post Dates', 'zelda' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['post-featured-images'] = array(
		'id' => 'post-featured-images',
		'label'   => __( 'Display Featured Images', 'zelda' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	// Easy Digital Downloads
	if ( class_exists( 'Easy_Digital_Downloads' ) ) :

		// EDD Settings
		$section = 'easy-digital-downloads';

		$sections[] = array(
			'id' => $section,
			'title' => __( 'Easy Digital Downloads', 'zelda' ),
			'priority' => '90'
		);

		$options['front-page-downloads'] = array(
			'id' => 'front-page-downloads',
			'label'   => __( 'Display downloads on front page.', 'zelda' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => 0
		);

	endif;

	// Footer Settings
	$section = 'footer';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer', 'zelda' ),
		'priority' => '100'
	);

	$options['footer-text'] = array(
		'id' => 'footer-text',
		'label'   => __( 'Footer Text', 'zelda' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => zelda_get_default_footer_text(),
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

}
add_action( 'init', 'zelda_options', 100 );

/**
 * Alters some of the defaults for the theme customizer
 *
 * @since  1.0.0.
 *
 * @param  object $wp_customize The global customizer object.
 * @return void
 */
function zelda_customizer_defaults( $wp_customize ) {

	$wp_customize->get_section( 'title_tagline' )->title = 'Header';

}
add_action( 'customize_register', 'zelda_customizer_defaults', 100 );
