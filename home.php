<?php get_header(); ?>
<main id="main">
    <header class="header">
        <div class="ucla campus masthead">
            <div class="col span_12_of_12">
                <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
                <h1 class="entry-title"><?php single_term_title(); ?></h1>
            </div>
        </div>
    </header>
    <div class="ucla campus entry-content">

        <div class="col span_<?php echo(is_active_sidebar('primary-widget-area') ? '7' : '12') ?>_of_12">

          <?php
          // Pagination
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          // Example argument that defines three posts per page.
          $args = array(
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC'
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

          <div class="pagination mb-64">
            <?php echo paginate_links([
              'format'  => 'page/%#%',
              'current' => $paged,
              'total'   => $the_query->max_num_pages,
              'mid_size'        => 10,
              'prev_text'       => __('&laquo;'),
              'next_text'       => __('&raquo;')
            ]); ?>
          </div>
        </div>



        <?php if (is_active_sidebar('primary-widget-area')) : ?>

            <div class="col span_2_of_12"></div>
            <div class="col span_3_of_12">
                <?php dynamic_sidebar('primary-widget-area'); ?>
            </div>
        <?php endif; ?>

    </div>

    <?php get_template_part('nav', 'below'); ?>
</main>
<?php get_footer(); ?>
