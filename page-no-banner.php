<?php /* Template Name: No Sidebar, No Hero */

global $id;

$thumb_id = get_post_thumbnail_id($id);

if ('' != $thumb_id) {
  $thumb_url  = wp_get_attachment_image_src($thumb_id, 'actual_size', true);
  $image      = $thumb_url[0];
}

?>

<?php get_header(); ?>

<main id="main" class="main page-no-banner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="ucla campus entry-content">

          <div class="col span_12_of_12">
            <div class="breadcrumb mb-24"><?php get_breadcrumb(); ?> / <?php the_title(); ?></div>
            <h1 class="mb-24 mb-md-32"><?php the_title(); ?></h1>
            <?php the_content(); ?>

          </div>

        </div>

    <?php endwhile;
  endif; ?>

      </article>


</main>

<?php get_footer(); ?>
