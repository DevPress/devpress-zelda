<?php
/**
 * Search form template
 *
 * @package Zelda
 */
?>

<form role="search" method="get" class="search-form clearfix" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'zelda' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e( 'Search...', 'zelda' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'zelda' ); ?>" />
	</label>
	<button type="submit" class="search-submit">
		<div class="zelda-icon-search"></div><span class="screen-reader-text"><?php _e( 'Search...', 'zelda' ); ?></span>
	</button>
</form>
