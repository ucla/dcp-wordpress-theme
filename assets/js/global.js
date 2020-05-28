$(document).ready(function () {
  // GLOBAL THEME JAVASCRIPT

  // Visually Hide any preset classes from wordpress
  $('.screen-reader-text').addClass('visuallyhidden');

  // Add current Page style that link to current page (i.e. Yellow borders in nav links)
  $('[href]').each(function () {
    if (this.href === window.location.href) {
      $(this).addClass('current-page');
    }
  });

  // // Insert white divat top of grey color background making the top 30% of the wrap white, leaving the bottom 70% grey.
  // $('.light-grey.tall-75').prepend('<div class="white-25"></div>');
  // $('.light-grey.tall-65').prepend('<div class="white-35"></div>');

  // add the expander div
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
    //console.log(window.innerWidth);
  });

});
