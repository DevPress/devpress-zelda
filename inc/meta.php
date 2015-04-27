<?php
/**
 * Post meta fields for Zelda
 *
 * @package Zelda
 */

/**
 * Adds a checkbox to the featured image metabox.
 *
 * @param string $content
 * @return string to display meta fields
 */
function zelda_featured_image_meta( $content ) {

	// Return if post images are turned off globally
	if ( 0 == get_theme_mod( 'post-featured-images', 1 ) ) {
		return $content;
	}

	// Build HTML for metabox
	global $post;
	$text = __( "Hide featured image in post.", 'zelda' );
	$id = 'hide_featured_image';
	$value = esc_attr( get_post_meta( $post->ID, $id, true ) );
    $label = '<label for="' . $id . '" class="selectit"><input name="' . $id . '" type="checkbox" id="' . $id . '" value="' . $value . ' "'. checked( $value, 1, false) .'> ' . $text .'</label>';
    return $content .= $label;

}
add_filter( 'admin_post_thumbnail_html', 'zelda_featured_image_meta' );


/**
 * Sanitizes post meta
 *
 * @param numeric $post_id
 * @param post $post The post object.
 */
function zelda_verify_post_meta( $post_id, $post ) {

	// Featured image value
	$value = isset( $_POST['hide_featured_image'] );
	if ( $value ) {
		$value = 1;
	}
	zelda_update_post_meta( $post_id, $value, 'hide_featured_image' );

}
add_action( 'save_post', 'zelda_verify_post_meta', 10, 2 );

/**
 * Updates post meta.
 *
 * @param numeric $post_id
 * @param string $new_meta_value
 * @param numeric $meta_key
 */
function zelda_update_post_meta( $post_id, $new_meta_value, $meta_key ) {

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value ) {
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	}

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	}

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value ) {
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
}