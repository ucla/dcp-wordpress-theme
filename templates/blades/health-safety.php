<div class="light-grey">
  <div class="ucla campus blade-hs">
    <h2>Health & Safety</h2>
    <div class="first-child col span_3_of_9">
      <div class="card-hs">
        <h3 class="mb-16">Current Confirmed Cases in Campus Commuinity</h3>
        <?php
        // Get the Post
        $post_24 = get_post(24);
        // Extract the posts excerpt
        $excerpt_24 = $post_24->post_excerpt;
        // Display the Excerpt
        echo  '<p class="mb-16">' . $excerpt_24 . '</p>';
        ?>
        <p><a href="<?php echo esc_url( get_permalink( '24' ) ); ?>">More on Confirmed Cases</a></p>
      </div>
    </div>
    <div class="col span_3_of_9">Card 2.</div>
    <div class="col sspan_3_of_9">Card 3.</div>
  </div>
</div>
