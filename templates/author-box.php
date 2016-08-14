<section id="author-box">
  <div class="container">

    <?php $coauthors = get_coauthors(); ?>
    <?php if ($coauthors) { ?>
      <?php foreach( $coauthors as $coauthor ) {
        $authID = get_the_coauthor_meta('ID');
        ?>
        <div class="author coauthor">
          <div class="author-photo">
            <?php

            if (userphoto_exists($coauthor)) {
                echo userphoto($coauthor, '', '', array("width"=>"100%", "height" => "100%"));
            }
            else {
              echo get_avatar($coauthor->user_email, 200);
            }
            ?>

          </div>

          <div class="author-info">
            <h1 class="autor-name"><?php echo $coauthor->display_name; ?></h1>
            <?php if( get_the_coauthor_meta('university', $authID) != '') {
         			echo '<h5 class="editor-university">';
         			the_author_meta('university', $coauthor->ID);
         			echo '</h5>';
         		} ?>
            <p class="author-bio"><?php echo $coauthor->description; ?></p>
            <!-- <ul class="author-social">
              <li>
            </ul> -->
          </div>

          <a href="<?php echo get_author_posts_url($coauthor->ID); ?>" class="btn btn-info btn-fullwidth">View all Posts by <?php echo $coauthor->display_name; ?> </a>

        </div>
      <?php }
      } else { ?>
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
    <?php } ?>
</div>
</section>
