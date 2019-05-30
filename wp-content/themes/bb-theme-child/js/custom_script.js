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



$('#fullpage').fullpage({
	licenseKey: 'FA8BB31D-D2554F35-AC9CCC50-CA78D1E7',
	sectionsColor: ['#ff73a1', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff', '#ccc'],
	anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage'],
	menu: '#menu',
	slidesNavigation: true,
    hybrid:true,
    fitToSection: false,
	scrollHorizontally: true,
	scrollOverflow: true,
    scrollHorizontallyKey: '[]',
	scrollOverflowKey: '[]',
	afterSlideLoad: function(section, origin, destination, direction){
			console.log({
				section: section,
				origin: origin,
				destination: destination,
				direction: direction
			});
	},
	onSlideLeave: function(section, origin, destination, direction){
			console.log({
				section: section,
				origin: origin,
				destination: destination,
				direction: direction
			});
	}
	
});