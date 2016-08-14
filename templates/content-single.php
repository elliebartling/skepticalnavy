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
          <?php get_template_part('templates/entry-meta'); ?>
          <?php get_template_part('templates/entry-social'); ?>
        </header>
        <?php the_content(); ?>
        <div class="skeptical-divider"><img class="brand" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand.png"/></div>
      </div>


      <aside class="sidebar-posts sticky">
        <?php dynamic_sidebar('sidebar-primary'); ?>
      </aside><!-- /.sidebar -->


    </section>
    <div id="footer-social" class="entry-social ssk-group ssk-text" data-url="<?= get_the_permalink(); ?>">
      <a href="" class="ssk ssk-text ssk-facebook">Facebook</a>
      <a href="" class="ssk ssk-text ssk-twitter">Twitter</a>
      <a href="" class="ssk ssk-text ssk-reddit">Reddit</a>
    </div>
    <aside class="sidebar-posts bottom">
      <?php dynamic_sidebar('sidebar-primary'); ?>
    </aside><!-- /.sidebar -->
  </article>
<?php endwhile; ?>
