function onScroll(){scrollTop=$(window).scrollTop(),"undefined"!=typeof DV.is_homepage&&DV.is_homepage&&(0===scrollTop?$(".header").addClass("header-hidden"):$(".header").removeClass("header-hidden")),
logoSection.length&&scrollTop<logoSection.height()&&logoSection.css("transform","translateY("+scrollTop/2+"px)");
}var logoSection=$(".section.logo"),scrollTop=0;$(document).ready(function(){$("body").removeClass("unloaded");
new HideAndShow($("h5.past_events"))});
function rafCheck(){current=$(window).scrollTop(),scroll&&(onScroll(),prev=current,
scroll=!1),requestAnimationFrame(rafCheck)}var hasPerformance=!(!window.performance||!window.performance.now);
if(!hasPerformance){var rAF=window.requestAnimationFrame,startTime=+new Date;window.requestAnimationFrame=function(r,n){
var e=function(n){var e=1e12>n?n:n-startTime;return r(e)};rAF(e,n)}}var scroll=!1;
$(document).ready(function(){requestAnimationFrame(rafCheck),scroll=!0}),$(window).on("scroll",function(){
scroll=!0});
var HideAndShow=function(){function t(t,i){0!==t.length&&(this.container=t,this.element="undefined"!=typeof i?i:this.container.next(),
this.textContainer=this.container.find("[data-replacetext]"),this.originalText=this.textContainer.html(),
this.replaceText=this.textContainer.attr("data-replacetext"),this.speedShow=200,this.speedHide=350,
this.easingShow="cubic-bezier(0.23, 1, 0.32, 1)",this.easingHide="cubic-bezier(0.23, 1, 0.32, 1)",
this.handleClick=this.handleClick.bind(this),this.onShow=this.onShow.bind(this),this.onHide=this.onHide.bind(this),
this.container.click(this.handleClick))}return t.prototype.handleClick=function(t){
return t.preventDefault(),0===this.element.height()?this.onShow():this.onHide(),!1;
},t.prototype.onShow=function(){this.textContainer.html(this.replaceText);var t=this.element[0].scrollHeight;
"initialised"!==this.element.attr("data-hideandshow")?(Array.prototype.forEach.call(this.element.children(),function(t,i){
var t=$(t);t.css("opacity",0),setTimeout(function(){this.transition({opacity:1},this.speedShow,this.easingShow);
}.bind(t),100*Math.random()+100*i)}),this.element.attr("data-hideandshow","initialised"),
this.element.stop().css("height",t)):this.element.stop().css({height:t})},t.prototype.onHide=function(){
this.textContainer.html(this.originalText),this.element.stop().css({height:0},this.speedHide,this.easingHide);
},t}();
var Popovers=function(){function t(){this.onHover=this.onHover.bind(this),this.create=this.create.bind(this),
this.shouldStartCountdown=this.shouldStartCountdown.bind(this),this.setCountdown=this.setCountdown.bind(this),
this.clearCountdown=this.clearCountdown.bind(this),this.kill=this.kill.bind(this),
this.window=$(window),this.current=null,this.currentElement=null,this.popover={},
this.popover.width=200,this.popover.height=250,this.popover.margin=10,this.outSpeed=250,
this.count=null,this.upsideDown=!1,this.mouseListening=!1,this.currentMousePos={},
this.createdMousePos={},$(document).on("mouseenter","[data-popover]",this.onHover),
$(document).mousemove(function(t){this.currentMousePos.x=t.pageX,this.currentMousePos.y=t.pageY;
}.bind(this))}return t.prototype.shouldStartCountdown=function(t,e){if(e){var n=t.offsetY;
switch(e){case"-y":if(n>=this.popover.height)return!1;break;case"y":if(0>=n)return!1;
}}return this.setCountdown()},t.prototype.onHover=function(t){if(t.preventDefault(),
this.current===t.currentTarget||$(t.currentTarget).parents("[data-popover]").length)return!1;
this.kill(this.currentElement),this.current=t.currentTarget,this.$current=$(t.currentTarget);
var e=JSON.parse(this.$current.attr("data-popover")),n=Math.round(this.current.getBoundingClientRect().left)-this.popover.width/2+this.$current.width()/2;
if(t.clientY<this.popover.height+this.popover.margin+110){this.upsideDown=!0;var o=Math.round(this.current.getBoundingClientRect().top)+this.window.scrollTop()+this.$current.height()+this.popover.margin;
}else{this.upsideDown=!1;var o=Math.round(this.current.getBoundingClientRect().top)+this.window.scrollTop()-this.popover.height-this.popover.margin;
}return this.$current.on("mouseleave",function(t){this.shouldStartCountdown(t,this.upsideDown?"-y":"y");
}.bind(this)),this.$current.on("mouseenter",function(t){this.clearCountdown()}.bind(this)),
this.create(t.currentTarget,e,n,o),!1},t.prototype.create=function(t,e,n,o){var i=$(document.createElement("div")),r=$(t).attr("href");
i.on("mouseleave",function(t){this.shouldStartCountdown(t,this.upsideDown?"y":"-y");
}.bind(this)),i.on("mouseenter",function(t){this.clearCountdown()}.bind(this)),i.addClass("popover"),
i.css({left:n,top:o}),i.append($(document.createElement("a")).addClass("popover-image").css({
"background-image":e.image?"url("+e.image+")":"#DBF2F7"}).attr("href",r)),e.name&&i.append($(document.createElement("h6")).html(e.name));
var s=$(document.createElement("div")).addClass("popover-body");if(e.text&&s.append($(document.createElement("p")).html(e.text)),
"object"==typeof e.data&&e.data.length){var u=$(document.createElement("ul"));e.data.forEach(function(t){
u.append($(document.createElement("li")).html(t.title))}),s.append(u)}i.append(s),
$("body").append(i),setTimeout(function(){i.addClass("popover-in")}.bind(this),32),
this.currentElement=i},t.prototype.setCountdown=function(){null===this.count&&(this.count=setTimeout(function(){
this.kill(this.currentElement)}.bind(this),150))},t.prototype.clearCountdown=function(t){
this.count&&clearTimeout(this.count),this.count=null},t.prototype.kill=function(t){
this.clearCountdown(),t&&null!==t&&t.stop().unbind().fadeOut(this.outSpeed,function(){
$(this).unbind().remove()}),this.$current&&null!==this.$current&&this.$current.unbind(),
this.mouseListening=!1,this.current=null,this.$current=null,this.currentElement=null;
},new t}();
!function(t,e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e(require("jquery")):e(t.jQuery);
}(this,function(t){function e(t){if(t in p.style)return t;for(var e=["Moz","Webkit","O","ms"],n=t.charAt(0).toUpperCase()+t.substr(1),i=0;i<e.length;++i){
var r=e[i]+n;if(r in p.style)return r}}function n(){return p.style[d.transform]="",
p.style[d.transform]="rotateY(90deg)",""!==p.style[d.transform]}function i(t){return"string"==typeof t&&this.parse(t),
this}function r(t,e,n){e===!0?t.queue(n):e?t.queue(e,n):t.each(function(){n.call(this);
})}function s(e){var n=[];return t.each(e,function(e){e=t.camelCase(e),e=t.transit.propertyMap[e]||t.cssProps[e]||e,
e=u(e),d[e]&&(e=u(d[e])),-1===t.inArray(e,n)&&n.push(e)}),n}function a(e,n,i,r){var a=s(e);
t.cssEase[i]&&(i=t.cssEase[i]);var o=""+f(n)+" "+i;parseInt(r,10)>0&&(o+=" "+f(r));
var u=[];return t.each(a,function(t,e){u.push(e+" "+o)}),u.join(", ")}function o(e,n){
n||(t.cssNumber[e]=!0),t.transit.propertyMap[e]=d.transform,t.cssHooks[e]={get:function(n){
var i=t(n).css("transit:transform");return i.get(e)},set:function(n,i){var r=t(n).css("transit:transform");
r.setFromString(e,i),t(n).css({"transit:transform":r})}}}function u(t){return t.replace(/([A-Z])/g,function(t){
return"-"+t.toLowerCase()})}function c(t,e){return"string"!=typeof t||t.match(/^[\-0-9\.]+$/)?""+t+e:t;
}function f(e){var n=e;return"string"!=typeof n||n.match(/^[\-0-9\.]+/)||(n=t.fx.speeds[n]||t.fx.speeds._default),
c(n,"ms")}t.transit={version:"0.9.12",propertyMap:{marginLeft:"margin",marginRight:"margin",
marginBottom:"margin",marginTop:"margin",paddingLeft:"padding",paddingRight:"padding",
paddingBottom:"padding",paddingTop:"padding"},enabled:!0,useTransitionEnd:!1};var p=document.createElement("div"),d={},l=navigator.userAgent.toLowerCase().indexOf("chrome")>-1;
d.transition=e("transition"),d.transitionDelay=e("transitionDelay"),d.transform=e("transform"),
d.transformOrigin=e("transformOrigin"),d.filter=e("Filter"),d.transform3d=n();var h={
transition:"transitionend",MozTransition:"transitionend",OTransition:"oTransitionEnd",
WebkitTransition:"webkitTransitionEnd",msTransition:"MSTransitionEnd"},b=d.transitionEnd=h[d.transition]||null;
for(var y in d)d.hasOwnProperty(y)&&"undefined"==typeof t.support[y]&&(t.support[y]=d[y]);
return p=null,t.cssEase={_default:"ease","in":"ease-in",out:"ease-out","in-out":"ease-in-out",
snap:"cubic-bezier(0,1,.5,1)",easeInCubic:"cubic-bezier(.550,.055,.675,.190)",easeOutCubic:"cubic-bezier(.215,.61,.355,1)",
easeInOutCubic:"cubic-bezier(.645,.045,.355,1)",easeInCirc:"cubic-bezier(.6,.04,.98,.335)",
easeOutCirc:"cubic-bezier(.075,.82,.165,1)",easeInOutCirc:"cubic-bezier(.785,.135,.15,.86)",
easeInExpo:"cubic-bezier(.95,.05,.795,.035)",easeOutExpo:"cubic-bezier(.19,1,.22,1)",
easeInOutExpo:"cubic-bezier(1,0,0,1)",easeInQuad:"cubic-bezier(.55,.085,.68,.53)",
easeOutQuad:"cubic-bezier(.25,.46,.45,.94)",easeInOutQuad:"cubic-bezier(.455,.03,.515,.955)",
easeInQuart:"cubic-bezier(.895,.03,.685,.22)",easeOutQuart:"cubic-bezier(.165,.84,.44,1)",
easeInOutQuart:"cubic-bezier(.77,0,.175,1)",easeInQuint:"cubic-bezier(.755,.05,.855,.06)",
easeOutQuint:"cubic-bezier(.23,1,.32,1)",easeInOutQuint:"cubic-bezier(.86,0,.07,1)",
easeInSine:"cubic-bezier(.47,0,.745,.715)",easeOutSine:"cubic-bezier(.39,.575,.565,1)",
easeInOutSine:"cubic-bezier(.445,.05,.55,.95)",easeInBack:"cubic-bezier(.6,-.28,.735,.045)",
easeOutBack:"cubic-bezier(.175, .885,.32,1.275)",easeInOutBack:"cubic-bezier(.68,-.55,.265,1.55)"
},t.cssHooks["transit:transform"]={get:function(e){return t(e).data("transform")||new i;
},set:function(e,n){var r=n;r instanceof i||(r=new i(r)),"WebkitTransform"!==d.transform||l?e.style[d.transform]=r.toString():e.style[d.transform]=r.toString(!0),
t(e).data("transform",r)}},t.cssHooks.transform={set:t.cssHooks["transit:transform"].set
},t.cssHooks.filter={get:function(t){return t.style[d.filter]},set:function(t,e){
t.style[d.filter]=e}},t.fn.jquery<"1.8"&&(t.cssHooks.transformOrigin={get:function(t){
return t.style[d.transformOrigin]},set:function(t,e){t.style[d.transformOrigin]=e;
}},t.cssHooks.transition={get:function(t){return t.style[d.transition]},set:function(t,e){
t.style[d.transition]=e}}),o("scale"),o("scaleX"),o("scaleY"),o("translate"),o("rotate"),
o("rotateX"),o("rotateY"),o("rotate3d"),o("perspective"),o("skewX"),o("skewY"),o("x",!0),
o("y",!0),i.prototype={setFromString:function(t,e){var n="string"==typeof e?e.split(","):e.constructor===Array?e:[e];
n.unshift(t),i.prototype.set.apply(this,n)},set:function(t){var e=Array.prototype.slice.apply(arguments,[1]);
this.setter[t]?this.setter[t].apply(this,e):this[t]=e.join(",")},get:function(t){
return this.getter[t]?this.getter[t].apply(this):this[t]||0},setter:{rotate:function(t){
this.rotate=c(t,"deg")},rotateX:function(t){this.rotateX=c(t,"deg")},rotateY:function(t){
this.rotateY=c(t,"deg")},scale:function(t,e){void 0===e&&(e=t),this.scale=t+","+e;
},skewX:function(t){this.skewX=c(t,"deg")},skewY:function(t){this.skewY=c(t,"deg");
},perspective:function(t){this.perspective=c(t,"px")},x:function(t){this.set("translate",t,null);
},y:function(t){this.set("translate",null,t)},translate:function(t,e){void 0===this._translateX&&(this._translateX=0),
void 0===this._translateY&&(this._translateY=0),null!==t&&void 0!==t&&(this._translateX=c(t,"px")),
null!==e&&void 0!==e&&(this._translateY=c(e,"px")),this.translate=this._translateX+","+this._translateY;
}},getter:{x:function(){return this._translateX||0},y:function(){return this._translateY||0;
},scale:function(){var t=(this.scale||"1,1").split(",");return t[0]&&(t[0]=parseFloat(t[0])),
t[1]&&(t[1]=parseFloat(t[1])),t[0]===t[1]?t[0]:t},rotate3d:function(){for(var t=(this.rotate3d||"0,0,0,0deg").split(","),e=0;3>=e;++e)t[e]&&(t[e]=parseFloat(t[e]));
return t[3]&&(t[3]=c(t[3],"deg")),t}},parse:function(t){var e=this;t.replace(/([a-zA-Z0-9]+)\((.*?)\)/g,function(t,n,i){
e.setFromString(n,i)})},toString:function(t){var e=[];for(var n in this)if(this.hasOwnProperty(n)){
if(!d.transform3d&&("rotateX"===n||"rotateY"===n||"perspective"===n||"transformOrigin"===n))continue;
"_"!==n[0]&&(t&&"scale"===n?e.push(n+"3d("+this[n]+",1)"):t&&"translate"===n?e.push(n+"3d("+this[n]+",0)"):e.push(n+"("+this[n]+")"));
}return e.join(" ")}},t.fn.transition=t.fn.transit=function(e,n,i,s){var o=this,u=0,c=!0,p=t.extend(!0,{},e);
"function"==typeof n&&(s=n,n=void 0),"object"==typeof n&&(i=n.easing,u=n.delay||0,
c="undefined"==typeof n.queue?!0:n.queue,s=n.complete,n=n.duration),"function"==typeof i&&(s=i,
i=void 0),"undefined"!=typeof p.easing&&(i=p.easing,delete p.easing),"undefined"!=typeof p.duration&&(n=p.duration,
delete p.duration),"undefined"!=typeof p.complete&&(s=p.complete,delete p.complete),
"undefined"!=typeof p.queue&&(c=p.queue,delete p.queue),"undefined"!=typeof p.delay&&(u=p.delay,
delete p.delay),"undefined"==typeof n&&(n=t.fx.speeds._default),"undefined"==typeof i&&(i=t.cssEase._default),
n=f(n);var l=a(p,n,i,u),h=t.transit.enabled&&d.transition,y=h?parseInt(n,10)+parseInt(u,10):0;
if(0===y){var g=function(t){o.css(p),s&&s.apply(o),t&&t()};return r(o,c,g),o}var m={},v=function(e){
var n=!1,i=function(){n&&o.unbind(b,i),y>0&&o.each(function(){this.style[d.transition]=m[this]||null;
}),"function"==typeof s&&s.apply(o),"function"==typeof e&&e()};y>0&&b&&t.transit.useTransitionEnd?(n=!0,
o.bind(b,i)):window.setTimeout(i,y),o.each(function(){y>0&&(this.style[d.transition]=l),
t(this).css(p)})},z=function(t){this.offsetWidth,v(t)};return r(o,c,z),this},t.transit.getTransitionValue=a,
t});