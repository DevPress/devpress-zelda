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
			'post__in' => $pages
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			$count = 1;
			while ( $query->have_posts() ) : $query->the_post();

				// Set default image sizes to use
				$thumbnail = 'zelda-showcase';
				$width = 480;

				// If it's the first post, use large image size
				if ( 1 == $count ) {
					$thumbnail = 'zelda-showcase-large';
					$width = 780;
				}

				// If no image is set, we'll use a fallback image
				if ( has_post_thumbnail() ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumbnail, true )[0];
					$class = "image-thumbnail";
				} else {
					$image = get_template_directory_uri() . '/images/post.svg';
					$class = 'fallback-thumbnail';
				}
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-' . $count ); ?>>

					<a href="<?php the_permalink(); ?>" class="entry-image-link">
						<figure class="entry-image <?php echo $class; ?>">
							<img src="<?php echo $image; ?>" style="width:<?php echo $width; ?>">
						</figure>
					</a>

					<header class="entry-header">
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( 1 == $count ) : ?>
					<div class="entry-summary clearfix">
						<?php
						if ( has_excerpt() ) :
							the_excerpt();
						elseif ( @strpos( $post->post_content, '<!--more-->') ) :
							the_content();
						elseif ( str_word_count( $post->post_content ) < 100 ) :
							the_content();
						else:
							the_excerpt();
						endif;
						?>
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