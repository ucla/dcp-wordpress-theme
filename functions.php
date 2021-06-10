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

  global $content_width;


  if ( ! isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array(
      'main-menu' => esc_html__( 'Main Menu', 'ucla' ),
      'foot-menu' => esc_html__( 'Foot Menu (Menu name must be "Foot Menu")', 'ucla-foot' )
    ));
  }

  // Load Theme Scripts and Styles
  add_action( 'wp_enqueue_scripts', 'ucla_load_scripts' );
  function ucla_load_scripts() {
    // CDN jQuery from Google
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
    // Install the UCLA Component library styles
    wp_enqueue_style( 'lib-style', 'https://cdn.webcomponents.ucla.edu/1.0.0-beta.14/css/ucla-lib.min.css' );
    // Install the UCLA Component Library  scripts
    wp_enqueue_script( 'lib-script', 'https://s3-us-west-1.amazonaws.com/webcomponents.ucla.edu/public/1.0.0-beta.14/js/ucla-lib-scripts.min.js' );
    // Install the WordPress Theme Styles
    wp_enqueue_style( 'ucla-style', '/wp-content/themes/ucla-wp/dist/css/global.css' );
    // Install the WordPress Theme Scripts
    wp_enqueue_script( 'ucla-script', '/wp-content/themes/ucla-wp/dist/js/scripts.js' );
  }

  // Load ADMIN Login Styles
  add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );
  function my_login_page_remove_back_to_link() {
    // Path the admin page login styles
    wp_enqueue_style( 'login-style', '/wp-content/themes/ucla-wp/admin-styles.css' );
  }

  // Breadcrumbs
  function get_breadcrumb() {
      echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
      if ( is_single()) {
          echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
          echo get_post_type( get_the_ID() );
              // if (is_single()) {
              //     echo " &nbsp;&nbsp;&#47;&nbsp;&nbsp; ";
              //     the_title();
              // }
      } elseif (is_page()) {
          // echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
          // echo the_title();
      } elseif (is_search()) {
          echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;Search Results for... ";
          echo '"<em>';
          echo the_search_query();
          echo '</em>"';
      }
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


  add_filter ('get_the_excerpt','wpse240352_filter_excerpt');

  function wpse240352_filter_excerpt ($post_excerpt) {
    $post_excerpt = '<p class="mb-32">' . $post_excerpt . '</p>';
    return $post_excerpt;
    }

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
