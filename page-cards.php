<?php /**
 * Template Name: Cards Template
 *
 * @package WordPress
 * @subpackage SkepticalNavy
 * @since SkepticalNavy 1.0
 */ ?>


<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
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

<?php
$alm_options = 'scroll="false" offset="10" pause="true" css_classes="" transition_container="false" container_type="div"';
$author = get_the_author_meta('ID');
  if(is_author()){ ?>
    <?php

      echo do_shortcode('[ajax_load_more ' . $alm_options . ' author="'.$author.'"]');
    ?>
  <?php } ?>
  <?php if(is_category()){ ?>
    <?php
      $cat = get_category( get_query_var( 'cat' ) );
      $category = $cat->slug;
    ?>
      <h1><span>Category:</span> <?php echo single_cat_title('', false );?> </h1>
      <?php
      echo do_shortcode('[ajax_load_more ' . $alm_options . ' category="'.$category.'"]');
    ?>
  <?php } ?>
  <?php if(is_tag()){ ?>
      <h1><span>Tag:</span> <?php echo single_cat_title('', false );?></h1>
      <?php
      $tag = get_query_var('tag');
      echo do_shortcode('[ajax_load_more ' . $alm_options . ' tag="'.$tag.'"]');
    ?>
  <?php } ?>
  <?php if(is_home()){ ?>
      <?php
      $type = get_query_var('post-type');
      echo do_shortcode('[ajax_load_more ' . $alm_options . ' post_type="'.$type.'"]');
    ?>
  <?php } ?>

</div>



<?php the_posts_navigation(); ?>
