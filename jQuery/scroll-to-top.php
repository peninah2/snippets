<?php

// Scroll to top 
function hct_scroll_top() {
	?>
	<a href="#" class="button scroll-top" id="scroll-top">
 		<i class="arrow up"></i>
	</a>
	<?php
}
add_action( 'genesis_after_content', 'hct_scroll_top' );

/*  CSS   */
#scroll-top {
  display: none;
  position: fixed; 
  bottom: 20px;
  right: 30px;
  z-index: 99;
  outline: none; 
  cursor: pointer;
  padding: 7px 13px 5px;
}

.arrow.up {
  border: solid black;
  border-width: 0 1px 1px 0;
  display: inline-block;
  padding: 5px;
  transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
}


/*  Javascript  */

// Scroll to top
	$(document).ready(function(){
	
		//Check to see if the window is top if not then display button
		$(window).scroll(function(){
			if ($(this).scrollTop() > 700) {
				$('#scroll-top').fadeIn();
			} else {
				$('#scroll-top').fadeOut();
			}
		});
		
		//Click event to scroll to top
		$('#scroll-top').click(function(){
			$('html, body').animate({scrollTop : 0},400);
			return false;
		});
		
	});
	
	