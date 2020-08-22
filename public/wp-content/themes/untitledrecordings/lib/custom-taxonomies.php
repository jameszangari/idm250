<?php

// hook into the init action and call register_taxonomy_for_music when it fires
add_action('init', 'register_taxonomy_for_music_genre');

function register_taxonomy_for_music_genre() {
    $labels = [
    'name'              => _x('Genre', 'taxonomy general name'),
    'singular_name'     => _x('Genre', 'taxonomy singular name'),
    'search_items'      => __('Search Genre'),
    'all_items'         => __('All Genre'),
    'parent_item'       => __('Parent Genre'),
    'parent_item_colon' => __('Parent Genre:'),
    'edit_item'         => __('Edit Genre'),
    'update_item'       => __('Update Genre'),
    'add_new_item'      => __('Add New Genre'),
    'new_item_name'     => __('New Genre Name'),
    'menu_name'         => __('Genre'),
  ];

    // Now register the taxonomy
    register_taxonomy('music_genre', ['music'], [
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => ['slug' => 'genre'],
  ]);
}

add_action('init', 'register_taxonomy_for_music_style');

function register_taxonomy_for_music_style() {
    $labels = [
    'name'              => _x('Style', 'taxonomy general name'),
    'singular_name'     => _x('Style', 'taxonomy singular name'),
    'search_items'      => __('Search Style'),
    'all_items'         => __('All Style'),
    'parent_item'       => __('Parent Style'),
    'parent_item_colon' => __('Parent Style:'),
    'edit_item'         => __('Edit Style'),
    'update_item'       => __('Update Style'),
    'add_new_item'      => __('Add New Style'),
    'new_item_name'     => __('New Style Name'),
    'menu_name'         => __('Style'),
  ];

    // Now register the taxonomy
    register_taxonomy('music_style', ['music'], [
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => ['slug' => 'style'],
  ]);
}

add_action('init', 'register_taxonomy_for_music_year');

function register_taxonomy_for_music_year() {
    $labels = [
    'name'              => _x('Year', 'taxonomy general name'),
    'singular_name'     => _x('Year', 'taxonomy singular name'),
    'search_items'      => __('Search Year'),
    'all_items'         => __('All Year'),
    'parent_item'       => __('Parent Year'),
    'parent_item_colon' => __('Parent Year:'),
    'edit_item'         => __('Edit Year'),
    'update_item'       => __('Update Year'),
    'add_new_item'      => __('Add New Year'),
    'new_item_name'     => __('New Year Name'),
    'menu_name'         => __('Year'),
  ];

    // Now register the taxonomy
    register_taxonomy('music_year', ['music'], [
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => ['slug' => 'year'],
  ]);
}

add_action('init', 'register_taxonomy_for_music_type');

function register_taxonomy_for_music_type() {
    $labels = [
    'name'              => _x('Type', 'taxonomy general name'),
    'singular_name'     => _x('Type', 'taxonomy singular name'),
    'search_items'      => __('Search Type'),
    'all_items'         => __('All Type'),
    'parent_item'       => __('Parent Type'),
    'parent_item_colon' => __('Parent Type:'),
    'edit_item'         => __('Edit Type'),
    'update_item'       => __('Update Type'),
    'add_new_item'      => __('Add New Type'),
    'new_item_name'     => __('New Type Name'),
    'menu_name'         => __('Type'),
  ];

    // Now register the taxonomy
    register_taxonomy('music_type', ['music'], [
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => ['slug' => 'type'],
  ]);
}

function register_taxonomy_for_artist_roles() {
  $labels = [
  'name'              => _x('Roles', 'taxonomy general name'),
  'singular_name'     => _x('Roles', 'taxonomy singular name'),
  'search_items'      => __('Search Roles'),
  'all_items'         => __('All Roles'),
  'parent_item'       => __('Parent Roles'),
  'parent_item_colon' => __('Parent Roles:'),
  'edit_item'         => __('Edit Roles'),
  'update_item'       => __('Update Roles'),
  'add_new_item'      => __('Add New Roles'),
  'new_item_name'     => __('New Roles Name'),
  'menu_name'         => __('Roles'),
];

  // Now register the taxonomy
  register_taxonomy('artist_roles', ['artists'], [
  'hierarchical'      => false,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'show_in_rest'      => true,
  'rewrite'           => ['slug' => 'roles'],
]);
}
add_action('init', 'register_taxonomy_for_artist_roles');