

// IN JS:

// Stick header to top on scroll
	function headerFixed() {
		
        var windowTop = $(window).scrollTop();
        var top = $('#header-top').offset().top;
		
        if(windowTop > top) {
 
			$('.site-header').addClass('scroll');
			$('#header-top').height( $('.site-header').outerHeight() );
        
		} else {
			
			$('.site-header').removeClass('scroll');
			$('#header-top').height(0);
			
        }
      }
	  
      $(function() {
        $(window).scroll(headerFixed);
        headerFixed();
      });
	  
	  
// IN PHP:
add_action( 'genesis_before_header', 'hct_sticky_header');
function hct_sticky_header() {
	echo '<div id="header-top"></div>';
}