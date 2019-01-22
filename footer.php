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
		</div>
		
		<div id = "footer2" class = "col-lg-3">
			<?php dynamic_sidebar('footer_2'); ?>
		</div>
		
		<div id = "footer3" class = "col-lg-3">
			<?php dynamic_sidebar('footer_3'); ?>
		</div>
	</div><!-- #footerWidgets -->

	</div><!-- .container -->

	<?php } ?>

</div><!-- wrapper end -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>
