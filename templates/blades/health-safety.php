<div class="light-grey">
  <div class="ucla campus blade-hs">
    <h2 class="mb-32 mx-xs-24 mx-lg-0">Health & Safety</h2>
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
    <div class="col span_3_of_9">
      <div class="card-hs">
        <h3 class="mb-16">Face Covering Required Outside Home</h3>
        <?php
        // Get the Post
        $post_22 = get_post(22);
        // Extract the posts excerpt
        $excerpt_22 = $post_22->post_excerpt;
        // Display the Excerpt
        echo  '<p class="mb-16">' . $excerpt_22 . '</p>';
        ?>
        <p><a href="<?php echo esc_url( get_permalink( '22' ) ); ?>">More on Prevention</a></p>
      </div>
    </div>
    <div class="col span_3_of_9">
      <div class="card-hs">
        <h3 class="mb-16">Program to Help You STAND against Anxiety</h3>
        <?php
        // Get the Post
        $post_26 = get_post(26);
        // Extract the posts excerpt
        $excerpt_26 = $post_26->post_excerpt;
        // Display the Excerpt
        echo  '<p class="mb-16">' . $excerpt_26 . '</p>';
        ?>
        <p><a href="<?php echo esc_url( get_permalink( '26' ) ); ?>">More on Confirmed Cases</a></p>
      </div>
    </div>
  </div>
</div>
