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
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
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

      <div class="ucla campus header">
        <div class="site-name">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
        </div>

        <div class="nav-wrap">

          <?php if ( has_nav_menu( 'main-menu' ) ) { ?>

            <button id="primary-ham" class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation" alt="navigation and search">
          	  <span class="hamburger-box">
          	    <span class="hamburger-inner"></span>
          	  </span>
          	</button>

            <nav id="menu">
              <?php get_search_form(); ?>
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>

              <div class="search-desktop">
                <button id="search-button" class="search-desktop_button">
                  <img id="search-svg" class="search-icon" src="/wp-content/themes/ucla-wp/images/icons/denotive/search--blue.svg" alt="search button">
                </button>

                <div class="search-block-form search-mobile" id="block-search" role="search">

                </div>
              </div>
          </nav>

        <?php } // end if has_nav_menu ?>


        </div>
      </div>

      <!-- <div id="search"></div> -->

    </header>
