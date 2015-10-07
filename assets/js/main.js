var logoSection = $('.section.logo'),
	scrollTop = 0;

function onScroll() {
	scrollTop = $(window).scrollTop();
	if(typeof DV.is_homepage !== "undefined" && !!DV.is_homepage) {
		if(scrollTop === 0) {
			$('.header').addClass('header-hidden');
		} else {
			$('.header').removeClass('header-hidden');
		}
	}
	if(logoSection.length) {
		if(scrollTop < logoSection.height()) {
			logoSection.css('transform', 'translateY(' + (scrollTop / 2) + 'px)');
		}
	}
}

$(document).ready(function() {
    $('body').removeClass('unloaded');
});