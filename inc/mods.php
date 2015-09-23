<?php
/**
 * Functions used to implement options
 *
 * @package Zelda
 */

/**
 * Get default footer text
 *
 * @return string $text
 */
function zelda_get_default_footer_text() {
	$text = sprintf(
		__( 'Powered by %s.', 'zelda' ),
		'<a href="' . esc_url( __( 'http://wordpress.org/', 'zelda' ) ) . '">WordPress</a>'
	);
	$text .= ' ';
	$text .= sprintf(
		__( '%1$s by %2$s.', 'zelda' ),
			'Zelda Theme',
			'<a href="http://devpress.com/" rel="designer">DevPress</a>'
	);
	return $text;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Zelda 0.1
 */
function zelda_body_classes( $classes ) {

	global $post;

	// Simplify body class for showcase template
	if ( isset( $post ) && ( is_page_template( 'templates/post-showcase.php' ) || is_page_template( 'templates/page-showcase.php' )) ) {
		$classes[] = 'template-showcase';
	}

	return $classes;
}
add_filter( 'body_class', 'zelda_body_classes' );

/**
 * Append class "social" to specific off-site links
 *
 * @since Zelda 0.1
 */
function zelda_social_nav_class( $classes, $item ) {

    if ( 0 == $item->parent && 'custom' == $item->type) {

    	$url = parse_url( $item->url );

    	if ( !isset( $url['host'] ) ) {
	    	return $classes;
    	}

    	$base = str_replace( "www.", "", $url['host'] );

    	// @TODO Make this filterable
    	$social = array(
    		'behance.com',
    		'dribbble.com',
    		'facebook.com',
    		'flickr.com',
    		'github.com',
    		'linkedin.com',
    		'pinterest.com',
    		'plus.google.com',
    		'instagr.am',
    		'instagram.com',
    		'skype.com',
    		'spotify.com',
    		'twitter.com',
    		'vimeo.com'
    	);

    	// Tumblr needs special attention
    	if ( strpos( $base, 'tumblr' ) ) {
			$classes[] = 'social';
		}

    	if ( in_array( $base, $social ) ) {
	    	$classes[] = 'social';
    	}

    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'zelda_social_nav_class', 10, 2 );

/**
 * Custom Read More
 *
 * @since Zelda 0.1
 */
function zelda_excerpt_more( $more ) {
   global $post;
   return '[…]<p class="read-more"><a href="' . get_permalink( $post->ID ) . '">' . __( 'Read More', 'zelda' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'zelda_excerpt_more' );

/**
 * Custom More Text
 *
 * @since Zelda 0.1
 */
function zelda_content_more() {
   global $post;
   return '<p class="read-more"><a href="' . get_permalink( $post->ID ) . '">' . __( 'Read More', 'zelda' ) . '</a></p>';
}
add_filter( 'the_content_more_link', 'zelda_content_more' );