<?php if (!have_posts()) : ?>
<?php get_template_part('templates/error'); ?>
  <?php get_search_form(); ?>
<?php endif; ?>
<?php if (is_author()) {
  get_template_part('templates/author-box');
}
else {
  get_template_part('templates/page', 'header');
}
?>

<div id="post-grid" class="post-grid thirds">
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content-cards', get_post_type() != 'post postify' ? get_post_type() : get_post_format()); ?>
  <?php endwhile; ?>

</div>



<?php the_posts_navigation(); ?>
