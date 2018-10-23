<?php

/**
 * Can we show the post thumbnail?
 *
 * @return boolean
 */
function twintynineteen_can_show_post_thumbnail() {
	return ! post_password_required() && ! is_attachment();
}

/**
 * Add inline CSS for custom header image
 *
 * @return string CSS inline property.
 */
function twintynineteen_custom_header_image() {
	return sprintf( '.twinty .site-header .site-branding-container:before { background-image: url("%1$s"); }', esc_url( get_header_image() ) );
}
