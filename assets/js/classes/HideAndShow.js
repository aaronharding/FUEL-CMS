var HideAndShow = (function(){

	function HideAndShow(container, element) {

		if(container.length === 0)
			return;

		this.container = container;
		this.element = typeof element !== "undefined" ? element : this.container.next();

		this.textContainer = this.container.find('[data-replacetext]');
		this.originalText = this.textContainer.html();
		this.replaceText = this.textContainer.attr('data-replacetext');

		this.speedShow = 200;
		this.speedHide = 350;

		this.easingShow = 'cubic-bezier(0.23, 1, 0.32, 1)';
		this.easingHide = 'cubic-bezier(0.23, 1, 0.32, 1)';
		
		this.handleClick = this.handleClick.bind(this);
		this.onShow  = this.onShow.bind(this);
		this.onHide  = this.onHide.bind(this);

		this.container.click(this.handleClick);
	}

	HideAndShow.prototype.handleClick = function(e) {
		e.preventDefault();

		if(this.element.height() === 0) {
			this.onShow();
		} else {
			this.onHide();
		}

		return false;
	};

	HideAndShow.prototype.onShow = function() {

		this.textContainer.html(this.replaceText);

		var to = this.element[0].scrollHeight;

		if(this.element.attr('data-hideandshow') !== 'initialised') {
			Array.prototype.forEach.call(this.element.children(), function(element, index){
				var element = $(element);
				element.css('opacity', 0);
				setTimeout(function(){
					this.transition({
						'opacity': 1
					}, this.speedShow, this.easingShow);
				}.bind(element), (Math.random() * 100) + (index * 100));
			});
			this.element.attr('data-hideandshow', 'initialised');
			this.element.stop().css('height', to);
		} else {
			this.element.stop().css({
				'height': to
			});//, this.speedShow, this.easingShow);
		}

	};

	HideAndShow.prototype.onHide = function() {

		this.textContainer.html(this.originalText);

		this.element.stop().css({
			'height': 0
		}, this.speedHide, this.easingHide);
	};

	return HideAndShow;

})();