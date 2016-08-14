<?php get_template_part('templates/page', 'header'); ?>

<section class="">
  <?php _e("We're not sure where the page you were looking for went, but it isn't here.", 'sage'); ?>
  <div class="background"><img class="background-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/aliens.jpg"/></div>
  <p>Try again?</p>
</section>

<?php get_search_form(); ?>
