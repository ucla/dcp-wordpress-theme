<?php get_header(); ?>

<main id="main" class="single-template">
  <?php if ( have_posts() ) : while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content/content-single' );
  ?>

    

  <?php endwhile; endif; ?>
    
    

</main>

<?php get_footer(); ?>
