$(document).ready(function () {
  // GLOBAL THEME JAVASCRIPT

  function match () {
    $('.card-resources').matchHeight();
    $('.card-hs').matchHeight();
  }

  match();

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
