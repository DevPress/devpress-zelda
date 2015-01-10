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
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			$count = 0;
			while ( $query->have_posts() ) : $query->the_post();
				the_title();
			endwhile;
		endif;
		?>

	</div><!-- #primary -->

<?php get_footer(); ?>
