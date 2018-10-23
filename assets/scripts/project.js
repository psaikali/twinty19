'use strict';

/**
 * File: mobile-menu.js
 *
 * In charge of the main menu navigation on mobile/tablets.
 */
window.inpMcDebug = {};
(function (window, $, app) {

	// Constructor.
	app.init = function () {
		if (parseInt(twinty_data.is_debug) === 1) {
			app.createDebugDiv();
			app.updateDebugData();
			app.bindEvents();
		}
	};

	// Combine all events.
	app.bindEvents = function () {
		$('body').on('resize', app.updateDebugData);
	};

	// Create the debug div.
	app.createDebugDiv = function () {
		var debug_html = '<div class="debug-info"></div>';
		$(debug_html).appendTo('body');
	};

	// Update debug info in the debug div.
	app.updateDebugData = function () {
		var $debug = $('.debug-info');
		var data = '';

		// Viewport size.
		data += $(window).width() + 'x' + $(window).height();
		$debug.text(data);
	};

	// Engage!
	$(app.init);
})(window, jQuery, window.inpMcDebug);
'use strict';

/**
 * IE detector
 */
window.inpMcIeDetector = {};
(function (window, $, app) {

	// Constructor.
	app.init = function () {
		var ie_version = app.addBrowserCssSelector();

		if (ie_version) {
			$('html').addClass(ie_version);
		}
	};

	app.addBrowserCssSelector = function (u) {
		var ua = window.navigator.userAgent;var msie = ua.indexOf('MSIE ');
		if (msie > 0) {
			return 'ie ie' + parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		}
		var trident = ua.indexOf('Trident/');
		if (trident > 0) {
			var rv = ua.indexOf('rv:');return 'ie ie' + parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
		}
		var edge = ua.indexOf('Edge/');
		if (edge > 0) {
			return 'ie ie' + parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
		}
		return false;
	};

	// Engage!
	$(app.init);
})(window, jQuery, window.inpMcIeDetector);
'use strict';

/**
 * File js-enabled.js
 *
 * If Javascript is enabled, replace the <body> class "no-js".
 */
document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImRlYnVnLmpzIiwiaWUuanMiLCJqcy1lbmFibGVkLmpzIl0sIm5hbWVzIjpbIndpbmRvdyIsImlucE1jRGVidWciLCIkIiwiYXBwIiwiaW5pdCIsInBhcnNlSW50IiwidHdpbnR5X2RhdGEiLCJpc19kZWJ1ZyIsImNyZWF0ZURlYnVnRGl2IiwidXBkYXRlRGVidWdEYXRhIiwiYmluZEV2ZW50cyIsIm9uIiwiZGVidWdfaHRtbCIsImFwcGVuZFRvIiwiJGRlYnVnIiwiZGF0YSIsIndpZHRoIiwiaGVpZ2h0IiwidGV4dCIsImpRdWVyeSIsImlucE1jSWVEZXRlY3RvciIsImllX3ZlcnNpb24iLCJhZGRCcm93c2VyQ3NzU2VsZWN0b3IiLCJhZGRDbGFzcyIsInUiLCJ1YSIsIm5hdmlnYXRvciIsInVzZXJBZ2VudCIsIm1zaWUiLCJpbmRleE9mIiwic3Vic3RyaW5nIiwidHJpZGVudCIsInJ2IiwiZWRnZSIsImRvY3VtZW50IiwiZG9jdW1lbnRFbGVtZW50IiwiY2xhc3NOYW1lIiwicmVwbGFjZSJdLCJtYXBwaW5ncyI6Ijs7QUFBQTs7Ozs7QUFLQUEsT0FBT0MsVUFBUCxHQUFvQixFQUFwQjtBQUNFLFdBQVVELE1BQVYsRUFBa0JFLENBQWxCLEVBQXFCQyxHQUFyQixFQUEyQjs7QUFFNUI7QUFDQUEsS0FBSUMsSUFBSixHQUFXLFlBQVc7QUFDckIsTUFBS0MsU0FBVUMsWUFBWUMsUUFBdEIsTUFBcUMsQ0FBMUMsRUFBOEM7QUFDN0NKLE9BQUlLLGNBQUo7QUFDQUwsT0FBSU0sZUFBSjtBQUNBTixPQUFJTyxVQUFKO0FBQ0E7QUFDRCxFQU5EOztBQVFBO0FBQ0FQLEtBQUlPLFVBQUosR0FBaUIsWUFBVztBQUMzQlIsSUFBRyxNQUFILEVBQVlTLEVBQVosQ0FBZ0IsUUFBaEIsRUFBMEJSLElBQUlNLGVBQTlCO0FBQ0EsRUFGRDs7QUFJQTtBQUNBTixLQUFJSyxjQUFKLEdBQXFCLFlBQVc7QUFDL0IsTUFBSUksYUFBYSxnQ0FBakI7QUFDQVYsSUFBR1UsVUFBSCxFQUFnQkMsUUFBaEIsQ0FBMEIsTUFBMUI7QUFDQSxFQUhEOztBQUtBO0FBQ0FWLEtBQUlNLGVBQUosR0FBc0IsWUFBWTtBQUNqQyxNQUFJSyxTQUFTWixFQUFHLGFBQUgsQ0FBYjtBQUNBLE1BQUlhLE9BQU8sRUFBWDs7QUFFQTtBQUNBQSxVQUFRYixFQUFHRixNQUFILEVBQVlnQixLQUFaLEtBQXNCLEdBQXRCLEdBQTRCZCxFQUFHRixNQUFILEVBQVlpQixNQUFaLEVBQXBDO0FBQ0FILFNBQU9JLElBQVAsQ0FBYUgsSUFBYjtBQUNBLEVBUEQ7O0FBU0E7QUFDQWIsR0FBR0MsSUFBSUMsSUFBUDtBQUVBLENBbkNDLEVBbUNDSixNQW5DRCxFQW1DU21CLE1BbkNULEVBbUNpQm5CLE9BQU9DLFVBbkN4QixDQUFGOzs7QUNOQTs7O0FBR0FELE9BQU9vQixlQUFQLEdBQXlCLEVBQXpCO0FBQ0UsV0FBVXBCLE1BQVYsRUFBa0JFLENBQWxCLEVBQXFCQyxHQUFyQixFQUEyQjs7QUFFNUI7QUFDQUEsS0FBSUMsSUFBSixHQUFXLFlBQVc7QUFDckIsTUFBSWlCLGFBQWFsQixJQUFJbUIscUJBQUosRUFBakI7O0FBRUEsTUFBS0QsVUFBTCxFQUFrQjtBQUNqQm5CLEtBQUcsTUFBSCxFQUFZcUIsUUFBWixDQUFzQkYsVUFBdEI7QUFDQTtBQUNELEVBTkQ7O0FBUUFsQixLQUFJbUIscUJBQUosR0FBNEIsVUFBVUUsQ0FBVixFQUFjO0FBQ3pDLE1BQUlDLEtBQUt6QixPQUFPMEIsU0FBUCxDQUFpQkMsU0FBMUIsQ0FBcUMsSUFBSUMsT0FBT0gsR0FBR0ksT0FBSCxDQUFXLE9BQVgsQ0FBWDtBQUNyQyxNQUFJRCxPQUFPLENBQVgsRUFBYztBQUFFLFVBQU8sVUFBVXZCLFNBQVNvQixHQUFHSyxTQUFILENBQWFGLE9BQU8sQ0FBcEIsRUFBdUJILEdBQUdJLE9BQUgsQ0FBVyxHQUFYLEVBQWdCRCxJQUFoQixDQUF2QixDQUFULEVBQXdELEVBQXhELENBQWpCO0FBQStFO0FBQy9GLE1BQUlHLFVBQVVOLEdBQUdJLE9BQUgsQ0FBVyxVQUFYLENBQWQ7QUFDQSxNQUFJRSxVQUFVLENBQWQsRUFBaUI7QUFBRSxPQUFJQyxLQUFLUCxHQUFHSSxPQUFILENBQVcsS0FBWCxDQUFULENBQTRCLE9BQU8sVUFBVXhCLFNBQVNvQixHQUFHSyxTQUFILENBQWFFLEtBQUssQ0FBbEIsRUFBcUJQLEdBQUdJLE9BQUgsQ0FBVyxHQUFYLEVBQWdCRyxFQUFoQixDQUFyQixDQUFULEVBQW9ELEVBQXBELENBQWpCO0FBQTJFO0FBQzFILE1BQUlDLE9BQU9SLEdBQUdJLE9BQUgsQ0FBVyxPQUFYLENBQVg7QUFDQSxNQUFJSSxPQUFPLENBQVgsRUFBYztBQUFFLFVBQU8sVUFBVTVCLFNBQVNvQixHQUFHSyxTQUFILENBQWFHLE9BQU8sQ0FBcEIsRUFBdUJSLEdBQUdJLE9BQUgsQ0FBVyxHQUFYLEVBQWdCSSxJQUFoQixDQUF2QixDQUFULEVBQXdELEVBQXhELENBQWpCO0FBQStFO0FBQy9GLFNBQU8sS0FBUDtBQUNBLEVBUkQ7O0FBVUE7QUFDQS9CLEdBQUdDLElBQUlDLElBQVA7QUFFQSxDQXhCQyxFQXdCQ0osTUF4QkQsRUF3QlNtQixNQXhCVCxFQXdCaUJuQixPQUFPb0IsZUF4QnhCLENBQUY7OztBQ0pBOzs7OztBQUtBYyxTQUFTQyxlQUFULENBQXlCQyxTQUF6QixHQUFxQ0YsU0FBU0MsZUFBVCxDQUF5QkMsU0FBekIsQ0FBbUNDLE9BQW5DLENBQTRDLE9BQTVDLEVBQXFELElBQXJELENBQXJDIiwiZmlsZSI6InByb2plY3QuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEZpbGU6IG1vYmlsZS1tZW51LmpzXG4gKlxuICogSW4gY2hhcmdlIG9mIHRoZSBtYWluIG1lbnUgbmF2aWdhdGlvbiBvbiBtb2JpbGUvdGFibGV0cy5cbiAqL1xud2luZG93LmlucE1jRGVidWcgPSB7fTtcbiggZnVuY3Rpb24oIHdpbmRvdywgJCwgYXBwICkge1xuXG5cdC8vIENvbnN0cnVjdG9yLlxuXHRhcHAuaW5pdCA9IGZ1bmN0aW9uKCkge1xuXHRcdGlmICggcGFyc2VJbnQoIHR3aW50eV9kYXRhLmlzX2RlYnVnICkgPT09IDEgKSB7XG5cdFx0XHRhcHAuY3JlYXRlRGVidWdEaXYoKTtcblx0XHRcdGFwcC51cGRhdGVEZWJ1Z0RhdGEoKTtcblx0XHRcdGFwcC5iaW5kRXZlbnRzKCk7XG5cdFx0fVxuXHR9O1xuXG5cdC8vIENvbWJpbmUgYWxsIGV2ZW50cy5cblx0YXBwLmJpbmRFdmVudHMgPSBmdW5jdGlvbigpIHtcblx0XHQkKCAnYm9keScgKS5vbiggJ3Jlc2l6ZScsIGFwcC51cGRhdGVEZWJ1Z0RhdGEgKTtcblx0fTtcblxuXHQvLyBDcmVhdGUgdGhlIGRlYnVnIGRpdi5cblx0YXBwLmNyZWF0ZURlYnVnRGl2ID0gZnVuY3Rpb24oKSB7XG5cdFx0bGV0IGRlYnVnX2h0bWwgPSAnPGRpdiBjbGFzcz1cImRlYnVnLWluZm9cIj48L2Rpdj4nO1xuXHRcdCQoIGRlYnVnX2h0bWwgKS5hcHBlbmRUbyggJ2JvZHknICk7XG5cdH07XG5cblx0Ly8gVXBkYXRlIGRlYnVnIGluZm8gaW4gdGhlIGRlYnVnIGRpdi5cblx0YXBwLnVwZGF0ZURlYnVnRGF0YSA9IGZ1bmN0aW9uKCApIHtcblx0XHRsZXQgJGRlYnVnID0gJCggJy5kZWJ1Zy1pbmZvJyApO1xuXHRcdGxldCBkYXRhID0gJyc7XG5cblx0XHQvLyBWaWV3cG9ydCBzaXplLlxuXHRcdGRhdGEgKz0gJCggd2luZG93ICkud2lkdGgoKSArICd4JyArICQoIHdpbmRvdyApLmhlaWdodCgpO1xuXHRcdCRkZWJ1Zy50ZXh0KCBkYXRhICk7XG5cdH07XG5cblx0Ly8gRW5nYWdlIVxuXHQkKCBhcHAuaW5pdCApO1xuXG59KCB3aW5kb3csIGpRdWVyeSwgd2luZG93LmlucE1jRGVidWcgKSApO1xuIiwiLyoqXG4gKiBJRSBkZXRlY3RvclxuICovXG53aW5kb3cuaW5wTWNJZURldGVjdG9yID0ge307XG4oIGZ1bmN0aW9uKCB3aW5kb3csICQsIGFwcCApIHtcblxuXHQvLyBDb25zdHJ1Y3Rvci5cblx0YXBwLmluaXQgPSBmdW5jdGlvbigpIHtcblx0XHRsZXQgaWVfdmVyc2lvbiA9IGFwcC5hZGRCcm93c2VyQ3NzU2VsZWN0b3IoKTtcblxuXHRcdGlmICggaWVfdmVyc2lvbiApIHtcblx0XHRcdCQoICdodG1sJyApLmFkZENsYXNzKCBpZV92ZXJzaW9uICk7XG5cdFx0fVxuXHR9O1xuXHRcblx0YXBwLmFkZEJyb3dzZXJDc3NTZWxlY3RvciA9IGZ1bmN0aW9uKCB1ICkge1xuXHRcdHZhciB1YSA9IHdpbmRvdy5uYXZpZ2F0b3IudXNlckFnZW50OyB2YXIgbXNpZSA9IHVhLmluZGV4T2YoJ01TSUUgJyk7XG5cdFx0aWYgKG1zaWUgPiAwKSB7IHJldHVybiAnaWUgaWUnICsgcGFyc2VJbnQodWEuc3Vic3RyaW5nKG1zaWUgKyA1LCB1YS5pbmRleE9mKCcuJywgbXNpZSkpLCAxMCk7IH1cblx0XHR2YXIgdHJpZGVudCA9IHVhLmluZGV4T2YoJ1RyaWRlbnQvJyk7XG5cdFx0aWYgKHRyaWRlbnQgPiAwKSB7IHZhciBydiA9IHVhLmluZGV4T2YoJ3J2OicpOyByZXR1cm4gJ2llIGllJyArIHBhcnNlSW50KHVhLnN1YnN0cmluZyhydiArIDMsIHVhLmluZGV4T2YoJy4nLCBydikpLCAxMCk7IH1cblx0XHR2YXIgZWRnZSA9IHVhLmluZGV4T2YoJ0VkZ2UvJyk7XG5cdFx0aWYgKGVkZ2UgPiAwKSB7IHJldHVybiAnaWUgaWUnICsgcGFyc2VJbnQodWEuc3Vic3RyaW5nKGVkZ2UgKyA1LCB1YS5pbmRleE9mKCcuJywgZWRnZSkpLCAxMCk7IH1cblx0XHRyZXR1cm4gZmFsc2U7XG5cdH07XG5cblx0Ly8gRW5nYWdlIVxuXHQkKCBhcHAuaW5pdCApO1xuXG59KCB3aW5kb3csIGpRdWVyeSwgd2luZG93LmlucE1jSWVEZXRlY3RvciApICk7IiwiLyoqXG4gKiBGaWxlIGpzLWVuYWJsZWQuanNcbiAqXG4gKiBJZiBKYXZhc2NyaXB0IGlzIGVuYWJsZWQsIHJlcGxhY2UgdGhlIDxib2R5PiBjbGFzcyBcIm5vLWpzXCIuXG4gKi9cbmRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jbGFzc05hbWUgPSBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xhc3NOYW1lLnJlcGxhY2UoICduby1qcycsICdqcycgKTsiXX0=