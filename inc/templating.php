<?php

namespace TwintyNineteen\Templating;

use TwintyNineteen\Options;

if ( ! function_exists( __NAMESPACE__ . '\get_theme_image' ) ) {
	/**
	 * Return a theme images from the /assets/images/ folder.
	 *
	 * @param string $image The image file.
	 * @param string $subfolder An optional subfolder to look into.
	 * @return string The full path URL to the image.
	 */
	function get_theme_image( $image = 'mountain-conqueror-logo.svg', $subfolder = null ) {
		$path = get_template_directory_uri() . '/assets/images/';

		if ( ! is_null( $subfolder ) ) {
			$path .= trailingslashit( $subfolder );
		}

		$image_with_path = $path . $image;

		return apply_filters( 'twinty_theme_image', $image_with_path, $image, $subfolder );
	}
}
