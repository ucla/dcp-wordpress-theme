<header class="header">

  <div class="custom-template-hero-three">

    <img src="<?php if ( has_post_thumbnail() ) { echo $image; } ?>" class="custom-template-hero__image" alt="">

    <!-- <div class="custom-template-hero-three_title">
      <h1 class="ribbon"><?php the_title(); ?></h1>
    </div> -->

    <div class="custom-template-hero-three_title">
      <img class="ribbon-molecule" alt="molecule" src="https://webcomponents.ucla.edu/build/1.0.0-beta.16/assets/img/Molecule.svg" />
      <div class="ribbon">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>

  </div>

</header>
