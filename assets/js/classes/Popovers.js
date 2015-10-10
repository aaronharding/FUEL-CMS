var Popovers = (function(){

	function Popovers() {
		this.onHover = this.onHover.bind(this);
		this.create = this.create.bind(this);
		this.setCountdown = this.setCountdown.bind(this);
		this.clearCountdown = this.clearCountdown.bind(this);
		this.mouseListen = this.mouseListen.bind(this);
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

	Popovers.prototype.onHover = function(e) {
		e.preventDefault();

		if(this.current === e.currentTarget) {
			return false;
		}

		// kill the current opened one
		this.kill(this.currentElement);

		this.current = e.currentTarget;
		this.$current = $(e.currentTarget);

		if(e.clientY < this.popover.height + this.popover.margin + 110) {
			this.upsideDown = true;
			var y = Math.round(this.current.getBoundingClientRect().top) + this.window.scrollTop() + this.$current.height() + this.popover.margin;// - this.popover.height - this.popover.margin;
		} else {
			this.upsideDown = false;
			var y = Math.round(this.current.getBoundingClientRect().top) + this.window.scrollTop() - this.popover.height - this.popover.margin;
		}

		this.create(
			e.currentTarget,
			JSON.parse(this.$current.attr('data-popover')),
			Math.round(this.current.getBoundingClientRect().left) - (this.popover.width / 2) + (this.$current.width() / 2),
			y
		);

		this.createdMousePos = {
			x: e.pageX,
			y: e.pageY
		}
		this.mouseListen();

		return false;
	};

	Popovers.prototype.create = function(currentTarget, data, x, y) {
		var element = $(document.createElement('div'));
		var url = $(currentTarget).attr('href');

		element.addClass('popover');
		element.css({
			left: x,
			top: y
		});

		element.on('mouseleave', function(){
			if(this.count === null) {
				this.setCountdown(0);
			}
		}.bind(this));
		element.on('mouseenter', this.clearCountdown);
		this.$current.on('mouseenter', this.clearCountdown);
		
		// element.append( $(document.createElement('div')).addClass('popover-close').on('click', this.kill) );
		
		element.append( $(document.createElement('a')).addClass('popover-image').css({
			'background-image': data.image ? 'url(' + data.image + ')' : '#DBF2F7'
		}).attr('href', url) );

		if(data.name)
			element.append( $(document.createElement('h6')).html(data.name) );

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

		element.append(bodyHolder);

		$('body').append(element);
		setTimeout(function(){
			element.addClass('popover-in');
		}.bind(this), 32);

		this.currentElement = element;
	};

	Popovers.prototype.mouseListen = function() {
		this.mouseListening = true;
		requestAnimationFrame(function mouseListenStep(){
			if(this.mouseListening && this.count === null) {
				if(this.createdMousePos.x 		 - this.currentMousePos.x >  this.popover.width) {
					this.setCountdown(1);
				} else if(this.currentMousePos.x - this.createdMousePos.x >  this.popover.width) {
					this.setCountdown(2);
				} else if(!this.upsideDown && this.currentMousePos.y - this.createdMousePos.y > this.popover.margin) {
					this.setCountdown(3);
				} else if(this.upsideDown && this.createdMousePos.y - this.currentMousePos.y > this.popover.margin) {
					this.setCountdown(4);
				}
				requestAnimationFrame(mouseListenStep.bind(this));
			}
		}.bind(this));
	};

	Popovers.prototype.setCountdown = function(calledfrom) {

		// checks if the user is coming out from the top or bottom
		if(calledfrom.offsetY) {
			if(!this.upsideDown && calledfrom.offsetY >= this.popover.height)
				return;
			else if(this.upsideDown && calledfrom.offsetY < 0)
				return;
		}

		if(this.count === null) {
			this.count = setTimeout(function(){
				this.kill(this.currentElement);
			}.bind(this), 150);
		}
	};

	Popovers.prototype.clearCountdown = function() {
		if(this.count)
			clearTimeout(this.count);
		this.count = null;
	};

	Popovers.prototype.kill = function(element) {

		this.clearCountdown();

		if(element && element !== null) {
			element.stop().unbind().fadeOut(this.outSpeed, function(){
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