<?php

add_action( 'after_setup_theme', 'ucla_setup' );

function ucla_setup() {

  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form' ) );

  global $content_width;


  if ( ! isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu (Menu name must be "Main Menu")', 'ucla' ) ) );
  }

  // Load Theme Scripts and Styles
  add_action( 'wp_enqueue_scripts', 'ucla_load_scripts' );
  function ucla_load_scripts() {
    // CDN jQuery from Google
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
    // Install the UCLA Component library styles
    wp_enqueue_style( 'lib-style', '/wp-content/themes/ucla-sc/dist/css/ucla-components-library/ucla-lib.min.css' );
    // Install the UCLA Component Library  scripts
    wp_enqueue_script( 'lib-script', '/wp-content/themes/ucla-sc/dist/js/ucla-components-library/ucla-lib-scripts.min.js' );
    // Install the WordPress Theme Styles
    wp_enqueue_style( 'theme-style', '/wp-content/themes/ucla-sc/dist/css/global.css' );
    // Install the WordPress Theme Scripts
    wp_enqueue_script( 'theme-script', '/wp-content/themes/ucla-sc/dist/js/scripts.js' );
  }

  // Load ADMIN Login Styles
  add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );
  function my_login_page_remove_back_to_link() {
    // Path the admin page login styles
    wp_enqueue_style( 'login-style', '/wp-content/themes/ucla-sc/admin-styles.css' );
  }

  // Breadcrumbs
  function get_breadcrumb() {
      echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
      if ( is_single()) {
          echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
          echo get_post_type( get_the_ID() );
              if (is_single()) {
                  echo " &nbsp;&nbsp;&#47;&nbsp;&nbsp; ";
                  the_title();
              }
      } elseif (is_page()) {
          echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
          echo the_title();
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

  // Title Seperator
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

  // Filter the except length to 20 words.
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
  add_action( 'widgets_init', 'ucla_widgets_init' );
  function ucla_widgets_init() {
    register_sidebar( array(
      'name' => esc_html__( 'Sidebar Widget Area', 'ucla' ),
      'id' => 'primary-widget-area',
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ) );
  }

  function theme_settings_page(){
    ?>
	    <div class="wrap">
	    <h1>Theme Settings</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	  <?php
  }

  function add_theme_menu_item() {
  	add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-panel", "theme_settings_page", null, 2);
  }

  add_action("admin_menu", "add_theme_menu_item");


function logo_display()
{
	?>
        <input type="file" name="logo" />
        <?php echo get_option('logo'); ?>
   <?php
}

function handle_logo_upload($option){
    if(!function_exists('wp_handle_upload'))
    {

        require_once(ABSPATH .'wp-admin/includes/file.php');
    }
    //you are using empty version make sure your php version is higher than 5.2 https://stackoverflow.com/questions/46516267/wordpress-wp-handle-upload-not-moving-the-file
    if(!empty($_FILES["logo"])){
        $move_logo = wp_handle_upload( $_FILES["site_logo_custom"], array('test_form' => false) );
        if ( $move_logo && !isset($move_logo['error']) ) {
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid' => $wp_upload_dir['url'] . '/' . basename($move_logo['file']),
                'post_mime_type' => $move_logo['type'],
                'post_title' => preg_replace( '/\.[^.]+$/', '', basename($move_logo['file']) ),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $logo_attach_id = wp_insert_attachment($attachment, $move_logo['file']);
            $image_attributes = wp_get_attachment_image_src( $logo_attach_id );
            if ( $image_attributes ) {
              return $image_attributes[0];
             }
             else
             {
                return $option;
             }
        }else{
            return $option;
        }
    }else{
        return $option;
    }

}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("logo", "Logo", "logo_display", "theme-options", "section");

    register_setting("section", "logo", "handle_logo_upload");
}

add_action("admin_init", "display_theme_panel_fields");



  // Add Dashboard Training Widget
  add_action('wp_dashboard_setup', 'ucla_custom_dashboard_widgets');

  function ucla_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'UCLA Strat. Comm. Theme Support', 'custom_dashboard_help');
  }

  function custom_dashboard_help() {
    echo '<p>Welcome to the Strategic UCLA Communications Theme.</p><p><strong>For WordPress Resources:</strong></p><p>UCLA Spaces Page: <em><a href="https://spaces.ais.ucla.edu/display/ucomm/WordPress" target="_blank">UCLA WordPress</a></em></p><p><strong>Theme Specific Video Resources:</strong></p><iframe width="100%" height="270px" src="https://www.youtube.com/embed/PxB7V7rSvUE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><p>Page Intros: <em><a href="https://youtu.be/PxB7V7rSvUE" target="_blank">Add Page Intro Sentence</a></em></p><p>Fluid Class: <em><a href="https://youtu.be/aUKAs9iMDDA" target="_blank">Expand Backgound past content containter</a></em></p>';
  }
