<?php /* Template Name: Front Page, No Hero */

 get_header(); ?>

<main id="main" class="main front-page-two">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="ucla campus entry-content">

          <?php include 'templates/front-page-two-header.php'; ?>

          <div class="col span_12_of_12">

            <?php the_content(); ?>

          </div>

        </div>

      </article>

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
