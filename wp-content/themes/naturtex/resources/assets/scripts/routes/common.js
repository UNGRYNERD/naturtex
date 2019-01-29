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
};
export default {
  init() {
    // JavaScript to be fired on all pages
    Common.setupSuperMenu();
    Common.setupSearch();
    Common.setupMainSlideshow();
    Common.setupFeaturedSlideshow();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};