(function ($) {

  var $grid = $('.post-grid');
  console.log("ajax-layout loaded");

  $grid.isotope({
    itemSelector: '.post',
    percentPosition: true,
    // layoutMode: 'fitRows'
    masonry: {
      columnWidth: '.grid-sizer',
      gutter: '.gutter-sizer'
    }
  });

  $grid.imagesLoaded( function() {
    $grid.isotope('layout');
  });

  var loadMoreButton = $('#ajax-load-more').detach();
  loadMoreButton.appendTo('.posts-navigation');

  $.fn.almComplete = function(alm) {

    console.log('More posts loaded!');

    // $grid.imagesLoaded(function() {
    //   articles.each(function() {
    //     console.log("images loaded");
    //     $grid.append($(this))
    //          .isotope('appended', $(this))
    //          .isotope('layout');
    //   });
    // });

    var articles = $('.alm-ajax').children('article').detach();

    // var a = articles.html();

    // $grid.append(articles)
    //      .isotope('appended', articles)
    //      .isotope('layout');

      articles.each(function() {
        console.log("images loaded");
        $grid.append($(this))
             .isotope('appended', $(this))
             .isotope('layout');
      });
      $grid.attr('width', '947px');


    $grid.isotope('layout');

  };

})(jQuery);
