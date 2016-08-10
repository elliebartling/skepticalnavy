<?php

/**
* Generate pop-ups for use in other pages
*/



$args = array(
  'post_type' => 'popups',
  'post_status' => 'published'
);

// Create a new WP Query for the posts
$query = new WP_Query( $args );


// Loop through
if ( $query->have_posts() ) {

  $content = '<section class="modals">';

  // Loop through posts basesed on the Query
  while ( $query->have_posts() ) {

    $query->the_post();
    $post = get_post();

    $content .= "<div class='modal' id='{$post->post_name}'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                        {$post->post_content}
                      </div>
                    </div>
                  </div>
                </div>";


  }

  $content .= "</section>";

  // Reset the query
  wp_reset_postdata();

}
else {
  $content = "No posts found.";
}

echo $content;
