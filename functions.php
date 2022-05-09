<?php

// Create Theme Options Page
require_once( __DIR__ . '/options.php' );

// Theme specific functions
add_action( 'after_setup_theme', 'ucla_setup' );

function ucla_setup() {

  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form' ) );
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'editor-styles' );
  add_editor_style( 'style-editor.css' );
  add_theme_support( 'disable-custom-colors' );
  // Background class names created in ./assets/scss/mixins/_backgrounds.scss
  add_theme_support( 'editor-color-palette', array(
      array(
          'name'  => esc_attr__( 'White', 'uclaTheme' ),
          'slug'  => 'white',
          'color' => '#ffffff',
      ),
      array(
          'name'  => esc_attr__( 'Grey 10', 'uclaTheme' ),
          'slug'  => 'grey-10',
          'color' => '#E5E5E5',
      ),
      array(
          'name'  => esc_attr__( 'Grey 40', 'uclaTheme' ),
          'slug'  => 'grey-40',
          'color' => '#999',
      ),
      array(
          'name'  => esc_attr__( 'Grey 60', 'uclaTheme' ),
          'slug'  => 'grey-60',
          'color' => '#666',
      ),
      array(
          'name'  => esc_attr__( 'Grey 80', 'uclaTheme' ),
          'slug'  => 'grey-80',
          'color' => '#333',
      ),
      array(
          'name'  => esc_attr__( 'Black', 'uclaTheme' ),
          'slug'  => 'black',
          'color' => '#000',
      ),
      array(
          'name'  => esc_attr__( 'UCLA Blue', 'uclaTheme' ),
          'slug'  => 'blue',
          'color' => '#2774ae',
      ),
      array(
          'name'  => esc_attr__( 'UCLA Gold', 'uclaTheme' ),
          'slug'  => 'gold',
          'color' => '#ffd100',
      ),
      array(
          'name'  => esc_attr__( 'Darker Blue', 'uclaTheme' ),
          'slug'  => 'darker-blue',
          'color' => '#005587',
      ),
      array(
          'name'  => esc_attr__( 'Darkest Blue', 'uclaTheme' ),
          'slug'  => 'darkest-blue',
          'color' => '#003b5c',
      ),
  ) );

  global $content_width;


  if ( ! isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array(
      'main-menu' => esc_html__( 'Main Menu', 'ucla' ),
      'secondary-menu' => esc_html__( 'Secondary Menu', 'ucla-secondary' ),
      'foot-menu' => esc_html__( 'Foot Menu (Menu name must be "Foot Menu")', 'ucla-foot' )
    ));
  }

  // Load Theme Scripts and Styles
  add_action( 'wp_enqueue_scripts', 'ucla_load_scripts' );
  function ucla_load_scripts() {
    // CDN jQuery from Google
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
    // Install the UCLA Component library styles
    wp_enqueue_style( 'lib-style', 'http://campus-webcomponents-ucla-edu.s3-website-us-west-2.amazonaws.com/css/ucla-lib.min.css' );
    // Install the UCLA Component Library  scripts
    wp_enqueue_script( 'lib-script', 'http://campus-webcomponents-ucla-edu.s3-website-us-west-2.amazonaws.com/js/ucla-lib-scripts.min.js', array( 'jq' ), '', true );
    // Install the WordPress Theme Styles
    wp_enqueue_style( 'ucla-style', '/wp-content/themes/ucla-wp/dist/css/global.css', array( 'lib-style' ) );
    // Install the WordPress Theme Scripts
    wp_enqueue_script( 'ucla-script', '/wp-content/themes/ucla-wp/dist/js/scripts.js', array( 'lib-script' ), '', true );
  }

  // Load ADMIN Login Styles
  add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );
  function my_login_page_remove_back_to_link() {
    // Path the admin page login styles
    wp_enqueue_style( 'login-style', '/wp-content/themes/ucla-wp/style-login.css' );
  }

  // Breadcrumbs
  function get_breadcrumb() {
  // Check if is front/home page, return
  if ( is_front_page() ) {
    return;
  }

  // Define
  global $post;
  $custom_taxonomy  = ''; // If you have custom taxonomy place it here

  $defaults = array(
    'id'          =>  'breadcrumb',
    'classes'     =>  'breadcrumb',
    'home_title'  =>  esc_html__( 'Home', '' )
  );

  // $sep  = '<li class="seperator">'. esc_html( $defaults['seperator'] ) .'</li>';

  // Start the breadcrumb with a link to your homepage
  echo '<ul id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';

  // Creating home link
  echo '<li class="breadcrumb__item breadcrumb__item--first"><a href="'. get_home_url() .'">'. esc_html( $defaults['home_title'] ) .'</a></li>';

  if ( is_single() ) {

    // Get posts type
    $post_type = get_post_type();

    // If post type is not post
    if( $post_type != 'post' ) {

      $post_type_object   = get_post_type_object( $post_type );
      $post_type_link     = get_post_type_archive_link( $post_type );

      echo '<li class="breadcrumb__item breadcrumb__item--category"><a href="'. $post_type_link .'">'. $post_type_object->labels->name .'</a></li>';

    }

    // Get categories
    $category = get_the_category( $post->ID );

    // If category not empty
    if( !empty( $category ) ) {

      // Arrange category parent to child
      $category_values      = array_values( $category );
      $get_last_category    = end( $category_values );
      // $get_last_category    = $category[count($category) - 1];
      $get_parent_category  = rtrim( get_category_parents( $get_last_category->term_id, true, ',' ), ',' );
      $cat_parent           = explode( ',', $get_parent_category );

      // Store category in $display_category
      $display_category = '';
      foreach( $cat_parent as $p ) {
        $display_category .=  '<li class="breadcrumb__item breadcrumb__item--category">'. $p .'</li>';
      }

    }

    // If it's a custom post type within a custom taxonomy
    $taxonomy_exists = taxonomy_exists( $custom_taxonomy );

    if( empty( $get_last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {

      $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
      $cat_id         = $taxonomy_terms[0]->term_id;
      $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
      $cat_name       = $taxonomy_terms[0]->name;

    }

    // Check if the post is in a category
    if( !empty( $get_last_category ) ) {

      echo $display_category;
      echo '<li class="breadcrumb__item breadcrumb__item-current">'. get_the_title() .'</li>';

    } else if( !empty( $cat_id ) ) {

      echo '<li class="breadcrumb__item breadcrumb__item--category"><a href="'. $cat_link .'">'. $cat_name .'</a></li>';
      echo '<li class="breadcrumb__item--current breadcrumb__item">'. get_the_title() .'</li>';

    } else {

      echo '<li class="breadcrumb__item--current breadcrumb__item">'. get_the_title() .'</li>';

    }
    
  } else if( is_archive() ) {

    if( is_tax() ) {
      // Get posts type
      $post_type = get_post_type();

      // If post type is not post
      if( $post_type != 'post' ) {

        $post_type_object   = get_post_type_object( $post_type );
        $post_type_link     = get_post_type_archive_link( $post_type );

        echo '<li class="breadcrumb__item breadcrumb__item--category breadcrumb__item--custom-post-type-' . $post_type . '"><a href="' . $post_type_link . '">' . $post_type_object->labels->name . '</a></li>';

      }

      $custom_tax_name = get_queried_object()->name;
      echo '<li class="breadcrumb__item breadcrumb__item--current">'. $custom_tax_name .'</li>';

    } else if ( is_category() ) {

      $parent = get_queried_object()->category_parent;

      if ( $parent !== 0 ) {

        $parent_category = get_category( $parent );
        $category_link   = get_category_link( $parent );

        echo '<li class="breadcrumb__item"><a href="'. esc_url( $category_link ) .'">'. $parent_category->name .'</a></li>';

      }

      echo '<li class="breadcrumb__item breadcrumb__item--current">'. single_cat_title( '', false ) .'</li>';

    } else if ( is_tag() ) {

      // Get tag information
      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms( $taxonomy, $args );
      $get_term_name  = $terms[0]->name;

      // Display the tag name
      echo '<li class="breadcrumb__item--current breadcrumb__item">'. $get_term_name .'</li>';

    } else if( is_day() ) {

      // Day archive

      // Year link
      echo '<li class="breadcrumb__item--year breadcrumb__item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></li>';

      // Month link
      echo '<li class="breadcrumb__item--month breadcrumb__item"><a href="'. get_month_link( get_the_time('Y'), get_the_time('m') ) .'">'. get_the_time('M') .' Archives</a></li>';

      // Day display
      echo '<li class="breadcrumb__item--current breadcrumb__item">'. get_the_time('jS') .' '. get_the_time('M'). ' Archives</li>';

    } else if( is_month() ) {

      // Month archive

      // Year link
      echo '<li class="breadcrumb__item--year breadcrumb__item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></li>';

      // Month Display
      echo '<li class="breadcrumb__item--month breadcrumb__item--current breadcrumb__item">'. get_the_time('M') .' Archives</li>';

    } else if ( is_year() ) {

      // Year Display
      echo '<li class="breadcrumb__item--year breadcrumb__item--current breadcrumb__item">'. get_the_time('Y') .' Archives</li>';

    } else if ( is_author() ) {

      // Auhor archive

      // Get the author information
      global $author;
      $userdata = get_userdata( $author );

      // Display author name
      echo '<li class="breadcrumb__item--current breadcrumb__item">'. 'Author: '. $userdata->display_name . '</li>';

    } else {

      echo '<li class="breadcrumb__item breadcrumb__item--current">'. post_type_archive_title() .'</li>';

    }

  } else if ( is_page() ) {

    // Standard page
    if( $post->post_parent ) {

      // If child page, get parents
      $anc = get_post_ancestors( $post->ID );

      // Get parents in the right order
      $anc = array_reverse( $anc );

      // Parent page loop
      if ( !isset( $parents ) ) $parents = null;
      foreach ( $anc as $ancestor ) {

        $parents .= '<li class="breadcrumb__item--parent breadcrumb__item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></li>';

      }

      // Display parent pages
      echo $parents;

      // Current page
      echo '<li class="breadcrumb__item--current breadcrumb__item">'. get_the_title() .'</li>';

    } else {

      // Just display current page if not parents
      echo '<li class="breadcrumb__item--current breadcrumb__item">'. get_the_title() .'</li>';

    }

  } else if ( is_search() ) {

    // Search results page
    echo '<li class="breadcrumb__item--current breadcrumb__item">Search results for: '. get_search_query() .'</li>';

  } else if ( is_404() ) {

    // 404 page
    echo '<li class="breadcrumb__item--current breadcrumb__item">' . 'Error 404' . '</li>';

  }

  // End breadcrumb
  echo '</ul>';
  }

  // Categories for pages
  add_action( 'init', 'ucla_page_categories' );
  function ucla_page_categories() {
    register_taxonomy_for_object_type( 'category', 'page' );
  }

  // Taxonomy for pages
  add_action( 'init', 'ucla_page_tags');
  function ucla_page_tags() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
  }

  // Title Separator
  add_filter( 'document_title_separator', 'ucla_document_title_separator' );
  function ucla_document_title_separator( $sep ) {
    $sep = '|';
    return $sep;
  }

  // Title
  add_filter( 'the_title', 'ucla_title' );
  function ucla_title( $title ) {
    if ( $title == '' ) {
      return '...';
    } else {
      return $title;
    }
  }

  // Read More Link
  add_filter( 'the_content_more_link', 'ucla_read_more_link' );
  function ucla_read_more_link() {
    if ( ! is_admin() ) {
      return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">More on this topic.</a>';
    }
  }

  // The Excerpt Link
  add_filter( 'excerpt_more', 'ucla_excerpt_read_more_link' );
  function ucla_excerpt_read_more_link( $more ) {
    if ( ! is_admin() ) {
      global $post;
      return '';
      return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">More on this topic.</a>';
    }
  }

  // Filter the excerpt length to 20 words.
  function wpdocs_custom_excerpt_length( $length ) {
      return 20;
  }
  add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

  // Image Sizing
  add_filter( 'intermediate_image_sizes_advanced', 'ucla_image_insert_override' );
  function ucla_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    return $sizes;
  }

  add_image_size( 'actual_size', 1427, 280 );


  // Add Sidebar widget
  add_action( 'widgets_init', 'ucla_right_init' );
  function ucla_right_init() {
    register_sidebar( array(
      'name' => esc_html__( 'Right Sidebar Widget Area', 'ucla' ),
      'id' => 'right-widget-area',
      'before_widget' => '<div class="widget-container %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ) );
  }


  // Add Dashboard Training Widget
  add_action('wp_dashboard_setup', 'ucla_custom_dashboard_widgets');

  function ucla_custom_dashboard_widgets() {
    wp_add_dashboard_widget('custom_help_widget', 'UCLA Strat. Comm. Theme Support', 'custom_dashboard_help');
    add_meta_box(
        'custom_help_widget',
        esc_html__( 'UCLA Strat. Comm. Theme Support', 'wporg' ),
        'custom_dashboard_help',
        'dashboard',
        'side', 'high'
    );
    // Global the $wp_meta_boxes variable (this will allow us to alter the array).
    global $wp_meta_boxes;
  }


  function custom_dashboard_help() {
    echo '<h2>Welcome to the UCLA WordPress theme built by Strategic Communications.</h2>' .
    '<p>We are currently working on more WordPress resources and always looking for contributors. Learn how to get started by visting the links below.</p>' .
    '<p><a href="#" rel="noopener">UCLA WordPress Resources (Coming Soon)</a></p>'.
    '<p><a href="https://bitbucket.org/uclaucomm/ucla-wp/src/distribution/" target="_blank" rel="noopener">UCLA Parent Theme Repository (Beta)</a></p>' .
    '<p><a href="https://bitbucket.org/uclaucomm/ucla-wp-child/src/distribution/" target="_blank" rel="noopener">UCLA Child Theme Repository</a></p>' .
    '<p><a href="https://bitbucket.org/uclaucomm/ucla-wp-plugin/src/distribution/" target="_blank" rel="noopener">UCLA Gutenberg Plugin (Beta)</a></p>' .
    '<p><a href="https://webcomponents.ucla.edu/" target="_blank" rel="noopener">UCLA Component Library</a></p>';
  }

// Custom Walker Navigation (Primary Nav)
require get_template_directory() . '/classes/class-ucla-wp-walker-navigation.php';

// Add Class to Nav List
function add_additional_class_on_li($classes, $item, $args) {
  if(isset($args->list_class)) {
      $classes[] = $args->list_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_additional_class_on_anchor($classes, $item, $args) {
  if (isset($args->link_class)) {
    $classes['class'] = $args->link_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_anchor', 1, 3);

// Mobile Search Form
function mobile_search_form( $form ) {
  $form = '<div class="nav-primary__search-mobile">';
  $form .= '<form class="nav-primary__search-form" role="search" method="get" id="menu-search-mobile" action="'. home_url( '/' ) .'">';
  $form .= '<label><span class="nav-primary__screen-reader-text visuallyhidden">Search for:</span><input type="search" class="nav-primary__search-field" placeholder="Search …" value="" name="s"></label>';
  $form .= '<input type="submit" class="nav-primary__search-submit" value="Search">';
  $form .= '</form></div>';
  return $form;
}

// Add search to first item of Primary Nav
function add_mobile_search($items, $args) {
  if ($args->theme_location == 'main-menu') {
    add_filter('get_search_form', 'mobile_search_form');
    $mobilesearch = '<li>' . get_search_form(false) . '</li>';
    return $mobilesearch.$items;
  } else {
    return $items;
  }
}
add_filter('wp_nav_menu_items', 'add_mobile_search', 10, 2);

// Add search to the end of Primary Nav
function add_search_to_navigation($items, $args) {
  remove_filter('get_search_form', 'mobile_search_form');
  if ($args->theme_location == 'main-menu') {
    $items .= "<li>" . get_search_form(false) . "</li>";
  }
  return $items;
}
add_filter( 'wp_nav_menu_items', 'add_search_to_navigation', 10, 2 );

// class ucla_footer_menu_walker extends Walker_Nav_Menu {
//   /**
//    * @see Walker::start_el()
//    * @since 3.0.0
//    *
//    * @param string $output Passed by reference. Used to append additional content.
//    * @param object $item Menu item data object.
//    * @param int $depth Depth of menu item. Used for padding.
//    * @param int $current_page Menu item ID.
//    * @param object $args
//    */
//   function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
//   {
    
//   }
// }