(($) ->
  console.log "filtering-init loaded"
  $grids = $('.post-grid')

  $grids.each ->
    $(this).isotope
      itemSelector: '.post'
      percentPosition: true
      masonry:
        columnWidth: '.grid-sizer'
        gutter: '.gutter-sizer'

  $grids.imagesLoaded( ->
    $grids.each ->
      $(this).isotope
        itemSelector: '.post'
        percentPosition: true
        masonry:
          columnWidth: '.grid-sizer'
          gutter: '.gutter-sizer'

      return false
    return false)
  return false
)(jQuery)
