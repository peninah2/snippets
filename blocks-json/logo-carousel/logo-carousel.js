jQuery(function ($) {
	$(document).ready(function(){
		
		var swiper = new Swiper('.logo-carousel', {
			  
			loop: true,
			navigation: false,
			pagination: false,
			autoplay: {
				delay: 1
			},
			
			freeMode: true,
			slidesPerView: 1,
		    slidesPerGroup: 1,			
			spaceBetween: 30,
			speed: 5000,
			
			initialSlide: 3,
			
			breakpoints: {
				600: {
				  slidesPerView: 4,
				},
				
				1280: {
				  slidesPerView: 6,
				},
			},
			  
			  
			
		});		
		
	});
	
});	
	