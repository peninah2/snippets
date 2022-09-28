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