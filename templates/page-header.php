<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <?php if (! is_front_page() ) { ?>
      <h1><?= Titles\title(); ?></h1>
  <?php } ?>

</div>
<div class="grid-sizer"></div>
