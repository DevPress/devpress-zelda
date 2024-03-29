<?php
/**
 * @package Zelda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-meta entry-header-meta">
			<?php zelda_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( zelda_display_featured_image() ) { ?>
	<figure class="entry-image">
		<?php the_post_thumbnail(); ?>
	</figure>
	<?php } ?>

	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'zelda' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_the_author_meta( 'description' ) ) :
	// If a user has filled out their description, show a bio on their entries ?>
	<div class="author-meta">
		<div class="author-box clearfix">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'zelda_author_bio_avatar_size', 64 ) ); ?>
			</div><!-- #author-avatar -->
			<div class="author-description">
				<h3><?php printf( esc_attr__( 'About %s', 'zelda' ), get_the_author() ); ?></h3>
				<?php the_author_meta( 'description' ); ?>
			</div><!-- #author-description -->
		</div>
	</div><!-- #author-meta-->
	<?php endif; ?>

	<footer class="entry-meta entry-footer-meta">
		<?php zelda_post_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
