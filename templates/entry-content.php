<div class="entry-content">
  <?php // Entry Meta ?>
  <time class="mb-8" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>

  <?php // Entry content ?>
  <h2 class="mb-8"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>

  <?php if (is_page(19)) {
   // Do Nothing
  } else {
     the_excerpt('mb-32');
   } ?>
</div>
