"use strict";

(function () {
  (function ($) {
    console.log("single.coffee loaded");
    SocialShareKit.init();
    $('.sticky').Stickyfill();
    return true;
  })(jQuery);
}).call(undefined);