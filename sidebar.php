<aside id="sidebar">
  <?php
    if ( is_active_sidebar( 'primary-widget-area' ) ) :
      dynamic_sidebar( 'primary-widget-area' );
    endif; 
  ?>
</aside>
