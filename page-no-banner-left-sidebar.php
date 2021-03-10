<?php /* Template Name: Page No Banner Left Sidebar*/

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

          <?php if (is_active_sidebar('left-widget-area')) : ?>


              <div class="col span_3_of_12">
                  <?php dynamic_sidebar('left-widget-area'); ?>
              </div>
              <div class="col span_1_of_12"></div>
          <?php endif; ?>

          <div class="col span_8_of_12">
            <div class="breadcrumb mb-24"><?php get_breadcrumb(); ?> / <?php the_title(); ?></div>
            <?php the_content(); ?>

          </div>



        </div>

    <?php endwhile;
  endif; ?>

      </article>


</main>

<?php get_footer(); ?>
