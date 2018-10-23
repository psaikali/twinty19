<?php

namespace TwintyNineteen;

/**
 * Helpers class providing some utilities function
 */
class Helpers {
	/**
	 * Write in wp-content/debug.log for quick alternative to xDebugging
	 *
	 * @param string|array|object $log
	 * @return void
	 */
	public static function debug( $log ) {
		if ( true === WP_DEBUG ) {
			error_log( '--------------------------------- /!\ ' . __NAMESPACE__ . ' /!\ --------------------------------- ' );

			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( print_r( $log, true ) );
			} else {
				error_log( $log );
			}

			error_log( '--------------------------------- /!\ ' . __NAMESPACE__ . ' /!\ --------------------------------- ' );
		}
	}
}
