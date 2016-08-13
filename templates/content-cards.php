<article <?php post_class('post postify'); ?>>
  <?php
    echo "<div class='post-thumbnail'><div class='overlay'></div><img src='" . $image[0] ."'/></div>";
    echo "<div class='post-content'>";
    echo "<div class='post-header'><h2 class='post-title'>";
    echo "<a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h2>";
    get_template_part('templates/entry-meta');

    if (get_post_type() == "threesixty") {
      $title = get_the_title();
      $title = substr($title, 3, -3);
      $excerpt = get_the_excerpt();
      $tidy = str_replace($title, " ", $excerpt);
      echo "<div class='post-excerpt'><p>" . $tidy . "</p></div>";
    } else {
      echo "<div class='post-excerpt'><p>" . get_the_excerpt() . "</p></div>";
    }

    echo "<div class='post-meta'><span>" ;
    echo "</div></div>";

    echo $html;
  ?>
</article>
