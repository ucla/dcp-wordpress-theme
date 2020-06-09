<?php

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID. 'post-thumbnail size' ) );

?>

<?php get_header(); ?>

<main id="main" class="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php include 'templates/page-header.php'; ?>

    <div class="ucla campus">

      <div class="col span_9_of_12">

        <div class="ucla campus">

        <?php
          if ( is_page([34, 36, 38, 40, 42, 44, 46, 48]) ) {

            include 'templates/faq-loop.php';

          }

          if ( is_page(24) ) { ?>
            <p><strong><?php printf( __( 'Last modified: %s', 'textdomain' ), get_the_modified_date( 'F j, Y' ) ) ?></strong></p>
        <?php } ?>
        <?php the_content(); ?>

        <?php
          if ( is_page(24) ) {
            include 'templates/confirmed-case-loop.php';

            echo 'UCLA Health data is reported separately and <a href="https://www.uclahealth.org/coronavirus" target="_blank">more information can be found here.</a>';
          }
          ?>

      </div>

      <div class="col span_3_of_12">
        <?php get_sidebar(); ?>
      </div>

    </div>

    <?php
      if ( is_page( 66 ) ) {

        include 'templates/blades/univ-ops.php';

      }

      ?>

    <?php endwhile; endif; ?>

  </article>



</main>

<?php get_footer(); ?>
