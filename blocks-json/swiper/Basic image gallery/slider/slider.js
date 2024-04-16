jQuery(function ($) {
	$(document).ready(function(){
		
		var swiper = new Swiper('.img-slider', {
			  
			loop: true,
			navigation: false,
			pagination: false,
			autoplay: {
				delay: 1
			},
			
			slidesPerView: 1,
			speed: 3000,
			slidesPerGroup: 1,
			effect: 'fade',
			  fadeEffect: {
				crossFade: true
			  },
			  
			  
			
		});		
		
	});
	
});	
	