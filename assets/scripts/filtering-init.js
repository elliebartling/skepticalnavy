'use strict';

(function () {
  (function ($) {
    var $grids;
    console.log("filtering-init loaded");
    $grids = $('.post-grid');
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