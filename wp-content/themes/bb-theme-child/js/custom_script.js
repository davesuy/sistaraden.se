jQuery(document).ready(function( $ ) {
	/* Sticky Mobile Header */
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('#sr-mobile-menu').outerHeight();

        $(window).scroll(function(){
            didScroll = true;
        });

    function hasScrolled() {
    var st = $(this).scrollTop();

            // Make scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta) {
                return;
            }

            // If scrolled down and past the navbar, add class .nav-up.
            if (st > lastScrollTop && st > navbarHeight) {
                $('#sr-mobile-menu').removeClass('nav-down').addClass('nav-up');
            } else {
                if(st + $(window).height() < $(document).height()) {
                    $('#sr-mobile-menu').removeClass('nav-up').addClass('nav-down');
                }
            }
            lastScrollTop = st;
        }

    	setInterval(function() {
    	    if (didScroll) {
    	        hasScrolled();
    	        didScroll = false;
    	    }
    	}, 250);

    /* End Sticky Mobile Header */

	/* Grid Animate */
    	var boxWidth = $('.esg-grid .mainul li.eg-sistaraden-wrapper .eg-sistaraden-element-0-a a').width();

    	$('.esg-grid .mainul li.eg-sistaraden-wrapper').mouseenter(function(){
    		$(this).find('.eg-sistaraden-element-0-a a').animate({
    			width: '220'
    		},'fast');
    	}).mouseleave(function(){
    		$(this).find('.eg-sistaraden-element-0-a a').animate({
    			width: boxWidth + 3
    		}, 'fast');
    	});
    /* End Grid Animate */

    // var boxWidth = $('.esg-grid .mainul li.eg-landing-page-sistaraden-wrapper .eg-landing-page-sistaraden-element-0-a a').width();

    // $('.esg-grid .mainul li.eg-landing-page-sistaraden-wrapper').mouseenter(function(){
    //     $(this).find('.eg-landing-page-sistaraden-element-0-a a').animate({
    //         width: "220"
    //     },'fast');
    // }).mouseleave(function(){
    //     $(this).find('.eg-landing-page-sistaraden-element-0-a a').animate({
    //         width: boxWidth + 3
    //     }, 'fast');
    // });

	// Placeholder for subscribe field
  	// $('#user_login').attr('placeholder', 'E-post');
  	// $('#user_pass').attr('placeholder', 'Lösenord');

    $('body').on('focus', '#loginform input:not([type="checkbox"]):not([type="submit"])', function() {
        $(this).parents('p').addClass('focused');
    });

    $('body').on('blur', '#loginform input:not([type="checkbox"]):not([type="submit"])', function() {
        var inputValue = $(this).val();
        if ( inputValue === '' ) {
            $(this).removeClass('filled');
            $(this).parents('p').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });

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

	//         if(index === 2 && !sliding) {
	//             if(direction === 'down' && slideIndex < 5) {
	//                 sliding = true;
	//                 $.fn.fullpage.moveSlideRight();
	//                 slideIndex++;
	//                 return false;

	//             } else if(direction === 'up' && slideIndex > 1) {

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

	/* Mobile Menu */
    	$( '#sr-mobile-menu .sr-mobile-menu-toggle img' ).click(function() {
          $( '#sr-mobile-menu .sr-mobile-menu-overlay' ).slideToggle('slow');
          //$("#sr-mobile-menu").css('position', 'relative');
        });


        $( '#sr-mobile-menu .sr-mobile-menu-close img' ).click(function() {
          $( '#sr-mobile-menu .sr-mobile-menu-overlay' ).slideToggle('slow');
           //$("#sr-mobile-menu").css('position', 'fixed');
        });

        $( '#sr-mobile-menu .sr-mobile-menu-close .bg-close_hamburger' ).click(function() {
          $( '#sr-mobile-menu .sr-mobile-menu-overlay' ).slideToggle('slow');
           //$("#sr-mobile-menu").css('position', 'fixed');
        });
    /* End Mobile Menu */


    /* Coookie Consent Banner */
    	$('body').on('click', '#cookie-consent-banner .cookieconsent .buttons .no-btn', function() {
            $('#cookie-consent-banner').hide();
        });

        function setLocalCookie(cname, cvalue, days) {
            var date = new Date();
            // Default at 365 days.
            days = days || 365;

            // Get unix milliseconds at current time plus number of days
            date.setTime(+ date + (days * 86400000)); //24 * 60 * 60 * 1000

            window.document.cookie = cname + '=' + cvalue + '; expires=' + date.toGMTString() + '; path=/';
        }

        $('body').on('click', '#cookie-consent-banner .cookieconsent .buttons .yes-btn', function() {
            setLocalCookie('username','newuser',3);
            $('#cookie-consent-banner').hide();
        });
    /* End Coookie Consent Banner */

    (function($){
        function clickColumn() {
            $('.click-col').css('cursor', 'pointer');
            $('.click-col').on('click', function(){
                $(this).find('a')[0].click();
            });

            $('.click-col a').on('click', function(event){
                event.stopPropagation();
            });
        }

        $(function() {
        	clickColumn();
        });

        /*
        * Make a BeaverBuilder Column clickable.
        * There must be a link tag in the column element.
        * Add the CSS class .click-col in the Column Settins Advanced Tab CSS value
        */
    })(jQuery);
});


// Scroll Horizontal Extension

// ! function(n) {

//     window.fp_scrollHorizontallyExtension = function() {
//         var l = this,
//             o = n.fn.fullpage.getFullpageData(),
//             e = o.options,
//             t = o.internals,
//             i = "active",
//             r = "." + i,
//             f = "fp-section",
//             a = "." + f,
//             c = a + r,
//             u = "fp-slide",
//             d = "." + u,
//             s = d + r;
//         l.getScrollSection = function(l, o) {
//             var t, i = n(c),
//                 r = i.find(d).length,
//                 f = e.scrollHorizontally && r > 1;
//             if (f)
//                 if (t = i.find(s), "down" === l) {
//                     if (t.index() + 1 != r) return n.fn.fullpage.moveSlideRight
//                 } else if (t.index()) return n.fn.fullpage.moveSlideLeft;
//             return o
//         }, l.c = t.c;
//         var p = l["common".charAt(0)];
//         return "complete" === document.readyState && p("scrollHorizontally"), n(window).on("load", function() {
//             p("scrollHorizontally")
//         }), l
//     }
// }(jQuery);


jQuery(document).ready(function( $ ) {
	'use strict';

    // variables
    var $isAnimatedSecond = $('.second .is-animated');
    var $isAnimatedSecondSingle = $('.second .is-animated__single');
    var $isAnimatedThird = $('.second .right-animated');
    // var $isAnimatedThirdSingle = $('.third .is-animated__single');
    // var $isAnimatedFourth = $('.fourth .is-animated');
    // var $isAnimatedFourthSingle = $('.fourth .is-animated__single');
    var $isAnimatedDown = $('.second .down-animated');

	$('#fullpage').fullpage({
		licenseKey: 'FA8BB31D-D2554F35-AC9CCC50-CA78D1E7',
		sectionsColor: ['#EAF3F5', '#EAF3F5', '#EAF3F5', '#EAF3F5', '#EAF3F5', '#EAF3F5'],
		anchors: ['firstPage', 'secondPage', '3rdPage'],
		menu: '#menu',
		slidesNavigation: true,
	    //hybrid:true,
	    dragAndMove: false,
	    //fitToSection: false,
		scrollHorizontally: false,
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
			*   if( index === 1 && direction === 'down' ) {
			*
			* if you haven't enabled the dot navigation
			* or you aren't interested in the animations that occur
			* when you jump (using the dot navigation)
			* from the first section to another sections
			*/

			//console.log(destination.index);

			// first animation
			if( destination.index === 1) {

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
			*   else if( index === 2 && direction === 'down' ) {
			*
			* if you haven't enabled the dot navigation
			* or you aren't interested in the animations that occur
			* when you jump (using the dot navigation) from the first section to the third one
			*/

			// second animation
			// else if( ( index === 1 || index === 2 ) && nextIndex === 3 ) {
			// 	$isAnimatedThird.eq(0).addClass('animated fadeInRightBig').css('animation-delay', '.3s');
			// 	$isAnimatedThird.eq(1).addClass('animated fadeInLeftBig').css('animation-delay', '.6s');
			// 	$isAnimatedThirdSingle.addClass('animated bounceInDown').css('animation-delay', '1.2s');
			// }


			/**
			* use the following condition:
			*
			*   else if( index === 3 && direction === 'down' ) {
			*
			* if you haven't enabled the dot navigation
			* or you aren't interested in the animations that occur
			* when you jump (using the dot navigation)
			* from the first or second section to the fourth one
			*/

			// third animation
			// else if( ( index === 1 || index === 2 || index === 3 ) && nextIndex === 4 ) {
			// 	$isAnimatedFourth.addClass('animated zoomIn').css('animation-delay', '.6s');
			// 	$isAnimatedFourthSingle.addClass('animated lightSpeedIn').css('animation-delay', '1.2s');
			// 	$isAnimatedFourthSingle.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			// 	$(this).removeClass('lightSpeedIn').addClass('zoomOutDown');
			// 	});
			// }
		},
		afterSlideLoad: function(/*section,*/ origin, destination, direction){
		},
		onLeave: function(/*index,*/ nextIndex, direction){
			//fullpage_api.setAutoScrolling(false);
			//$.fn.fullpage.setAllowScrolling(false);
		},
		afterLoad: function(origin, destination, /*direction*/) {
			if(destination.index === 1) {
				fullpage_api.setAutoScrolling(false);
			} else if(destination.index === 0) {
				fullpage_api.setAutoScrolling(true);
			}

			$(document).scroll(function() {
				var last_section = $('#fullpage').find('.section').last();
				// var offset = last_section.offset();
				// var w = $(window);

				//if(offset.top - w.scrollTop() > 0) {
					//fullpage_api.setAutoScrolling(true);
					//$.fn.fullpage.setAllowScrolling(true);
				//}
			});
		}
	});
});
