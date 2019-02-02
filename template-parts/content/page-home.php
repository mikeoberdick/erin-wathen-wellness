<div id = "hero" class="container-fluid" tabindex="-1" style = "background:url('<?php the_field('hero_image'); ?>')">
	<div id = "heroHeader1">
		<h5>Holistic Health and Wellness Coaching for you to</h5>
		<h1>Live Your Best Life Now!</h1>
	</div>
	<div id = "heroHeader2">
		<h3><span>Schedule Your</span><br>One-On-One Strategy Session<br><span>with Erin!</span></h3>
	</div>
</div><!-- .container-fluid -->

<div id = "joinUsWrapper" class="container-fluid mb-5">
	<div class="container">
		<div id = "joinUs" class="row">
			<div class="col-sm-8 col-lg-10"><h4>Look and Feel Fabulous in 2019.  Join my Group Coaching Program!</h4></div>
			<div class="col-sm-4 col-lg-2">
				<a href = '<?php echo bloginfo('url'); ?>/contact'>
					<button role = 'button' class = 'btn btn-primary'>
						Join Us!
					</button>
				</a>
			</div><!-- .col-2 -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .container-fluid -->

<section id = "pressCarousel" class = "mb-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h5 class = "text-center mb-3">As Seen In...</h5>
			</div>
			<div id = "pressSlider" class = "owl-carousel owl-theme">
			<?php
				// check if the repeater field has rows of data
			if( have_rows('press_logos') ):
				// loop through the rows of data
    		while ( have_rows('press_logos') ) : the_row();
    			$img = get_sub_field('press_logo');
    			//vars
    			$url = $img['url'];
				$size = 'press-logo';
				$thumb = $img['sizes'][ $size ]; ?>
    		<img src="<?php echo $thumb; ?>">
   			<?php
   			endwhile;					
			endif;
			?>
			</div><!-- #pressSlider -->
		</div><!-- .row -->
	</div><!-- .container -->
</section>

<section id = "meetYourCoachWrapper" class="container-fluid mb-5">
		<div id = "meetYourCoach" class="container">
			<div class="row">
				<div id = "coachVideo" class="col-lg-5">
					<h3>Meet Your Coach</h3>
					<div class = "embed-responsive embed-responsive-16by9">
						<?php the_field('meet_your_coach_video'); ?>	
					</div>
				</div><!-- .col-lg-5 -->
				<div class="offset-lg-1 col-lg-6">
					<h3>The Best Selling Book</h3>
					<div class="row">
						<div class="col-sm-4">
							<img class = "mb-4" src="<?php echo get_stylesheet_directory_uri(); ?>/img/book.png" alt="Why Can't I Stick to my Diet?">
							<a href = '<?php echo bloginfo('url'); ?>/book'>
								<button role = 'button' id = "getYourCopy" class = 'btn btn-primary'>Get Your Copy!</button>
							</a>
						</div><!-- .col-sm-4 -->
						<div id = "right" class="col-sm-8">
							<p>Who doesn’t want be energetic, lose the last 10 pounds and ditch the brain fog for good?</p>
							<p>In this book:</p>
							<ul class = "list-unstyled">
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> You will learn why diets are so hard to stick to</li>
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> What is preventing us from sticking to our diets</li>
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> How I learned to stick to my diet by not being on a diet</li>
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> Living the rest of your life not on a diet, yet maintaining your weight loss</li>
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> We will figure out a specialized food plan for the rest of your life</li>
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> You will learn how to combat any food obstacle</li>
								<li><i class="fa fa-caret-right" aria-hidden="true"></i> You will learn to ditch the diet mentality for good</li>
							</ul>
						</div><!-- .col-sm-8 -->
					</div>
				</div><!-- .col-lg-6 -->
			</div><!-- .row -->	
		</div><!-- .container -->
</section><!-- .container-fluid -->

<section id = "testimonialCarousel" class = "mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3 class = "text-center mb-3">What Clients Are Saying...</h3>
			</div>
			<div id = "testimonialSlider" class = "owl-carousel owl-theme">
			  <?php
				// check if the repeater field has rows of data
			if( have_rows('client_testimonials') ):
				// loop through the rows of data
    		while ( have_rows('client_testimonials') ) : the_row();
    			//vars
    			$author = get_sub_field('testimonial_author');
				$age = get_sub_field('testimonial_age');
				$copy = get_sub_field('testimonial_copy');
			?>
    		<div class = "testimonial">
    			<h5 class = "mb-3"><?php echo $author . ', ' . $age; ?></h5>
    			<p><?php echo $copy; ?></p>
    		</div><!-- .testimonial -->
   			<?php
   			endwhile;					
			endif;
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</section>