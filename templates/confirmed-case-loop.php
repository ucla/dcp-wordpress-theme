<div class="mb-32">
<h2 class="mb-40">Frequently Asked Questions</h2>
<?php //FAQ Loop
$args = array(
    'post_type' => 'confrimed_cases',
    'tag__in' => $tag_id,
    'post_status' => 'publish',
    'posts_per_page' => 0,
);

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post(); ?>

  <div class="accordion">
    <button class="accordion-title mb-16" aria-expanded="false"><?php print the_title(); ?><img class"accordion-title--arrow" src="/wp-content/themes/ucla-sc/images/icons/arrow-down-defaultblue.svg" alt="Accordion Open/Close Arrown"></button>
    <div class="accordion-content mt-32">
      <p><?php printf( __( 'Last modified: %s', 'textdomain' ), get_the_modified_date( 'F j, Y' ) ); ?></p>

      <p><?php the_content(); ?></p>
    </div>
  </div>

<?php endwhile;
wp_reset_postdata(); ?>
</div>
