<?php
/**
 * Slider
 *
 * @package  HCStarter
**/

/*
 Gets posts from custom post type and puts content into slider

 */

$args = array(
	'posts_per_page' => -1,
	'post_type' => 'testimonials',
);
$cpt_query = new WP_Query( $args );


if ( $cpt_query->have_posts() ) : ?>
	
	<div class="slider swiper arrows-outside">
		<div class="swiper-wrapper">
			<?php if ( is_admin() ) { $i = 0; } ?>
			<?php while ( $cpt_query->have_posts() ) : $cpt_query->the_post(); ?>
			<?php 
				$i++; 
				if( is_admin() && $i > 2 ):
						break;
				endif;
			?>
				<div class="swiper-slide slide">				
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
	<div class="swiper-button-next"></div> <div class="swiper-button-prev"></div>
	
	<?php 
	wp_reset_postdata();
endif;