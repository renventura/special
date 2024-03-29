<?php
/**
 * Special Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Special_Theme
 */

if ( ! function_exists( 'special_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function special_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Special Theme, use a find and replace
		 * to change 'special' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'special', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'special' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'special_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 360,
			'width'       => 257,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add custom image sizes.
		 * 
		 * @link https://developer.wordpress.org/reference/functions/add_image_size/
		 */
		add_image_size( 'front-page-post', 700, 518 );
		add_image_size( 'post-summary', 970, 836 );
	}
endif;
add_action( 'after_setup_theme', 'special_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function special_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'special_content_width', 640 );
}
add_action( 'after_setup_theme', 'special_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function special_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'special' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'special' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'special_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function special_scripts() {
	wp_enqueue_style( 'special-style', get_stylesheet_directory_uri() . '/css/main.min.css' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'special-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '20151215', true );

	// Fonts
	// wp_enqueue_style( 'oxygen', '//fonts.googleapis.com/css?family=Oxygen:300,400,700' );
	// wp_enqueue_style( 'sofia-font', 'https://fonts.cdnfonts.com/css/sofia-pro' );
	// wp_enqueue_style( 'minion-font', 'https://fonts.cdnfonts.com/css/minion-pro' );
	// wp_enqueue_style( 'outfit-font', '//fonts.googleapis.com/css2?family=Outfit:wght@100;400;700&display=swap' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_front_page() ) {
		wp_enqueue_style( 'front-page', get_stylesheet_directory_uri() . '/css/front-page.min.css' );
		// wp_enqueue_script( 'typeit', '//cdn.jsdelivr.net/jquery.typeit/4.4.0/typeit.min.js', array('jquery'), '4.4.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'special_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Performance optimizations.
 */
require get_template_directory() . '/inc/optimizations.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Adds support for Gutenberg.
 */
require_once get_template_directory() . '/inc/gutenberg.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
