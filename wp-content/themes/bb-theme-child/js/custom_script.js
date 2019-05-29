jQuery(document).ready(function( $ ) {
	var slideIndex  = 1,
    sliding     = false;

	$('#fullpage').fullpage({
		//options here
		licenseKey: 'FA8BB31D-D2554F35-AC9CCC50-CA78D1E7',
		autoScrolling:false,
		scrollHorizontally: true,
		controlArrows: true,
		fitToSection: true
		scrollingSpeed:700,
	    css3: true,

	    onLeave: function(index, nextIndex, direction) {

	        if(index == 2 && !sliding) {

	            if(direction == 'down' && slideIndex < 5) {

	                sliding = true;
	                $.fn.fullpage.moveSlideRight();
	                slideIndex++;
	                return false;

	            } else if(direction == 'up' && slideIndex > 1) {

	                sliding = true;
	                $.fn.fullpage.moveSlideLeft();
	                slideIndex--;
	                return false;

	            }

	        } else if(sliding) {

	            return false;

	        }

	    },

	    afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {

	        sliding = false;

	    }

	});

	//methods
	$.fn.fullpage.setAllowScrolling(true);
});
