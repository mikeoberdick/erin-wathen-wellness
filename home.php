<?php
/**
 * The blog template file.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php get_template_part( 'template-parts/content', 'page_title' ) ?>
<?php get_template_part( 'template-parts/content', 'breadcrumbs' ) ?>

	<div id="content" tabindex="-1">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class = "post_container">
						<div class="row">
							<div class="col-lg-2 text-center">
								<div class = "date_box">
									<span class = "day"><?php the_time('j'); ?></span>
									<span class = "month"><?php the_time('M'); ?></span>	
								</div><!-- .date_box -->
							</div><!-- .col-lg-2 -->
							<div class="col-lg-10 post_box">
								<h3><?php the_title(); ?></h3>
								<p class = "post_meta">Posted in <?php echo get_the_category_list( ', '); ?> by <?php the_author(); ?>
								<?php the_excerpt(); ?>
							</div><!-- .col-lg-10 -->
						</div><!-- .row -->
					</div><!-- .post_container -->
					<?php endwhile; ?>
					<?php endif; ?>
				
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>

				</div><!-- .col-lg-9 -->	
				
				<!-- Right Sidebar -->
				<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				</div><!-- #right-sidebar -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

<?php get_footer(); ?>