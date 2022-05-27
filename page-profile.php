<?php get_header(); ?>

<main id="main" class="main page-no-banner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="ucla campus masthead">
          <div class="col span_12_of_12">
            <?php get_breadcrumb(); ?>
            <h1><?php the_title(); ?></h1>
          </div>
        </div>

        <div class="ucla campus entry-content">
          <div class="col span_<?php echo (is_active_sidebar('right-widget-area') ? '7' : '12') ?>_of_12">
            <?php the_content(); ?>

            <?php edit_post_link(); ?>
          </div>


          <?php if (is_active_sidebar('right-widget-area')) : ?>
              <div class="col span_2_of_12" style="min-height:1px;"></div>
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
