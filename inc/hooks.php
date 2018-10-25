<?php

namespace TwintyNineteen\Hooks;

use TwintyNineteen\Options;
use TwintyNineteen\Helpers;

function add_twinty_body_class( $classes ) {
	$classes[] = 'twinty';
	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\add_twinty_body_class' );

/**
 * Change the excerpt length
 *
 * @param int $length The current length.
 * @return int
 */
function excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\excerpt_length' );

/**
 * Customize the [...] on the_excerpt();
 *
 * @param string $more The current $more string.
 * @return string
 */
function twinty_excerpt_more( $more ) {
	return sprintf( ' <a class="more-link" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), esc_html__( 'Read more', 'twinty' ) );
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\twinty_excerpt_more' );

/**
 * Inject Event post data in $post to get direct access
 *
 * @param $post WP_Post The post object.
 */
function inject_event_post_data( $post ) {
	if ( apply_filters( 'twinty_enable_injection_event_data_in_post', true ) && ! is_admin() && 'event' === $post->post_type ) {
		$post->event = \Inpsyde\Events\Model\Event::fromPost( $post );
	}
}
add_action( 'the_post', __NAMESPACE__ . '\inject_event_post_data' );

/**
 * Add some custom classes to article.post
 *
 * @param array $classes The post classes.
 * @return array $classes
 */
function custom_post_classes( $classes ) {
	if ( has_post_thumbnail() ) {
		$classes[] = 'has-featured-image';
	}

	return $classes;
}
add_filter( 'post_class', __NAMESPACE__ . '\custom_post_classes' );

/**
 * Check if we are dealing with a valid $post event
 *
 * @param boolean $valid If the analysed post is currently considered an event.
 * @param WP_Post $post The current post being looped.
 */
function is_a_valid_event( $valid, $post ) {
	if ( isset( $post->event ) && is_a( $post->event, 'Inpsyde\Events\Model\Event' ) ) {
		$valid = true;
	}

	return $valid;
}
add_filter( 'twinty_post_is_a_valid_event', __NAMESPACE__ . '\is_a_valid_event', 10, 2 );

/**
 * Display top quote before content
 */
function display_header_top_quote() {
	$quote = Options\get_option( 'header_quote' );

	if ( strlen( trim( $quote ) ) > 0 ) {
		?>
		<aside class="header-top-quote">
			<?php echo apply_filters( 'the_content', wp_kses_post( $quote ) ); // WPCS: XSS OK. ?>
		</aside>
		<?php
	}
}
add_action( 'twinty_start_content', __NAMESPACE__ . '\display_header_top_quote' );

/**
 * Alternative content in header, for front page or taxonomy pages
 *
 * @return void
 */
function display_header_alternative_content() {
	if ( is_front_page() ) {
		do_action( 'twinty_before_frontpage_featured_items' );

		wp_nav_menu( [
			'container_class' => 'featured-items',
			'theme_location'  => 'header_featured_items',
			'items_wrap'      => '<section id="%1$s" class="%2$s">%3$s</section>',
			'walker'          => new \TwintyNineteen\Walkers\Header_Featured_Items(),
		] );
	}

	else if ( is_home() ) {
		echo sprintf( '<h1 class="entry-title">%1$s</h1>', get_the_title( get_option( 'page_for_posts' ) ) );
		$categories = get_categories( [ 'hide_empty' => true, 'parent' => 0, 'orderby' => 'count', 'order' => 'DESC' ] );
		if ( !empty( $categories ) ) {
			echo '<ul class="category terms">';
			foreach ( $categories as $category ) {
				printf(
					'<li><a href="%2$s">%1$s</a></li>',
					$category->name,
					esc_url( get_term_link( $category->term_id ) )
				);
			}
			echo '</ul>';
		}	
	}

	else if ( is_singular() ) {
		echo sprintf( '<h1 class="entry-title">%1$s</h1>', single_post_title() );
	}

	else if ( is_tax() ) {
		echo sprintf( '<h1 class="entry-title">%1$s</h1>', single_term_title( '', false ) );
		echo sprintf( '<div class="entry-description">%1$s</div>', term_description() );
	}
}
add_action( 'twinty_header_alternative_content', __NAMESPACE__ . '\display_header_alternative_content' );

/**
 * Display intro text before featured items on frontpage
 *
 * @return void
 */
function display_content_before_featured_items() {
	?><div class="frontpage-intro-text"><p><?php
	_e( 'Discover what I love to do:', 'twinty' );
	?></p></div><?php
}
add_action( 'twinty_before_frontpage_featured_items', __NAMESPACE__ . '\display_content_before_featured_items' );

/**
 * Disable WP-Timeliner plugin compatibility hooks
 */
add_filter( 'wpt.theme.load_compatibility_hooks', '__return_false' );

/**
 * Add twentynineteen markup before WP-Timeliner loop
 */
function wp_timeliner_before_loop_markup() {
	?>
	<div class="entry-content">
	<?php
}
add_action( 'wpt.template.before-loop', __NAMESPACE__ . '\wp_timeliner_before_loop_markup' );

/**
 * Add twentynineteen markup after WP-Timeliner loop
 */
function wp_timeliner_after_loop_markup() {
	?>
	</div>
	<?php
}
add_action( 'wpt.template.after-loop', __NAMESPACE__ . '\wp_timeliner_after_loop_markup' );
