<?php
/**
 * questRaw functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package questRaw
 */

if ( ! function_exists( 'questraw_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function questraw_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on questRaw, use a find and replace
	 * to change 'questraw' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'questraw', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'questraw' ),
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
	add_theme_support( 'custom-background', apply_filters( 'questraw_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'questraw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function questraw_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'questraw_content_width', 640 );
}
add_action( 'after_setup_theme', 'questraw_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function questraw_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'questraw' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'questraw' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'questraw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function questraw_scripts() {
	wp_enqueue_style( 'questraw-style', get_stylesheet_uri() );

	wp_enqueue_script( 'questraw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'questraw-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script('questraw-navigation', 'WPURLS', array('siteurl' => get_option('siteurl')));
}
add_action( 'wp_enqueue_scripts', 'questraw_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function custom_menus() {
  register_nav_menus(
    array(
      'topbar-menu' => __( 'Topbar Menu' )
    )
  );
}
add_action( 'init', 'custom_menus' );






function wpb_add_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Franklin|Montserrat:300,400,500', false );
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/738991bb1c.js', true );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_fonts' );



function add_footer_customizer($wp_customize) {
	$wp_customize->add_section( 'theme_footer', array(
	'title' => 'Footer',
	'description' => '',
	'priority' => 120,
	));
	$wp_customize->add_setting( 'footer_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo',
			array(
					'label' =>'Upload Logo',
					'section' => 'theme_footer',
					'settings' => 'footer_logo',
				)
			)
		);
	$wp_customize->add_setting( 'business_name' );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize,
		'business_name',
		array(
			'label'	=> ('Business Name'),
			'section' => 'theme_footer',
			'settings' => 'business_name',
			'priority' =>	1			)
	 ) );

	$wp_customize->add_setting( 'footer_address' );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'footer_address', 
		array(
			'label'      => ( 'Business Address'),
			'section'    => 'theme_footer',
			'settings'   => 'footer_address',
	        'priority'   => 2
		)
	));

	$wp_customize->add_setting( 'business_contact' );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize,
		'business_contact',
		array(
			'label'	=> ('Contact Information'),
			'section' => 'theme_footer',
			'settings' => 'business_contact',
			'priority' =>	3			
			)
	 ) );


}
add_action('customize_register', 'add_footer_customizer');




add_filter( 'wpsl_draggable_map', 'custom_draggable_map' );

function custom_draggable_map() {

    $draggable['enabled'] = false;
    
    return $draggable;
}



