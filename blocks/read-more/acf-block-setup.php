<?php 


	acf_register_block_type( array(
		'name'				=> 'read-more',
		'title'				=> __( 'Read More/Less', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-read-more-less.php',
		'category'			=> 'hct-theme',
		'icon'				=> 'insert',
		'mode'				=> 'auto',
		'keywords'			=> array( 'read more', 'hidden', 'hct-theme-blocks' ),
	));	


/*
 * Read more/less scripts
 */
add_action( 'wp_footer', 'hct_readmore_script' );
function hct_readmore_script() {
	
	if ( has_block( 'acf/read-more' ) ) {
		?>
		<script>
			(function($) {
				
				// Read more/less
				$('.read-more-content').addClass('hide')
				$('.read-more-show, .read-more-hide').removeClass('hide')


				$('.read-more-show').on('click', function(e) {
				  $(this).next('.read-more-content').removeClass('hide');
				  $(this).addClass('hide');
				  e.preventDefault();
				});

				$('.read-more-hide').on('click', function(e) {
				  var p = $(this).parent('.read-more-content');
				  p.addClass('hide');
				  p.prev('.read-more-show').removeClass('hide'); // Hide only the preceding "Read More"
				  e.preventDefault();
				});
				
			})(jQuery);	
		</script>		
		<?php
	}
}
