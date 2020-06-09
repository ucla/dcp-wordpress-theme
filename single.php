<?php

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

?>

<?php get_header(); ?>

<main id="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $thumbnail[0]; ?>);" <?php } ?>>
      <div class="ucla campus">
        <div class="col span_12_of_12">
          <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
          <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        </div>
      </div>
    </header>

    <div class="ucla campus">

      <div class="col span_9_of_12">

        <?php if ( get_post_custom_values( 'Archived' ) !== NULL )  { ?>
          <p class="intro"><?php
          $key_values = get_post_custom_values( 'Archived' );

          foreach ( $key_values as $key => $value ) {
              echo '<p class="archive-alert mb-32"><svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>Information</title>
    <g id="Icon/information-lighterdefaultblue" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <path d="M24,4 C12.96,4 4,12.96 4,24 C4,35.04 12.96,44 24,44 C35.04,44 44,35.04 44,24 C44,12.96 35.04,4 24,4 Z M26,34 L22,34 L22,22 L26,22 L26,34 Z M26,18 L22,18 L22,14 L26,14 L26,18 Z" id="Shape" fill="#8BB8E8"></path>
    </g>
</svg> ' . $value . '</p>';
          }

          ?></p>
        <?php } ?>

        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>

        <?php the_content(); ?>

        <?php
            /** @var string|false|WP_Error $tag_list */
            $tag_list = get_the_tag_list( ' ', ' ' );

            if ( $tag_list && ! is_wp_error( $tag_list ) ) {
                echo $tag_list;
            }
        ?>
      </div>

    <?php endwhile; endif; ?>

    <div class="col span_3_of_12">
      <?php get_sidebar(); ?>
    </div>

  </div>

</main>

<?php get_footer(); ?>
