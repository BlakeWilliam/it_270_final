<?php
/**
 * Noto Simple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Noto_Simple
 */

if ( ! function_exists( 'noto_simple_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function noto_simple_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Noto Simple, use a find and replace
		 * to change 'noto-simple' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'noto-simple', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'noto-simple' ),
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
		add_theme_support( 'custom-background', apply_filters( 'noto_simple_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'noto_simple_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function noto_simple_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'noto_simple_content_width', 640 );
}
add_action( 'after_setup_theme', 'noto_simple_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noto_simple_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'noto-simple' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'noto-simple' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'noto_simple_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function noto_simple_scripts() {
    wp_enqueue_style( 'noto-simple-noto-sans-en', 'https://fonts.googleapis.com/css?family=Noto+Sans:400&amp;subset=latin-ext' );

	wp_enqueue_style( 'noto-simple-style', get_stylesheet_uri(), array(), '201811' );

	if (!is_page()) {
		wp_enqueue_style( 'noto-simple-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css', array(), '201811' );
	}

	wp_enqueue_style( 'noto-simple-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );

	wp_enqueue_script( 'noto-simple-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'noto-simple-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'noto-simple-smooth-scroll', get_template_directory_uri() . '/js/vendor/smooth-scroll.polyfills.js', array(), '16.0.3', true );

	wp_enqueue_script( 'noto-simple-main', get_template_directory_uri() . '/js/main.js', array('noto-simple-smooth-scroll'), '201811', true );
}
add_action( 'wp_enqueue_scripts', 'noto_simple_scripts' );

/**
 * Registers an editor stylesheet for the theme.
 */
function noto_simple_add_editor_styles() {
    add_editor_style( get_stylesheet_uri() );
}
add_action( 'admin_init', 'noto_simple_add_editor_styles' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//ADD IN BLAKE'S FUNCTIONS
// register the sidebar widgets in WP dashboard
function final_widgets_init() {
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar Blog', 'final'),
            'id' => 'sidebar-blog',
            'description' => esc_html__('Our blog widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Sidebar volunteer', 'final'),
            'id' => 'sidebar-volunteer',
            'description' => esc_html__('Our tours widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar About', 'final'),
            'id' => 'sidebar-about',
            'description' => esc_html__('Our about widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar Trails', 'final'),
            'id' => 'sidebar-trails',
            'description' => esc_html__('my trails widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Sidebar volunteer', 'final'),
            'id' => 'sidebar-volunteer',
            'description' => esc_html__('my volunteer widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

	register_sidebar(
        array(
            'name' => esc_html__('Sidebar footer', 'final'),
            'id' => 'sidebar-footer',
            'description' => esc_html__('my footer widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

	register_sidebar(
        array(
            'name' => esc_html__('slider', 'final'),
            'id' => 'slider',
            'description' => esc_html__('my volunteer slider widget', 'final'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
    add_action( 'widgets_init', 'final_widgets_init');

	// create year shortcode
function year(){
    return date('Y');
}
add_shortcode('current_year', 'year');

// remove extra p tags
remove_filter('the_content', 'wpautop');

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );
	add_filter( 'widget_text', 'do_shortcode' );