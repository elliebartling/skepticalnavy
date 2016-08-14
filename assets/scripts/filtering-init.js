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
      $grids.isotope({
        itemSelector: '.post',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer',
          gutter: '.gutter-sizer'
        }
      });
      console.log('Second isotope');
    });
  })(jQuery);
}).call(undefined);