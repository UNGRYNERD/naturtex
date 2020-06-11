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
      onChange: function (owl) {
        var current = owl.item.index;
        const video = $(owl.target).find(".owl-item").eq(current).find("video");
        if (video.length) {
          video.get(0).play().then(function () {
            $(owl.target).find(".owl-item").eq(current).find(".js-play").hide();
          });
        }
      },
      onInitialized: function (owl) {
        var current = owl.item.index;
        const video = $(owl.target).find(".owl-item").eq(current).find("video");
        if (video.length) {
          video.get(0).play().then(function () {
            $(owl.target).find(".owl-item").eq(current).find(".js-play").hide();
          });
        }
      },
    });

    $('.js-play').on('click', function (e) {
      e.preventDefault();
      $(this).closest('.owl-item').find('video').get(0).play();
      $(this).hide();
    });
  },
  setupFeaturedSlideshow: function () {
    $('.js-featured-slideshow').owlCarousel({
      items: 1,
      nav: true,
      dots: true,
      loop: true,
      autoplay: false,
      autoplayTimeout: 6000,
      autoplayHoverPause: true,
    });
  },
  setupCompSlideshow: function () {
    $('.js-comp-slide').owlCarousel({
      items: 1,
      nav: true,
      dots: true,
      loop: true,
      autoplay: false,
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
  setupDropdowns: function () {
    $('.js-dropdown-item').on('click', function (e) {
      const fieldId = $(this).closest('.js-dropdown').data('field');
      const field = $(`input[name="${fieldId}"]`);
      field.val($(this).data('value'));
      $(this).closest('form').submit();
      e.preventDefault();
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
    Common.setupDropdowns();
    Common.setupCompSlideshow();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
