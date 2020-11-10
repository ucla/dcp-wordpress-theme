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
  $('.fluid').wrapInner('<div class="expander"><div class="expander-container"></div></div>');
  $('.fluid').closest('.col').css('margin', 0);

  // The expanded group function to go beyond the .ucla.campus container.
  function fluidBlockResize () {
    let w = window.innerWidth,
      bodyW =$('.ucla.campus').width(),
      negOffset = ((w - bodyW) / 2) * -1,
      contentH =$('.expander').height();

    //Add the width off the windo wrap to the expander div that was added
    $('.expander').css({
      'width': w,
      'margin-left': negOffset
    });

    $('.fluid').css({
      'height': contentH - 25
    });
    //console.log(contentH); // For Debuggin' Only
  }

  fluidBlockResize();


  $(window).resize(function () {
    //Resize the submenu on all resizes above 1024px.
    if (window.innerWidth >= 300) {
      fluidBlockResize();
    }
    //console.log(window.innerWidth); // For Debuggin' Only
  });

});
