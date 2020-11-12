<?php

  if ( is_page(34) ) {
    $tag_id = 3;
  }

  if ( is_page(36) ) {
    $tag_id = 9;
  }

  if ( is_page(38) ) {
    $tag_id = 11;
  }

  if ( is_page(40) ) {
    $tag_id = 14;
  }

  if ( is_page(42) ) {
    $tag_id = 13;
  }

  if ( is_page(44) ) {
    $tag_id = 10;
  }

  if ( is_page(46) ) {
    $tag_id = 5;
  }

  if ( is_page(48) ) {
    $tag_id = 12;
  }

  ?>

<div class="mb-32">
  <h2 class="mb-40">Frequently asked questions</h2>
  <div class="accordion">
  <?php //FAQ Loop
  $args = array(
      'post_type' => 'faq',
      'tag__in' => $tag_id,
      'post_status' => 'publish',
      'posts_per_page' => 0,
  );

  $loop = new WP_Query( $args );

  while ( $loop->have_posts() ) : $loop->the_post(); ?>

<<<<<<< HEAD
  <div class="accordion">
    <button class="accordion-title mb-16" aria-expanded="false"><?php print the_title(); ?><img class"accordion-title--arrow" src="/wp-content/themes/ucla-wp/images/icons/arrow-down-defaultblue.svg" alt="Accordion Open/Close Arrown"></button>
    <div class="accordion-content mt-32"><?php the_content(); ?></div>
  </div>
=======

    <button class="accordion-title" aria-expanded="false"><?php print the_title(); ?></button>
    <div class="accordion-content mt-32 mb-48"><?php the_content(); ?></div>
>>>>>>> d80aefa3bf5ce7f332b40023311ec72252fbaeca


  <?php endwhile; ?>
  </div>
<?php wp_reset_postdata(); ?>
</div>
