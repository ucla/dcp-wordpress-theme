<?php get_header(); ?>
<main id="main">
  <div class="ucla campus masthead">
    <?php if ( have_posts() ) : ?>
    <header class="header">
      <h1 class="entry-title"><?php _e('Search Results for', 'ucla-dcp') ?>: <?=get_search_query()?></h1>
    </header>
  </div>

  <div class="ucla campus entry-content">
      <div class="col span_<?php echo (is_active_sidebar('primary-widget-area') ? '7' : '12') ?>_of_12">

        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content/content' ); ?>
        <?php endwhile; else : ?>
        <article id="post-0" class="post no-results not-found">
          <header class="header">
            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ucla-dcp' ); ?></h1>
          </header>
          <div class="entry-content">
            <p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'ucla-dcp' ); ?></p>
            <?php get_search_form(); ?>
          </div>
        </article>
        <?php endif; ?>

      </div>
      <?php if (is_active_sidebar('primary-widget-area')) : ?>

      <div class="col span_2_of_12" style="min-height: 1px;"></div>
      <div class="col span_3_of_12">
        <?php get_sidebar(); ?>
      </div>
      <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
