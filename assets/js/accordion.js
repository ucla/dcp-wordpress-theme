$(document).ready(function (){
  //$('.accordion-title').attr('tabindex', '0');
  //This is what happens when you click the title on mobile or desktop.
  $('.accordion-title').click(function (){
    $(this).next('.accordion-content').toggleClass('show-me');
    //$(this).parent('.accordion').toggleClass('show-me');
    $(this).children('img').toggleClass('flip');
    $(this).toggleClass('active');

    if ($('.accordion-title').hasClass('active')) {
      $(this).attr('aria-expanded', 'true');
    } else {
      $('.accordion__title-button').attr('aria-expanded', 'false');
    }

  });


});
