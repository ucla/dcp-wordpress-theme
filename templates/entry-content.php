<div class="entry-content">
  <p>things</p>
  <?php // Entry Meta ?>
  <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>

  <?php // Entry content ?>
  <h2><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt('mb-32'); ?>
</div>
