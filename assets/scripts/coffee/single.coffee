(($) ->
  console.log("single.coffee loaded")
  src = $(location).attr('href')
  text = $('blockquote.twitter-me p').text()
  url = 'https://twitter.com/intent/tweet?url=' + src + '&text=' + encodeURIComponent(text) + '&via=skepticliberty'
  console.log(text)
  $('blockquote.twitter-me').wrapInner("<a target='_new' href='" + url + "' class='ssk-twitter'></a>")

  $('.sticky').Stickyfill()
  return true
)(jQuery)
