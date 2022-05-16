<header class="header">
  <div class="front-page-hero">
    <?php
      $post_meta_value = get_post_meta( $post->ID, 'carousel-title', true );
      if ($post_meta_value !== null) {
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
    <div id="splide-front-page-carousel" class="splide">
      <div class="splide__slider">
        <div class="splide__track">
          <ul class="splide__list">

            <?php
              $images = &get_children( array (
                'post_mime_type' => 'image'
              ));
              if ( !empty($images) ) {
                foreach ( $images as $attachment_id => $attachment ) {
                  $image_attributes = wp_get_attachment_image_src($attachment_id);                  
                  if ( $image_attributes ) {
                    $img_url = $image_attributes[0];
                    $img_title = get_the_title($attachment_id);
                    if(strpos($img_title, "__carousel") == false)
                      continue;
                    echo '<li class="splide__slide"><div class="splide__slide__container">';
                    echo '<img src="' . $img_url . '" width="auto" height="auto">';                    
                    echo '</div></li>';
                  }
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function(event) {
        new Splide("#splide-front-page-carousel", {
            type: 'loop',
            width: '100%',
            height: '70vh',
            cover: true,
            classes: {
                arrow: 'splide__arrow carousel-arrows',
                next: 'splide__arrow--next carousel-arrow-right',
                pagination: 'splide__pagination carousel-pagination-internal'
            }
        }).mount();
      });
    </script>

    <div class="front-page-hero__info">
      <div class="front-page-hero__info--wrap">

        <h1 class="front-page-hero__title"><?php the_title(); ?></h1>

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
