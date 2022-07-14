<?php
/**
 * Rotating testimonials
 *
 * @package  HCStarter
**/

if( have_rows('testimonials') ): ?>

	<div class="testimonials swiper has-text-align-center">
		<div class="swiper-wrapper">
		
			<?php  while( have_rows('testimonials') ): the_row(); ?>	
				<div class="swiper-slide slide">
					<p><?php the_sub_field( 'testimonial' ); ?></p>
					<p class="all-caps"><strong><?php the_sub_field( 'author' ); ?></strong></p>
				</div>								
			
			<?php endwhile; ?>
			
		</div>
		
		<div class="swiper-pagination"></div>
		
	</div>	
  
  <?php 
 endif;