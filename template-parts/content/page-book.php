<section id = "bookOverview" class = "mb-5">
	<div class="container">
		<div class="row">
			<div class="d-none d-lg-block col-lg-4">
				<div id="bookImage">
					<?php $book = get_field('book_image'); 
						$size = 'medium';
						$thumb = $book['sizes'][ $size ];?>
					<img src="<?php echo $book['url']; ?>" alt="Why Can't I Stick to my Diet?"></img>
					
				</div><!-- #bookImage -->
			</div><!-- col-lg-4 -->
			<div id = "bookDetails" class="col-lg-8 mb-5">
				<h3 class = "mb-3">The Definitive Anti-Diet Guide!</h3>
				<img class = "d-block d-lg-none float-left pr-3 pb-3" src="<?php echo $thumb; ?>" alt="Why Can't I Stick to my Diet?"></img>
				<?php the_field('book_details'); ?>
				<div id = "buttons" class = "text-center">
					<a class = "button" target = "_blank" href="https://www.amazon.com/Why-Cant-Stick-My-Diet-ebook/dp/B07DLNZ8P6"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/img/amazon.png" /></a>
					<a class = "button" target = "_blank"  href="https://www.barnesandnoble.com/w/why-cant-i-stick-to-my-diet-erin-boardman-wathen/1128700294?ean=9781683509998#/"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/img/barnes_and_noble.png" /></a>
				</div>
			</div><!-- .col-lg-8 -->
		</div><!-- .row -->

		<div class="row">
			<div class="col-lg-12">
				<h3 class = "mb-3 text-center">Messages From Those Living Their Best Life!</h3>
								<?php
				// check if the repeater field has rows of data
					if( have_rows('reviews') ):
				// loop through the rows of data
    				while ( have_rows('reviews') ) : the_row(); ?>
    				<div class="book-testimonial">
						<h5 class = "mb-2"><?php the_sub_field('headline'); ?></h5>
						<div class = "mb-2">
							<span class = "mr-2"><strong><?php the_sub_field('name'); ?></strong></span>
							<span class = "stars">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</span><!-- .stars -->	
						</div>
						<p><?php the_sub_field('review'); ?></p>
					</div><!-- .book-testimonial -->		
				<?php
   				endwhile;					
				endif;
				?>
			</div>
		</div>
	</div><!-- .container -->
</section><!-- #bookOverview  -->