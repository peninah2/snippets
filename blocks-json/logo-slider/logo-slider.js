jQuery(function ($) {
	$(document).ready(function(){
		
		var swiper = new Swiper('.logo-slider', {
			  
			loop: true,
			navigation: false,
			pagination: false,
			autoplay: {
				delay: 1
			},
			
			freeMode: true,
			slidesPerView: 1,
			speed: 5000,
			
			initialSlide: 3,
			
			breakpoints: {
				600: {
				  slidesPerView: 2,
				  spaceBetween: 30,
				},
				
				1280: {
				  slidesPerView: 4,
				  spaceBetween: 30,
				  slidesPerGroup: 1,
				},
			},
			  
			  
			
		});		
		
	});
	
});	
	