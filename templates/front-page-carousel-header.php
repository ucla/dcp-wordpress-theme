<header class="header">
  <?php
    $carousel_title_1 = get_theme_mod( 'carousel_title_1', '' );
    $isHidden = 'hidden';
    if ($carousel_title_1 !== '')
      $isHidden = '';
    echo '<img
      src="' . get_template_directory_uri() . '/images/Molecule.svg"
      class="title-image ' . $isHidden . '"
      id="carousel-title-image"
    />
    <h1 class="title-text " id="carousel-title-text">';
    foreach (explode(" ", $carousel_title_1) as $title_word) {
      echo '<span class="title-word ' . $isHidden . '">' . $title_word .'</span>';
    }
    echo '</h1>';
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
              $image_attributes = wp_get_attachment_image_src($carousel_image_id, 'full');                  
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
  <script src='https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js'></script>
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
        speed: 1200,
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

      // Prepare titles for individual slides
      frontPageSplide.on( 'move', function (newIndex) {
        const titleList = new Array(6);
        <?php
          for ($x = 1; $x <= 6; $x++){
            $carousel_title = get_theme_mod( 'carousel_title_' . strval($x), '' );
            $carousel_title = str_replace('"', '', $carousel_title);
            $carousel_title = str_replace("'", '', $carousel_title);
            echo 'titleList[' . strval($x-1) . '] = ("' . $carousel_title . '");';
          }
        ?>

        const imageElement = document.getElementById('carousel-title-image');
        const titleElement = document.getElementById('carousel-title-text');
        if (!titleElement)
          return;

        while (titleElement.lastChild)
          titleElement.removeChild(titleElement.lastChild);

        const titleText = titleList[newIndex];
        for (const word of titleText.split(" ")) {
          const wordElement = document.createElement("span");
          wordElement.innerText = word;
          wordElement.classList.add('title-word')
          titleElement.appendChild(wordElement);
        }

        // Do not display the title if there isn't one
        if (titleText !== '') {
          if (imageElement.classList.contains('hidden'))
            imageElement.classList.remove('hidden');
          if (titleElement.classList.contains('hidden'))
            titleElement.classList.remove('hidden');
        } else {
          if (!imageElement.classList.contains('hidden'))
            imageElement.classList.add('hidden');
          if (!titleElement.classList.contains('hidden'))
            titleElement.classList.add('hidden');
        }
      } );

      frontPageSplide.mount();
    });
  </script>
</header>
