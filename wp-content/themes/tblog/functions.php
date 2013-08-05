<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
*/


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) 
    $content_width = 660;

/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/

// Paths to admin functions
define('ADMIN_PATH', STYLESHEETPATH . '/admin/');
define('ADMIN_DIR', get_stylesheet_directory_uri() . '/admin/');
define('LAYOUT_PATH', ADMIN_PATH . '/layouts/');


// You can mess with these 2 if you wish.
$themedata = get_theme_data(STYLESHEETPATH . '/style.css');
define('THEMENAME', $themedata['Name']);
define('OPTIONS', 'of_options'); // Name of the database row where your options are stored
define('BACKUPS', 'of_options'); // Name of the database row where your backup options are stored



// Build Options
require_once (ADMIN_PATH . 'admin-interface.php');		// Admin Interfaces 
require_once (ADMIN_PATH . 'theme-options.php'); 		// Options panel settings and custom settings
require_once (ADMIN_PATH . 'admin-functions.php'); 	// Theme actions based on options settings
require_once (ADMIN_PATH . 'medialibrary-uploader.php'); // Media Library Uploader


/*-----------------------------------------------------------------------------------*/
/*	Include functions
/*-----------------------------------------------------------------------------------*/
require_once(get_template_directory() .'/functions/pagination.php');
require_once(get_template_directory() .'/functions/better-excerpts.php');
require_once(get_template_directory() .'/functions/shortcodes.php');
require_once(get_template_directory() .'/functions/flickr-widget.php');

add_theme_support('custom-background');

/*-----------------------------------------------------------------------------------*/
/*	Images
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full-size',  9999, 9999, false );
	add_image_size( 'small-thumb',  50, 50, true );
	add_image_size( 'post-image',  760, 330, true );
	add_image_size( 'portfolio-thumb',  340, 247, true );
	add_image_size( 'portfolio-single',  530, 9999, false );

}

/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts','wdt_scripts_function');

function wdt_scripts_function() {
	
	/**********
	** CSS
	**********/
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() .'/css/prettyPhoto.css');
	wp_enqueue_style('style', get_stylesheet_uri() );
	
	
	
	/**********
	** JS
	**********/
	
	// Main JS
	wp_enqueue_script('jquery');	
	
	// Site wide js
	wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '', true);
	wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js', array('jquery'), '', true);
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery'), '', true);
	wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '', true);
	wp_enqueue_script('slides', get_template_directory_uri() . '/js/jquery.slides.min.js', array('jquery'), '', true);
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/jquery.init.js', array('jquery'), '', true);

	//home
	if(is_front_page()) {
		wp_enqueue_script('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js', array('jquery'), '', true);
		wp_enqueue_script('quicksandinit', get_template_directory_uri() . '/js/jquery.quicksandinit.js', array('jquery'), '', true);
	}	
}



/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

//Register Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar.',
		'before_widget' => '<div class="sidebar-box clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4>',
));



/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types & Taxonomies
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'create_post_types' );
function create_post_types() {
	//portfolio post type
	register_post_type( 'Portfolio',
		array(
		  'labels' => array(
			'name' => __( 'Portfolio', 'TBLOG' ),
			'singular_name' => __( 'Portfolio', 'TBLOG' ),		
			'add_new' => _x( 'Add New', 'Portfolio Project', 'TBLOG' ),
			'add_new_item' => __( 'Add New Portfolio Project', 'TBLOG' ),
			'edit_item' => __( 'Edit Portfolio Project', 'TBLOG' ),
			'new_item' => __( 'New Portfolio Project', 'TBLOG' ),
			'view_item' => __( 'View Portfolio Project', 'TBLOG' ),
			'search_items' => __( 'Search Portfolio Projects', 'TBLOG' ),
			'not_found' =>  __( 'No Portfolio Projects found', 'TBLOG' ),
			'not_found_in_trash' => __( 'No Portfolio Projects found in Trash', 'TBLOG' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'portfolio' ),
		)
	  );
}


// Add taxonomies
add_action( 'init', 'create_taxonomies' );

//create taxonomies
function create_taxonomies() {
	
// portfolio taxonomies
	$cat_labels = array(
		'name' => __( 'Portfolio Categories', 'TBLOG' ),
		'singular_name' => __( 'Portfolio Category', 'TBLOG' ),
		'search_items' =>  __( 'Search Portfolio Categories', 'TBLOG' ),
		'all_items' => __( 'All Portfolio Categories', 'TBLOG' ),
		'parent_item' => __( 'Parent Portfolio Category', 'TBLOG' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'TBLOG' ),
		'edit_item' => __( 'Edit Portfolio Category', 'TBLOG' ),
		'update_item' => __( 'Update Portfolio Category', 'TBLOG' ),
		'add_new_item' => __( 'Add New Portfolio Category', 'TBLOG' ),
		'new_item_name' => __( 'New Portfolio Category Name', 'TBLOG' ),
		'choose_from_most_used'	=> __( 'Choose from the most used portfolio categories', 'TBLOG' )
	); 	

	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => $cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
}

/*-----------------------------------------------------------------------------------*/
/*	Other functions
/*-----------------------------------------------------------------------------------*/

// Limit Post Word Count
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');


//Replace Excerpt Link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// register navigation menus
register_nav_menus(
	array(
	'menu'=>__('Menu'),
	)
);


// Localization Support
load_theme_textdomain( 'TBLOG', get_template_directory().'/lang' );


//create featured image column
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'powered');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}


// Change homepage post type to portfolio
add_filter( 'pre_get_posts', 'my_get_posts' );
function my_get_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'portfolio' ) );

	return $query;
}


// Set number of posts per page for taxonomy pages
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'wdt_modify_posts_per_page', 0);
function wdt_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'wdt_option_posts_per_page' );
}
function wdt_option_posts_per_page( $value ) {
	global $option_posts_per_page;
	
    if ( is_tax( 'portfolio_cats') ) {
        return 20;
    }
	else {
        return $option_posts_per_page;
    }
}
?>