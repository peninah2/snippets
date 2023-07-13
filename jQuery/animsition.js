
/* functions.php
------------------------------------------------*/
wp_enqueue_script( 'animsition', '//cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js', true ); 
wp_enqueue_style(  'animsition-style', '//cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css' ); 


// Add class to .site-container
add_filter('genesis_attr_site-container', 'hct_attributes_st_container');
function hct_attributes_st_container($attributes) {
	$attributes['class'] .= ' animsition';
	return $attributes;
}

/* global.js
------------------------------------------------*/

	// Animsition
	$(document).ready(function() {
	  $(".animsition").animsition({
		inClass: 'fade-in',
		outClass: 'fade-out',
		inDuration: 900,
		outDuration: 500,
		linkElement: '.animsition-link a',
		loading: true,
		loadingParentElement: 'body', //animsition wrapper element
		loadingClass: 'animsition-loading',
		loadingInner: '', // e.g '<img src="loading.svg" />'
		timeout: false,
		timeoutCountdown: 1000,
		onLoadEvent: true,
		browser: [ 'animation-duration', '-webkit-animation-duration'],
		overlay : false,
		overlayClass : 'animsition-overlay-slide',
		overlayParentElement : 'body',
		transition: function(url){ window.location.href = url; }
	  });
	});