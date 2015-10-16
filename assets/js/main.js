var logoSection = $('.logo-image, .logo-text'),
	scrollTop = 0;

var slickProps = {
	dots: false,
	infinite: true,
	slidesToShow: 1,
	speed: 350,
	variableWidth: true,
	autoplaySpeed: 2000,
	autoplay: true
};

function onScroll() {
	scrollTop = $(window).scrollTop();

	// if on the homepage, show the header if scrolled down
	// past zero and show it if scrolled back up to the top
	if(typeof DV.is_homepage !== "undefined" && !!DV.is_homepage) {
		if(scrollTop === 0) {
			$('.header').addClass('header-hidden');
		} else {
			$('.header').removeClass('header-hidden');
		}
	}

	// scrolls the logo down when scrolling down
	if(logoSection.length) {
		if(scrollTop < logoSection.height()) {
			logoSection.css('transform', 'translateY(' + (scrollTop / 2) + 'px)');
		}
	}
}

$(document).ready(function() {

    $('body').removeClass('unloaded');

    var pastEvents = new HideAndShow($('h5.past_events'));

    $('.slider').slick(slickProps);
    
});