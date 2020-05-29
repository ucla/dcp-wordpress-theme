<h2 class="mb-40">Frequently Asked Questions</h2>
<?php //FAQ Loop
$args = array(
    'post_type' => 'faq',
    'tag' => 'campus-operations',
    'post_status' => 'publish',
    'posts_per_page' => 0,
);

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post(); ?>

  <div class="accordion">
    <p class="accordion-title"><?php print the_title(); ?><img src="/wp-content/themes/ucla-sc/images/icons/arrow-down-defaultblue.svg"</p>
    <div class="accordion-content mt-32"><?php the_content(); ?></div>
  </div>

<?php endwhile;
wp_reset_postdata(); ?>
