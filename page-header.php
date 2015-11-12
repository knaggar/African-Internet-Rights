<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Each page/post header Template
 **/
?>
<section class="header">
  <div class="container col12 clearfix">
    <div class="page-title">
    <?php if (!is_post_type_archive()) {
        the_title('<h1>', '</h1>');
      } else {
        post_type_archive_title('<h1>','</h1>');
      } ?>
    </div>
  </div>
</section>
