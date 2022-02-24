<header class="header">

  <div class="ucla campus masthead">
    <div class="col span_12_of_12">
      <?php get_breadcrumb(); ?>
      <h1><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="custom-template-hero">
    <img src="<?php if ( has_post_thumbnail() ) { echo $image; } ?>" class="custom-template-hero__image" alt="">
  </div>

</header>
