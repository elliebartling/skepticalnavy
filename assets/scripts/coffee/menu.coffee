(($) ->
  console.log "menu.coffee loaded"
  $burger = $('.hamburger')
  $overlay = $('#overlay')
  $nav = $('header.banner')

  ($burger || $overlay).on 'click', ->
    if $nav.hasClass("is-active")
      $burger.removeClass("is-active")
      $nav.removeClass("is-active")
    else
      $burger.addClass("is-active")
      $nav.addClass("is-active")



) jQuery
