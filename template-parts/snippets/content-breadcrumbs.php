<?php if ( !is_front_page() ) { ?>
<div class="container-fluid">
	<div class="container">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb( '<p id="breadcrumbs" class = "mb-5">','</p>' );
	}
	?>		
	</div><!-- .container -->
</div><!-- .container-fluid -->
<?php } ?>