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