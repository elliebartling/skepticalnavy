(($) ->
  console.log("single.coffee loaded")
  src = $(location).attr('href')
  $('blockquote').wrapInner('<a href="" class="ssk" data-url="#{src}"></a>')
  SocialShareKit.init()
  $('.sticky').Stickyfill()
  return true
)(jQuery)
