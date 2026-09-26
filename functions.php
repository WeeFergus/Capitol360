<?php
/**
 * cap360 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cap360
 */
if ( ! function_exists( 'cap360_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cap360_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cap360, use a find and replace
		 * to change 'cap360' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cap360', get_template_directory() . '/languages' );
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
		register_nav_menus(
    	array(
        'primary' => __( 'Primary', 'cap360' ),
    )
);
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
		add_theme_support( 'custom-background', apply_filters( 'cap360_custom_background_args', array(
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
add_action( 'after_setup_theme', 'cap360_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cap360_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cap360_content_width', 640 );
}
add_action( 'after_setup_theme', 'cap360_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cap360_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cap360' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cap360' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cap360_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function cap360_scripts() {
	wp_enqueue_style( 'cap360-style', get_stylesheet_uri() );
	wp_enqueue_script( 'cap360-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'cap360-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('cap360-fire-up-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'cap360-burgertime', get_template_directory_uri() . '/js/burgertime.js', array(), '20109012', true );
	wp_enqueue_script( 'cap360-gdpr', get_template_directory_uri() . '/js/gdpr.js', array(), '20109012', true );
	wp_enqueue_script( 'cap360-accordion', get_template_directory_uri() . '/js/accordion.js', array(), '20109012', true );
	wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' );
	wp_enqueue_style( 'load-fonts', 'https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700|Noto+Serif+KR:400,700' );
	// Montserrat replaces the old locally-hosted Proxima Nova files.
	wp_enqueue_style( 'cap360-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), null );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cap360_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/google-font-embed.php';

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






add_action('acf/init', 'cap360_register_acf_blocks');
function cap360_register_acf_blocks() {

	if ( ! function_exists('acf_register_block_type') ) {
		return;
	}
	
	/**
 	* Tile Block
 	*/
	acf_register_block_type( array(
		'name'            => 'tile',
		'title'           => __('Tile', 'cap360-media'),
		'description'     => __('A tiled layout.', 'cap360-media'),
		'render_template' => get_template_directory() . '/template-parts/blocks/tile/tile.php',
		'category'        => 'layout',
		'icon'            => 'grid-view',
		'keywords'        => array('tile', 'card', 'grid'),
		'mode'            => 'edit',
		'supports'        => array(
			'align' => true,
			'jsx'   => true,
		),
	) );
	
	/**
 	* Testimonial Block
 	*/
	acf_register_block_type( array(
		'name'            => 'testimonial',
		'title'           => __( 'Testimonial', 'cap360-media' ),
		'description'     => __( 'A custom testimonial block.', 'cap360-media' ),
		'render_template' => get_template_directory() . '/template-parts/blocks/testimonial/testimonial.php',
		'category'        => 'formatting',
		'icon'            => 'nametag',
		'keywords'        => array( 'testimonial', 'quote' ),
		'mode'            => 'preview',
		'supports'        => array(
			'align' => false,
		),
	));
	
	/**
 	* Card Grid Block
 	*/
	acf_register_block_type( array(
		'name'            => 'card-grid',
		'title'           => __( 'Card Grid', 'cap360-media' ),
		'description'     => __( 'A grid of cards with images, content, and links.', 'cap360-media' ),
		'render_template' => get_template_directory() . '/template-parts/blocks/card-grid/card-grid.php',
		'category'        => 'layout',
		'icon'            => 'screenoptions',
		'keywords'        => array( 'card', 'grid', 'columns' ),
		'mode'            => 'edit',
		'supports'        => array(
			'align' => true,
		),
	));
}

// Add class to body based on page name
function add_page_slug_body_class( $classes ) {
    if ( is_page() ) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_page_slug_body_class' );
