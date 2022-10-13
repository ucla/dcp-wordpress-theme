<?php
$foot_signature = get_option('logo');
$template_dir = get_template_directory_uri();
?>
<footer id="footer" role="contentinfo" class="footer">
  <div class="footer__dept">
    <div class="footer__dept--wrapper">
      <img class="footer__dept--logo" src="<?php echo $template_dir; ?>/images/ucla_logo_white.svg" />
      <div class="footer__dept--info">
        <address class="footer__dept--contact">
          <?php // get the footer heading from theme options

            if (myprefix_get_theme_option('address_heading') !== null) {
                $address_heading = myprefix_get_theme_option('address_heading');
                echo '<p class="p-org">' . $address_heading . '</p>';
            } ?>
          <?php // get the f ooter address from theme options
            if (myprefix_get_theme_option('address_input_one') !== null) {
                $address_one = myprefix_get_theme_option('address_input_one');
                $address_two = myprefix_get_theme_option('address_input_two');
                echo '<p class="p-street-address">' . $address_one . '<br/>' . $address_two . '</p>';
            } else {
                ?>
            <p class="p-street-address">
              10889 Wilshire Blvd., Suite 1400<br>
              Los Angeles, CA 90024
            </p>
                <?php
            } ?>

          <?php if (myprefix_get_theme_option('phone_input') !== null || myprefix_get_theme_option('email_input') !== null) {
                echo '<br>';
          } ?>

          <?php // get the footer address from theme options

            if (myprefix_get_theme_option('phone_input') !== null) {
                $phone = myprefix_get_theme_option('phone_input');
                echo '</br><p><a class="p-tel" href="tel:' . str_replace(['(', ')', ' ', '-'], '', $phone) . '">' . $phone . '</a></p>';
            } ?>

          <?php // get the footer address from theme options

            if (myprefix_get_theme_option('email_input') !== null) {
                $email = myprefix_get_theme_option('email_input');
                echo '<p><a class="u-email" href="mailto:' . $email . '">' . $email . '</a></p>';
            } ?>
        </address>
        <?php

        // $companies = ['Facebook', 'Instagram', 'Twitter', 'Snapchat', 'LinkedIn', 'YouTube', 'TikTok'];

        $footer_social = [
          [
            'company' => 'Facebook',
            'url' => 'https://www.facebook.com/UCLA/'
          ],
          [
            'company' => 'Twitter',
            'url' => 'https://twitter.com/ucla'
          ],
          [
            'company' => 'Instagram',
            'url' => 'https://www.instagram.com/ucla/'
          ],
          [
            'company' => 'Snapchat',
            'url' => 'https://www.snapchat.com/add/uclaofficial'
          ],
          [
            'company' => 'LinkedIn',
            'url' => 'https://www.linkedin.com/company/ucla'
          ],
          [
            'company' => 'YouTube',
            'url' => 'https://www.youtube.com/user/UCLA'
          ],
          [
            'company' => 'TikTok',
            'url' => 'https://www.tiktok.com/@ucla'
          ]
        ];

        $has_dept_social_links = false;
        $social_list = '<div id="footer-social-menu" class="footer__dept--social">';
        
        foreach ($footer_social as $social) {
            $lsocial = strtolower($social['company']);
            $url = myprefix_get_theme_option("${lsocial}_input");
            if (is_null($url)) {
                continue;
            }
            $has_dept_social_links = true;
            // $social_list .= <<<EOT
            //     <a class="foot-$lcompany footer__dept--social-$lcompany" href="$url">
            //         <img src="$template_dir/images/icons/social/$lcompany--white.svg" alt="$company" />
            //     </a>
            // EOT;
            $social_list .= sprintf(
              '<a href="%1$s" class="foot-%2$s footer__dept--social-%2$s"><img src="'. $template_dir .'/images/icons/social/%2$s--white.svg" alt="%3$s" /></a>',
              $social['url'],
              $lsocial,
              $social['company']
            );
        }
        $social_list .= '</div>';
        if ($has_dept_social_links) {
            echo $social_list;
        }
        ?>
 
      </div>



      <?php if (has_nav_menu('foot-menu')) { ?>

                    <?php wp_nav_menu([
                        'theme_location' => 'foot-menu',
                        'container' => 'nav',
                        'container_class' => 'footer__dept--links-wrapper',
                        'menu_class' => '',
                        'depth' => 2,
                    ]); ?>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="ucla campus foot-lower">
    <div class="foot-lower-wrap">
      <div class="foot-lower-social">
        <h2 class="visuallyhidden">Social Media</h2>
        <ul>
          <?php
            foreach ($footer_social as $social) {
              //echo $social['company'];
              echo '
                <li>
                  <a href="'.$social['url'].'" title="UCLA '.$social['company'].'">
                    <span class="social-icon social-icon--'.strtolower($social['company']).'"></span>
                    <span class="visuallyhidden">'.$social['company'].'</span>
                  </a>
                </li>
              ';
            }
          ?>
        </ul>
      </div>
      <div class="foot-lower-info">
        <div class="foot-lower-copyright">
          &copy;<?php echo date('Y'); ?> Regents of the <a href="https://www.universityofcalifornia.edu/">University of California</a>
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