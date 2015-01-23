<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Zelda
 */

if ( ! function_exists( 'zelda_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function zelda_styles() {

	// Primary Background Color
	$setting = 'background_color';
	$mod = get_theme_mod( $setting, '#322222' );
	$mod = '#' . ltrim( $mod, '#' );

	if ( $mod !== '#322222' ) :

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary-navigation ul ul'
			),
			'declarations' => array(
				'background' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary-navigation ul ul:before'
			),
			'declarations' => array(
				'border-bottom-color' => $color
			)
		) );

	endif;

	// Primary Link Color
	$setting = 'primary-link-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) :

		$color = sanitize_hex_color( $mod );
		$color_obj = new Jetpack_Color( $color );

		// Link Styling
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a',
				'#content blockquote:after'
			),
			'declarations' => array(
				'color' => $color
			)
		) );

		// Button Colors
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'button',
				'.button',
				'input[type="button"]',
				'input[type="reset"]',
				'input[type="submit"]',
				'.template-showcase .fallback-thumbnail'
			),
			'declarations' => array(
				'background-color' => $mod
			)
		) );

		// Button Hover State
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'button:hover',
				'.button:hover',
				'input[type="button"]:hover',
				'input[type="reset"]:hover',
				'input[type="submit"]:hover'
			),
			'declarations' => array(
				'background-color' => $color_obj->darken(5)
			)
		) );

	endif;

	// Secondary Background Color
	$setting = 'secondary-background-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) :

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#page',
				'#colophon',
				'.primary-navigation ul ul a:hover',
				'#reply-title'
			),
			'declarations' => array(
				'background' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary-navigation ul ul',
				'.primary-navigation ul ul a',
				'#content blockquote'
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-main:before'
			),
			'declarations' => array(
				'border-color' => '#F8F8F8' . $color
			)
		) );

	endif;

	// Secondary Text Color
	$setting = 'secondary-text-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) :

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description',
				'.secondary .widget',
				'.widget-title',
				'#colophon',
				'.primary-navigation a:hover',
				'#reply-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary-navigation a',
				'.widget-title'
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#respond',
				'.widget_search .search-form'
			),
			'declarations' => array(
				'background' => $color
			)
		) );

	endif;

	// Secondary Link Color
	$setting = 'secondary-link-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) :

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title a',
				'.widget a',
				'#colophon a',
				'.primary-navigation a',
				'.primary-navigation ul ul a:hover',
				'.menu-toggle',
				'#respond',
				'.widget_search input[type="search"]'
			),
			'declarations' => array(
				'color' => $color
			)
		) );

	endif;

	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting = 'secondary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1, h2, h3, h4, h5, h6',
				'.comment-author',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Tertiary Font
	$setting = 'tertiary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-title',
				'.primary-navigation',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

}
endif;

add_action( 'customizer_library_styles', 'zelda_styles' );

if ( ! function_exists( 'zelda_display_customizations' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function zelda_display_customizations() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Zelda Custom CSS -->\n<style type=\"text/css\" id=\"zelda-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Zelda Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'zelda_display_customizations', 11 );
