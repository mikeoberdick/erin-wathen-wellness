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

get_header();

?>

<?php if ( !is_front_page() ) { ?>
	<?php if( has_post_thumbnail() ) { ?>
		<?php $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
		<header class = "container-fluid pageHeader mb-3" style = "background-image: url('<?php echo $bg[0] ?>')">
		<?php } else { ?>
			<header class = "container-fluid pageHeader mb-3" style = "background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/default_page_header.png')">
		<?php } ?>
		<div class="container-fluid p-0">
			<div class="row">
				<div class = "col-lg-4 titleWrapper">
					<?php if ( get_field ('page_header') ) { ?>
					<h3 class="pageTitle"><?php the_field('page_header'); ?></h3>
				<?php } else { ?>
					<h3 class="pageTitle"><?php the_title(); ?></h3>
				<?php } ?>
				</div><!-- .col-lg-4 .titleWrapper -->
			</div><!-- .row -->
		</div><!-- .container-fluid -->
	</header><!-- .pageHeader -->

<div class="container-fluid">
	<div class="container">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb( '<p id="breadcrumbs" class = "mb-5">','</p>' );
	}
	?>		
	</div><!-- .container -->
</div><!-- .container-fluid -->

<?php } //end the homepage conditional ?>

<main class="site-main" id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php

		if( is_page( 'home' ) ) {
			get_template_part( 'template-parts/content', 'home' );
		} elseif ( is_page( 'about' ) ) {
			get_template_part( 'template-parts/content', 'about' );
		} elseif ( is_page( 'videos' ) ) {
			get_template_part( 'template-parts/content', 'videos' );
		}

		else {
		   get_template_part( 'loop-templates/content', 'page' );
		}

		?>
	<?php endwhile; // end of the loop. ?>
</main><!-- #main -->

<?php get_footer(); ?>
