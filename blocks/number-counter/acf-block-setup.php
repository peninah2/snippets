<?php

// acf-block-setup.php

	acf_register_block_type( array(
		'name'				=> 'number-counter',
		'title'				=> __( 'Number counter', 'hct-theme-blocks' ),
		'render_template'	=> 'blocks/block-number-counter.php',
		'category'			=> 'hct-theme',
		'icon'				=> 'editor-ol-rtl',
		'mode'				=> 'auto',
		'keywords'			=> array( 'number', 'counter', 'hct-theme-blocks' ),
		'supports'		=> [
			'customClassName'	=> true,
		]
	));	
	
	

/*
 * Only load Number Counter scripts if block is present
 */

add_action( 'wp_footer', 'hct_number_counter_script', 50 );	
function hct_number_counter_script() {
	
	if ( has_block( 'acf/number-counter' ) ) { 
	?>
	
	<script type='text/javascript'>
		jQuery(function ($) {
			
			
			function isElementVisible($elementToBeChecked)
			{
				var TopView = $(window).scrollTop();
				var BotView = TopView + $(window).height();
				var TopElement = $elementToBeChecked.offset().top;
				var BotElement = TopElement + $elementToBeChecked.height();
				return ((BotElement <= BotView) && (TopElement >= TopView));
			}

			$(window).scroll(function () {
				$( ".counter" ).each(function() {
					$this = $(this);
					isOnView = isElementVisible($(this));
					if(isOnView && !$(this).hasClass('Starting')){
						$(this).addClass('Starting');
						startAnimation($(this));
					}
				});
			});

			function startAnimation($this) {
			  
			  $('.counter').each(function() {
				  var $this = $(this),
					  countTo = $this.attr('data-count');
				  
				  $({ countNum: $this.text()}).animate({
					countNum: countTo
				  },

				  {

					duration: 4000,
					easing:'linear',
					step: function() {
					  $this.text(Math.floor(this.countNum));
					},
					complete: function() {
					  $this.text(this.countNum);
					}

				  });    

				});
			  
			}
			
		});	
	</script>
	
	<?php
	}
}
