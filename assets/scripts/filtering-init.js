'use strict';

(function () {
  (function ($) {
    var $grids;
    console.log("filtering-init loaded");
    $grids = $('.post-grid');
    $grids.each(function () {
      $('.post-grid').isotope({
        itemSelector: '.post',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer',
          gutter: '.gutter-sizer'
        }
      });
      return console.log('First isotope');
    });
    $grids.imagesLoaded(function () {
      $grids.each(function () {
        $(this).isotope({
          itemSelector: '.post',
          percentPosition: true,
          masonry: {
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer'
          }
        });
        return console.log('Second isotope');
      });
    });
    $('.post-grid').isotope('layout');
  })(jQuery);
}).call(undefined);