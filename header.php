<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
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
        </div>
      </div>

      <!-- <div id="search"></div> -->

    </header>
