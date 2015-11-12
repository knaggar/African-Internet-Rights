<?php
/**
 *  @package air
 *  @since 2.0
 *  @name Single Post Template
 *  Template Name: Single Post Template
 **/
?>
<?php get_header(); ?>
  <?php get_template_part('page-header', get_post_format()); ?>
  <?php get_template_part('pre-body', get_post_format()); ?>
  <section class="body">
    <div class="container clearfix col12">
      <?php get_sidebar(); ?>
      <div class="col7 right">
        <?php the_post(); ?>
        <div class="content">
          <div class="header"></div>
          <div class="body">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>
