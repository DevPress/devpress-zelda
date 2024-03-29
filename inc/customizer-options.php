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

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'zelda' ),
		'priority' => '80'
	);

	$options['primary-accent-color'] = array(
		'id' => 'primary-accent-color',
		'label'   => __( 'Primary Accent Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_link_color,
		'priority' => '100'
	);

	$options['secondary-shade-1'] = array(
		'id' => 'secondary-shade-1',
		'label'   => __( 'Outer Background Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_shade_1,
		'priority' => '100'
	);

	$options['secondary-shade-2'] = array(
		'id' => 'secondary-shade-2',
		'label'   => __( 'Outer Text Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_shade_2,
		'priority' => '100'
	);

	$options['secondary-shade-3'] = array(
		'id' => 'secondary-shade-3',
		'label'   => __( 'Outer Link Color', 'zelda' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_shade_3,
		'priority' => '100'
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
	$obj = get_pages( array(
		'sort_column' => 'post_title',
		'depth' => -1,
		'sort_order' => 'ASC'
	) );

	$options['showcase-page-1'] = array(
		'id' => 'showcase-page-1',
		'label'   => __( 'Showcase Pages', 'zelda' ),
		'description'   => __( 'This is for the "Page Showcase" template. Select up to five.', 'zelda' ),
		'section' => $section,
		'type'    => 'dropdown-pages',
		'default' => ''
	);

	for ( $count = 2; $count <= 5; $count++ ) {

		$options['showcase-page-' . $count] = array(
			'id' => 'showcase-page-' . $count,
			'section' => $section,
			'type'    => 'dropdown-pages',
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


/**
 * Adds "Verdana" to the default font array
 *
 * @since  1.0.0.
 *
 * @param  array
 * @return array
 */
function zelda_get_standard_fonts( $fonts ) {
	$fonts['Verdana'] = array(
		'label' => 'Verdana',
		'stack' => 'Verdana, sans-serif'
	);
	return $fonts;
}
add_filter( 'customizer_library_get_standard_fonts', 'zelda_get_standard_fonts', 100 );

/**
 * Narrowing down the choice of Google fonts to a few editorial selections
 *
 * @since  1.0.0.
 *
 * @param  array
 * @return array
 */
function zelda_get_google_fonts( $fonts ) {

	$selections = array(
		'Abel',
		'Amatic SC',
		'Cabin',
		'Codystar',
		'Corben',
		'Courgette',
		'Dancing Script',
		'Goudy Bookletter 1911',
		'Josefin Sans',
		'Moulpali',
		'Nixie One',
		'Pontano Sans',
		'Quicksand',
		'Raleway',
		'Rokkitt',
		'Sanchez',
		'Tenor Sans',
		'Unna'
	);

	$return = array();

	foreach( $selections as $key ) :
		$select_fonts[$key] = $fonts[$key];
	endforeach;

	return $select_fonts;

}
add_filter( 'customizer_library_get_google_fonts', 'zelda_get_google_fonts', 100 );