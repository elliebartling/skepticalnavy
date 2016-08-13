<div class="entry-meta">
  <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
<?php if (!is_post_type_archive("threesixty") && !is_singular("threesixty")) { ?>
  <span class="fa divider"></span>
  <span class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></span>
<?php } ?>

</div>
