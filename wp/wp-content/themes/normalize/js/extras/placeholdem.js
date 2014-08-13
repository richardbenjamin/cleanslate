/**
 * Placeholdem - Placeholder Caret Animation
 * v1.0.1 - MIT License
 * http://placeholdem.jackrugile.com - git://github.com/jackrugile/placeholdem.git
 * by Jack Rugile - @jackrugile
 */

function Placeholdem(e){"use strict";!function(){for(var e=0,n=["ms","moz","webkit","o"],a=0;a<n.length&&!window.requestAnimationFrame;++a)window.requestAnimationFrame=window[n[a]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[n[a]+"CancelAnimationFrame"]||window[n[a]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(n){var a=(new Date).getTime(),i=Math.max(0,16-(a-e)),l=window.setTimeout(function(){n(a+i)},i);return e=a+i,l}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(e){clearTimeout(e)})}();var n={};return n.init=function(){if(n.elems=[],e&&e.length)for(var a=0;a<e.length;a++)n.hasPlaceholder(e[a])&&n.elems.push(new n.PlaceholdemElem(e[a]));else e&&n.hasPlaceholder(e)&&n.elems.push(new n.PlaceholdemElem(e))},n.hasPlaceholder=function(e){return"function"==typeof e.hasAttribute&&e.hasAttribute("placeholder")},n.PlaceholdemElem=function(e){var n=this;n.init=function(){n.elem=e,n.placeholder=n.elem.getAttribute("placeholder"),n.elem.removeAttribute("placeholder"),n.rAF=null,n.animating=0,n.elem.value||(n.elem.value=n.placeholder),n.on(n.elem,"focus",n.onFocus),n.on(n.elem,"blur",n.onBlur),n.on(n.elem,"keydown",n.onKeydown)},n.on=function(e,n,a){e.addEventListener?e.addEventListener(n,a):e.attachEvent("on"+n,a)},n.onFocus=function(){(n.animating||n.elem.value===n.placeholder)&&(n.animating=1,window.cancelAnimationFrame(n.rAF),n.deletePlaceholder())},n.onBlur=function(){(n.animating||""===n.elem.value)&&(n.animating=1,window.cancelAnimationFrame(n.rAF),n.restorePlaceholder())},n.onKeydown=function(){n.animating&&(n.animating=0,window.cancelAnimationFrame(n.rAF),n.elem.value="")},n.deletePlaceholder=function(){n.elem.value.length>0?(n.elem.value=n.elem.value.slice(0,-1),n.rAF=window.requestAnimationFrame(n.deletePlaceholder)):n.animating=0},n.restorePlaceholder=function(){n.elem.value.length<n.placeholder.length?(n.elem.value+=n.placeholder[n.elem.value.length],n.rAF=window.requestAnimationFrame(n.restorePlaceholder)):n.animating=0},n.init()},n.init(),n}
/* 
	example 

	<!-- add placeholder to input or textarea --/>
	<input name="fieldname" placeholder="Placeholder Value" />

	// run Placeholdem on all elements with placeholders
	Placeholdem( document.querySelectorAll( '[placeholder]' ) );

*/