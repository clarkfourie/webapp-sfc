window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        alert("Yeah!");
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}

$().ready(function(){
   // "use strict";
	$header = $('.header__fake');

	$(window).scroll(function() {

	    var scroll = $(window).scrollTop();

	    if (scroll > 20) {
	        $header.addClass('animated').removeClass('fix');
	    } else {
	        $header.removeClass('animated').addClass('fix');
	    }
	  
	});
});