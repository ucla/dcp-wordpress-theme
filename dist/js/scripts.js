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

$(document).ready(function (){

  /*==================================================================
	0.0 General functions and variables
	================================================================= */

  // ad ID attribut to primary nav search form
  $('.search-form').attr('id', 'menu-search');
  $('#menu-main-menu > li > a:first').attr('id', 'first-nav-link');
  // Commonly used IDs
  let hamButton = document.getElementById('primary-ham');
  let priNav = document.getElementById('menu');
  let searchForm = document.getElementById('menu-search');
  let searchButDesk = document.getElementById('search-button');
  let header = document.getElementById('header');
  let secondNav = document.getElementById('second-nav');
  let childButtons = document.getElementsByClassName('has-child--button');
  let i;

  // close all menus when escape is pressed



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

  $('#menu .menu-item-has-children').children('a').addClass('menu-item-has-children--link');
  $('a.menu-item-has-children--link').after('<button class="nav-primary__toggle has-child--button"></button>');
  $('.form-search').attr('placeholder', 'Search');

  /* Select the size on load or reset the size of the submenu for dekstop only. Resize the submenu when
	================================================================= */
  function desktopSubmenuResize () {
    let w = $('.ucla.campus.header').width() - 48,
      negOffset = (w + 10) * -1;

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
    // $('#block-search').append(searchForm);

    $('#entity-wrap').append(secondNav);

    $('a.current-page').next('.has-child--button').addClass('current-page');

    $(document).keyup(function (e) {
      if (e.key === 'Escape') { // escape key maps to keycode `27`
        // if desktop sub menu is focus then unfocus and remove styles
        if ($('#menu-main-menu ul li a').is(':focus')) {
          document.activeElement.blur();
          $('.sub-menu').removeAttr('style');
          $('.menu-item-has-children--link').removeAttr('style');
          $('.menu-item').removeAttr('style');
          $('.has-child--button').removeAttr('style');
          $('.has-child--button').find('svg > g > .Path-polygon').attr('fill', '#00598C');
          // else if the mobile menu is open close it, focus on the hamburger and allow scrolling again.
        } else if (searchButDesk.classList.contains('is-active')) {
          $('#search-button').trigger('click');
          $('#search-button').focus();
        }
      }
    });

    // Desktop Menu keyboard functionality
    document.onkeydown = function () {

      let element = document.activeElement;
      /*eslint-disable */
      var evt = evt || window.event;
      /*eslint-enable */

      if ($('.menu-item-has-children--link').is(':focus')) {

        $(element).siblings('ul').css('display', 'block');

        if (evt.keyCode === 9 && event.shiftKey) {
          setTimeout(function () {
            $(element).siblings('ul').css('display', '');
          }, 100);
        } else if (evt.keyCode === 9) {
          // add styles to top level nav when sublevel is focused
          $(element).parent().css('background', '#0079BF'); // <li class="menu-item-has-children--link">
          $(element).css({ // <a>
            'border-bottom': '0',
            'color': '#fff'
          });
          $(element).next('button').css({ // <a class="has-child--link">
            'border-bottom': '0',
            'background': '#0079BF'
          });
          $(element).next('button').find('svg > g > .Path-polygon').attr('fill', '#fff'); // dropdown svg
        }

      } else if ($('li.menu-item-has-children > ul > li:first-of-type > a').is(':focus')) {

        if (evt.keyCode === 9 && event.shiftKey) {

          setTimeout(function () {
            // Remove styles to top level nav when sublevel is focused
            $(element).parent().parent().parent().removeAttr('style'); // <li class="has-child">
            $(element).parent().parent().prev().prev('a').removeAttr('style'); // <a class="has-child--link">
            $(element).parent().parent().prev().removeAttr('style'); // <a class="has-child--link">
            $(element).parent().parent().prev().find('svg > g > .Path-polygon').attr('fill', '#0079BF'); // dropdown svg
          }, 100);

        } else if (evt.keyCode === 9 && $('li.menu-item-has-children > ul > li:first-of-type > a').is(':focus') && $('li.menu-item-has-children > ul > li:last-of-type > a').is(':focus')) {
          console.log('whatup');
          $(element).parent().parent().removeAttr('style'); // <ul>
          // Remove styles to top level nav when sublevel is focused
          $(element).parent().parent().parent().removeAttr('style'); // <li class="has-child">
          $(element).parent().parent().prev().prev().removeAttr('style'); // <a class="has-child--link">
          $(element).parent().parent().prev().removeAttr('style'); // <a class="has-child--link">
          $(element).parent().parent().prev().find('svg > g > .Path-polygon').attr('fill', '#0079BF'); // dropdown svg
        }

      } else if ($('li.menu-item-has-children > ul > li:last-of-type > a').is(':focus')) {

        if (evt.keyCode === 9 && event.shiftKey) {
          // do nothing
        } else if (evt.keyCode === 9) {

          $(element).parent().parent().removeAttr('style'); // <ul>
          // Remove styles to top level nav when sublevel is focused
          $(element).parent().parent().parent().removeAttr('style'); // <li class="has-child">
          $(element).parent().parent().prev().prev().removeAttr('style'); // <a class="has-child--link">
          $(element).parent().parent().prev().removeAttr('style'); // <a class="has-child--link">
          $(element).parent().parent().prev().find('svg > g > .Path-polygon').attr('fill', '#0079BF'); // dropdown svg

        }
      }


    };

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

    // Put the header buttons at the end of the nav
    $('ul#menu-main-menu').append(secondNav);

    /* Disable Mobile scroll when menu is open CSS for no-scroll in stylesheet*/
    $('#primary-ham').on('click', scrollDisable);

    function scrollDisable () {
      if (hamButton.classList.contains('is-active')) {
        $('body').removeClass('no-scroll');
      } else {
        $('body').addClass('no-scroll');
      }
    }

    // Click functionality for mobile nav submenu buttons.
    $(document).on('click', '.has-child--button', function () {
      event.preventDefault();
      let elem = $(this);
      if (elem.next('ul').hasClass('nav-primary__sublist--hidden')) {
        setTimeout(function () {
          elem.addClass('is-open');
          elem.next('ul').removeClass('nav-primary__sublist--hidden');
        }, 10);
        //console.log('menu closed'); // For Debuggin' Only
      } else {
        setTimeout(function () {
          elem.removeClass('is-open');
          elem.next('ul').addClass('nav-primary__sublist--hidden');
        }, 10);
        //console.log('menu open'); // For Debuggin' Only
      }

    });

    $(document).keyup(function (e) {
      if (e.key === 'Escape') { // escape key maps to keycode `27`
        let found = false;
        // Check each submenu individually to see if any are open
        for (i = 0; i < childButtons.length; i++) {
          if (childButtons[i].classList.contains('is-open')) {
            // if open menus are found close them
            $('.sub-menu').removeClass('is-open');
            $('.has-child--button').removeClass('is-open');
            // Reset the found variable
            found = true;
            // stop what is happening, do not close the entire menu
            break;
          }
        }
        // if submenu is not open close entire menu
        if (!found && hamButton.classList.contains('is-open')){
          $('#primary-ham').trigger('click');
          $('#primary-ham').focus();
          $('body').removeClass('no-scroll');
        }
      }
    });

    // Enable Click functionality for mobile nav submenu.
    $('.has-child--button').removeAttr('tabindex');

    document.onkeydown = function (evt) {

      let element = document.activeElement;
      /*eslint-disable */
      var evt = evt || window.event;

      //console.log(element); // debuggin' only

      /*eslint-enable */

      // Start with skip Navigation at the top of the page
      if ($('#skip-to-nav').is(':focus')) {
        if (evt.keyCode === 13) {
          if ($('#primary-ham').hasClass('is-active')) {
            // do nothing
            // console.log('Menu is already open.');
          } else {
            $('#primary-ham').trigger('click');
          }

        }

      } else if ($('#entity-name').is(':focus') && !$('.hamburger.hamburger--squeeze').hasClass('is-active')) {

        $('#primary-ham').trigger('click');

      } else if ($('.hamburger.hamburger--squeeze').is(':focus')) {

        if (evt.keyCode === 9 && event.shiftKey) {

          if ($('.hamburger.hamburger--squeeze').hasClass('is-active')) {
            setTimeout(function () {
              $('#primary-ham').trigger('click');
              $('body').removeClass('no-scroll');
            }, 100);

          }

        } else if (evt.keyCode === 9) {

          if ($('.hamburger.hamburger--squeeze').hasClass('is-active')) {
            // do nothing
          } else {

            event.preventDefault();
            setTimeout(function () {
              $('#content').find('a:first').focus();
            }, 100);
          }

        }

      } else if ($('li.menu-item-has-children > a').is(':focus')) {

        $(element).siblings('ul').removeAttr('style');

      } else if ($('.menu-main-menu-container > ul > li:last-of-type > a.menu-item-has-children--link:last-of-type').is(':focus')) {

        if (evt.keyCode === 9) {
          setTimeout(function () {
            $(element).next('button').focus();
          }, 100);
        }

      // If you're focused on the last link in the main menu
      } else if ($('#second-nav> a:last-of-type').is(':focus')) {

        if (evt.keyCode === 9 && event.shiftKey) {
          // Do nothing

        } else if (evt.keyCode === 9) {
          event.preventDefault();
          setTimeout(function () {
            $('#primary-ham').trigger('click');
            $('#content').find('a:first').focus();
            $('body').removeClass('no-scroll');
          }, 100);
        }

      } else if ($('#content a:first').is(':focus') && !hamButton.classList.contains('is-active')) {
        if (evt.keyCode === 9 && event.shiftKey) {
          event.preventDefault();
          setTimeout(function () {
            $('#primary-ham').trigger('click');
            $('html, body').animate({ scrollTop: 0 }, 10);
            $('#second-nav').find('a:last-of-type').focus();
            $('body').addClass('no-scroll');
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
    //console.log('i picked a menu');

    // This decides if the window is at dekstop size or not.
    if (window.innerWidth >= desktop) {

      // Reset or remove any menu classes
      $('.has-child--button, #menu, .hamburger, .header, .sub-menu').removeClass('is-active');
      $('body').removeClass('no-scroll');

      // Get and Run the dektop functionality
      desktopMenu();
      //console.log('i picked the desktop menu');

    // This decides if the window is at mobile size or not.
    } else if (window.innerWidth < desktop){

      // Reset or remove any menu classes

      // Get and Run the mobile menu functionality
      mobileMenu();
      //console.log('i picked the mobile menu');

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
