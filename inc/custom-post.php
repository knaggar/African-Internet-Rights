<?php
/**
 *  @package air
 *  @since 2.0
 *  @name custom post type
*/
// Create Updates
function create_updates() {
    register_post_type( 'updates',
            array(
            'labels' => array(
                'name'          => _x( 'Updates & News', 'Post Type General Name', 'air' ),
                'singular_name' => _x( 'Update', 'Post Type Singular Name', 'air' ),
                'add_new_item'  => __ ( 'Add New item', 'air' ),
                'edit_item'     => __( 'Edit item', 'air' ),
                'update_item'   => __( 'Update item', 'air' ),
                'new_item_name' => __( 'New item name', 'air' ),
                'menu_name'     => __( 'Updates', 'air' ),
            ),
            'description'       => __( 'Add updates from here', 'air' ),
            'public'            => true,
            'has_archive'       => true,
            'taxonomies'        => array( 'country','feature' ),
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'updates' ),
            'supports'          => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-format-aside',
            'menu_position'     => 7,
            'show_in_nav_menus' => true,
            'show_in_menu'      => true,
            'query_var'         => true,
            'exclude_from_search' => false,
        )
    );
}
add_action( 'init', 'create_updates', 0 );
// Create news
function create_news() {
    register_post_type( 'news',
            array(
            'labels' => array(
                'name'          => _x( 'In The Media', 'Post Type General Name', 'air' ),
                'singular_name' => _x( 'News', 'Post Type Singular Name', 'air' ),
                'add_new_item'  => __ ( 'Add New item', 'air' ),
                'edit_item'     => __( 'Edit item', 'air' ),
                'update_item'   => __( 'News item', 'air' ),
                'new_item_name' => __( 'New item name', 'air' ),
                'menu_name'     => __( 'News', 'air' ),
            ),
            'description'       => __( 'Add news from here', 'air' ),
            'public'            => true,
            'has_archive'       => true,
            'taxonomies'        => array( 'post_tag', 'country' ),
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'news' ),
            'supports'          => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-media-document',
            'menu_position'     => 7,
            'show_in_nav_menus' => true,
            'show_in_menu'      => true,
            'query_var'         => true,
            'exclude_from_search' => false,
        )
    );
}
add_action( 'init', 'create_news', 0 );
// Create Articles
function create_articles() {
    register_post_type( 'articles',
            array(
            'labels' => array(
                'name'          => _x( 'The African Declaration on Internet Rights and Freedoms', 'Post Type General Name', 'air' ),
                'singular_name' => _x( 'Article', 'Post Type Singular Name', 'air' ),
                'add_new_item'  => __ ( 'Add New item', 'air' ),
                'edit_item'     => __( 'Edit item', 'air' ),
                'update_item'   => __( 'Update item', 'air' ),
                'new_item_name' => __( 'New item name', 'air' ),
                'menu_name'     => __( 'Articles', 'air' ),
            ),
            'description'       => __( 'Add Articles from here', 'air' ),
            'public'            => true,
            'has_archive'       => true,
            'taxonomies'        => array( 'type', 'language' ),
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'articles' ),
            'supports'          => array('title', 'editor', 'thumbnail', 'custom-fields', 'comments'),
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-list-view',
            'menu_position'     => 7,
            'show_in_nav_menus' => true,
            'show_in_menu'      => true,
            'query_var'         => true,
            'exclude_from_search' => false,
        )
    );
}
add_action( 'init', 'create_articles', 0 );
// Create FAQ
function create_faq() {
    register_post_type( 'faq',
            array(
            'labels' => array(
                'name'          => _x( 'Frequantly Asked Questions', 'Post Type General Name', 'air' ),
                'singular_name' => _x( 'FAQ', 'Post Type Singular Name', 'air' ),
                'add_new_item'  => __ ( 'Add New item', 'air' ),
                'edit_item'     => __( 'Edit item', 'air' ),
                'update_item'   => __( 'Update item', 'air' ),
                'new_item_name' => __( 'New item name', 'air' ),
                'menu_name'     => __( 'FAQ', 'air' ),
            ),
            'description'       => __( 'Add faq from here', 'air' ),
            'public'            => true,
            'has_archive'       => true,
            'taxonomies'        => array( 'post_tag' ),
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'faq' ),
            'supports'          => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-info',
            'menu_position'     => 7,
            'show_in_nav_menus' => true,
            'show_in_menu'      => true,
            'query_var'         => true,
            'exclude_from_search' => false,
        )
    );
}
add_action( 'init', 'create_faq', 0 );
// Add additional info for Main footer section
function create_yellows() {
    register_post_type( 'yellows',
            array(
            'labels' => array(
                'name'          => _x( 'Yellows', 'Post Type General Name', 'air' ),
                'singular_name' => _x( 'Yellow', 'Post Type Singular Name', 'air' ),
                'add_new_item'  => __ ( 'Add Yellow', 'air' ),
                'edit_item'     => __( 'Edit Yellow', 'air' ),
                'update_item'   => __( 'Update Yellow', 'air' ),
                'new_item_name' => __( 'New item Yellow', 'air' ),
                'menu_name'     => __( 'Yellows', 'air' ),
            ),
            'description'       => __( 'Add more entry to Main Footer from here', 'air' ),
            'public'            => true,
            'has_archive'       => true,
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'yellows' ),
            'supports'          => array('title', 'editor'),
            'show_ui'           => true,
            'menu_icon'         => 'dashicons-image-flip-vertical',
            'menu_position'     => 7,
            'show_in_nav_menus' => true,
            'show_in_menu'      => true,
            'query_var'         => true,
            'exclude_from_search' => false,
        )
    );
}
add_action( 'init', 'create_yellows', 0 );
// Include Custom post types in search
function cpt_search( $query ) {
    if ( $query->is_search ) {
    $query->set( 'post_type', array( 'post', 'updates','faq','articles','applications','news' ) );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'cpt_search' );
// Chnage Custom Post Title
add_filter('get_the_archive_title', function($title){
  if(is_post_type_archive('updates')){
    $title = sprintf(_x('Updates & News'), post_type_archive_title('', false));
  }
  return $title;
});
