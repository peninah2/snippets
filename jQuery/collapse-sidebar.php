<?php

// Make sidebar appear above content
remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
add_action( 'genesis_before_content', 'genesis_get_sidebar' ); 

// Sidebar (facets) collapse
function tgs_collapse_sidebar() {
	// https://gist.github.com/zoerooney/5632182
	?>
	<script>
	  jQuery(document).ready(function($){
	
	 if($(window).width() <= 801){	
	 
	  $('#custom_html-2').hide();	  
	  $('.collapse-button').click( function() {
		
		$(this).next().animate({
		  
		  height: 'toggle',
		  opacity: 'toggle',
	  
		});
	  });
	  
	  // This next bit is for the fun bonus arrow indicators (see the CSS)
	  $('.collapse-button .text').click(function(){
		$(this).parent().toggleClass('collapse-text');
	  });
	 }
	});
	</script>

	<?php
}
add_action( 'genesis_after_footer', 'tgs_collapse_sidebar' );


function tgs_collapse_sidebar_button() {
	?>

	<button class="collapse-button button subtle">
		<div class="text">Advanced Search</div>
	</button>

	<?php
}
add_action( 'genesis_before_sidebar_widget_area', 'tgs_collapse_sidebar_button' );


// CSS:

.collapse-button {
		display: block;
	    width: 100%;
		background: #483c5b;
		text-align: left;
		font-weight: bold;
		border-radius: 0;
	    padding-left: 0px !important;
	}
		
	.collapse-button .text:after {
	  content: '\f107'; 
	  padding-left: 20px;
	  font-family: 'FontAwesome';
	}

	.collapse-button.collapse-text .text:after {
	  content: '\f106';
	}	

	.collapse-button .text:before {
	  content: 'Show '; 
	  padding-left: 20px;
	}

	.collapse-button.collapse-text .text:before {
	  content: 'Collapse ';
	}
