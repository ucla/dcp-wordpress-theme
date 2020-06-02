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

        } else if (evt.keyCode === 9) {
          // do nothing
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
      /*eslint-disable */
      var evt = evt || window.event;
      /*eslint-enable */
      // Start with hamburger at top of page.
      if ($('.button.mobile').is(':focus')) {
        if (evt.keyCode === 13) {

          if ($('#primary-ham').hasClass('is-active')) {
            event.preventDefault();
            $('#menu-item-31').focus();
          } else {
            $('#primary-ham').trigger('click');
            $('#menu-item-31').focus();
          }

        }

      } else if ($('.hamburger.hamburger--squeeze').is(':focus')) {

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
              $('#main').find('a:first').focus();
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
      } else if ($('.menu-main-menu-container > ul > li:last-of-type > a:last-of-type').is(':focus')) {

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

      } else if (!$('.menu-main-menu-container > ul > li:last-of-type > button').hasClass('is-active') && $('#menu > ul > li:last-of-type > button').is(':focus')) {

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

      } else if ($('#main').find('a:first').is(':focus')) {
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
