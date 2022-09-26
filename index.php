<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */
get_header(); ?>
<main id="content">
  <?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
    <div class="ucla campus masthead">
      <div class="col span_12_of_12">
        <?php get_breadcrumb(); ?>
        <h1><?php single_post_title(); ?></h1>
      </div>
    </div>
  <?php endif; ?>
  <div class="ucla campus">
    <div class="col span_12_of_12">
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
    </div>
  </div>
</main>
<?php get_footer(); ?>
