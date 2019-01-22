<?php
/**
 * The template for displaying all pages.
 *
 * This is the template for pages...note the conditionals for use with template parts.
 * Each page will need a container and a row.
 * These elements have been removed from this page to allow for each page to either be a fixed or fluid width container.
 *
 * @package understrap
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content', 'page_title' ) ?>
<?php get_template_part( 'template-parts/content', 'breadcrumbs' ) ?>

<main class="site-main" id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php

		if( is_page( 'home' ) ) {
			get_template_part( 'template-parts/page', 'home' );
		} elseif ( is_page( 'about' ) ) {
			get_template_part( 'template-parts/page', 'about' );
		} elseif ( is_page( 'videos' ) ) {
			get_template_part( 'template-parts/page', 'videos' );
		} elseif ( is_page( 'contact' ) ) {
			get_template_part( 'template-parts/page', 'contact' );
		} elseif ( is_page( 'press' ) ) {
			get_template_part( 'template-parts/page', 'press' );
		} elseif ( is_page( 'book' ) ) {
			get_template_part( 'template-parts/page', 'book' );
		} elseif ( is_page( 'services' ) ) {
			get_template_part( 'template-parts/page', 'services' );
		} else {
		   get_template_part( 'loop-templates/content', 'page' );
		}

		?>
	<?php endwhile; // end of the loop. ?>
</main><!-- #main -->

<?php if ( !is_front_page() && !is_page('contact') ) {
	get_template_part( 'template-parts/content', 'ctaForm' );
} ?>

<?php get_footer(); ?>
