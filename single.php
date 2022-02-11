<?php

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

?>

<?php get_header(); ?>

<main id="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $thumbnail[0]; ?>);" <?php } ?>>
      <div class="ucla campus masthead">
        <div class="col span_12_of_12">
          <?php get_breadcrumb(); ?>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
      </div>
    </header>

    <div class="ucla campus entry-content">

      <div class="col span_<?php echo (is_active_sidebar( 'primary-widget-area' ) ? '9' : '12') ?>_of_12">
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
        <p><?php echo get_the_author(); ?></p>

        <?php the_content(); ?>
        <?php edit_post_link(); //  edit_post_link always goes above page or post content column ?>
        <?php
            /** @var string|false|WP_Error $tag_list */
            $tag_list = get_the_tag_list( ' ', ' ' );

            if ( $tag_list && ! is_wp_error( $tag_list ) ) {
                echo $tag_list;
            }
        ?>
      </div>

    <?php endwhile; endif; ?>
    
    <?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
    <div class="col span_3_of_12">
      <?php get_sidebar(); ?>
    </div>
    <?php } ?>
  </div>

</main>

<?php get_footer(); ?>
