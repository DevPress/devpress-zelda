<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Zelda
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'zelda' ); ?></a>

	<header id="masthead" class="site-header clearfix" role="banner">

		<div class="site-branding">

			<?php
			$brand = array();
			if ( get_theme_mod( 'logo', 0 ) ) {
				$brand[] = 'brand-logo';
			}
			if ( ! get_theme_mod( 'hide-site-title', 0 ) ) {
				$brand[] = 'brand-title';
			}
			?>

			<h1 class="<?php echo implode( ' ', $brand ); ?>">

				<?php if ( get_theme_mod( 'logo', 0 ) ) : ?>
				<span class="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>" >
					</a>
				</span>
				<?php endif; ?>

				<?php if ( ! get_theme_mod( 'hide-site-title', 0 ) ) : ?>
				<span class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</span>
				<?php endif; ?>

			</h1>

			<?php if ( get_bloginfo( 'description' ) != '' && ! get_theme_mod( 'hide-site-tagline', 0 ) ) : ?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav class="primary-navigation" role="navigation">
			<div class="menu-toggle"><?php _e( 'Menu', 'focus' ); ?></div>
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class' => 'nav-menu',
				'container_class' => 'menu-container',
				'link_before' => '<span>',
				'link_after' => '</span>'
			) ); ?>
		</nav>
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content clearfix">