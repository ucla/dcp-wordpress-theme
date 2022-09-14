<?php
/* Template Name: Right Sidebar */
get_header(); ?>
<main class="right-sidebar-template">
      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content/content-page' );
      endwhile; // End of the loop.
      ?>
  </main>
<?php get_footer(); ?>