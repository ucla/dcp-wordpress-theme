$(document).ready(function (){

  //This is what happens when you click the title on mobile or desktop.
  $('.accordion-title').click(function (){
    $(this).next('.accordion-content').toggleClass('show-me');
    //$(this).parent('.accordion').toggleClass('show-me');
    $(this).children('img').toggleClass('flip');
    //$(this).toggleClass('active');

    // if ($(this).next('.accordion__content').find('a').attr('tabindex') === -1) {
    //   $(this).next('.accordion__content').find('a').attr('tabindex', '0');
    // } else if ($(this).next('.accordion__content').find('a').attr('tabindex') === 0) {
    //   $(this).next('.accordion__content').find('a').attr('tabindex', '-1');
    // } else {}

    //halfResetAria($);

  });

  //only reset the expanded attribute
  // function halfResetAria ($) {
  //   if ($('.accordion__title').hasClass('active')) {
  //     $('.accordion__title').find('button').attr('aria-expanded', 'true');
  //   } else {
  //     $('.accordion__title-button').attr('aria-expanded', 'false');
  //   }
  // }

});
