<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Zelda
 */
?>

<?php if ( 'single-column' != get_theme_mod( 'theme_layout' ) ) : ?>

	<div id="secondary" class="secondary" role="complementary">
		<?php if ( ! dynamic_sidebar( 'primary' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->

<?php endif; ?>
