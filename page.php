<?php get_header(); ?>

<main>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <header class="header">
    <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
  </header>

  <div class="ucla campus">
    <article id="post-<?php the_ID(); ?>" <?php post_class('col span_9_of_12'); ?>>

      <div class="entry-content">

        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

        <?php the_content(); ?>

        <div class="entry-links"><?php wp_link_pages(); ?></div>

      </div>

      <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>

      <?php endwhile; endif; ?>

    </article>

    <div class="col span_3_of_12">
      <?php get_sidebar(); ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>
