
Enqueue the js:
	wp_enqueue_script( 'scrollreveal', '//unpkg.com/scrollreveal/dist/scrollreveal.min.js', true );   


ON PAGE:
	Use a class for anything animated
 
HEADER: 
// ScrollReveal - hide elements until load (with fallback) Use class "load-hidden"
function hct_hide_scrollreveal() {
	?>
	<style>
		html.sr .load-hidden {
			visibility: hidden;
		}
	 </style>
	<?php
}
add_action( 'wp_head', 'hct_hide_scrollreveal' );


FOOTER:
	<script>
	
		window.sr = ScrollReveal();
		sr.reveal('.fadeIn', {
				duration: 1000,
				easing : 'ease-in-out',
				opacity: 0,
				interval: 300,
				scale: 1,
				reset: false
		});
		
		sr.reveal('.fadeInFast', {
				duration: 700,
				easing : 'ease-in-out',
				opacity: 0,
				interval: 150,
				scale: 1,
				reset: false
		});
		
		sr.reveal('.cubeIn', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'cubic-bezier(.5,0,.4,1.06)',
				origin: 'left',
				scale: 1,				
				reset: false
		},200);	
		
		sr.reveal('.shiftDown', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'ease-in-out',
				origin: 'top',
				scale: 1,				
				reset: false
		},200);
		
		
	</script>
	
	
Novamind: 
sr.reveal('.animated', {
		delay: 1000,
		scale: 1,
		duration: 2000,
		//easing: 'ease-in-out',
		opacity: 0,
		interval: 300,
		reset: false,
	} );	
	
// 'bottom', 'left', 'top', 'right'
origin: 'bottom',

// Can be any valid CSS distance, e.g. '5rem', '10%', '20vw', etc.
distance: '20px',

// Time in milliseconds.
duration: 500,
delay: 0,

// Starting angles in degrees, will transition from these values to 0 in all axes.
rotate: { x: 0, y: 0, z: 0 },

// Starting opacity value, before transitioning to the computed opacity.
opacity: 0,

// Starting scale value, will transition from this value to 1
scale: 0.9,

// Accepts any valid CSS easing, e.g. 'ease', 'ease-in-out', 'linear', etc.
easing: 'cubic-bezier(0.6, 0.2, 0.1, 1)',

// `<html>` is the default reveal container. You can pass either:
// DOM Node, e.g. document.querySelector('.fooContainer')
// Selector, e.g. '.fooContainer'
container: window.document.documentElement,

// true/false to control reveal animations on mobile.
mobile: true,

// true:  reveals occur every time elements become visible
// false: reveals occur once as elements become visible
reset: false,

// 'always' — delay for all reveal animations
// 'once'   — delay only the first time reveals occur
// 'onload' - delay only for animations triggered by first load
useDelay: 'always',

// Change when an element is considered in the viewport. The default value
// of 0.20 means 20% of an element must be visible for its reveal to occur.
viewFactor: 0.2,

// Pixel values that alter the container boundaries.
// e.g. Set `{ top: 48 }`, if you have a 48px tall fixed toolbar.
// --
// Visual Aid: https://scrollrevealjs.org/assets/viewoffset.png
viewOffset: { top: 0, right: 0, bottom: 0, left: 0 },

// Callbacks that fire for each triggered element reveal, and reset.
beforeReveal: function (domEl) {},
beforeReset: function (domEl) {},

// Callbacks that fire for each completed element reveal, and reset.
afterReveal: function (domEl) {},
afterReset: function (domEl) {}

// Learn how to set directly into html
https://wptheming.com/2017/09/using-scroll-reveal-for-animation-effects/



sr.reveal('.fadeIn', {
				duration: 1000,
				easing : 'ease-in-out',
				opacity: 0,
				interval: 300,
				scale: 1,
				reset: false
		});

		sr.reveal('.delay', {
				delay: 1000,
		});		
		
		sr.reveal('.shiftUp', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'ease-in-out',
				origin: 'bottom',
				scale: 1,				
				reset: false
		},200);
		
		sr.reveal('.shiftDown', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'ease-in-out',
				origin: 'top',
				scale: 1,				
				reset: false
		},200);	

		sr.reveal('.cubeIn', {
				delay: 300,
				distance: '30px',
				duration: 1200,
				easing : 'cubic-bezier(.5,0,.4,1.06)',
				origin: 'left',
				scale: 1,				
				reset: false
		},200);	