<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Zelda
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav id="footer-navigation" class="footer-navigation clearfix" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'footer',
				'link_before' => '<span>',
				'link_after' => '</span>'
			) ); ?>
		</nav>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'footer-text', customizer_library_get_default( 'footer-text' ) ) != '' ) : ?>
		<div class="site-info">
			<?php echo get_theme_mod( 'footer-text', customizer_library_get_default( 'footer-text' ) ); ?>
		</div><!-- .site-info -->
		<?php endif; ?>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>