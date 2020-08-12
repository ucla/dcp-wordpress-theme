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
          <?php the_content(); ?>
        </div>

      </div>

      <div class="col span_3_of_12">
        <?php get_sidebar(); ?>
      </div>

    </div>

    <?php endwhile; endif; ?>

  </article>



</main>

<?php get_footer(); ?>
