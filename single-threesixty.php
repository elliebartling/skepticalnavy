<?php get_template_part('templates/content-single-threesixty', get_post_type()); ?>
<style class="embedly-css">
@import url('https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:800+500+300|Inconsolata');
@import url('https://fast.fonts.net/cssapi/2e2de36b-673c-47a0-94fe-647aa81e7d3c.css');
  .card {
    font-family: 'Roboto', sans-serif;
    max-width: 100%;
  }
  .card .title a {
    font-family: 'Trade Gothic W01', sans-serif;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 26px;
  }
  .card .title a:hover {
    color: #F1A069;
  }
  .art-bd-img {
    border-radius: 2px;
    box-shadow: 2px 0px 20px rgba(0,0,0, 0.05);
  }
  .art-bd {
    margin-top: 2rem;
    margin-bottom: 2rem;
  }
  .card a, .card .action {
    color: #0BB4C9;
  }
  .hdr {
    display:none;
  }
</style>
<script>
  (function($) {
    $('.entry-body a').addClass("embedly-card");
    $('.entry-body a').attr("data-card-chrome", "0");
    $('.entry-body a').attr("data-card-theme", "light");
  })(jQuery);

  (function(w, d){
   var id='embedly-platform', n = 'script';
   if (!d.getElementById(id)){
     w.embedly = w.embedly || function() {(w.embedly.q = w.embedly.q || []).push(arguments);};
     var e = d.createElement(n); e.id = id; e.async=1;
     e.src = ('https:' === document.location.protocol ? 'https' : 'http') + '://cdn.embedly.com/widgets/platform.js';
     var s = d.getElementsByTagName(n)[0];
     s.parentNode.insertBefore(e, s);
   }
  })(window, document);

</script>
