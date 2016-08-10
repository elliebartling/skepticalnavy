<div class="entry-meta">
  <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time><span class="fa divider"></span>
<span class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></span>
</div>
<div class="entry-social ssk-group ssk-sticky ssk-left" data-url="<?= get_the_permalink(); ?>">
  <a href="" class="ssk ssk-facebook"></a>
  <a href="" class="ssk ssk-twitter"></a>
  <a href="" class="ssk ssk-reddit"></a>
  <a href="" class="ssk ssk-wet-asphalt"><span class="fa fa-paper-plane"></span></a>
</div>
