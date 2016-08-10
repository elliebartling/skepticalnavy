<section id="author-box">
  <div class="container">
    <div class="author">

      <div class="author-photo">
        <?php
        if (userphoto_exists(get_the_author_id())) {
            echo userphoto(get_the_author_id(), '', '', array("width"=>"100%", "height" => "100%"));
        }
        else {
          echo get_avatar(get_the_author_meta('email'), 200);
        }

        ?>
      </div>

      <div class="author-info">
        <h1 class="autor-name"><?= get_the_author() ?></h1>
        <p class="author-bio"><?php the_author_meta('description') ?></p>
        <!-- <ul class="author-social">
          <li>
        </ul> -->
      </div>

      <a href="<?= get_author_posts_url(get_the_author_id()) ?>" class="btn btn-info btn-fullwidth">View all Posts by <?php the_author() ?> </a>

    </div>
  </div>
</section>
