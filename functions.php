<?php
/**
 * travelplatform functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travelplatform
 */

if ( ! function_exists( 'travelplatform_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function travelplatform_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on travelplatform, use a find and replace
		 * to change 'travelplatform' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travelplatform', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'travelplatform' ),
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
		add_theme_support( 'custom-background', apply_filters( 'travelplatform_custom_background_args', array(
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


		load_theme_textdomain('wpdocs_theme', get_template_directory() . '/languages');


	}
	endif;
	add_action( 'after_setup_theme', 'travelplatform_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelplatform_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travelplatform_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelplatform_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function travelplatform_scripts() {
	wp_enqueue_style( 'travelplatform-style', get_stylesheet_uri() );

	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMNMQN_dxcSry9sIQasPTVD-SCKywm7U', array(), '3', true );

	wp_enqueue_script( 'travelplatform', get_template_directory_uri() . '/js/travelplatform.js', array(), '20151215', true );

	wp_enqueue_script( 'travelplatform-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'travelplatform-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travelplatform_scripts' );

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



function create_post_type() {
	register_post_type( 'hotels',
		array(
			'labels' => array(
				'name' => __( 'hotels' ),
				'singular_name' => __( 'hotel' ),
				'add_new_item'        => __( 'Add New Hotel', 'travelplatform' ),

				),
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-building',
			)
		);
	add_post_type_support( 'hotels', 'thumbnail' );    


	register_post_type( 'Neighborhood',
		array(
			'labels' => array(
				'name' => __( 'Neighborhoods' ),
				'singular_name' => __( 'Neighborhood' ),
				'add_new_item'        => __( 'Add New Neighborhood', 'travelplatform' ),
				),
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-admin-multisite',
			)
		);
	add_post_type_support( 'Neighborhoods', 'thumbnail' );    

	register_post_type( 'Restaurants',
		array(
			'labels' => array(
				'name' => __( 'Restaurants' ),
				'singular_name' => __( 'Restaurant' ),
				'add_new_item'        => __( 'Add New Restaurant', 'travelplatform' ),
				),
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-carrot',

			)
		);
	add_post_type_support( 'Restaurants', 'thumbnail' );  


		register_post_type( 'Activities',
		array(
			'labels' => array(
				'name' => __( 'Activities' ),
				'singular_name' => __( 'Activity' ),
				'add_new_item'        => __( 'Add New Activity', 'travelplatform' ),
				),
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-tickets-alt',
			)
		);
	add_post_type_support( 'Activities', 'thumbnail' );   



}

add_action( 'init', 'create_post_type' );





/**
 * Register our sidebars and widgetized areas.
 *
 */


function tp_widgets_header() {

	register_sidebar( array(
		'name'          => 'Before Header',
		'id'            => 'before_header',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		) );

}
add_action( 'widgets_init', 'tp_widgets_header' );

function tp_widgets_title() {

	register_sidebar( array(
		'name'          => 'Footer title',
		'id'            => 'footer_title',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		) );

}
add_action( 'widgets_init', 'tp_widgets_title' );



function tp_widgets_init1() {

	register_sidebar( array(
		'name'          => 'Footer column 1',
		'id'            => 'footer_column1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
		) );

}
add_action( 'widgets_init', 'tp_widgets_init1' );

function tp_widgets_init2() {

	register_sidebar( array(
		'name'          => 'Footer column 2',
		'id'            => 'footer_column2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
		) );

}
add_action( 'widgets_init', 'tp_widgets_init2' );


function tp_widgets_init3() {

	register_sidebar( array(
		'name'          => 'Footer column 3',
		'id'            => 'footer_column3',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
		) );

}
add_action( 'widgets_init', 'tp_widgets_init3' );


add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {

	add_image_size( 'hotels_small', 400, 400, true ); // 300 pixels wide (and unlimited height)
	add_image_size( 'hotel-feaured', 1200, 600, true);	
	add_image_size( 'basic-square', 350, 350, true);	
	add_image_size( 'hotel-feaured-mobile', 768, 500, true);	
	add_image_size( 'main-image', 1500, 600, array( 'center', 'bottom' ) );
	add_image_size( 'main-image-mobile', 768, 400, array( 'center', 'bottom' ) );
}



add_theme_support( 'post-thumbnails', array( 'post', 'hotel' )  );




/* New taxonomies */

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_topics_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

	$labels = array(
		'name' => _x( 'Filters', 'taxonomy general name' ),
		'singular_name' => _x( 'Filter', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Filters' ),
		'all_items' => __( 'All Filters' ),
		'parent_item' => __( 'Parent filter' ),
		'parent_item_colon' => __( 'Parent filter:' ),
		'edit_item' => __( 'Edit filter' ), 
		'update_item' => __( 'Update filter' ),
		'add_new_item' => __( 'Add New Filter' ),
		'new_item_name' => __( 'New filter Name' ),
		'menu_name' => __( 'Filters' ),
		);    

// Now register the taxonomy

	register_taxonomy('topics',array('hotels'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'filter' ),
		));

}




//google map api registration

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyBJMNMQN_dxcSry9sIQasPTVD-SCKywm7U');
}

add_action('acf/init', 'my_acf_init');



/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items  for everybody */
/*-----------------------------------------------------------------------------------*/

function remove_admin_menu_items() {
	$remove_menu_items = array(__('Comments'),__('Posts'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
	     remove_submenu_page( 'themes.php', 'customize.php' );

}

add_action('admin_menu', 'remove_admin_menu_items');


// remove custom fields & plugins for admins
function remove_menus(){

		$user_id = get_current_user_id();
  		if($user_id && ! is_super_admin( $user_id )) {
          remove_menu_page( 'plugins.php' );
          remove_menu_page( 'edit.php?post_type=acf-field-group' );
          remove_submenu_page( 'themes.php', 'themes.php' );
          remove_submenu_page( 'themes.php', 'customize.php' );
          
     }
     remove_submenu_page( 'themes.php', 'customize.php' );
}
add_action( 'admin_menu', 'remove_menus' );



add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

	/* Open the caption <div>. */
	$output = '<div' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

	/* Close the caption </div>. */
	$output .= '</div>';

	/* Return the formatted, clean caption. */
	return $output;
}
