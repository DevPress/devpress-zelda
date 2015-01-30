<?php
/**
 * @package Zelda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'module' ); ?>>

	<header class="entry-header">
		<div class="entry-meta entry-header-meta">
			<?php zelda_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && get_theme_mod( 'archive-featured-images', 1 ) ) { ?>
	<figure class="entry-image">
		<?php the_post_thumbnail(); ?>
	</figure>
	<?php } ?>

	<div class="entry-content clearfix">
	<?php if ( is_search() || get_theme_mod( 'archive-excerpts', 0 ) ) :
		the_excerpt();
	else :
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'zelda' ) );
	endif; ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'zelda' ),
			'after'  => '</div>',
		) );
	?>
	</div><!-- .entry-content -->

	<footer class="entry-meta entry-footer-meta">
		<?php zelda_post_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
