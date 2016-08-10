'use strict';

(function () {
  (function ($) {
    var $burger, $nav, $overlay;
    console.log("menu.coffee loaded");
    $burger = $('.hamburger');
    $overlay = $('#overlay');
    $nav = $('header.banner');
    return ($burger || $overlay).on('click', function () {
      if ($nav.hasClass("is-active")) {
        $burger.removeClass("is-active");
        return $nav.removeClass("is-active");
      } else {
        $burger.addClass("is-active");
        return $nav.addClass("is-active");
      }
    });
  })(jQuery);
}).call(undefined);