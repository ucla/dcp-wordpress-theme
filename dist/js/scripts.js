$(document).ready(function (){
  //$('.accordion-title').attr('tabindex', '0');
  //This is what happens when you click the title on mobile or desktop.
  $('.accordion-title').click(function (){
    $(this).next('.accordion-content').toggleClass('show-me');
    $(this).toggleClass('active');

    if ($('.accordion-title').hasClass('active')) {
      $(this).attr('aria-expanded', 'true');
    } else {
      $('.accordion-title').attr('aria-expanded', 'false');
    }
  });
});

$(document).ready(function () {
  // GLOBAL THEME JAVASCRIPT
  //Detect Browser type, https://gist.github.com/darryl-snow/3822361
  eval(function (p, a, c, k, e){e=function (c){return (c<a?'':e(c/a))+String.fromCharCode(c%a+161);};while (c--){if (k[c]){p=p.replace(new RegExp(e(c), 'g'), k[c]);}} return p;}('Ö ¡(){® Ø={\'¥\':¡(){¢ £.¥},\'©\':{\'±\':¡(){¢ £.©.±},\'¯\':¡(){¢ £.©.¯}},\'¬\':¡(){¢ £.¬},\'¶\':¡(){¢ £.¶},\'º\':¡(){¢ £.º},\'Á\':¡(){¢ £.Á},\'À\':¡(){¢ £.À},\'½\':¡(){¢ £.½},\'¾\':¡(){¢ £.¾},\'¼\':¡(){¢ £.¼},\'·\':¡(){¢ £.·},\'Â\':¡(){¢ £.Â},\'³\':¡(){¢ £.³},\'Ä\':¡(){¢ £.Ä},\'Ã\':¡(){¢ £.Ã},\'Å\':¡(){¢ £.Å},\'¸\':¡(){¢ £.¸}};$.¥=Ø;® £={\'¥\':\'¿\',\'©\':{\'±\':²,\'¯\':\'¿\'},\'¬\':\'¿\',\'¶\':§,\'º\':§,\'Á\':§,\'À\':§,\'½\':§,\'¾\':§,\'¼\':§,\'·\':§,\'Â\':§,\'³\':§,\'Ä\':§,\'Ã\':§,\'Å\':§,\'¸\':§};Î(® i=0,«=».ì,°=».í,¦=[{\'¤\':\'Ý\',\'¥\':¡(){¢/Ù/.¨(°)}},{\'¤\':\'Ú\',\'¥\':¡(){¢ Û.³!=²}},{\'¤\':\'È\',\'¥\':¡(){¢/È/.¨(°)}},{\'¤\':\'Ü\',\'¥\':¡(){¢/Þ/.¨(°)}},{\'ª\':\'¶\',\'¤\':\'ß Ñ\',\'¥\':¡(){¢/à á â/.¨(«)},\'©\':¡(){¢ «.¹(/ã(\\d+(?:\\.\\d+)+)/)}},{\'¤\':\'Ì\',\'¥\':¡(){¢/Ì/.¨(«)}},{\'¤\':\'Í\',\'¥\':¡(){¢/Í/.¨(°)}},{\'¤\':\'Ï\',\'¥\':¡(){¢/Ï/.¨(«)}},{\'¤\':\'Ð\',\'¥\':¡(){¢/Ð/.¨(«)}},{\'ª\':\'·\',\'¤\':\'å Ñ\',\'¥\':¡(){¢/Ò/.¨(«)},\'©\':¡(){¢ «.¹(/Ò (\\d+(?:\\.\\d+)+(?:b\\d*)?)/)}},{\'¤\':\'Ó\',\'¥\':¡(){¢/æ|Ó/.¨(«)},\'©\':¡(){¢ «.¹(/è:(\\d+(?:\\.\\d+)+)/)}}];i<¦.Ë;i++){µ(¦[i].¥()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¥=¦[i].¤;® ­;µ(¦[i].©!=²&&(­=¦[i].©())){£.©.¯=­[1];£.©.±=Ê(­[1])}ê{® Ç=Ö ë(¦[i].¤+\'(?:\\\\s|\\\\/)(\\\\d+(?:\\\\.\\\\d+)+(?:(?:a|b)\\\\d*)?)\');­=«.¹(Ç);µ(­!=²){£.©.¯=­[1];£.©.±=Ê(­[1])}}×}};Î(® i=0,´=».ä,¦=[{\'ª\':\'¸\',\'¤\':\'ç\',\'¬\':¡(){¢/é/.¨(´)}},{\'¤\':\'Ô\',\'¬\':¡(){¢/Ô/.¨(´)}},{\'¤\':\'Æ\',\'¬\':¡(){¢/Æ/.¨(´)}}];i<¦.Ë;i++){µ(¦[i].¬()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¬=¦[i].¤;×}}}();', 77, 77, 'function|return|Private|name|browser|data|false|test|version|identifier|ua|OS|result|var|string|ve|number|undefined|opera|pl|if|aol|msie|win|match|camino|navigator|mozilla|icab|konqueror|Unknown|flock|firefox|netscape|linux|safari|mac|Linux|re|iCab|true|parseFloat|length|Flock|Camino|for|Firefox|Netscape|Explorer|MSIE|Mozilla|Mac|toLowerCase|new|break|Public|Apple|Opera|window|Konqueror|Safari|KDE|AOL|America|Online|Browser|rev|platform|Internet|Gecko|Windows|rv|Win|else|RegExp|userAgent|vendor'.split('|')));

  let userbrowser = $.browser.browser(); //detected user browser

  // add class to <html>
  if (userbrowser === 'Safari') {
    $('html').addClass('safari');
  }
  if (userbrowser === 'Firefox') {
    $('html').addClass('firefox');
  }
  //End Detect Browser type
  //Detect IE 11 specifically
  function msieversion () {
    let ua = window.navigator.userAgent;
    let msie = ua.indexOf('MSIE ');
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv:11\./)) {
      $('html').addClass('msie');
    }
    return false;
  }
  msieversion();
  //End detect IE specifically
  // Visually Hide any preset classes from wordpress
  $('.screen-reader-text').addClass('visuallyhidden');

  // Add rel="noopener" to all target blank links
  function relnoopener () {
    const a = document.querySelectorAll('a[target="_blank"]');
    a.forEach(function (element) {
      if (!element.hasAttribute('rel')) {
        element.setAttribute('rel', 'noopener');
      }
    });
  }
  relnoopener();

  // Add current Page style that link to current page (i.e. Yellow borders in nav links)
  $('[href]').each(function () {
    if (this.href === window.location.href) {
      $(this).addClass('current-page');
    }
  });

  // Add the expander div for full width backgrounds. https://youtu.be/aUKAs9iMDDA
  // add the class .fluid.has-background-**** to any classes box in the admin to remove margins and padding and add a background color.
  $('.fluid').closest('.col').css('margin', 0);
  $('.fluid.has-background-grey-40').wrapInner('<div class="expander--grey-40"><div class="expander-container"></div></div>');
  $('.fluid.has-background-lightest-grey-2').wrapInner('<div class="expander--lightest-grey-2"><div class="expander-container"></div></div>');
  $('.fluid.has-background-light-grey').wrapInner('<div class="expander--light-grey"><div class="expander-container"></div></div>');
  $('.fluid.has-background-ucla-blue').wrapInner('<div class="expander--ucla-blue"><div class="expander-container"></div></div>');
  $('.fluid.has-background-white').wrapInner('<div class="expander--white"><div class="expander-container"></div></div>');

  // The expanded group function to go beyond the .ucla.campus container.
  function fluidBlockResize () {
    let w = window.innerWidth,
      clientW = document.documentElement.clientWidth,
      bodyW =$('.ucla.campus').width(),
      negOffset = (((w - bodyW) / 2) - ((w - clientW) / 2)) * -1,
      contentH = $('.expander').height();
    //Add the width off the windo wrap to the expander div that was added
    $('.expander--grey-40, .expander--lightest-grey-2, .expander--light-grey, .expander--ucla-blue, .expander--white, .wp-block-separator.fluid').css({
      // 'width': clientW,
      'width': 'calc(100vw - (' + w + 'px - ' + clientW + 'px))',
      'transform': 'translateX(' + negOffset + 'px)'
    });

    $('.fluid').css({
      'height': contentH - 25
    });
    //console.log(contentH); // For Debuggin' Only
  }

  fluidBlockResize();


  $(window).resize(function () {
    fluidBlockResize();
    //Resize the submenu on all resizes above 1024px.
    // if (window.innerWidth >= 300) {
    //   fluidBlockResize();
    // }
    //console.log(window.innerWidth); // For Debuggin' Only
  });

});

$(document).ready(function (){

  let searchButton = document.getElementById('search-button');
  // let svgButton = document.getElementById('search-svg');

  searchButton.onclick = function clickSearch (){

    let secondLevelNav = $('li.has-child > ul');

    if ($(this).hasClass('is-active')) {

      $('.search-block-form').removeClass('is-active');
      $(this).removeClass('is-active');
      //svgButton.attr('src', '/wp-content/themes/ucla-wp/images/icons/denotive/search--blue.svg');

      // Display other submenus is search menu is not active
      for (let i = 0; i < secondLevelNav.length; i += 1) {
        secondLevelNav[i].style.display = '';
      }


    } else {
      $('.search-block-form').addClass('is-active');
      $(this).addClass('is-active');
      //svgButton.attr('src', '/wp-content/themes/ucla-wp/images/icons/denotive/close--white.svg');

      // DO NOT Display other submenus is search menu is not active
      for (let i = 0; i < secondLevelNav.length; i += 1) {
        secondLevelNav[i].style.display = 'none';
      }

    }
  };

});

//# sourceMappingURL=scripts.js.map
