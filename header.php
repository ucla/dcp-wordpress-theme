<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <?php
      if ( myprefix_get_theme_option('gtm_input') !== NULL ) {
        $gtm_tag = myprefix_get_theme_option('gtm_input');
        ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); 
        })(window,document,'script','dataLayer','<?php echo $gtm_tag;?>');</script>
        <!-- End Google Tag Manager -->
        <?php
      }
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" initial-scale="1" />
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  </head>

  <body <?php body_class(); ?>>

    <?php
    if ( myprefix_get_theme_option('gtm_input') !== NULL ) {
      $gtm_tag = myprefix_get_theme_option('gtm_input');
      ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtm_tag;?>"
      height="0" width="0" style="display:none;visibility:hidden" title="Google Tag Manager" aria-hidden="true"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <?php
    }
    ?>

    <div id="skip-nav" class="skip-nav" role="navigation" aria-label="Skip navigation">
      <a class="button" href="#menu">Skip to Navigation</a>
      <a class="button mobile" href="#primary-ham">Skip to Navigation</a>
      <a class="button" href="#main">Skip to Main Content</a>
    	<a class="button" href="#footer">Skip to Footer Links</a>
    </div>

    <header id="header" class="">

      <div class="header-logo">
        <div class="header-logo__wrap">
       	  <a href="http://ucla.edu"><img class="header-logo__image" src="/wp-content/themes/ucla-wp/images/ucla_logo_white.svg" alt="UCLA Logo" /></a>
        </div>
      </div>

      <div class="header-wrap clearfix">
        <div class="site-name clearfix">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
        </div>

        <?php if ( has_nav_menu( 'secondary-menu' ) ) { ?>
        <div id="menu-secondary">
          <?php wp_nav_menu( array(
            'theme_location' => 'secondary-menu',
            'depth' => 1,
            'container_class' => 'nav-secondary',
            'container_id' => 'nav-second',
            'menu_id' => 'nav-secondary__list',
            'menu_class' => 'nav-secondary__list',
            'container_aria_label' => 'Secondary Menu',
            'list_class' => 'nav-secondary__item',
            'link_class' => 'nav-secondary__link'
          )) ?>
        </div>
        <?php } ?>
          <?php if ( has_nav_menu( 'main-menu' ) ) { ?>
            <nav id="menu">
              <button id="primary-ham" class="hamburger" type="button" aria-label="Menu" aria-controls="navigation" alt="navigation and search">
                <span class="hamburger__box">
                  <span class="hamburger__inner"></span>
                </span>
              </button>

              
              <nav id="nav-main" class="nav-primary" aria-label="Main Menu">
                <ul class="nav-primary__list" id="menu-primary-menu">
                  <?php
                  wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'depth' => 3,
                    // 'menu_class' => 'nav-primary__list',
                    'items_wrap' => '%3$s',
                    'walker' => new ucla_header_menu_walker()
                  ));
                  if ( has_nav_menu( 'secondary-menu' ) ) { 
                    wp_nav_menu( array(
                      'theme_location' => 'secondary-menu',
                      'depth' => 1,
                      'items_wrap' => '%3$s',
                      'list_class' => 'nav-secondary__item',
                      'link_class' => 'nav-secondary__link',
                      'container' => false
                    ));
                  }
                  ?>
                </ul>
              </nav>
              
          </nav>

        <?php } // end if has_nav_menu ?>


      </div>

    </header>