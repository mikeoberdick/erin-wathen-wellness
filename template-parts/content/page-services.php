<section id = "services" class = "mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1 class = "mb-3">The Time is NOW!</h1>
				<div id = "services_copy"><?php the_content(); ?></div>
				<div class="row">
					<div class = "col-lg-8">
						<h3 class = "mb-3">Weight Loss Coach Program</h3>
						<div class = "coach_program"><?php echo the_field('coach_program_content'); ?></div>
					</div>
					<div class = "col-lg-4"><img src="<?php echo the_field('coach_program_image'); ?>" alt=""></div>
				</div>
				
			</div><!-- col-lg-8 -->
			<div id = "specials" class="col-lg-4">
				<h3 class = "mb-3 text-center">Current Specials</h3>
			<?php if( have_rows('packages') ): while( have_rows('packages') ): the_row(); ?>
				<?php  
				// vars
				$title = get_sub_field('package_title');
				$content = get_sub_field('package_details');
				$reg_price = get_sub_field('regular_price');
				$sale_price = get_sub_field('sale_price');
				?>

				<div class="col-lg-12">
			    	<div class="serviceContainer">
				      <h5 class = "mb-3"><?php echo $title; ?></h5>
				      <div><?php echo $content; ?></div>
				      <div class = "prices">
				      	<span class = "reg_price">
				      		<?php echo $reg_price; ?>
				      	</span>
				      	<span class = "sale_price">
				      		<?php echo $sale_price; ?>
				      	</span>
				      </div>
			    	</div><!-- .serviceContainer -->
			  </div><!-- .col-lg-12 -->
				<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- .col-lg-4 -->	
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #services  -->