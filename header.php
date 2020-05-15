<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <header id="header">

      <div class="header-logo">
        <div class="header-logo__wrap">
       	  <img class="header-logo__image" src="/wp-content/themes/ucla-sc/assets/images/ucla_logo_white.svg" alt="UCLA Logo" /></a>
        </div>
      </div>

      <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
      <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>

      <button id="primary-ham" class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation" alt="navigation and search">
    	  <span class="hamburger-box">
    	    <span class="hamburger-inner"></span>
    	  </span>
    	</button>

      <nav id="menu">
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
      </nav>

      <div id="search"><?php get_search_form(); ?></div>

    </header>
