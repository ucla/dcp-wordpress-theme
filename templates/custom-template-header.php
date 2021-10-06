<header class="header">

  <div class="ucla campus">
    <div class="col span_12_of_12">
      <div class="breadcrumb pt-sm-32 pt-lg-64"><?php get_breadcrumb(); ?></div>
      <h1 class="mt-12 mb-24 mb-md-32"><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="custom-template-hero">
    <img src="<?php if ( has_post_thumbnail() ) { echo $image; } ?>" class="custom-template-hero__image" alt="">
  </div>

</header>
