$(document).ready(function (){

  //add arrow to accrodion title
  $('.accordion__title').append('<img class="accordion__title-arrow" src="/img/arrow-down.svg" alt="arrow">');

  $('img.accordion__title-arrow[src$=".svg"]').each(function () {
    let $img = jQuery(this);
    let imgURL = $img.attr('src');
    let attributes = $img.prop('attributes');

    $.get(imgURL, function (data) {
      // Get the SVG tag, ignore the rest
      let $svg = jQuery(data).find('svg');
      // Remove any invalid XML tags
      $svg = $svg.removeAttr('xmlns:a');
      // Loop through IMG attributes and apply on SVG
      $.each(attributes, function () {
        $svg.attr(this.name, this.value);
      });
      // Replace IMG with SVG
      $img.replaceWith($svg);
    }, 'xml');
  });

  //This is what happens when you click the title on mobile or desktop.
  $('.accordion-title').click(function (){
    $(this).next('.accordion-content').toggleClass('show-me');
    //$(this).parent('.accordion').toggleClass('show-me');
    //$(this).find('.accordion__title-arrow').toggleClass('flip');
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
