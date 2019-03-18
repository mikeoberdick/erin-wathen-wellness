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
<div class="wrapper" id="page-wrapper">
<?php get_template_part( 'template-parts/snippets/content', 'page_title' ) ?>
<?php get_template_part( 'template-parts/snippets/content', 'breadcrumbs' ) ?>

	<main class="site-main" id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php

		if( is_page( 'home' ) ) {
			get_template_part( 'template-parts/content/page', 'home' );
		} elseif ( is_page( 'about' ) ) {
			get_template_part( 'template-parts/content/page', 'about' );
		} elseif ( is_page( 'videos' ) ) {
			get_template_part( 'template-parts/content/page', 'videos' );
		} elseif ( is_page( 'contact' ) ) {
			get_template_part( 'template-parts/content/page', 'contact' );
		} elseif ( is_page( 'press-and-media' ) ) {
			get_template_part( 'template-parts/content/page', 'press' );
		} elseif ( is_page( 'why-cant-i-stick-to-my-diet' ) ) {
			get_template_part( 'template-parts/content/page', 'book' );
		} elseif ( is_page( 'services' ) ) {
			get_template_part( 'template-parts/content/page', 'services' );
		} else {
		   get_template_part( 'loop-templates/content', 'page' );
		}

		?>
	<?php endwhile; // end of the loop. ?>
	</main><!-- #main -->
</div><!-- .wrapper -->

<?php if ( !is_front_page() && !is_page('contact') && !is_page('press') && !is_page('privacy-policy') && !is_page('terms-and-conditions') ) {
	get_template_part( 'template-parts/snippets/content', 'ctaForm' );
} ?>

<?php get_footer(); ?>
