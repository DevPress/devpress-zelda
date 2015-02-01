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
	$primary_background_color = '#322222';
	$primary_link_color = '#D55C17';
	$secondary_shade_1 = '#1C0F08';
	$secondary_shade_2 = '#604C40';
	$secondary_shade_3 = '#ffffff';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Header
	$section = 'title_tagline';

	$options['hide-site-title'] = array(
		'id' => 'hide-site-title',
		'label'   => __( 'Hide Site Title', 'zelda' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
		'priority' => '100'
	);

	$options['hide-site-tagline'] = array(
		'id' => 'hide-site-tagline',
		'label'   => __( 'Hide Site Tagline', 'zelda' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
		'priority' => '200'
	);

	// Logo
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo', 'zelda' ),
		'priority' => '25'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'zelda' ),
		'description'  => __( 'You can hide site title or description under header options.', 'zelda' ),
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

	$options['primary-link-color'] = array(
		'id' => 'primary-link-color',
		'label'   => __( 'Primary Link Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_link_color,
	);

	$options['secondary-shade-1'] = array(
		'id' => 'secondary-shade-1',
		'label'   => __( 'Secondary Background Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_shade_1,
	);

	$options['secondary-text-color'] = array(
		'id' => 'secondary-text-color',
		'label'   => __( 'Secondary Text Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_shade_2,
	);

	$options['secondary-link-color'] = array(
		'id' => 'secondary-link-color',
		'label'   => __( 'Secondary Link Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_shade_3,
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
		'default' => 'Verdana'
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

	$options['font-subset'] = array(
		'id' => 'font-subset',
		'label'   => __( 'Google Font Subset', 'zelda' ),
		'description'   => __( 'Not all fonts provide each of these subsets.', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_google_font_subsets(),
		'default' => 'latin'
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

	// Showcase Settings
	$section = 'showcase';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Showcase', 'zelda' ),
		'priority' => '80'
	);

	// Get post tags
	$tags = array();
	$tags['zelda-all-posts'] = __( 'All Posts', 'zelda' );
	$obj = get_tags();
	foreach ( $obj as $tag ) {
		$tags[$tag->slug] = $tag->name;
	}

	$options['showcase-tag'] = array(
		'id' => 'showcase-tag',
		'label'   => __( 'Showcase Tag', 'zelda' ),
		'description'   => __( 'This is for the "Post Showcase" template. Select "All Posts" to show the most recent five.', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $tags,
		'default' => 'zelda-all-posts'
	);

	// Get pages
	$pages = array();
	$pages['zelda-none-selected'] = __( 'Select Page', 'zelda' );
	$obj = get_pages( 'sort_column=post_parent,menu_order' );
	foreach ( $obj as $page) {
		$pages[$page->ID] = $page->post_title;
	}

	$options['showcase-page-1'] = array(
		'id' => 'showcase-page-1',
		'label'   => __( 'Showcase Pages', 'zelda' ),
		'description'   => __( 'This is for the "Page Showcase" template. Select up to five.', 'zelda' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $pages,
		'default' => ''
	);

	for ( $count = 2; $count <= 5; $count++ ) {

		$options['showcase-page-' . $count] = array(
			'id' => 'showcase-page-' . $count,
			'section' => $section,
			'type'    => 'select',
			'choices' => $pages,
			'default' => ''
		);

	}

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

	// customizer_library_remove_theme_mods();

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


function zelda_get_standard_fonts( $fonts ) {
	$fonts['verdana'] = array(
		'label' => 'Verdana',
		'stack' => 'Verdana, sans-serif'
	);
	return $fonts;
}
add_filter( 'customizer_library_get_standard_fonts', 'zelda_get_standard_fonts', 100 );