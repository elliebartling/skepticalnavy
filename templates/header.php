<header class="banner">

  <div class="banner-container">

    <div class="burger-placement"></div>

    <!-- Search Bar -->
    <?php dynamic_sidebar('sidebar-header'); ?>

    <!-- Brandmark -->
    <a class="brand" href="<?= esc_url(home_url('/')); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brand.png" />
      <span class="brand-name"><?php bloginfo('name'); ?></span>
    </a>

    <!-- Social Media Placeholder -->
    <div class="widget social-media">
    </div>

    <!-- Donate Button -->
    <button class="btn btn-info fa fa-heart" href="#" data-toggle="modal" data-target="#support-us"></button>

  </div>

  <div class="nav-container" id="navigation">

    <!-- Begin Hamburger Menu -->
    <button class="hamburger hamburger--elastic" type="button" aria-label="Menu" aria-controls="navigation">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>


    <div id="color-bar">
      <!-- Begin Navigation -->
      <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
        <!-- Search Bar -->
        <?php dynamic_sidebar('sidebar-header'); ?>
      </nav>
      <div class="extras"></div>
      <div class="social-media"></div>
    </div>
    <div id="overlay"></div>
  </div>

</header>

<?php if (is_front_page()) {

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1
  );

  $options = array(
    'grid' => false,
    'article_classes' => ['featured-post'],
    'section_classes' => ['featured']
  );

  echo postify_it($args, $options);

  }
 ?>
