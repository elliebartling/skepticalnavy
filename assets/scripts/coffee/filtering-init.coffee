(($) ->
  console.log "filtering-init loaded"
  $grids = $('.post-grid')

  # $grids.each ->
  #   $('.post-grid').isotope
  #     itemSelector: '.post'
  #     percentPosition: true
  #     masonry:
  #       columnWidth: '.grid-sizer'
  #       gutter: '.gutter-sizer'
  #   console.log 'First isotope'

  $grids.imagesLoaded( ->
    $grids.isotope
      itemSelector: '.post'
      percentPosition: true
      masonry:
        columnWidth: '.grid-sizer'
        gutter: '.gutter-sizer'
    console.log 'Second isotope'

    return)

  # $('.post-grid').isotope('layout')

  # $.fn.almComplete = ->
  #   console.log 'More posts loaded!'
  #   articles = $('.alm-ajax').children('article').detach()
  #   loadMoreButton = $('#ajax-load-more').detach()
  #   loadMoreButton.appendTo('.posts-navigation')
  #
  #   $('.post-grid').imagesLoaded( ->
  #     $('.post-grid').append(articles).isotope('appended', articles)
  #     $('.post-grid').isotope('layout')
  #     return
  #   )

  return
)(jQuery)
