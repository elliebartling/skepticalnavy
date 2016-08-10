<section class="recent-posts wrap container">
  <div class="wrap container" role="document">
    <?php echo do_shortcode('[tsl_section_header header="Recent Posts" subtitle="Our latest and greatest original posts." button-target="/blog" button-text="view all"]'); ?>
  </div><!-- /.wrap -->
  <div class="posts">
    <?php echo do_shortcode('[tsl_recent_posts type="post" get="8" size="half"]'); ?>
  </div>
</section>
<section class="email-capture">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar('sidebar-email'); ?>
    </div>
  </div>
</section>
<section class="three-sixty-posts wrap container">
  <div class="wrap container" role="document">
    <?php echo do_shortcode('[tsl_section_header header="TSL 360" subtitle="Our latest and greatest original posts." button-target="/360" button-text="view all"]'); ?>
  </div><!-- /.wrap -->
  <div class="posts">
    <?php echo do_shortcode('[tsl_recent_posts type="threesixty" get="12" size="thirds"]'); ?>
  </div>
</section>
