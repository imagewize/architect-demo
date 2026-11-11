/**
 * Draw-on-scroll for the theme's SVG drawings.
 *
 * The draw-on animation lives inside each SVG file, so an <img> starts playing
 * when it loads, and lazy loading fetches the cards a screen or two early, so
 * they all play at once on page load. Drawings below the fold are armed with a
 * placeholder and get their real src back from an IntersectionObserver when they
 * scroll into view; restoring the src restarts the SVG animation. The hero drawing
 * is already in view, so it plays on load. Without IntersectionObserver, or with
 * reduced motion, the plain <img> src stays and the drawing just shows.
 */
( function () {
	'use strict';

	if ( window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}
	if ( ! ( 'IntersectionObserver' in window ) ) {
		return;
	}

	var PLACEHOLDER = 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent( '<svg xmlns="http://www.w3.org/2000/svg"/>' );

	var io = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			if ( ! entry.isIntersecting ) {
				return;
			}
			var img = entry.target;
			io.unobserve( img );
			if ( img.dataset.animSrc ) {
				img.src = img.dataset.animSrc;
				delete img.dataset.animSrc;
			}
		} );
	} );

	document.querySelectorAll( 'img[src*="/assets/img/"][src$=".svg"]' ).forEach( function ( img ) {
		var rect = img.getBoundingClientRect();
		if ( rect.bottom > 0 && rect.top < window.innerHeight ) {
			return;
		}
		img.dataset.animSrc = img.src;
		img.src = PLACEHOLDER;
		io.observe( img );
	} );
}() );
