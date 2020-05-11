<?php /* Template Name: No Sidebar */ ?>

<?php get_header(); ?>

<main class="ucla campus">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('col span_12_of_12'); ?> class="col span_9_of_12">

    <header class="header">
      <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
    </header>

    <div class="entry-content">

      <div class="">
        <div class="col span_12_of_12">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

          <?php the_content(); ?>

          <div class="entry-links"><?php wp_link_pages(); ?></div>
        </div>
      </div>

    </div>

    <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>

    <?php endwhile; endif; ?>

  </article>


</main>

<?php get_footer(); ?>
