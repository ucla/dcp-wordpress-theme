<?php
$foot_signature = get_option('logo');
?>

<footer id="footer" role="contentinfo" class="footer">
  <div class="footer__dept">
    <div class="footer__dept--wrapper">
      <img class="footer__dept--logo" src="<?php echo get_template_directory_uri(); ?>/images/ucla_logo_white.svg" />


      <div class="footer__dept--info">
        <address class="footer__dept--contact">
          <?php
          // get the footer heading from theme options
          if (myprefix_get_theme_option('address_heading') !== NULL) {
            $address_heading = myprefix_get_theme_option('address_heading');
            echo '<p class="p-org">'  . $address_heading . '</p>';
          } ?>
          <?php
          // get the footer address from theme options
          if (myprefix_get_theme_option('address_input_one') !== NULL) {
            $address_one = myprefix_get_theme_option('address_input_one');
            $address_two = myprefix_get_theme_option('address_input_two');
            echo '<p class="p-street-address">' . $address_one . '<br/>' . $address_two . '</p>';
          } else { ?>
            <p class="p-street-address">
              10889 Wilshire Blvd., Suite 1400<br>
              Los Angeles, CA 90024
            </p>
          <?php } ?>

          <?php
          if (
            myprefix_get_theme_option('phone_input') !== NULL ||
            myprefix_get_theme_option('email_input') !== NULL
          ) {
            echo '<br>';
          }
          ?>

          <?php
          // get the footer address from theme options
          if (myprefix_get_theme_option('phone_input') !== NULL) {
            $phone = myprefix_get_theme_option('phone_input');
            echo '</br><p><a class="p-tel" href="tel:' . str_replace(['(', ')', ' ', '-'], '', $phone) . '">' . $phone . '</a></p>';
          } ?>

          <?php
          // get the footer address from theme options
          if (myprefix_get_theme_option('email_input') !== NULL) {
            $email = myprefix_get_theme_option('email_input');
            echo '<p><a class="u-email" href="mailto:' . $email . '">' . $email . '</a></p>';
          } ?>
        </address>
        <div id="footer-social-menu" class="footer__dept--social">
        
            <a class="foot-facebook footer__dept--social-facebook" href="<?php echo (myprefix_get_theme_option('facebook_input') !== NULL ? myprefix_get_theme_option('facebook_input') : 'https://www.facebook.com/UCLA/') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/facebook--white.svg" alt="Facebook" />
            </a>
          
          
            <a class="foot-twitter footer__dept--social-twitter" href="<?php echo (myprefix_get_theme_option('twitter_input') !== NULL ? myprefix_get_theme_option('twitter_input') : 'https://twitter.com/ucla') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/twitter--white.svg" alt="Twitter" />
            </a>
          
          
            <a class="foot-instagram footer__dept--social-instagram" href="<?php echo (myprefix_get_theme_option('instagram_input') !== NULL ? myprefix_get_theme_option('instagram_input') : 'https://www.instagram.com/ucla/') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/instagram--white.svg" alt="Instagram" />
            </a>
          
          
            <a class="foot-snapchat footer__dept--social-snapchat" href="<?php echo (myprefix_get_theme_option('snapchat_input') !== NULL ? myprefix_get_theme_option('snapchat_input') : 'https://www.snapchat.com/add/uclaofficial') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/snapchat--white.svg" alt="Snapchat" />
            </a>
          
          <a class="foot-linkedin footer__dept--social-linkedin" href="<?php echo (myprefix_get_theme_option('linkedin_input') !== NULL ? myprefix_get_theme_option('linkedin_input') : 'https://www.linkedin.com/company/ucla') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/linkedin--white.svg" alt="LinkedIn" /></a>
          <a class="foot-youtube footer__dept--social-youtube" href="<?php echo (myprefix_get_theme_option('youtube_input') !== NULL ? myprefix_get_theme_option('youtube_input') : 'https://www.youtube.com/user/UCLA') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/youtube--white.svg" alt="YouTube"></a>
          <a class="foot-tiktok footer__dept--social-tiktok" href="<?php echo (myprefix_get_theme_option('tiktok_input') !== NULL ? myprefix_get_theme_option('tiktok_input') : 'https://www.tiktok.com/@ucla') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/tiktok--white.svg" alt="TikTok"></a>
          <!-- <a href="<?php echo (myprefix_get_theme_option('facebook_input') !== NULL ? myprefix_get_theme_option('facebook_input') : 'https://www.facebook.com/UCLA/') ?>" class="foot-facebook footer__dept--social-facebook">
            <object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/facebook--white.svg" type="image/svg+xml"></object>
            <span class="visuallyhidden">Facebook</span>
          </a>
          <a href="<?php echo (myprefix_get_theme_option('twitter_input') !== NULL ? myprefix_get_theme_option('twitter_input') : 'https://twitter.com/ucla') ?>" class="foot-twitter footer__dept--social-twitter">
            <object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/twitter--white.svg" type="image/svg+xml"></object>
            <span class="visuallyhidden">Twitter</span>
          </a>
          <a href="<?php echo (myprefix_get_theme_option('instagram_input') !== NULL ? myprefix_get_theme_option('instagram_input') : 'https://www.instagram.com/ucla/') ?>" class="foot-instagram footer__dept--social-instagram">
            <object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/instagram--white.svg" type="image/svg+xml"></object>
            <span class="visuallyhidden">Instagram</span>
          </a>
          <a href="<?php echo (myprefix_get_theme_option('snapchat_input') !== NULL ? myprefix_get_theme_option('snapchat_input') : 'https://www.snapchat.com/add/uclaofficial') ?>" class="foot-snapchat footer__dept--social-snapchat">
            <object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/snapchat--white.svg" type="image/svg+xml"></object>
            <span class="visuallyhidden">Snapchat</span></a>
          <a href="<?php echo (myprefix_get_theme_option('linkedin_input') !== NULL ? myprefix_get_theme_option('linkedin_input') : 'https://www.linkedin.com/company/ucla') ?>" class="foot-linkedin footer__dept--social-linkedin"><object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/linkedin--white.svg" type="image/svg+xml"></object><span class="visuallyhidden">LinkedIn</span></a>
          <a href="<?php echo (myprefix_get_theme_option('youtube_input') !== NULL ? myprefix_get_theme_option('youtube_input') : 'https://www.youtube.com/user/UCLA') ?>" class="foot-youtube footer__dept--social-youtube"><object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/youtube--white.svg" type="image/svg+xml"></object><span class="visuallyhidden">YouTube</span></a>
          <a href="<?php echo (myprefix_get_theme_option('tiktok_input') !== NULL ? myprefix_get_theme_option('tiktok_input') : 'https://www.tiktok.com/@ucla') ?>" class="foot-tiktok footer__dept--social-tiktok"><object tabindex="-1" data="<?php echo get_template_directory_uri(); ?>/images/icons/social/tiktok--white.svg" type="image/svg+xml"></object><span class="visuallyhidden">TikTok</span></a> -->

        </div>


      </div>



      <?php if (has_nav_menu('foot-menu')) { ?>

        <div class="footer__dept--links">
          <?php wp_nav_menu(array(
            'theme_location' => 'foot-menu',
            'container' => 'nav',
            'container_class' => 'footer__dept--links-wrapper',
            'menu_class' => '',
            'depth' => 2
          )); ?>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="ucla campus foot-lower">

    <div class="foot-lower-wrap">
      <div class="foot-lower-social">
        <h2 class="visuallyhidden">Social Media</h2>
        <ul>
          <li>
            <a href="<?php echo (myprefix_get_theme_option('facebook_input') !== NULL ? myprefix_get_theme_option('facebook_input') : 'https://www.facebook.com/UCLA/') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/facebook--brand.svg" alt="Facebook" />
            </a>
          </li>
          <li>
            <a href="<?php echo (myprefix_get_theme_option('twitter_input') !== NULL ? myprefix_get_theme_option('twitter_input') : 'https://twitter.com/ucla') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/twitter--brand.svg" alt="Twitter" />
            </a>
          </li>
          <li>
            <a href="<?php echo (myprefix_get_theme_option('instagram_input') !== NULL ? myprefix_get_theme_option('instagram_input') : 'https://www.instagram.com/ucla/') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/instagram--brand.svg" alt="Instagram" />
            </a>
          </li>
          <li>
            <a href="<?php echo (myprefix_get_theme_option('snapchat_input') !== NULL ? myprefix_get_theme_option('snapchat_input') : 'https://www.snapchat.com/add/uclaofficial') ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/snapchat--brand.svg" alt="Snapchat" />
            </a>
          </li>
          <li><a href="<?php echo (myprefix_get_theme_option('linkedin_input') !== NULL ? myprefix_get_theme_option('linkedin_input') : 'https://www.linkedin.com/company/ucla') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/linkedin--brand.svg" alt="LinkedIn" /></a></li>
          <li><a href="<?php echo (myprefix_get_theme_option('youtube_input') !== NULL ? myprefix_get_theme_option('youtube_input') : 'https://www.youtube.com/user/UCLA') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/youtube--brand.svg" alt="YouTube"></a></li>
          <li><a href="<?php echo (myprefix_get_theme_option('tiktok_input') !== NULL ? myprefix_get_theme_option('tiktok_input') : 'https://www.tiktok.com/@ucla') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social/tiktok--brand.svg" alt="TikTok"></a></li>
        </ul>
      </div>
      <div class="foot-lower-info">
        <div class="foot-lower-copyright">
          &copy;<?php echo date("Y"); ?> Regents of the <a href="https://www.universityofcalifornia.edu/">University of California</a>
        </div>

        <div class="foot-lower-toc">
          <ul>
            <li><a href="https://www.bso.ucla.edu/">Emergency</a></li>
            <li><a href="http://www.ucla.edu/accessibility">Accessibility</a></li>
            <li><a href="http://www.ucla.edu/terms-of-use/">Privacy &amp; Terms of Use</a></li>
          </ul>
        </div>
      </div>  

    </div>

  </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>