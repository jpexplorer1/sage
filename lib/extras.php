<?php

namespace Roots\Sage\Extras;

/*
add_filter('sage/wrap_base', __NAMESPACE__ . '\sage_wrap_base_cpts'); // Add our function to the sage/wrap_base filter

  function sage_wrap_base_cpts($templates) {
    $cpt = get_post_type(); // Get the current post type
    if ($cpt) {
       array_unshift($templates, 'base-projects' . $cpt . '.php'); // Shift the template to the front of the array
    }
    return $templates; // Return our modified array with base-$cpt.php at the front of the queue
  }
*/

//* CUSTOM POST TYPE
// Our custom post type function
function create_posttype() {
  register_post_type( 'projects',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' ),
        'all_items' => __( 'All Projects', 'text_domain' ),
        'all_items' => __( 'All Projects', 'text_domain' ),
        'add_new_item' => __( 'Add Project', 'text_domain' ),
        'add_new' => __( 'Add Project', 'text_domain' ),
        'new_item' => __( 'New Project', 'text_domain' ),
        'edit_item' => __( 'Edit Project', 'text_domain' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'projects'),
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies' => array( 'topics' ),
      'menu_icon'   => 'dashicons-star-empty',
    )
  );
}
// Hooking up our function to theme setup
add_action( 'init',  __NAMESPACE__ . '\\create_posttype' );

// Register Custom Post Type
function projects() {

  $labels = array(
    'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Projects', 'text_domain' ),
    'name_admin_bar'        => __( 'Projects', 'text_domain' ),
    'archives'              => __( 'Item Archives', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'All Projects', 'text_domain' ),
    'add_new_item'          => __( 'Add Project', 'text_domain' ),
    'add_new'               => __( 'Add Project', 'text_domain' ),
    'new_item'              => __( 'New Project', 'text_domain' ),
    'edit_item'             => __( 'Edit Project', 'text_domain' ),
    'update_item'           => __( 'Update Item', 'text_domain' ),
    'view_item'             => __( 'View Item', 'text_domain' ),
    'view_items'            => __( 'View Items', 'text_domain' ),
    'search_items'          => __( 'Search Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                  => 'projects',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __( 'Project', 'text_domain' ),
    'description'           => __( 'Post Type Description', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
    'taxonomies'            => array( 'topics' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
  );
  register_post_type( 'projects', $args );

}

//* CUSTOM TAXONOMY
function create_topics_taxonomies() {
  register_topics_taxonomies( 'topics',
  // CPT Options
    array(
      'labels' => array(
        'name'              => _x('Topics', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Topic', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Topics', 'textdomain'),
        'all_items'         => __('All Topics', 'textdomain'),
        'parent_item'       => __('Parent Topic', 'textdomain'),
        'parent_item_colon' => __('Parent Topic:', 'textdomain'),
        'edit_item'         => __('Edit Topic', 'textdomain'),
      ),
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'public'             => true,
      'publicly_queryable' => true,
    )
  );
}
// Hooking up our function to theme setup
add_action( 'init',  __NAMESPACE__ . '\\topics_taxonomies' );

// Register Custom Taxonomy
function topics_taxonomies() {
  $labels = array(
    'name'              => _x('Topics', 'taxonomy general name', 'textdomain'),
    'singular_name'     => _x('Topic', 'taxonomy singular name', 'textdomain'),
    'search_items'      => __('Search Topics', 'textdomain'),
    'all_items'         => __('All Topics', 'textdomain'),
    'parent_item'       => __('Parent Topic', 'textdomain'),
    'parent_item_colon' => __('Parent Topic:', 'textdomain'),
    'edit_item'         => __('Edit Topic', 'textdomain'),
    'update_item'       => __('Update Topic', 'textdomain'),
    'add_new_item'      => __('Add New Topic', 'textdomain'),
    'new_item_name'     => __('New Topic Name', 'textdomain'),
    'menu_name'         => __('Topic', 'textdomain'),
  );
  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'public'             => true,
    'publicly_queryable' => true,
    'rewrite'           => array('slug' => 'topics'),
  );

  register_taxonomy('topics', array('projects'), $args);

}

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * options page
 */
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  
}

