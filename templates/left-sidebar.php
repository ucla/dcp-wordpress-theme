<?php
/* Template Name: Left Sidebar */
get_header(); ?>
<main class="left-sidebar-template">
      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content/content-page' );
      endwhile; // End of the loop.
      ?>
  </main>
<?php get_footer(); ?>