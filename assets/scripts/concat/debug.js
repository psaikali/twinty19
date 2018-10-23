/**
 * File: mobile-menu.js
 *
 * In charge of the main menu navigation on mobile/tablets.
 */
window.inpMcDebug = {};
( function( window, $, app ) {

	// Constructor.
	app.init = function() {
		if ( parseInt( twinty_data.is_debug ) === 1 ) {
			app.createDebugDiv();
			app.updateDebugData();
			app.bindEvents();
		}
	};

	// Combine all events.
	app.bindEvents = function() {
		$( 'body' ).on( 'resize', app.updateDebugData );
	};

	// Create the debug div.
	app.createDebugDiv = function() {
		let debug_html = '<div class="debug-info"></div>';
		$( debug_html ).appendTo( 'body' );
	};

	// Update debug info in the debug div.
	app.updateDebugData = function( ) {
		let $debug = $( '.debug-info' );
		let data = '';

		// Viewport size.
		data += $( window ).width() + 'x' + $( window ).height();
		$debug.text( data );
	};

	// Engage!
	$( app.init );

}( window, jQuery, window.inpMcDebug ) );
