<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header(); ?>
  <main class="page-template">
      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content/content-page' );
      endwhile; // End of the loop.
      ?>
  </main>
<?php get_footer(); ?>
