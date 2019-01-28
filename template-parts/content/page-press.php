<section id = "mediaRequests" class = "mb-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<i class="fa fa-envelope-o mb-2" aria-hidden="true"></i>
				<h5 class = "mb-3">Media Inquiries</h5>
				<p>Press inquiries and all news-related requests can be directed to <a href = "mailto:press@erinwathenwellness.com" alt = "Contact Erin with any press related inquiries.">press@erinwathenwellness.com</a></p>
			</div><!-- col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section>

<section id = "pressPosts" class = "mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
					<?php
	// Display Press CPT
			if ( get_query_var('paged') ) $paged = get_query_var('paged');
			if ( get_query_var('page') ) $paged = get_query_var('page');

			$query = new WP_Query( array( 'post_type' => 'press', 'posts_per_page'   => -1, 'order' => 'ASC', 'orderby' => 'menu_order', 'paged' => $paged ) ); ?>
			<div class="card-deck">
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				
				  <div class="card text-center">
				  		<div class = "cardTop">
				  			<?php $terms = get_the_terms( $post->ID , 'press-category' ); ?>
							<?php foreach ( $terms as $term ) { ?>
								<?php the_field('icon', $term); ?>
									<span class = "mb-3 text-uppercase d-block">
				   						<?php echo $term->name; ?>
				   					</span>
								<?php } ?>
				  		</div>
				  		<a href="<?php the_field('link'); ?>">
				    	<div class="card-body" style = "background: url('<?php the_post_thumbnail_url('medium'); ?>')">
				      	<h3 class="card-title"><?php the_title(); ?></h3>
				    	</div><!-- .card-body -->
				    </a>
				  </div><!-- .card -->
			<?php endwhile;
			wp_reset_postdata();
			endif; ?>
			</div><!-- .card-deck -->
		</div>
	</div>
</div>
</section>