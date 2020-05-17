$(document).ready(function () {
  // GLOBAL THEME JAVASCRIPT

  $('[href]').each(function () {
    if (this.href === window.location.href) {
      $(this).addClass('current-page');
    }
  });

});
