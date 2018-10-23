/**
 * IE detector
 */
window.inpMcIeDetector = {};
( function( window, $, app ) {

	// Constructor.
	app.init = function() {
		let ie_version = app.addBrowserCssSelector();

		if ( ie_version ) {
			$( 'html' ).addClass( ie_version );
		}
	};
	
	app.addBrowserCssSelector = function( u ) {
		var ua = window.navigator.userAgent; var msie = ua.indexOf('MSIE ');
		if (msie > 0) { return 'ie ie' + parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10); }
		var trident = ua.indexOf('Trident/');
		if (trident > 0) { var rv = ua.indexOf('rv:'); return 'ie ie' + parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10); }
		var edge = ua.indexOf('Edge/');
		if (edge > 0) { return 'ie ie' + parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10); }
		return false;
	};

	// Engage!
	$( app.init );

}( window, jQuery, window.inpMcIeDetector ) );