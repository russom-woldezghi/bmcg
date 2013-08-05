<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

//Options
$enable_disable = array('enable','disable'); 
$disable_enable = array('disable','enable'); 
$color_schemes = array('light','dark');
$cropped_full = array('cropped','full');
$service_cat_layout = array('full','sidebar');
$fixed_static  = array('fixed','static');
$blank_self = array('blank','self');
$header_styles = array('one','two', 'three', 'four');


//Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//Background Images Reader
$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
$bg_images = array();

if ( is_dir($bg_images_path) ) {
    if ($bg_images_dir = opendir($bg_images_path) ) { 
        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                $bg_images[] = $bg_images_url . $bg_images_file;
            }
        }    
    }
}


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


$of_options[] = array( "name" => __('General', 'unique theme options'),
					"type" => "heading");
											
$of_options[] = array( "name" => __('Main Logo Upload', 'unique'),
					"desc" => __('Upload your custom logo using the native media uploader, or define the URL directly', 'unique'),
					"id" => "custom_logo",
					"std" => "",
					"type" => "media");

$of_options[] = array( "name" => __('Custom Favicon', 'unique'),
					"desc" => __('Upload or past the URL for your custom favicon image here.', 'unique'),
					"id" => "custom_favicon",
					"std" => "",
					"type" => "upload");
	
$of_options[] = array( "name" => __('Tracking Code (Footer)', 'unique'),
					"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'unique'),
					"id" => "tracking_footer",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => __('Copyright (Footer)', 'unique'),
					"desc" => __('Add your footer copyright message here.', 'unique'),
					"id" => "coyright_footer",
					"std" => "Copyright",
					"type" => "text");
					 
$of_options[] = array( "name" => __('Home', 'unique'),
                    "type" => "heading");

$of_options[] = array( "name" => __('H1 Tagline', 'unique'),
                    "desc" => __('Enter your custom about H1 tagline here.', 'unique'),
                    "id" => "h1_tagline",
					"std" => '<h1>Lorem Ipsum #<br />Dolar sit amet</h1>',
                    "type" => "text");
					
$of_options[] = array( "name" => __('Tagline Message', 'unique'),
					"desc" => __('Enter the text for your about tagline message section.', 'unique'),
					"id" => "message_tagline",
					"std" => "<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>",
					"type" => "textarea"); 
			
					
$of_options[] = array( "name" => "Backup",
"type" => "heading");

$of_options[] = array( "name" => "Backup and Restore Options",
                    "desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.','unique'),
                    "id" => "aq_backup",
                    "std" => "",
                    "type" => "backup",
					"options" => "",
					);
	}
}
?>
