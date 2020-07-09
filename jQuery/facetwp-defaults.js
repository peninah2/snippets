	// Add titles/labels to facetwp
	(function($) {
		$(document).on('facetwp-loaded', function() {
			$('.facetwp-facet').each(function() {
				var $facet = $(this);
				var facet_name = $facet.attr('data-name');
				var facet_label = FWP.settings.labels[facet_name];

				if ($facet.closest('.facet-wrap').length < 1) {
					$facet.wrap('<div class="facet-wrap"></div>');
					$facet.before('<h6 class="facet-label">' + facet_label + '</h6>');
				}
			});
		});
	})(jQuery);
	
	// Hide empty facets
	(function($) {
		$(document).on('facetwp-loaded', function() {
			$.each(FWP.settings.num_choices, function(key, val) {
				var $parent = $('.facetwp-facet-' + key).closest('.facet-wrap');
				(0 === val) ? $parent.hide() : $parent.show();
			});
		});
	})(jQuery);
	
	
	// Pagination scrolling
	(function($) {
		$(document).on('facetwp-loaded', function() {
			if (FWP.loaded) {
				$('html, body').animate({
					scrollTop: $('.site-container').offset().top
				}, 500);
			}
		});
	})(jQuery);