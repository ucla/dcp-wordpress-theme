<?php /* Template Name: Front Page, Hero */

global $id;

$thumb_id = get_post_thumbnail_id($id);

if ('' != $thumb_id) {
  $thumb_url  = wp_get_attachment_image_src($thumb_id, 'actual_size', true);
  $image      = $thumb_url[0];
}

?>

<?php get_header(); ?>
<?php /* Load the appropriate page template based on user selection */
  if (get_page_template_slug() == "front-page.php") { ?>
  <main id="main" class="main front-page-one">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


          <?php include 'templates/front-page-one-header.php'; ?>


          <div class="ucla campus entry-content">

            <div class="col span_12_of_12">

              <?php the_content(); ?>

            </div>



            <div class="col span_12_of_12">

              <h2 class="mb-32 mt-64">Latest messages to the UCLA community </h2>

              <?php
              // Example argument that defines three posts per page.
              $args = array(
                'posts_per_page' => 2
              );

              // Variable to call WP_Query.
              $the_query = new WP_Query($args);

              if ($the_query->have_posts()) :
                // Start the Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                  // Loop Content
                  include 'templates/entry-content.php';
                // End the Loop
                endwhile;
              else :
                // If no posts match this query, output this text.
                _e('Sorry, no results match your criteria.', 'textdomain');
              endif;

              wp_reset_postdata();
              ?>

              <a class="btn white mb-80 mb-xs-64 mt-32" href="/updates">
                <span>Read all updates</span>
              </a>

            </div>

          </div>

      <?php endwhile;
    endif; ?>

        </article>


  </main>
<?php } else { ?>
  <?php include get_page_template_slug(); ?>
<?php } ?>

<?php get_footer(); ?>
