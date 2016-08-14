<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>

    <?php if (has_post_thumbnail()) {
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
      ?>
      <div class="background">
        <img src="<?= $image[0] ?>" />
      </div>
    <?php } ?>

    <section class="content-wrap">
      <div class="entry-content">
        <header>
          <?php get_template_part('templates/entry-tags'); ?>
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php get_template_part('templates/entry-social'); ?>
        </header>
        <div class="entry-body">
          <?php the_content(); ?>
        </div>
      </div>

    </section>
  </article>
<?php endwhile; ?>
