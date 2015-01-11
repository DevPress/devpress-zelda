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
			$thumbnail = array( 250, 250, true );

			if ( $count == 1 ) {
				$thumbnail = null;
			}
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-' . $count ); ?>>

					<?php if ( has_post_thumbnail() ) { ?>
					<figure class="entry-image">
						<?php the_post_thumbnail( $thumbnail ); ?>
					</figure>
					<?php } ?>

					<header class="entry-header">
						<div class="entry-meta entry-header-meta">
							<?php zelda_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-summary clearfix">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php
			$count++;
			endwhile;
		endif;
		?>

	</div><!-- #primary -->

<?php get_footer(); ?>
