<?php /* Template Name: Custom Template One */

  global $id;

  $thumb_id = get_post_thumbnail_id( $id );

  if ( '' != $thumb_id ) {
    $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'actual_size', true );
    $image      = $thumb_url[0];
  }

?>

<?php get_header(); ?>

<main id="main" class="main custom-template">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php include 'templates/custom-template-header.php'; ?>


    <div class="ucla campus entry-content">

      <div class="col span_12_of_12">

        <?php the_content(); ?>

      </div>

    </div>

  </article>

<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
