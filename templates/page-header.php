<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <?php if (! is_front_page() ) { ?>
      <h2><?= Titles\title(); ?></h2>
  <?php } ?>

</div>
