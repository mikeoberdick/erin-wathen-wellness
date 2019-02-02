<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<?php if ( is_active_sidebar( 'footer_1') || is_active_sidebar( 'footer_2') || is_active_sidebar( 'footer_3') || is_active_sidebar( 'footer_4') ) { ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

	<div id = "footerWidgets" class = "row">

		<div id = "footer1" class = "col-lg-6">
			<?php dynamic_sidebar('footer_1'); ?>
		</div><!-- #footer1 -->
		
		<div id = "footer2" class = "col-lg-4">
			<h5 class="widgettitle">Latest Blog Post & Tips</h5>
					<?php
						$args = array( 'numberposts' => '3' );
						$posts = wp_get_recent_posts( $args );
						foreach( $posts as $post ) {
							//vars
								$thumb = get_the_post_thumbnail( $post['ID'], 'thumbnail');
								$title = $post['post_title'];
								$link = get_permalink($post['ID']);
							?>
							<div class = "footer_post">
								<?php echo $thumb; ?>
								<h6 clas = "mb-0"><?php echo $title; ?></h6>
								<a href="<?php echo $link; ?>"><small>READ MORE</small></a>
							</div>
						<?php }
							wp_reset_query(); ?>
		</div><!-- #footer2 -->
		
		<div id = "footer3" class = "col-lg-2">
			<?php dynamic_sidebar('footer_3'); ?>
		</div><!-- #footer3 -->
	</div><!-- #footerWidgets -->

	<div id = "footerCopy" class = "text-center mt-3">
		&copy; <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?><br/>
		<div class = "small"><a href="/privacy-policy">Privacy Policy</a> | <a href="/terms-and-conditions">Terms & Conditions</a></div>
	</div>

	</div><!-- .container -->

	<?php } ?>

</div><!-- wrapper end -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>
