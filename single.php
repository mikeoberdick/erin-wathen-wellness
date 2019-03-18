<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<div class="wrapper" id="page-wrapper">
<?php get_template_part( 'template-parts/snippets/content', 'page_title' ) ?>
<?php get_template_part( 'template-parts/snippets/content', 'breadcrumbs' ) ?>

<div id="content" tabindex="-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class = "single_post_container">
						<div class="row">
							<div class="col-lg-12 post_box">
								<h1 class = "single_title"><?php the_title(); ?></h1>
								<?php the_content(); ?>
							</div><!-- .col-lg-12 -->
						</div><!-- .row -->
					</div><!-- .post_container -->
					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>