<?php
/**
 * Template Name: Post Showcase
 *
 * The template for displays an alternative magazine layout.
 *
 * @package Zelda
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		$args = array(
			'posts_per_page' => 5,
			'post_type' => 'post',
			'meta_key' => '_thumbnail_id'
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			$count = 1;
			while ( $query->have_posts() ) : $query->the_post();
			$thumbnail = 'zelda-showcase';

			if ( 1 == $count ) {
				$thumbnail = array( 780, 780, true );
			}
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-' . $count ); ?>>

					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" class="entry-image-link">
						<figure class="entry-image">
							<?php the_post_thumbnail( $thumbnail ); ?>
						</figure>
					</a>
					<?php } ?>

					<header class="entry-header">
						<div class="entry-meta entry-header-meta">
							<?php zelda_posted_on( array( 'date' ) ); ?>
						</div><!-- .entry-meta -->
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( 1 == $count ) : ?>
					<div class="entry-summary clearfix">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
					<?php endif; ?>

					<?php if ( 1 != $count ) : ?>
					<p class="read-more">
						<a href="<?php the_permalink(); ?>">
							<?php _e( 'Read More', 'zelda' ); ?>
						</a>
					</p>
					<?php endif; ?>

				</article><!-- #post-## -->

			<?php
			$count++;
			endwhile;
		endif;
		?>

	</div><!-- #primary -->

<?php get_footer(); ?>
