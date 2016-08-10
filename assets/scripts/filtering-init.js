'use strict';

(function () {
  (function ($) {
    var $grids;
    console.log("filtering-init loaded");
    $grids = $('.post-grid');
    $grids.each(function () {
      return $(this).isotope({
        itemSelector: '.post',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer',
          gutter: '.gutter-sizer'
        }
      });
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
        return false;
      });
      return false;
    });
    return false;
  })(jQuery);
}).call(undefined);