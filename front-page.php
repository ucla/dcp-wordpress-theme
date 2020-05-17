<?php /* Template Name: No Sidebar */

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

?>

<?php get_header(); ?>

<main class="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $thumbnail[0]; ?>);" <?php } ?>>
      <div class="ucla campus">
        <div class="col span_12_of_12">
          <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        </div>
      </div>
    </header>

    <div class="ucla campus entry-content">

      <div class="">
        <div class="col span_12_of_12">

          <h2 class="mb-32 mt-64">Latest Campus Updates</h2>

          <?php the_content(); ?>

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
              _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
          endif;

          wp_reset_postdata();
          ?>

          <div class="entry-links"><?php wp_link_pages(); ?></div>

        </div>
      </div>

    </div>

    <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>

    <?php endwhile; endif; ?>

  </article>


</main>

<?php get_footer(); ?>
