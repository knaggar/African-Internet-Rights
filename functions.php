<?php

/**
 *  @package air
 *  @since 2.0
 *  @name Functions Page
 **/

if (!isset( $content_width )) {
    $content_width = 1120;
}

//  Theme Defaults and registers support
if ( ! function_exists( 'air_setup' ) ) :

function air_setup() {
  // Add language text domain
  load_theme_textdomain('air', get_template_directory() .'/languages');
  // Add Navigation menu
  register_nav_menus( array(
      'primary'   => __( 'Primary Menu', 'air' ),
      'footer'   => __( 'Footer Menu', 'air' ),
      'sub-nav'   => __( 'Sub Menu', 'air' ),
      'side-nav'   => __( 'Side Menu', 'air' ),
  ));
  // Enable support for Post Thumbnails
  add_theme_support( 'post-thumbnails' );
  add_image_size('updates-front', 360, 240, true, array('left', 'top'));
  add_image_size('updates-featured', 230, 390, true, array('left', 'top'));
  add_image_size('updates-thumb', 265, 253, true, array('left', 'top'));
  /*add_image_size('post-thumbnail', 265, 253, true, array('left', 'top'));*/
   // Switch default core markup for search form, comment form, and comments to output valid HTML5.
  add_theme_support( 'automatic-feed-links', 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );
  // Enable support for Post Formats.
  add_theme_support( 'post-formats', array('image', 'video', 'audio', 'gallery') );
}endif;
add_action( 'after_setup_theme', 'air_setup' );
// List of Custom Functions
// add favicon
  function blog_favicon() {
      echo '<link rel="Shortcut Icon" type="image/x-icon" href="'. get_template_directory_uri().'/favicon.ico" />';
}
    add_action('wp_head', 'blog_favicon');
// favicon for admin
    function admin_favicon() {
        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.png" />';
}
    add_action('admin_head', 'admin_favicon');
// Execute PHP inside widget
function execute_php($html){
 if(strpos($html,"<"."?php")!==false){
      ob_start();
      eval("?".">".$html);
      $html=ob_get_contents();
      ob_end_clean();
 }
 return $html;
}
add_filter('widget_text','execute_php',100);
// Add body classes
function body_classes( $classes ) {
    if ( is_post_type_archive('updates') ) {
      $classes[] = 'updates';
    } elseif (is_post_type_archive('faq')){
      $classes[] = 'faq';
    }
    elseif (is_post_type_archive('articles')){
      $classes[] = 'declaration';
    }
    elseif (is_page('endorsements')){
      $classes[] = 'endorse';
    }
    return $classes;
}
add_filter( 'body_class','body_classes' );
// Get child pages by ID, Title or Slug
function is_child( $parent = '' ) {
    global $post;
    $parent_obj = get_page( $post->post_parent, ARRAY_A );
    $parent = (string) $parent;
    $parent_array = (array) $parent;
    if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
        return true;
    } else {
        return false;
    }
}
// Expert Length
function custom_excerpt_length( $length ) {
        return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_more( $more ) {
        global $post;
        return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more');

// Register for widget support
function air_widgets_init() {
  // Register Left Sidebar
  register_sidebar( array(
      'name'          => __( 'Left Sidebar', 'air' ),
      'id'            => 'sidebar-left',
      'description'   => 'This should display widgets that appear on Posts, category and single Post.',
      'before_widget' => '<div id="widget-%1$s" class="widget %2$s">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<div class="header"><h5 class="widget-title">',
      'after_title'   => '</h5></div><div class="body">',
  ));
  // Register Footer Section
  register_sidebar( array(
      'name'          => __( 'Footer Section', 'air' ),
      'id'            => 'section-footer',
      'description'   => 'This should display widgets that appear on the Main Footer section.',
      'before_widget' => '<div id="widget-%1$s" class="widget %2$s">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<div class="header"><h2>',
      'after_title'   => '</h2></div><div class="body">',
  ));
}
add_action( 'widgets_init', 'air_widgets_init' );
// Enqueue scripts and styles
function air_scripts() {
  // Add RESET.css
  wp_register_style('theme-reset', get_template_directory_uri() . '/assets/css/reset.css', '1.0b' );
  wp_enqueue_style('theme-reset');
  // Add PRINT.css
  wp_register_style('theme-media', get_template_directory_uri() . '/assets/css/media.css', '1.0b' );
  wp_enqueue_style('theme-media');
  // Add owl-carousel.css
  wp_register_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', '2.2b' );
  wp_enqueue_style('owl-carousel');
	// Add jQuery UI
	wp_register_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', '', '1.11.4', true );
	wp_enqueue_script('jquery-ui');
	// Add Packery
  wp_enqueue_script( 'Packery', '//cdnjs.cloudflare.com/ajax/libs/packery/1.4.3/packery.pkgd.min.js','','1.4.3', true);
  // Add Owl Carousel
  wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js','','2.2b',true);
  // Add Tweetie
  wp_enqueue_script( 'tweetie', get_template_directory_uri() . '/assets/js/tweetie/tweetie.js','','2',true);

	// Add SCRIPT.js
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/script.js','','1.5',true );
}
add_action( 'wp_enqueue_scripts', 'air_scripts' );
// replace and add last jQuery library
function jquery_replace() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), '2.1.4', true);
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'jquery_replace');

// Remove Style Sheets
function remove_styles() {
		// contact form 7 css
		wp_deregister_style(array('contact-form-7','contact-form-7-rtl'));
		// mailchimp css
		wp_deregister_style(array('mailchimp-for-wp-checkbox','mailchimp-for-wp-form'));
		// jetpack css
		wp_deregister_style('jetpack_css-rtl');
}
add_action ('wp_print_styles', 'remove_styles', 100 );
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
// Add INC functions and plugins
  // Add Theme Customizer
  require get_template_directory() . '/inc/customizer.php';
  // Add Custom Post Type
  require get_template_directory() . '/inc/custom-post.php';
  // Add Custom Post Type
  require get_template_directory() . '/inc/custom-taxonomy.php';
  // Add Custom Widget
  require get_template_directory() . '/inc/custom-widget.php';
  // Add Share Icons to Posts and Pages
  require get_template_directory() . '/inc/share.php';
	// Clean head and remove junk
  require get_template_directory() . '/inc/clean-head.php';
  // Add Endorsement list
  require get_template_directory() . '/inc/endorse-list.php';
  // Create instant search form
  require get_template_directory() . '/inc/search-form.php';
  /* Add Vote for posts
  /    wp_localize_script('post_vote', 'ajax_var', array(
    'url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('ajax-nonce'),
    ));
  add_action('wp_ajax_nopriv_post-vote', 'post_vote');
  add_action('wp_ajax_post-vote', 'post_vote');

  require get_template_directory() . '/inc/post-vote.php'; */
