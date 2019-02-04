const Common = {
  setupSuperMenu: function () {
    $('.header__menu-toggle').on('click', function (event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).toggleClass('is-active');
      $('body').toggleClass('is-open-menu');
      $('.super-menu').toggleClass('is-open');
    });
  },
  setupSearch: function () {
    $('.header__search-link, .search-wrap__close').on('click', function (event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).closest('.header__search').find('.search-field').focus();
      $(this).closest('.header__search').toggleClass('is-open');
    });
  },
  setupMainSlideshow: function () {
    $('.slide').owlCarousel({
      items: 1,
      nav: false,
      dots: true,
      loop: true,
      autoplay: false,
      autoplayTimeout: 6000,
      autoplayHoverPause: true,
    });
  },
  setupFeaturedSlideshow: function () {
    $('.featured__slideshow').owlCarousel({
      items: 1,
      nav: true,
      dots: true,
      loop: true,
      autoplay: false,
      autoplayTimeout: 6000,
      autoplayHoverPause: true,
    });
  },
  setupColors: function () {
    $('.js-image-toggle').on('click', function (e) {
      $('.js-product-item')
        .first()
        .attr('href', $(this).attr('href'))
        .find('img')
        .attr('src', $(this).find('img').data('src'))
        .attr('srcset', $(this).find('img').data('srcset'));
      $('html, body').animate({
        scrollTop: 0,
      }, 300);
      e.preventDefault();
    });
  },
  setupImagesDimension: function () {
    $('.js-product-item')
      .on('mouseover', function () {
        $(this).children('img').css({
          'transform': 'scale(' + $(this).attr('data-scale') + ')',
        });
      })
      .on('mouseout', function () {
        $(this).children('img').css({
          'transform': 'scale(1)',
        });
      })
      .on('mousemove', function (e) {
        $(this).children('img').css({
          'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%',
        });
      })
  },
};
export default {
  init() {
    // JavaScript to be fired on all pages
    Common.setupSuperMenu();
    Common.setupSearch();
    Common.setupMainSlideshow();
    Common.setupFeaturedSlideshow();
    Common.setupColors();
    Common.setupImagesDimension();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
