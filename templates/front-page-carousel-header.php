<header class="header">
  <div class="front-page-hero">
    <?php
      $post_meta_value = get_post_meta( $post->ID, 'carousel-title', true );
      if ($post_meta_value !== '') {
        echo '<img class="title-image" src="./wp-content/themes/ucla-wp/images/Molecule.svg" />';
        echo '<h1 class="title-text">';
        $title_words = explode(" ", $post_meta_value);
        foreach ($title_words as $title_word) {
          echo '<span class="title-word">';
          echo $title_word;
          echo '</span>';
        }
        echo '</h1>';
      }
    ?>
    <script src='https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js'></script>
    <?php
      $carousel_title = get_theme_mod( 'carousel_title', '' );
      if ($carousel_title !== '') {
        echo '<img
          src="./wp-content/themes/ucla-wp/images/Molecule.svg"
          class="title-image"
        />
        <h1 class="title-text">';
        foreach (explode(" ", $carousel_title) as $title_word) {
          echo '<span class="title-word">' . $title_word .'</span>';
        }
        echo '</h1>';
      }
    ?>
    <div id="splide-front-page-carousel" class="splide">
      <?php
        $carousel_autoplay = get_theme_mod( 'carousel_autoplay', false );
        if ($carousel_autoplay) {
          echo '<div class="splide-autoplay-controls">
            <img
              class="play-pause-button toggle-splide-front-page-carousel"
              src="./wp-content/themes/ucla-wp/images/pause-white.svg"
              alt="Pause Carousel"
            />
          </div>';
        }
      ?>
      <div class="splide__slider">
        <div class="splide__track">
          <ul class="splide__list">
            <?php
              get_theme_mod( 'carousel_interval', 'default' );
              for ($x = 1; $x <= 6; $x++) {
                $carousel_image_id = get_theme_mod( 'carousel_image_' . strval($x), '' );
                if ($carousel_image_id == '')
                  continue;
                $image_attributes = wp_get_attachment_image_src($carousel_image_id);                  
                if ( $image_attributes ) {
                  $img_url = $image_attributes[0];
                  $img_alt = get_theme_mod( 'carousel_alt_' . strval($x), 'image number ' . strval($x) );
                  $img_link = get_theme_mod( 'carousel_link_' . strval($x), '' );
                  echo '<li class="splide__slide"><div class="splide__slide__container">';
                  if ($img_link !== '') echo '<a href="' . $img_link . '" target="_blank">';
                  echo '<img src="' . $img_url . '" alt="' . $img_alt . '" width="100%" height="auto">';
                  if ($img_link !== '') echo '</a>';
                  echo '</div></li>';
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function(event) {
        var frontPageSplide = new Splide("#splide-front-page-carousel", {
          type: 'loop',
          width: '100%',
          height: '70vh',
          cover: true,
          classes: {
            arrow: 'splide__arrow carousel-arrows',
            next: 'splide__arrow--next carousel-arrow-right',
            pagination: 'splide__pagination carousel-pagination-internal'
          },
          pauseOnHover: false,
          pauseOnFocus: false,
          speed: 800,
          autoplay: <?php
              $carousel_autoplay = get_theme_mod( 'carousel_autoplay', false );
              $autoplay_str = $carousel_autoplay ? 'true' : 'false';
              echo $autoplay_str;
            ?>,
          interval: Number(
              <?php
                $carousel_interval = get_theme_mod( 'carousel_interval', 5);
                if ($carousel_interval < 5)
                  $carousel_interval = 5;
                echo strval($carousel_interval);
              ?>
            ) * 1000,
        });
        if (<?php
            $carousel_autoplay = get_theme_mod( 'carousel_autoplay', false );
            $autoplay_str = $carousel_autoplay ? 'true' : 'false';
            echo $autoplay_str;
          ?>
        ) {
          var toggleButton = frontPageSplide.root.querySelector( '.toggle-splide-front-page-carousel' );

          frontPageSplide.on( 'autoplay:play', function () {
            toggleButton.src = './wp-content/themes/ucla-wp/images/pause-white.svg';
            toggleButton.alt = 'Pause Carousel';
          } );

          frontPageSplide.on( 'autoplay:pause', function () {
            toggleButton.src = './wp-content/themes/ucla-wp/images/play-white.svg';
            toggleButton.alt = 'Play Carousel';
          } );

          toggleButton.addEventListener( 'click', function () {
            var Autoplay = frontPageSplide.Components.Autoplay;
            if ( toggleButton.alt == 'Play Carousel' ) {
              Autoplay.play();
            } else {
              Autoplay.pause();
            }
          });
        }
        frontPageSplide.mount();
      });
    </script>

    <div class="front-page-hero__info">
      <div class="front-page-hero__info--wrap">

        <!-- <h1 class="front-page-hero__title"><?php the_title(); ?></h1> -->

        <?php //edit_post_link(); ?>

          <?php  $key_values = get_post_custom_values( 'intro' );

            if (is_array($key_values) || is_object($key_values)) {
              echo '<p class="front-page-hero__intro">';
              foreach ( $key_values as $key => $value ) {
                echo $value;
              }
              echo '</p>';
            }
          ?>

      </div>
    </div>
  </div>
</header>
