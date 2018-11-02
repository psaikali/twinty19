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


/**
 * Prints HTML with meta information about theme author.
 */
function twentynineteen_posted_by() {
	if ( is_singular( 'wpt-achievement' ) ) {
		global $post;
		$achievement = $post->achievement;
		$tags        = $achievement->get_tags();
		$tags_html   = [];

		foreach ($tags as $tag) {
			$tags_html[] = $tag->get_name();
		}

		printf(
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard">%3$s</span></span>',
			/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			twentynineteen_get_icon_svg( 'tag', 16 ),
			esc_html__( 'Tagged in', 'twinty' ),
			implode( ', ', $tags_html )
		);
	} else {
		printf(
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			twentynineteen_get_icon_svg( 'person', 16 ),
			esc_html__( 'Posted by', 'twentynineteen' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}


/**
 * Prints HTML with meta information for the current post-date/time.
 */
function twentynineteen_posted_on() {
	if ( is_singular( 'wpt-achievement' ) ) {
		global $post;
		$achievement = $post->achievement;
		$timeline = $achievement->get_timeline();

		printf(
			'<span class="posted-on">%1$s %2$s</span>',
			twentynineteen_get_icon_svg( 'watch', 16 ),
			$timeline->get_theme()->display_date( $achievement, $timeline )
		);
	} else {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			twentynineteen_get_icon_svg( 'watch', 16 ),
			esc_url( get_permalink() ),
			$time_string
		);
	}	
}