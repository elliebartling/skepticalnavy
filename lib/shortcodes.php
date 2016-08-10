<?php


/**
 * Show recent posts
 */
function recent_posts_grid($atts) {

  $args = array(
    'post_type' => $atts['type'],
    'post_status' => 'publish',
    'posts_per_page' => $atts['get']
  );

  $options = array(
    'grid' => true,
    'grid_size' => $atts['size'],
    'article_classes' => ['grid-item']
  );

  return postify_it($args, $options);
}

add_shortcode( 'tsl_recent_posts' , 'recent_posts_grid' );

function email_bar() {
  dynamic_sidebar('sidebar-email');
}
add_shortcode('tsl_email_capture', 'email_bar');


/**
 * Create buttons from the CMS
 *
 */

 function section_header($atts) {
   $content = '<div class="section-header">';
   $content .= '<div class="col"><h1>' . $atts["header"] . "</h1>";
   $content .= '<p>' . $atts["subtitle"] . '</p></div>';
   $content .= '<div class="col"><button class="btn btn-info" href="' . get_site_url() . $atts["button-target"] . '">' . $atts["button-text"] . '</button>';
   $content .= '</div></div>';

   return $content;
 }
add_shortcode( 'tsl_section_header' , 'section_header' );
