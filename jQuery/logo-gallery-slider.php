<?php

// First, enqueue tinyslider
add_action( 'wp_enqueue_scripts', 'hct_enqueue_tinyslider' );


// Now add specific for this slider 
function hct_tinyslider() {
	?>
	
	<script>
	jQuery(function ($) {
		$(document).ready(function(){
			
			$('#client-logo-gallery').slick({
				arrows		: false,
				autoplay	: true,
				slidesToShow: 8,
				autoplaySpeed: 0,
				speed		: 3000,
				
				responsive: {
				  540: {
					items: 2
				  },
				  760: {
					items: 4
				  },
				  960: {
					items: 6
				  }
				}
				
			}); 
			
		});	
	});	
	</script>
	
	<?php
}
add_action( 'wp_footer', 'hct_tinyslider', 50 );

?>


<div class="client-logo-gallery">
	<?php 
	$images = get_field('client_logos');
	//$size = 'full';
	if( $images ): ?>
		<ul id="client-logo-gallery">
			<?php foreach( $images as $image ): ?>
				<li>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>