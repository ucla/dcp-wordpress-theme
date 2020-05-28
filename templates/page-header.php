<header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $thumbnail[0]; ?>);" <?php } ?>>
  <div class="ucla campus">
    <div class="col span_12_of_12">
      <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
      <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
      <p class="intro"><?php
      $key_values = get_post_custom_values( 'intro' );

      foreach ( $key_values as $key => $value ) {
          echo $value;
      }

      ?></p>

    </div>
  </div>
</header>
