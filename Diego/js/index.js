$(document).ready(function(){
	var altura = $('.menu-relative').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu-relative').addClass('menu-fixed');
		} else {
			$('.menu-relative').removeClass('menu-fixed');
		}
	});
 
});