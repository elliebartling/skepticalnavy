<?php

/**
 * Generate post formatting, given ID
 * For keeping CSS consistent
 */

function postify_it($args, $options) {

  // Create a new WP Query for the posts
  $query = new WP_Query( $args );


  // Loop through
  if ( $query->have_posts() ) {

    // Define classes for container/wrap
    $section_classes = $options['section_classes'];
    $c = '';
    if ($section_classes) {
      foreach($section_classes as $key) {
        $c .= $key . ' ';
      }
    }

    // If "grid" is enabled, build the grid container
    if ($options["grid"]) {
      $content = '<div id="post-grid" class="post-grid '. $options['grid_size'] .' '. $args['post_type'] .'">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>';
    }
    else {
      $content = '<section class="' . $c . '">';
    }


    // Add custom classes to each article based on the arguments
    $article_classes = $options['article_classes'];
    $custom_classes = 'post postify';
    foreach( $article_classes as $key ) {
      $custom_classes .= ' ' . $key;
    }

    // Loop through posts basesed on the Query
    while ( $query->have_posts() ) {

      $query->the_post();
      $post = get_post();

      // Add standard classes to each article, based on the specific article
      $classes = $custom_classes . ' post-' . $post->ID . ' post-' . $post->post_status . ' post-type-' . $post->post_type;

      // Add category classes tothe article
      $categories = get_the_category($post->ID);
      foreach( array_keys($categories) as $cat ) {
          $classes .= ' category-' . $cat;
      }

      // Get the authors, account for Coauthors links
      if ( function_exists('coauthors_posts_links') ) {
        $author = coauthors_posts_links($between = ", ", $betweenLast = " and ", "", "", false);
      }
      else {
        $author = get_the_author_link();
      }

      // Get the image
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
      if ( $image ) {
        $classes .= " has-thumbnail";
      }

      // Build the article
      $html = "<article class='" . $classes . "'>";
      $html .= "<div class='post-thumbnail'><div class='overlay'></div><img src='" . $image[0] ."'/></div>";
      $html .= "<div class='post-content'>";
      $html .= "<div class='post-header'><h2 class='post-title'>";
      $html .= "<a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h2><p class='post-author'>by " . $author . "</p></div>";
      $html .= "<div class='post-excerpt'><p>" . get_the_excerpt() . "</p></div>";
      $html .= "<div class='post-meta'><span>" ;
      $html .= "</div></div>";
      $html .= '</article>';

      $content .= $html;
    }

    // Close the grid, if enabled
    if ($options["grid"]) {
      $content .= '</div>';
    }
    else {
      $content .= "</section>";

    }

    // Reset the query
    wp_reset_postdata();

  }
  else {
    $content = "No posts found.";
  }
  return $content;
}


function set_facebook_meta_tags() {
	if (is_single()) {
		?>
		<!-- Open Graph Meta Tags for Facebook and LinkedIn Sharing !-->
		<!-- HEY THIS PLUGIN WORKED -->
		<meta property="og:title" content="<?php the_title(); ?>"/>
		<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>"/>
		<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'fb-image'); ?>
		<?php if ($fb_image) : ?>
			<meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
			<?php endif; ?>
		<meta property="og:type" content="<?php
			if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>"
		/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:author" content="<?php
		if (coauthors() == "") {
			the_author();
		}
		elseif (coauthors() != "") {
			coauthors();
		}
		else {
			echo "";
		}?>"/>
		<!-- End Open Graph Meta Tags !-->
		<?php
	}
}

add_action('wp_head', 'set_facebook_meta_tags');
