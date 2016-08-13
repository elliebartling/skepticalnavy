<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',     // Scripts and stylesheets
  'lib/extras.php',     // Custom functions
  'lib/setup.php',      // Theme setup
  'lib/titles.php',     // Page titles
  'lib/wrapper.php',    // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/loop.php',        // Custom loop & post formatting
  'lib/shortcodes.php'  // Shortcodes
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function create_post_type() {
  register_post_type( 'threesixty',
    array(
      'labels' => array(
        'name' => __( '360 Posts' ),
        'singular_name' => __( '360 Post' )
      ),
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'create_post_type' );

function create_modal_post_type() {
  register_post_type( 'popups',
    array(
      'labels' => array(
        'name' => __( 'PopUps' ),
        'singular_name' => __( 'PopUp' )
      ),
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'public' => true,
      'has_archive' => false,
    )
  );
}
add_action( 'init', 'create_modal_post_type' );
