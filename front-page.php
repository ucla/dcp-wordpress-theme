<?php /* Template Name: No Sidebar */

$thumb_id = get_post_thumbnail_id( $id );
if ( '' != $thumb_id ) {
  $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'actual_size', true );
  $image      = $thumb_url[0];
}

?>

<?php get_header(); ?>

<main class="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $image; ?>);" <?php } ?>>
      <div class="ucla campus">
        <div class="col span_12_of_12">
          <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        </div>
      </div>
    </header>

    <div class="ucla campus entry-content">

      <div class="col span_12_of_12">

        <?php the_content(); ?>

      </div>

    </div>
    <div class="latest-campus">
      <div class="ucla campus">
        <div class="col span_9_of_12">

          <h2 class="mb-32 mt-64">Latest Messages from Campus</h2>

          <?php
          // Example argument that defines three posts per page.
          $args = array(
            'posts_per_page' => 2
           );

          // Variable to call WP_Query.
          $the_query = new WP_Query( $args );

          if ( $the_query->have_posts() ) :
              // Start the Loop
              while ( $the_query->have_posts() ) : $the_query->the_post();
              // Loop Content
              include 'templates/entry-content.php';
              // End the Loop
              endwhile;
          else:
              // If no posts match this query, output this text.
              _e( 'Sorry, no results match your criteria.', 'textdomain' );
          endif;

          wp_reset_postdata();
          ?>

          <a class="btn white mb-lg-80 mb-xs-64 mt-32" href="/updates">
            <span>Read All Updates</span>
          </a>

        </div>

      </div>
    </div>

    <?php include 'templates/blades/information.php'; ?>
    <?php include 'templates/blades/health-safety.php'; ?>
    <?php include 'templates/blades/univ-ops.php'; ?>

    <?php endwhile; endif; ?>

  </article>


</main>

<?php get_footer(); ?>
