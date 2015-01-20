<?php
/**
 * Template Name: Page Showcase
 *
 * Displays a magazine layout of pages.
 *
 * @package Zelda
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php

		// Get pages set in the customizer (if any)
		$pages = array();
		for ( $count = 1; $count <= 5; $count++ ) {
			$mod = get_theme_mod( 'showcase-page-' . $count );
			if ( 'zelda-none-selected' != $mod ) {
				$pages[] = $mod;
			}
		}

		$args = array(
			'posts_per_page' => 5,
			'post_type' => 'page',
			'meta_key' => '_thumbnail_id',
			'post__in' => $pages
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
		else :
			if ( current_user_can( 'edit_posts' ) ) { ?>
				<div class="admin-msg">
					<p><?php _e( 'Sorry, there are no posts available to display.', 'zelda' ); ?></p>
					<p><?php _e( 'Make featured images are set and there are enough posts published for the selected tag.', 'zelda' ); ?></p>
				</div>
			<?php }
		endif;
		?>

	</div><!-- #primary -->

<?php get_footer(); ?>