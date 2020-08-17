<?php

/*
 * Enable support for Post Thumbnails on posts and pages.
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
function add_post_thumbnails_support() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'add_post_thumbnails_support');

/**
 * Include any styles into the site the proper way
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function include_css_files() {
    // Example of including a style local to your theme root
    wp_enqueue_style('untitled-css', get_template_directory_uri() . '/dist/css/style.css');
    
    // Example of including an external link
    wp_enqueue_style('source-sans-pro', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

    wp_enqueue_style('bebas-neue', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
}

// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_css_files');



/**
 * Include any scripts into the site the proper way
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function include_js_files() {
    wp_enqueue_script('untitled-js', get_template_directory_uri() . '/dist/scripts/scripts.js', [], false, true);
    // Font Awesome icons
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/080c06f1d6.js');
}

// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_js_files');

// include custom jQuery
function include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), null, true);

}

add_action('wp_enqueue_scripts', 'include_custom_jquery');

function jquery_script() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/dist/scripts/scripts.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'jquery_script' );

/**
 * Register the menus on my site
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @return void
 */
function register_theme_navigation() {
    register_nav_menus([
        'primary_menu' => 'Primary Menu',
    ]);
}

add_action('after_setup_theme', 'register_theme_navigation');