<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zelda
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
			<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			</header><!-- .page-header -->

			<?php if ( have_posts() ) : ?>

				<div id="posts-wrap">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>
				</div>

				<?php zelda_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
