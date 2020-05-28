<?php /* Template Name: No Sidebar */

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

?>

<?php get_header(); ?>

<main class="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php include 'templates/page-header.php'; ?>

    <div class="ucla campus entry-content">

      <div class="col span_12_of_12">
        <?php the_content(); ?>
        <div class="entry-links"><?php wp_link_pages(); ?></div>
      </div>

    </div>

    <?php endwhile; endif; ?>

  </article>

</main>

<?php get_footer(); ?>
