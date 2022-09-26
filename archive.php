<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */
get_header(); ?>
<main id="main" class="archive-template">
    <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_12_of_12">
                <?php get_breadcrumb(); ?>
                <h1 class="entry-title"><?php echo wp_kses_post(get_the_archive_title()); ?></h1>
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">

        <div class="col span_<?php echo (is_active_sidebar('primary-widget-area') ? '7' : '12') ?>_of_12">

            <?php

if ( have_posts() ) {
    // Load posts loop.
    while ( have_posts() ) {
      the_post();
      get_template_part( 'template-parts/content/content' );
    }
    the_posts_pagination(
      array(
        'mid_size' => 2,
        'prev_text' => sprintf(
          '<span class="pagination-prev"></span>'
        ),
        'next_text' => sprintf(
          '<span class="pagination-next"></span>'
        )
      )
    );
  } else {
    // If no content, include the "No posts found" template.
      get_template_part( 'template-parts/content/content-none' );
  }
            ?>

            <div class="pagination mb-64">
                <?php echo get_the_posts_pagination([
                    'format'  => 'page/%#%',
                    'current' => $paged ? $paged : 1,
                    'mid_size'        => 10,
                    'prev_text'       => __('&laquo;'),
                    'next_text'       => __('&raquo;')
                ]); ?>
            </div>
        </div>



        <?php if (is_active_sidebar('primary-widget-area')) : ?>

            <div class="col span_2_of_12" style="min-height: 1px;"></div>
            <div class="col span_3_of_12">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>

    </div>

</main>
<?php get_footer(); ?>
