<?php


//Use AFC images as hero image
function prefix_hero() {
	if (is_front_page() ) {
		?>
			<style>
				.hero_image_container {	
					background: url('<?php get_post_meta('hero_image'); ?>') no-repeat right top; 
					background-size: 100%;
					}

				@media screen and (max-width:900px) and (orientation:portrait) { 
					.hero_image_container {	
						background: url('<?php get_post_meta( 'hero_image_mobile_portrait' ); ?>')  no-repeat right top;	
						background-size: cover;
						}					
					}
			</style>
		<?php }
}
add_action('wp_head', 'prefix_hero');

/*-----
Queries just for the hero image, to ensure portrait or landscape model is used.
----*/

@media screen and (max-width:900px) and (orientation:portrait) {

	.prefix_hero {
		display: block;
		}


}