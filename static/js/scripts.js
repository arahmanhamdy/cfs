/**/
$(document).ready(function() {
	$("html").niceScroll({
		cursorcolor: "#ffc20e",
		cursorfixedheight:40,
		zindex:2000000,
		background:"rgba(10,10,10,.5)",
		cursorborder:"0px solid #ffc20e"
	});
	//$('html').niceScroll();//for scrolling 
	$('.carousel').carousel({
		//slidershow
		interval: 3000
	})
});

/*Loading=====================*/
$(window).load(function() {
	$('body').css("overflow", "auto");
	$('.loading .loading-wrapper').fadeOut(4000, function() {
		$(this).parent().fadeOut(1000, function() {
			$(this).remove();
		})
	});
});