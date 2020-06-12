<?php /* Template Name: No Sidebar */

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

?>

<?php get_header(); ?>

<main id="main" class="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $thumbnail[0]; ?>);" <?php } ?>>
      <div class="ucla campus">
        <div class="col span_12_of_12">
          <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
          <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        </div>
      </div>
    </header>

    <div class="ucla campus">

      <div class="col span_7_of_12">

        <?php the_content(); ?>

        <?php
        // Example argument that defines three posts per page.
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
          'posts_per_page' => 10,
          'paged' => $paged
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

            ?>

            <div class="pagination">
                <?php echo paginate_links([
                  'format'  => 'page/%#%',
                  'current' => $paged,
                  'total'   => $the_query->max_num_pages,
                  'mid_size'        => 2,
                  'prev_text'       => __('<svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>Arrow Left</title>
    <g id="Icon/arrow-left-black" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon class="Shape" fill="#00598C" transform="translate(24.590000, 24.000000) scale(-1, 1) translate(-24.590000, -24.000000) " points="17.18 33.18 26.34 24 17.18 14.82 20 12 32 24 20 36"></polygon>
    </g>
</svg>'),
                  'next_text'       => __('<svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>Arrow Right</title>
    <g id="Icon/arrow-right-black" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon id="Background" points="0 0 48 0 48 48 0 48"></polygon>
        <polygon class="Shape" fill="#00598C" points="18 33.18 26.6531714 24 18 14.82 20.6639676 12 32 24 20.6639676 36"></polygon>
    </g>
</svg>')
                ]); ?>
            </div>


        <?php
        else:

        // If no posts match this query, output this text.
            _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
        endif;

        wp_reset_postdata();
        ?>

      </div>
      <div class="col span_2_of_12">
      </div>
      <div class="col span_3_of_12">
        <?php dynamic_sidebar('Tags Widget Area'); ?>
      </div>

    </div>

    <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>

    <?php endwhile; endif; ?>

  </article>


</main>

<?php get_footer(); ?>
