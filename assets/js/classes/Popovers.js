var Popovers = (function(){

	function Popovers() {
		this.onHover = this.onHover.bind(this);
		this.create = this.create.bind(this);
		this.shouldStartCountdown = this.shouldStartCountdown.bind(this);
		this.setCountdown = this.setCountdown.bind(this);
		this.clearCountdown = this.clearCountdown.bind(this);
		this.kill = this.kill.bind(this);

		this.window = $(window);
		this.current = null;
		this.currentElement = null;

		this.popover = {};
		this.popover.width = 200;
		this.popover.height = 250;
		this.popover.margin = 10;

		this.outSpeed = 250;

		this.count = null;
		this.upsideDown = false;

		this.mouseListening = false;
		this.currentMousePos = {};
		this.createdMousePos = {};

		$(document).on('mouseenter', '[data-popover]', this.onHover);
		$(document).mousemove(function(e) {
			this.currentMousePos.x = e.pageX;
			this.currentMousePos.y = e.pageY;
		}.bind(this));
	}

	Popovers.prototype.shouldStartCountdown = function(e, ignoreDirection) {

		// will ignore the closing of the pop up if matched against a direction
		if(ignoreDirection) {
			var y = e.offsetY;
			switch(ignoreDirection) {
			case '-y':
				// tests is user is coming out at the bottom by seeing the offset Y against the pop over height (aka -y)
				if(y >= this.popover.height) {
					return false;
				}
				break;
			case 'y':
				// see if user is coming out at the top (aka +y)
				if(y <= 0) {
					return false;
				}
				break;
			}
		}
		return this.setCountdown();
	};

	Popovers.prototype.onHover = function(e) {
		e.preventDefault();
 
		if(
			// checks if the pop up already active is the one wanted to be popped up
			this.current === e.currentTarget
			// checks if the targeted element isn't already inside a popover
			|| $(e.currentTarget).parents('[data-popover]').length
		)
		{
			return false;
		}

		// removes current element
		this.kill(this.currentElement);

		this.current = e.currentTarget;
		this.$current = $(e.currentTarget);

		var data = JSON.parse(this.$current.attr('data-popover'));
		var x = Math.round(this.current.getBoundingClientRect().left) - (this.popover.width / 2) + (this.$current.width() / 2);
		if(e.clientY < this.popover.height + this.popover.margin + 110) {
			this.upsideDown = true;
			var y = Math.round(this.current.getBoundingClientRect().top) + this.window.scrollTop() + this.$current.height() + this.popover.margin;// - this.popover.height - this.popover.margin;
		} else {
			this.upsideDown = false;
			var y = Math.round(this.current.getBoundingClientRect().top) + this.window.scrollTop() - this.popover.height - this.popover.margin;
		}

		this.$current.on('mouseleave', function(e){
			this.shouldStartCountdown(e, this.upsideDown ? '-y' : 'y');
		}.bind(this));
		this.$current.on('mouseenter', function(e){
			this.clearCountdown();
		}.bind(this));

		this.create(e.currentTarget, data, x, y);

		return false;
	};

	Popovers.prototype.create = function(currentTarget, data, x, y) {
		var currentElement = $(document.createElement('div'));
		var url = $(currentTarget).attr('href');

		// binding things
		currentElement.on('mouseleave', function(e){
			this.shouldStartCountdown(e, this.upsideDown ? 'y' : '-y');
		}.bind(this));
		currentElement.on('mouseenter', function(e){
			this.clearCountdown();
		}.bind(this));

		// view things
		currentElement.addClass('popover');
		currentElement.css({
			left: x,
			top: y
		});
		
		// currentElement.append( $(document.createElement('div')).addClass('popover-close').on('click', this.kill) );
		
		currentElement.append( $(document.createElement('a')).addClass('popover-image').css({
			'background-image': data.image ? 'url(' + data.image + ')' : '#DBF2F7'
		}).attr('href', url) );

		if(data.name)
			currentElement.append( $(document.createElement('h6')).html(data.name) );

		var bodyHolder = $(document.createElement('div')).addClass('popover-body');

		if(data.text)
			bodyHolder.append($(document.createElement('p')).html(data.text));

		if(typeof data.data === "object" && data.data.length) {
			var dataHolder = $(document.createElement('ul'));
			data.data.forEach(function(d){
				dataHolder.append( $(document.createElement('li')).html(d.title) );
			});
			bodyHolder.append(dataHolder);
		}

		currentElement.append(bodyHolder);

		$('body').append(currentElement);
		setTimeout(function(){
			currentElement.addClass('popover-in');
		}.bind(this), 32);

		this.currentElement = currentElement;
	};

	Popovers.prototype.setCountdown = function() {
		if(this.count === null) {
			this.count = setTimeout(function(){
				this.kill(this.currentElement);
			}.bind(this), 150);
		}
	};

	Popovers.prototype.clearCountdown = function(e) {
		if(this.count) {
			clearTimeout(this.count);
		}
		this.count = null;
	};

	Popovers.prototype.kill = function(elementToKill) {

		this.clearCountdown();

		if(elementToKill && elementToKill !== null) {
			elementToKill.stop().unbind().fadeOut(this.outSpeed, function(){
				$(this).unbind().remove();
			});
		}

		if(this.$current && this.$current !== null) {
			this.$current.unbind();
		}

		this.mouseListening = false;
		this.current = null;
		this.$current = null;
		this.currentElement = null;
	};

	return new Popovers;

})();