var Common = {
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
};
export default {
  init() {
    // JavaScript to be fired on all pages
    Common.setupSuperMenu();
    Common.setupSearch();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
