<?php

namespace TwintyNineteen\Setup;

if ( ! function_exists( __NAMESPACE__ . '\setup' ) ) {
	function setup() {

		/**
		 * Define translation files path.
		 */
		load_theme_textdomain( 'twinty', get_stylesheet_directory_uri() . '/languages' );

		/**
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Register Header Featured Items menu.
		 */
		register_nav_menus(
			[
				'header_featured_items' => esc_html__( 'Header featured items', 'twinty' ),
				'footer_menu'           => esc_html__( 'Footer menu', 'twinty' ),
			]
		);

		register_default_headers( [
			'city' => [
				'url'           => '%2$s/assets/images/headers/city.jpg',
				'thumbnail_url' => '%2$s/assets/images/headers/city-mini.jpg',
				'description'   => __( 'City', 'twinty' ),
			],
			'fiber' => [
				'url'           => '%2$s/assets/images/headers/fiber.jpg',
				'thumbnail_url' => '%2$s/assets/images/headers/fiber-mini.jpg',
				'description'   => __( 'Fiber', 'twinty' ),
			],
			'forest' => [
				'url'           => '%2$s/assets/images/headers/forest.jpg',
				'thumbnail_url' => '%2$s/assets/images/headers/forest-mini.jpg',
				'description'   => __( 'Forest', 'twinty' ),
			],
			'fresh' => [
				'url'           => '%2$s/assets/images/headers/fresh.jpg',
				'thumbnail_url' => '%2$s/assets/images/headers/fresh-mini.jpg',
				'description'   => __( 'Fresh', 'twinty' ),
			],
			'rock' => [
				'url'           => '%2$s/assets/images/headers/rock.jpg',
				'thumbnail_url' => '%2$s/assets/images/headers/rock-mini.jpg',
				'description'   => __( 'Rock', 'twinty' ),
			],
			'tiles' => [
				'url'           => '%2$s/assets/images/headers/tiles.jpg',
				'thumbnail_url' => '%2$s/assets/images/headers/tiles-mini.jpg',
				'description'   => __( 'Tiles', 'twinty' ),
			],
		] );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-header',
			apply_filters(
				'twintynineteen_custom_header_args',
				[
					'uploads'       => true,
					'flex-width'    => true,
					'width'         => 1600,
					'flex-height'   => true,
					'height'        => 200,
					'default-image' => get_stylesheet_directory_uri() . '/assets/images/headers/rock.jpg',
				]
			)
		);
	}
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );

/**
 * Enqueue scripts and styles.
 */
function scripts() {
	/**
	 * If WP is in script debug, or we pass ?script_debug in a URL - set debug to true.
	 */
	$debug = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) || ( isset( $_GET['script_debug'] ) ) ? true : false; // phpcs:ignore

	/**
	 * If we are debugging the site, use a unique version every page load so as to ensure no cache issues.
	 */
	$version = wp_get_theme()->get( 'Version' );

	/**
	 * Should we load minified files?
	 */
	$suffix = ( true === $debug ) ? '' : '.min';

	/**
	 * Global variable for IE.
	 */
	global $is_IE;

	$web_font_url  = apply_filters( 'twinty_web_font_url', '//fonts.googleapis.com/css?family=IBM+Plex+Serif:400,400i,700,700i|Montserrat:300,600' );

	// Load parent theme stylesheet
	wp_enqueue_style( 'twentynineteen-style', get_template_directory_uri() . '/style.css' );

	// Fonts stylesheets.
	wp_enqueue_style( 'twinty-web-font', $web_font_url, [], $version );

	// Theme stylesheets & scripts.
	wp_enqueue_style( 'twinty-style', get_stylesheet_directory_uri() . '/style' . $suffix . '.css', [], $version );
	wp_add_inline_style( 'twinty-style', twintynineteen_custom_header_image() );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\scripts' );
