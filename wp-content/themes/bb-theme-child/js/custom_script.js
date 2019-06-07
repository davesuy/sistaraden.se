jQuery(document).ready(function( $ ) {

	// Placeholder for subscribe field
  
  	$('#user_login').attr('placeholder', 'E-post');
  	$('#user_pass').attr('placeholder', 'Lösenord');



	// var slideIndex  = 1,
 	//    sliding     = false;
	// $('#fullpage').fullpage({
	// 	//options here
	// 	licenseKey: 'FA8BB31D-D2554F35-AC9CCC50-CA78D1E7',
	// 	autoScrolling:false,
	// 	scrollHorizontally: true,
	// 	controlArrows: true,
	// 	fitToSection: true,
	// 	scrollingSpeed:700,
	//     css3: true,
	//     onLeave: function(index, nextIndex, direction) {

	//         if(index == 2 && !sliding) {

	//             if(direction == 'down' && slideIndex < 5) {

	//                 sliding = true;
	//                 $.fn.fullpage.moveSlideRight();
	//                 slideIndex++;
	//                 return false;

	//             } else if(direction == 'up' && slideIndex > 1) {

	//                 sliding = true;
	//                 $.fn.fullpage.moveSlideLeft();
	//                 slideIndex--;
	//                 return false;

	//             }

	//         } else if(sliding) {

	//             return false;

	//         }

	//     },

	//     afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {

	//         sliding = false;

	//     }

	// });

	//methods
	//$.fn.fullpage.setAllowScrolling(true);

	//***** Mobile Menu ****//
	$( "#sr-mobile-menu .sr-mobile-menu-toggle img" ).click(function() {
      $( "#sr-mobile-menu .sr-mobile-menu-overlay" ).slideToggle("slow");
    });
    
    
    $( "#sr-mobile-menu .sr-mobile-menu-close img" ).click(function() {
      $( "#sr-mobile-menu .sr-mobile-menu-overlay" ).slideToggle( "slow");
    });

});

! function(n) {

    window.fp_scrollHorizontallyExtension = function() {
        var l = this,
            o = n.fn.fullpage.getFullpageData(),
            e = o.options,
            t = o.internals,
            i = "active",
            r = "." + i,
            f = "fp-section",
            a = "." + f,
            c = a + r,
            u = "fp-slide",
            d = "." + u,
            s = d + r;
        l.getScrollSection = function(l, o) {
            var t, i = n(c),
                r = i.find(d).length,
                f = e.scrollHorizontally && r > 1;
            if (f)
                if (t = i.find(s), "down" === l) {
                    if (t.index() + 1 != r) return n.fn.fullpage.moveSlideRight
                } else if (t.index()) return n.fn.fullpage.moveSlideLeft;
            return o
        }, l.c = t.c;
        var p = l["common".charAt(0)];
        return "complete" === document.readyState && p("scrollHorizontally"), n(window).on("load", function() {
            p("scrollHorizontally")
        }), l
    }
}(jQuery);


jQuery(document).ready(function( $ ) {

	'use strict';

  // variables
  var $isAnimatedSecond = $('.second .is-animated'),
      $isAnimatedSecondSingle = $('.second .is-animated__single'),
      $isAnimatedThird = $('.second .right-animated'),
      $isAnimatedThirdSingle = $('.third .is-animated__single'),
      $isAnimatedFourth = $('.fourth .is-animated'),
      $isAnimatedFourthSingle = $('.fourth .is-animated__single'),
      $isAnimatedDown = $('.second .down-animated');

	$('#fullpage').fullpage({
		licenseKey: 'FA8BB31D-D2554F35-AC9CCC50-CA78D1E7',
		sectionsColor: ['#EAF3F5', '#EAF3F5', '#EAF3F5', '#EAF3F5', '#EAF3F5', '#EAF3F5'],
		anchors: ['firstPage', 'secondPage', '3rdPage'],
		menu: '#menu',
		slidesNavigation: true,
	    //hybrid:true,
	    dragAndMove: true,
	    //fitToSection: false,
		scrollHorizontally: true,
		//scrollOverflow: true,
	    //scrollHorizontallyKey: '[]',
		//scrollOverflowKey: '[]',
		normalScrollElements: '#normalScroll',
		autoScrolling: true,
		onSlideLeave: function(section, origin, destination, direction ) {

				// console.log({
				// 	section: section,
				// 	origin: origin,
				// 	destination: destination,
				// 	direction: direction
				// });

			/**
			* use the following condition: 
			*
			*   if( index == 1 && direction == 'down' ) {
			*
			* if you haven't enabled the dot navigation
			* or you aren't interested in the animations that occur 
			* when you jump (using the dot navigation) 
			* from the first section to another sections 
			*/

			//console.log(destination.index);

			// first animation
			if( destination.index == 1) { 

				$isAnimatedSecond.addClass('animated fadeInUpBig'); 
				$isAnimatedSecond.eq(0).css('animation-delay', '.3s');
				$isAnimatedSecond.eq(1).css('animation-delay', '.6s');
				$isAnimatedSecond.eq(2).css('animation-delay', '.9s');
				$isAnimatedSecondSingle.addClass('animated rollIn').css('animation-delay', '1.7s');

				$isAnimatedThird.addClass('animated fadeInRightBig').css('animation-delay', '.3s'); 
				$isAnimatedDown.addClass('animated fadeInDownBig').css('animation-delay', '.3s'); 

			} else {

				$isAnimatedSecond.removeClass('animated fadeInUpBig'); 
				$isAnimatedThird.removeClass('animated fadeInRightBig'); 

				$isAnimatedDown.removeClass('animated fadeInDownBig'); 
			}
			/**
			* use the following condition: 
			*
			*   else if( index == 2 && direction == 'down' ) {
			*
			* if you haven't enabled the dot navigation
			* or you aren't interested in the animations that occur 
			* when you jump (using the dot navigation) from the first section to the third one 
			*/

			// second animation
			// else if( ( index == 1 || index == 2 ) && nextIndex == 3 ) {
			// 	$isAnimatedThird.eq(0).addClass('animated fadeInRightBig').css('animation-delay', '.3s'); 
			// 	$isAnimatedThird.eq(1).addClass('animated fadeInLeftBig').css('animation-delay', '.6s');
			// 	$isAnimatedThirdSingle.addClass('animated bounceInDown').css('animation-delay', '1.2s');
			// }


			/**
			* use the following condition:
			*
			*   else if( index == 3 && direction == 'down' ) {
			*
			* if you haven't enabled the dot navigation
			* or you aren't interested in the animations that occur 
			* when you jump (using the dot navigation) 
			* from the first or second section to the fourth one 
			*/

			// third animation
			// else if( ( index == 1 || index == 2 || index == 3 ) && nextIndex == 4 ) {
			// 	$isAnimatedFourth.addClass('animated zoomIn').css('animation-delay', '.6s');
			// 	$isAnimatedFourthSingle.addClass('animated lightSpeedIn').css('animation-delay', '1.2s');
			// 	$isAnimatedFourthSingle.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			// 	$(this).removeClass('lightSpeedIn').addClass('zoomOutDown');
			// 	});
			// }
		},
		afterSlideLoad: function(section, origin, destination, direction){
	

		},
		onLeave: function(index, nextIndex, direction){
			//alert(1);
			
			//fullpage_api.setAutoScrolling(false);
			//$.fn.fullpage.setAllowScrolling(false);

		
		
			
		},
		afterLoad: function(origin, destination, direction) {

			console.log(destination.index);

			if(destination.index == 1) {

				fullpage_api.setAutoScrolling(false);

			} else if(destination.index == 0) {

				fullpage_api.setAutoScrolling(true);

			}

	

			$(document).scroll(function() {

				var last_section = $('#fullpage').find('.section').last();
				var offset = last_section.offset();
				var w = $(window);

				//if(offset.top - w.scrollTop() > 0) {

					//fullpage_api.setAutoScrolling(true);
					//$.fn.fullpage.setAllowScrolling(true);
				//}
			});
		}

	});

});