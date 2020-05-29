$(document).ready(function () {
  // GLOBAL THEME JAVASCRIPT

  // Visually Hide any preset classes from wordpress
  $('.screen-reader-text').addClass('visuallyhidden');

  // let aLink = document.getElementsByTagName('a');
  //
  // console.log(aLink);
  //
  // aLink.setAttribute('rel', 'nopener');


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

// =================================================
// TABLE OF CONTENTS: Functions
// =================================================

// (0.0) General Variable and Functions
// ------------------------------------------- * * *
// (1) Commonly Used IDs
// (2) Add classes to Navigation items
// (3) Hamburger click Functionality

// (1.0) Desktop Functionality
// ------------------------------------------- * * *
// (1.1) Variables
// (1.2) Listeners and Keystroke Events

// (2.0) Mobile Functionality
// ------------------------------------------- * * *
// (2.1) Variables
// (2.2) Event Listeners
// (2.3) Keystroke Events

// (3.0) Select Functionality
// ------------------------------------------- * * *
// (3.1) Pick Menu
//
//
//
//

$(document).ready(function (){


  /*==================================================================
	0.0 General functions and variables
	================================================================= */

  //Detect Browser, https://gist.github.com/darryl-snow/3822361
  // eval(function (p, a, c, k, e){e=function (c){return (c<a?'':e(c/a))+String.fromCharCode(c%a+161);};while (c--){if (k[c]){p=p.replace(new RegExp(e(c), 'g'), k[c]);}} return p;}('Ö ¡(){® Ø={\'¥\':¡(){¢ £.¥},\'©\':{\'±\':¡(){¢ £.©.±},\'¯\':¡(){¢ £.©.¯}},\'¬\':¡(){¢ £.¬},\'¶\':¡(){¢ £.¶},\'º\':¡(){¢ £.º},\'Á\':¡(){¢ £.Á},\'À\':¡(){¢ £.À},\'½\':¡(){¢ £.½},\'¾\':¡(){¢ £.¾},\'¼\':¡(){¢ £.¼},\'·\':¡(){¢ £.·},\'Â\':¡(){¢ £.Â},\'³\':¡(){¢ £.³},\'Ä\':¡(){¢ £.Ä},\'Ã\':¡(){¢ £.Ã},\'Å\':¡(){¢ £.Å},\'¸\':¡(){¢ £.¸}};$.¥=Ø;® £={\'¥\':\'¿\',\'©\':{\'±\':²,\'¯\':\'¿\'},\'¬\':\'¿\',\'¶\':§,\'º\':§,\'Á\':§,\'À\':§,\'½\':§,\'¾\':§,\'¼\':§,\'·\':§,\'Â\':§,\'³\':§,\'Ä\':§,\'Ã\':§,\'Å\':§,\'¸\':§};Î(® i=0,«=».ì,°=».í,¦=[{\'¤\':\'Ý\',\'¥\':¡(){¢/Ù/.¨(°)}},{\'¤\':\'Ú\',\'¥\':¡(){¢ Û.³!=²}},{\'¤\':\'È\',\'¥\':¡(){¢/È/.¨(°)}},{\'¤\':\'Ü\',\'¥\':¡(){¢/Þ/.¨(°)}},{\'ª\':\'¶\',\'¤\':\'ß Ñ\',\'¥\':¡(){¢/à á â/.¨(«)},\'©\':¡(){¢ «.¹(/ã(\\d+(?:\\.\\d+)+)/)}},{\'¤\':\'Ì\',\'¥\':¡(){¢/Ì/.¨(«)}},{\'¤\':\'Í\',\'¥\':¡(){¢/Í/.¨(°)}},{\'¤\':\'Ï\',\'¥\':¡(){¢/Ï/.¨(«)}},{\'¤\':\'Ð\',\'¥\':¡(){¢/Ð/.¨(«)}},{\'ª\':\'·\',\'¤\':\'å Ñ\',\'¥\':¡(){¢/Ò/.¨(«)},\'©\':¡(){¢ «.¹(/Ò (\\d+(?:\\.\\d+)+(?:b\\d*)?)/)}},{\'¤\':\'Ó\',\'¥\':¡(){¢/æ|Ó/.¨(«)},\'©\':¡(){¢ «.¹(/è:(\\d+(?:\\.\\d+)+)/)}}];i<¦.Ë;i++){µ(¦[i].¥()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¥=¦[i].¤;® ­;µ(¦[i].©!=²&&(­=¦[i].©())){£.©.¯=­[1];£.©.±=Ê(­[1])}ê{® Ç=Ö ë(¦[i].¤+\'(?:\\\\s|\\\\/)(\\\\d+(?:\\\\.\\\\d+)+(?:(?:a|b)\\\\d*)?)\');­=«.¹(Ç);µ(­!=²){£.©.¯=­[1];£.©.±=Ê(­[1])}}×}};Î(® i=0,´=».ä,¦=[{\'ª\':\'¸\',\'¤\':\'ç\',\'¬\':¡(){¢/é/.¨(´)}},{\'¤\':\'Ô\',\'¬\':¡(){¢/Ô/.¨(´)}},{\'¤\':\'Æ\',\'¬\':¡(){¢/Æ/.¨(´)}}];i<¦.Ë;i++){µ(¦[i].¬()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¬=¦[i].¤;×}}}();', 77, 77, 'function|return|Private|name|browser|data|false|test|version|identifier|ua|OS|result|var|string|ve|number|undefined|opera|pl|if|aol|msie|win|match|camino|navigator|mozilla|icab|konqueror|Unknown|flock|firefox|netscape|linux|safari|mac|Linux|re|iCab|true|parseFloat|length|Flock|Camino|for|Firefox|Netscape|Explorer|MSIE|Mozilla|Mac|toLowerCase|new|break|Public|Apple|Opera|window|Konqueror|Safari|KDE|AOL|America|Online|Browser|rev|platform|Internet|Gecko|Windows|rv|Win|else|RegExp|userAgent|vendor'.split('|')));
  //
  // //let safari = $.browser.safri(); // Safari
  // //let firefox = $.browser.firefox(); // Firefox
  // let userbrowser = $.browser.browser(); // Detected user browser
  //
  // // add class to <html>
  // if (userbrowser === 'Safari') {
  //   $('html').addClass('safari');
  // } else if (userbrowser === 'Firefox') {
  //   $('html').addClass('firefox');
  // }
  //End Browser Detect

  // ad ID attribut to primary nav search form
  $('.search-form').attr('id', 'menu-search');

  // Commonly used IDs
  let hamButton = document.getElementById('primary-ham');
  let priNav = document.getElementById('menu');
  let searchForm = document.getElementById('menu-search');
  let header = document.getElementById('header');



  // Primary Navigation Hamburger click functionality
  hamButton.onclick = function hamClick () {
    hamButton.classList.toggle('is-active');

    if (hamButton.classList.contains('is-active')) {
      hamButton.setAttribute('aria-expanded', 'true');
      priNav.classList.add('is-active');
      header.classList.add('is-active');
      $(hamButton).attr('aria-label', 'Close mobile menu');
    } else {
      hamButton.setAttribute('aria-expanded', 'false');
      priNav.classList.remove('is-active');
      header.classList.remove('is-active');
      $(hamButton).attr('aria-label', 'Open mobile menu');
    }
  };

  $('.menu-item-has-children').children('a').addClass('menu-item-has-children--link');
  $('a.menu-item-has-children--link').after('<button class="has-child--button"><svg role="img" aria-label="Down Arrow" class="down-arrow" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Down Arrow</title><g class="Icon/Arrow-Down" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon class="Path-2" points="0 0 24 0 24 24 0 24"></polygon><polygon class="Path-polygon" fill="#00598C" points="7.41 8.59 12 13.17 16.59 8.59 18 10 12 16 6 10"></polygon></g></svg></button>');
  $('.form-search').attr('placeholder', 'Search');



  /* Select the size on load or reset the size of the submenu for dekstop only. Resize the submenu when
	================================================================= */
  function desktopSubmenuResize () {
    let w = $('.nav-wrap').width() - 62,
      negOffset = (w + 8) * -1;

    //Add the width off the header wrap to the search dropdown
    $('.search-block-form').css({ // <a class="has-child--link">
      'width': w,
      'margin-left': negOffset
    });
    // console.log(w); // For Debuggin' Only
  }

  /*==================================================================
	1.0 Desktop Functionality
	================================================================= */
  function desktopMenu () {
    //load desktop nav functionality

    // let desktop = 1024; // For Debuggin' Only
    // console.log(desktop); // For Debuggin' Only
    // console.log('desktop'); // For Debuggin' Only

    desktopSubmenuResize();

    // Disable Click functionality for mobile nav submenu.
    $('.has-child--button').attr('tabindex', '-1');

    // Put the search form at the end of the nav
    $('#block-search').append(searchForm);

    // if ($('li.has-child > a').is(':focus')) {
    //   $(this).siblings('ul').css('display', 'block');
    // }

    $('a.current-page').next('.has-child--button').addClass('current-page');

    // Desktop Menu keyboard functionality
    // document.onkeydown = function (evt) {
    //
    //   let element = document.activeElement;
    //   evt = evt || window.event;
    //
    //   if ($('li.has-child > a').is(':focus')) {
    //
    //     $(element).siblings('ul').css('display', 'block');
    //
    //     if (evt.keyCode === 9 && event.shiftKey) {
    //       setTimeout(function () {
    //         $(element).siblings('ul').css('display', '');
    //       }, 100);
    //     } else if (evt.keyCode === 9) {
    //       // add styles to top level nav when sublevel is focused
    //       $(element).parent().css('background', '#0079BF'); // <li class="has-child">
    //       $(element).css({ // <a class="has-child--link">
    //         'border-bottom': '0',
    //         'color': '#fff'
    //       });
    //       $(element).next('button').css({ // <a class="has-child--link">
    //         'border-bottom': '0',
    //         'background': '#0079BF'
    //       });
    //       $(element).next('button').find('svg > g > .Path-polygon').attr('fill', '#fff'); // dropdown svg
    //     }
    //
    //
    //   } else if ($('li.has-child > ul > li:first-of-type > a').is(':focus')) {
    //
    //     if (evt.keyCode === 9 && event.shiftKey) {
    //
    //       setTimeout(function () {
    //         // Remove styles to top level nav when sublevel is focused
    //         $(element).parent().parent().parent().removeAttr('style'); // <li class="has-child">
    //         $(element).parent().parent().prev().prev().removeAttr('style'); // <a class="has-child--link">
    //         $(element).parent().parent().prev().removeAttr('style'); // <a class="has-child--link">
    //         $(element).parent().parent().prev().find('svg > g > .Path-polygon').attr('fill', '#0079BF'); // dropdown svg
    //       }, 100);
    //
    //     } else if (evt.keyCode === 9) {
    //       // do nothing
    //     }
    //
    //   } else if ($('li.has-child > ul > li:last-of-type > a').is(':focus')) {
    //
    //     if (evt.keyCode === 9 && event.shiftKey) {
    //       // do nothing
    //     } else if (evt.keyCode === 9) {
    //
    //       $(element).parent().parent().removeAttr('style'); // <ul>
    //       // Remove styles to top level nav when sublevel is focused
    //       $(element).parent().parent().parent().removeAttr('style'); // <li class="has-child">
    //       $(element).parent().parent().prev().prev().removeAttr('style'); // <a class="has-child--link">
    //       $(element).parent().parent().prev().removeAttr('style'); // <a class="has-child--link">
    //       $(element).parent().parent().prev().find('svg > g > .Path-polygon').attr('fill', '#0079BF'); // dropdown svg
    //
    //     }
    //   }
    //
    //
    // };

  }


  /*==================================================================
	2.0 Mobile Functionality
	================================================================= */
  function mobileMenu () {

    // let desktop = 1024; // For Debuggin' Only
    // console.log('mobile'); // For Debuggin' Only
    // console.log(desktop); // For Debuggin' Only

    // Put the search form at the beginning of the nav
    $('nav#menu').prepend(searchForm);

    /* Disable Mobile scroll when menu is open CSS for no-scroll in stylesheet*/
    $('#primary-ham').on('click', scrollDisable);

    function scrollDisable () {
      if (hamButton.classList.contains('is-active')) {
        $('body').addClass('no-scroll');
      } else {
        $('body').removeClass('no-scroll');
      }
    }

    // Click functionality for mobile nav submenu buttons.
    $('.has-child--button').click(function (){
      if ($(this).next('ul').hasClass('is-active')) {
        $(this).removeClass('is-active');
        $(this).next('ul').removeClass('is-active');
        //console.log('menu closed'); // For Debuggin' Only
      } else {
        $(this).addClass('is-active');
        $(this).next('ul').addClass('is-active');
        //console.log('menu open'); // For Debuggin' Only
      }
    });

    // Enable Click functionality for mobile nav submenu.
    $('.has-child--button').removeAttr('tabindex');

    document.onkeydown = function (evt) {

      let element = document.activeElement;
      evt = evt || window.event;

      // Start with hamburger at top of page.
      if ($('.hamburger.hamburger--squeeze').is(':focus')) {

        if (evt.keyCode === 9 && event.shiftKey) {

          if ($('.hamburger.hamburger--squeeze').hasClass('is-active')) {

            event.preventDefault();
            setTimeout(function () {
              $('#menu > ul > li:last-of-type > a:last-of-type').focus();
            }, 100);

          }

        } else if (evt.keyCode === 9) {

          if ($('.hamburger.hamburger--squeeze').hasClass('is-active')) {
            // do nothing
          } else {
            event.preventDefault();
            setTimeout(function () {
              $('main > a').focus();
            }, 100);
          }

        }


      } else if ($('li.has-child > a').is(':focus')) {

        $(element).siblings('ul').removeAttr('style');

      } else if ($('#menu > ul > li:last-of-type > a.has-child--link:last-of-type').is(':focus')) {

        if (evt.keyCode === 9) {
          setTimeout(function () {
            $(element).next('button').focus();
          }, 100);
        }

      // If you're focused on the last link in the main menu
      } else if ($('#menu > ul > li:last-of-type > a:last-of-type').is(':focus')) {

        // If you're focused on the last link in the main menu shitf + tab.
        if (evt.keyCode === 9 && event.shiftKey) {
          // do nothing

        // If you're focused on the last link in the main menu tab.
        } else if (evt.keyCode === 9) {

          // this sends the focus back to the hamburger.
          event.preventDefault();
          setTimeout(function () {
            $('#primary-ham').focus();
          }, 100);

        }

      } else if (!$('#menu > ul > li:last-of-type > button').hasClass('is-active') && $('#menu > ul > li:last-of-type > button').is(':focus')) {

        if (evt.keyCode === 9) {
          event.preventDefault();
          setTimeout(function () {
            $('#primary-ham').focus();
          }, 100);
        }

      } else if ($('#menu > ul > li:last-of-type > ul > li:last-of-type > a:last-of-type').is(':focus')) {

        if (evt.keyCode === 9) {
          event.preventDefault();
          setTimeout(function () {
            $('#primary-ham').focus();
          }, 100);
        }

      } else if ($('main > a').is(':focus')) {
        if (evt.keyCode === 9 && event.shiftKey) {
          event.preventDefault();
          setTimeout(function () {
            $('#primary-ham').focus();
          }, 100);
        }
      }
    };

  }

  /* Everything above this paragraph breaks down the functionality of the menu into two categories, desktop and mobile. Everything below this paragrapgh define which functionality to run based on the users screen size.  */

  /*==================================================================
	3.0 Select FUNCTIONALITY
	================================================================= */

  function pickMenu () {
    let desktop = 1024;

    // For Debuggin' Only
    // console.log('i picked a menu');

    // This decides if the window is at dekstop size or not.
    if (window.innerWidth >= desktop) {

      // Reset or remove any menu classes
      $('.has-child--button, #menu, .hamburger, .header, .sub-menu').removeClass('is-active');
      $('body').removeClass('no-scroll');

      // Get and Run the dektop functionality
      desktopMenu();

    // This decides if the window is at mobile size or not.
    } else if (window.innerWidth < desktop){

      // Reset or remove any menu classes

      // Get and Run the mobile menu functionality
      mobileMenu();

    }
  }

  pickMenu();

  /*	Select which menu version to run (Desktop VS. Mobile) WHEN BROWSER RESIZES WITHOUT RELOADING
	================================================================= */
  let isSmall = false;
  $(window).resize(function () {

    //Pick menu only happens when you resize past the large breakpoint
    if ((window.innerWidth < 1024 && !isSmall) || (window.innerWidth >= 1024 && isSmall)) {

      isSmall = !isSmall;

      setTimeout(function () {
        pickMenu($);
      }, 10);
    }

    //Resize the submenu on all resizes above 1024px.
    if (window.innerWidth >= 1024) {
      desktopSubmenuResize();
    }

  });


});

$(document).ready(function (){

  $('.search-desktop_button').click(function (){

    let secondLevelNav = $('li.has-child > ul');

    if ($(this).hasClass('is-active')) {
      $('.search-block-form').removeClass('is-active');
      $(this).removeClass('is-active');
      $('.search-desktop_button > svg').replaceWith('<svg role="img" aria-label="Search Icon" class="search-icon" width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Search Icon</title><g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="search-nav-icon-primary" transform="translate(-15.000000, -15.000000)"><g id="Nav-Item"><g id="Icon/Search" transform="translate(12.000000, 12.000000)"><polygon class="Path-polygon" points="0 0 24 0 24 24 0 24"></polygon><path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z" id="Shape" fill="#00598C" fill-rule="evenodd"></path></g></g></g></g></svg>');

      // Display other submenus is search menu is not active
      for (let i = 0; i < secondLevelNav.length; i += 1) {
        secondLevelNav[i].style.display = '';
      }


    } else {
      $('.search-block-form').addClass('is-active');
      $(this).addClass('is-active');
      $('.search-desktop_button > svg').replaceWith('<svg role="img" aria-label="Close" class="close-x" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Icon Close</title><g id="Icon/Close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon id="Shape" fill="#ffffff" points="19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12"></polygon></g></svg>');

      // DO NOT Display other submenus is search menu is not active
      for (let i = 0; i < secondLevelNav.length; i += 1) {
        secondLevelNav[i].style.display = 'none';
      }

    }
  });

});
