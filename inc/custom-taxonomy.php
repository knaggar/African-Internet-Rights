<?php
/**
 *  @package air
 *  @since 2.0
 *  @name custom Taxonomy
 **/

// create country
function country_init() {
    register_taxonomy('country', array( 'post', 'updates' ), array(
            'labels' => array (
                'name'              => _x( 'Countries', 'Taxonomy General Name', 'air' ),
                'singular_name'     => _x( 'Country', 'Taxonomy Singular Name', 'air'),
                'search_items'      => __( 'Search country', 'air' ),
                'parent_item'       => __( 'Parent country', 'air' ),
                'parent_item_colon' => __( 'Parent country:', 'air' ),
                'edit_item'         => __( 'Edit country', 'air' ),
                'update_item'       => __( 'Update country', 'air' ),
                'add_new_item'      => __( 'Add New country', 'air' ),
                'new_item_name'     => __( 'New country Name', 'air' ),
                'menu_name'         => __( 'Countries', 'air' ),
            ),
              $args = array(
                'public'                => true,
                'query_var'             => true,
                'show_ui'               => true,
                'update_count_callback' => 'update_post_term_count',
                'show_admin_column'     => true,
                'show_in_nav_menus'     => true,
                'show_in_menu'		    	=> true,
                'hierarchical'          => false,
                'show_tagcloud'         => true,
                'rewrite'	=> array(
                        'slug'          => 'country',
                        'with_front'    => true,
                         )
                )
    ));
}
add_action( 'init', 'country_init', 0 );
// create featured tag
function feature_init() {
    register_taxonomy('feature', array('updates') , array(
      'labels' => array (
          'name'              => _x( 'Features', 'Taxonomy General Name', 'air' ),
          'singular_name'     => _x( 'Feature', 'Taxonomy Singular Name', 'air'),
          'search_items'      => __( 'Search Features', 'air' ),
          'parent_item'       => __( 'Parent Feature', 'air' ),
          'parent_item_colon' => __( 'Parent Feature:', 'air' ),
          'edit_item'         => __( 'Edit Features', 'air' ),
          'update_item'       => __( 'Update Feature', 'air' ),
          'add_new_item'      => __( 'Add New Feature', 'air' ),
          'new_item_name'     => __( 'New Feature Name', 'air' ),
          'menu_name'         => __( 'Features', 'air' ),
      ),
        $args = array(
          'public'                => true,
          'query_var'             => true,
          'show_ui'               => true,
          'update_count_callback' => 'update_post_term_count',
          'show_admin_column'     => true,
          'show_in_nav_menus'     => true,
          'show_in_menu'		    	=> true,
          'hierarchical'          => false,
          'show_tagcloud'         => true,
          'rewrite'	=> array(
                  'slug'          => 'feature',
                  'with_front'    => true,
                   )
          )
    ));
}
add_action( 'init', 'feature_init', 0 );
// create type
function type_init() {
    register_taxonomy('type', 'articles' , array(

            'labels' => array (
                'name'              => _x( 'Types', 'Taxonomy General Name', 'air' ),
                'singular_name'     => _x( 'Type', 'Taxonomy Singular Name', 'air'),
                'search_items'      => __( 'Search type', 'air' ),
                'parent_item'       => __( 'Parent type', 'air' ),
                'parent_item_colon' => __( 'Parent type:', 'air' ),
                'edit_item'         => __( 'Edit type', 'air' ),
                'update_item'       => __( 'Update type', 'air' ),
                'add_new_item'      => __( 'Add New type', 'air' ),
                'new_item_name'     => __( 'New type Name', 'air' ),
                'menu_name'         => __( 'Types', 'air' ),

            ),
              $args = array(
                'public'                => true,
                'query_var'             => true,
                'show_ui'               => true,
                'update_count_callback' => 'update_post_term_count',
                'show_admin_column'     => true,
                'show_in_nav_menus'     => true,
                'show_in_menu'		    	=> true,
                'hierarchical'          => true,
                'show_tagcloud'         => true,
                'rewrite'	=> array(
                        'slug'          => 'type',
                        'with_front'    => true,
                         )
                )
    ));
}
add_action( 'init', 'type_init', 0 );
// create language for declaration
function lang_init() {
    register_taxonomy('language', 'articles' , array(

            'labels' => array (
                'name'              => _x( 'Languages', 'Taxonomy General Name', 'air' ),
                'singular_name'     => _x( 'Language', 'Taxonomy Singular Name', 'air'),
                'search_items'      => __( 'Search Languages', 'air' ),
                'parent_item'       => __( 'Parent Language', 'air' ),
                'parent_item_colon' => __( 'Parent Language:', 'air' ),
                'edit_item'         => __( 'Edit Language', 'air' ),
                'update_item'       => __( 'Update Language', 'air' ),
                'add_new_item'      => __( 'Add New Language', 'air' ),
                'new_item_name'     => __( 'New Languages Name', 'air' ),
                'menu_name'         => __( 'Languages', 'air' ),

            ),
              $args = array(
                'public'                => true,
                'query_var'             => true,
                'show_ui'               => true,
                'update_count_callback' => 'update_post_term_count',
                'show_admin_column'     => true,
                'show_in_nav_menus'     => true,
                'show_in_menu'		    	=> true,
                'hierarchical'          => false,
                'show_tagcloud'         => true,
                'rewrite'	=> array(
                        'slug'          => 'lang',
                        'with_front'    => true,
                         )
                )
    ));
}
add_action( 'init', 'lang_init', 0 );
