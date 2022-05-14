<header class="header">
  <div class="front-page-hero">

    <script src='https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js'></script>
    <div id="splide-front-page-carousel" class="splide">
      <div class="splide__slider">
        <div class="splide__track">
          <ul class="splide__list">

            <?php
              $images = &get_children( array (
                'post_mime_type' => 'image'
              ));
              if ( empty($images) ) {
                // no attachments here
              } else {
                foreach ( $images as $attachment_id => $attachment ) {
                  $image_attributes = wp_get_attachment_image_src($attachment_id);
                  if ( $image_attributes ) {
                    echo '<li className="splide__slide">';
                    echo '<img src="'; echo $image_attributes[0]; echo '" width="1000" height="700">';
                    echo '</li>';
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
