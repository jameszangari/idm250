<?php
/**
 * Set Custom WP Login Logo
 *
 * @link https://www.wpexplorer.com/limit-wordpress-search/
 * @return void
 */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ur_login_logo.png);
        margin: auto;
		height: 14.9px;
		width: 311.1px;
		background-size: 311.1px 14.9px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

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
    wp_enqueue_style('source-sans-pro', 'https://use.typekit.net/yae4mky.css');

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
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', [], null, true);
    // Font Awesome icons
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/080c06f1d6.js');
    wp_enqueue_script('background-color', get_template_directory_uri() . '/dist/scripts/jquery.fillcolor.js', ['jquery'], null, true); 
    wp_enqueue_script('untitled-js', get_template_directory_uri() . '/dist/scripts/scripts.js', ['jquery', 'background-color'], null, true);
}

// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_js_files');

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

/**
 * Set search results limit
 *
 * @link https://www.wpexplorer.com/limit-wordpress-search/
 * @return void
 */
function search_results_number($query) {
    if ( $query->is_search ) {
        $query->set( 'posts_per_page', '12' );
    }
    if ( $query->is_archive ) {
        $query->set( 'posts_per_page', '12' );
    }
    return $query;
}
add_filter( 'pre_get_posts','search_results_number' );

/**
 * Set archive results on artists page to ascending order by title
 *
 * @link https://developer.wordpress.org/reference/functions/is_post_type_archive/
 * @return void
 */
function my_change_sort_order($query){
    if(is_post_type_archive($post_types = 'artists')):
       //Set the order ASC or DESC
       $query->set( 'order', 'ASC' );
       //Set the orderby
       $query->set( 'orderby', 'title' );
    endif;    
};
add_action( 'pre_get_posts', 'my_change_sort_order'); 


function get_related_portfolio_work($artist_id){
    // Get all music posts
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'music',
      );
  
    $all_music = get_posts( $args );
    // Loop through music posts
    $artist_portfolio_array = [];

    foreach ($all_music as $music_post){
        // Get ACF producers assigning variable
        $post_id = $music_post->ID;
        $producers = get_field('producers', $post_id);
        $producer_ids = [];

        // Looping through all ACF producers field within music posts
        foreach ($producers as $producer){
            $producer_ids[] = $producer->ID;
        }

        // Check to see if current artist is included in music post
        if (in_array($artist_id, $producer_ids)){
            $artist_portfolio_array[] = $music_post;   
        }
    }
    // Return values/posts
    return $artist_portfolio_array;
}