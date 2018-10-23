<?php

namespace TwintyNineteen;

/**
 * Include composer libraries needed by this theme:
 * CarbonFields.
 *
 * If you're using Composer to manage your whole WordPress site,
 * use twinty_composer_path filter to load a different path to composer,
 * by providing a different path to Composer autoloader, or
 * by providing NULL if you're already requiring composer autoloader somewhere else.
 *
 * @since 1.0.0
 */
function include_composer_libraries() {
	if ( defined( 'COMPOSER_AUTOLOADER_PATH' ) ) {
		return;
	}

	$composer_path = apply_filters( 'twinty_composer_path', get_template_directory() . '/vendor/autoload.php' );

	if ( ! is_null( $composer_path ) ) {
		if ( ! file_exists( $composer_path ) ) {
			die( 'Autoloader was not found, aborting.' );
		}

		require_once $composer_path;
	}
}

/**
 * Includes all files.
 *
 * The $files_to_include array below defines the list of all included files that we need
 * for this theme to run. It does support child theme overrides.
 *
* @since 1.0.0
 */
function include_all_files() {
	$files_to_include = [
		/**
		 * Helper functions
		 */
		'inc/helpers.php',

		/**
		 * Setup theme entities (menus, widgets, supports...)
		 */
		'inc/setup.php',

		/**
		 * Custom walker class
		 */
		'inc/classes/class-twinty-header-featured-items-walker.php',

		/**
		 * Modify WP logic via hooks
		 */
		'inc/hooks.php',

		/**
		 * Templating functions for outputting things
		 */
		'inc/templating.php',

		/**
		 * Override specific TwentyNineteen functions
		 */
		'inc/twentynineteen.php',
	];

	foreach ( $files_to_include as $file ) {
		if ( ! $filepath = locate_template( $file ) ) {
			trigger_error(
				sprintf(
					__( 'Error locating %s for inclusion', 'twinty' ),
					$file
				),
				E_USER_ERROR
			);
		}

		require_once $filepath;
	}
}

//include_composer_libraries();
include_all_files();
