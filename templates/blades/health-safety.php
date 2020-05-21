<div class="ucla campus">
  <h2>Health & Safety</h2>
  <div class="col span_3_of_9">
    <div>
      <h3>Current Confirmed Cases in Campus Commuinity</h3>
      <?php
      $post_24 = get_post(24);
      $excerpt_24 = $post_24->post_excerpt;
      echo $excerpt_24;
      ?>
      <p><a href="<?php echo esc_url( get_permalink( '24' ) ); ?>">More on Confirmed Cases</a></p>
    </div>
  </div>
  <div class="col span_3_of_9">Card 2.</div>
  <div class="col sspan_3_of_9">Card 3.</div>
</div>
