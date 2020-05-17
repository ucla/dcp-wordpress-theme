<div class="entry-content col span_9_of_12">
  <?php // Entry Meta ?>
  <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>

  <?php // Entry content ?>
  <h2><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt(); ?>
</div>
