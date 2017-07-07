<section class="recent-posts wrap container">
  <div class="wrap container" role="document">
    <?php echo do_shortcode('[tsl_section_header header="Recent Posts" subtitle="Our latest and greatest original posts." button-target="/blog" button-text="view all"]'); ?>
  </div><!-- /.wrap -->
  <div class="posts">
    <?php echo do_shortcode('[tsl_recent_posts type="post" get="8" size="half"]'); ?>
  </div>
</section>
<section class="dynamic-sidebar">
      <?php dynamic_sidebar('sidebar-email'); ?>
</section>
