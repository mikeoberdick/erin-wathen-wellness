<?php if ( !is_front_page() ) { ?>
<?php if( !is_home() && has_post_thumbnail() ) { ?>
	<?php $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<header class = "container-fluid pageHeader mb-3" style = "background-image: url('<?php echo $bg[0] ?>')">
	<?php } else { ?>
	<header class = "container-fluid pageHeader mb-3" style = "background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/default_page_header.png')">
	<?php } ?>
	<div class="container-fluid p-0">
		<div class="row">
			<div class = "col-8 col-md-6 col-lg-4 titleWrapper">
				<?php if ( get_field ('page_header') ) { ?>
				<h3 class="pageTitle mb-0"><?php the_field('page_header'); ?></h3>
			<?php } elseif ( is_single() ) { ?>
				<h3 class="pageTitle mb-0"><?php the_title(); ?></h3>
				<p class = "single_post_meta"><?php the_date(); ?></p>
			<?php } else { ?>
				<h3 class="pageTitle mb-0"><?php single_post_title(); ?></h3>
			<?php } ?>
			</div><!-- .col-lg-4 .titleWrapper -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</header><!-- .pageHeader -->
<?php } //end the homepage conditional ?>