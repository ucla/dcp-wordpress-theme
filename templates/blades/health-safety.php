<div class="light-grey pb-lg-80 pb-xs-40">
  <div class="ucla campus blade-hs">
    <h2 class="mb-32 mx-xs-24 mx-lg-0">Health and safety</h2>
    <div class="first-child col span_3_of_6">
      <div class="card-hs matchheight">
        <div class="card-hs--content">
          <h3 class="mb-16">Confirmed cases among campus community</h3>
          <?php
          // Get the Post
          $post_24 = get_post(24);
          // Extract the posts excerpt
          $excerpt_24 = $post_24->post_excerpt;
          // Display the Excerpt
          echo  '<p class="mb-16">' . $excerpt_24 . '</p>';
          ?>
          <p><a href="<?php echo esc_url( get_permalink( '24' ) ); ?>">More on confirmed cases</a></p>
        </div>
      </div>
    </div>
    <div class="col span_3_of_6">
      <div class="card-hs">
        <div class="card-hs--content">
          <h3 class="mb-16">Prevention, testing and treatment</h3>
          <?php
          // Get the Post
          $post_22 = get_post(22);
          // Extract the posts excerpt
          $excerpt_22 = $post_22->post_excerpt;
          // Display the Excerpt
          echo  '<p class="mb-16">' . $excerpt_22 . '</p>';
          ?>
          <p><a href="<?php echo esc_url( get_permalink( '22' ) ); ?>">More on prevention, testing and treatment</a></p>
        </div>
      </div>
    </div>

  </div>
</div>
