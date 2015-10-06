var logoSection = $('.section.logo');

function onScroll() {
	if(logoSection.length) {
		var scrollTop = $(window).scrollTop();
		if(scrollTop < logoSection.height()) {
			logoSection.css('transform', 'translateY(' + (scrollTop / 2) + 'px)');
		}
	}
}

$(document).ready(function() {
    $('body').removeClass('unloaded');
});