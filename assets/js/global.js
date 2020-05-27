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

});
