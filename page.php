<?php get_header(); ?>

<main id="main" class="main page-no-banner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="ucla campus">
          <div class="col span_12_of_12">
            <div class="breadcrumb"><?php get_breadcrumb(); ?> / <?php the_title(); ?></div>
            <h1 class="mb-24"><?php the_title(); ?></h1>
            <?php edit_post_link(); ?>
          </div>
        </div>

        <div class="ucla campus entry-content">
          <div class="col span_7_of_12">
            <?php the_content(); ?>
          </div>


          <?php if (is_active_sidebar('right-widget-area')) : ?>
              <div class="col span_2_of_12"></div>
              <div class="col span_3_of_12">
                  <?php dynamic_sidebar('right-widget-area'); ?>
              </div>
          <?php endif; ?>

        </div>

    <?php endwhile;
  endif; ?>

      </article>


</main>

<?php get_footer(); ?>
